#include <Arduino.h>
#include <WiFi.h>
#include <PubSubClient.h>     //Libreria MQTT


#define WIFI_SSID "WIFI_SSID"    //Su SSID del WIFI
#define WIFI_PASS "WIFI_PASSWORD"  //Su Password del WIFI

#define MQTT_CLIENT_NAME "ESP32_0000002"         //Cliente ID MQTT, Base ESP32_ + DEVICE_ID
#define MQTT_CLIENT_USER "señal_iot"             //User MQTT
#define MQTT_CLIENT_PASSWORD "1234456"   //Password MQTT
#define RELAY1 13                                //GPIO13 para salida de Relay


/****************************************
 * Constantes & Variables
 ****************************************/
const String device_id = "0000002";         // ID del Dispositivo
long dimmer;
long relay1;
char mqttBroker[] = "brokerNombre.com";  // Direccíon del Brojer 192.168.0.15
char payload[150];                          // Tamaño del mensaje
char topico[150];                           // Tamaño del topico
char topico2[150];                          // Tamaño del topico2
long lastMsg = 0;
/****************************************
 * Configuramos la IN1
 ****************************************/
struct Alarma {
  const uint8_t PIN;
  bool active;
};
/****************************************/
Alarma alarma1 = {25, false};
int value1 = 0;
/****************************************
 * PWM
 ****************************************/
int freq = 5000;
int ledChannel = 0;
int resolution = 8;
/****************************************
 * Funciones Auxiliares
 ****************************************/
  WiFiClient espClient;
  PubSubClient client(espClient);
 
/****************************************
 * Funsion recibir mensajes PubSubClient
 ****************************************/
  void callback(char *topic, byte *payload, unsigned int length)
  {
    String mensaje = "";
    Serial.print("Topico --> ");
    Serial.println(topic);

    for (int i = 0; i < length; i++) {
      mensaje += (char)payload[i];
    }

    mensaje.trim();
    Serial.println("Mensaje --> " + mensaje);
    String str_topic(topic);

      if (str_topic == device_id + "/command"){
          if ( mensaje == "on") {
            digitalWrite(RELAY1, HIGH);
            //////////////Respondemos OK///////////
            String topico_aux = device_id + "/respuesta";
            topico_aux.toCharArray(topico,25);
            client.publish(topico, "on_ok"); //Publicar respuesta on ok por MQTT
            ///////////////////////////////////////
          }
          if ( mensaje == "off") {
            digitalWrite(RELAY1, LOW);
            ///////////////Respondemos OK//////////
            String topico_aux = device_id + "/respuesta";
            topico_aux.toCharArray(topico,25);
            client.publish(topico, "off_ok"); //Publicar respuesta off ok por MQTT
            ///////////////////////////////////////
          }



      }

      if (str_topic == device_id + "/dimmer"){
           dimmer = 0;
           String text = mensaje;
           long i;
           i = text.toInt();
           dimmer = i;
           ledcWrite(ledChannel, dimmer*2.55); // multiplicamos por 2.55*100 para llegar a 255 que seria el maximo a 8bit = 3.3V
           delay(7);
      }
  }
/****************************************
 * Funsion reconectar de PubSubClient
 ****************************************/
  void reconnect()
  {
      // Loop hasta se reconecta
      while (!client.connected())
      {
         Serial.println("Intentando conexión MQTT...");

         // Conexion al Servidor MQTT , ClienteID, Usuario, Password.
         // Ver documentación => https://pubsubclient.knolleary.net/api.html
         if (client.connect(MQTT_CLIENT_NAME, MQTT_CLIENT_USER, MQTT_CLIENT_PASSWORD))
            {
              Serial.println("Conectado! a servidor MQTT CursoIOT CubaElectronica" );
              // Nos suscribimos a comandos
              String topico_serial = device_id + "/command";
              topico_serial.toCharArray(topico,25);
              client.subscribe(topico);
              // Nos suscribimos a dimmer
              String topico_serial2 = device_id + "/dimmer";
              topico_serial2.toCharArray(topico2,25);
              client.subscribe(topico2);
            }
            else
            {
              Serial.print("Falló, Client_Status=");
              Serial.print(client.state());
              Serial.println(" Intentando en 2 segundos");
              // Espero 2 segundo y lo vuelvo a intentar
              delay(2000);
            }
      }
  }

/****************************************
 * Sensor Interno CPU
 ****************************************/
  #ifdef __cplusplus
  extern "C" {
    #endif
    uint8_t temprature_sens_read();
    #ifdef __cplusplus
  }
  #endif
  uint8_t temprature_sens_read();
/****************************************
 * IRAM_ATTR In1
 ****************************************/
  void IRAM_ATTR in1() {
    alarma1.active = true;
  }
/****************************************
 * Main Functions
 ****************************************/
void setup()
{
  ledcSetup(ledChannel, freq, resolution);
  ledcAttachPin(BUILTIN_LED, ledChannel);
  pinMode(BUILTIN_LED, OUTPUT);

  Serial.begin(115200);

  WiFi.begin(WIFI_SSID, WIFI_PASS);
  Serial.println();
  Serial.print("Esperando conexión WiFi...");

  while (WiFi.status() != WL_CONNECTED)
  {
    Serial.print(".");
    delay(500);
  }

  Serial.println("");
  Serial.println("WiFi Connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  client.setServer(mqttBroker, 1883); //Nos conectamos al Broker, Servidor, Puerto.
  client.setCallback(callback);

  pinMode(RELAY1, OUTPUT); // Relay1 como Salida
  pinMode(alarma1.PIN, INPUT_PULLUP); //Activar las resistencias PullUp
  attachInterrupt(alarma1.PIN, in1, CHANGE); //Activar la Interrupcion por cambio de estado

}

void loop()
{
  if (!client.connected())
  {
    reconnect();
  }

  long now = millis();

  //Camturamos el Evento de la Entrada y lo enviamos por MQTT.
  if (alarma1.active) {
      value1 = digitalRead(alarma1.PIN); // En la interrupcion capturamos el estado del PIN
        if (value1 == HIGH) {
          static uint32_t lastMillis = 0;
          if (millis() - lastMillis > 15000) {
              lastMillis = millis();
                  Serial.println("Alarma Encendida 25");
                  String to_send = "GPIO25ON";
                  to_send.toCharArray(payload, 25);
                  String topico_aux = device_id + "/digital";
                  topico_aux.toCharArray(topico,25);
                  client.publish(topico, payload); //Publicar por MQTT
                  alarma1.active = false;
               }
          }
          else {
                  Serial.println("Alarma Apagada 25");
                  String to_send = "GPIO25OFF";
                  to_send.toCharArray(payload, 25);
                  String topico_aux = device_id + "/digital";
                  topico_aux.toCharArray(topico,25);
                  client.publish(topico, payload);
                  alarma1.active = false;
          }
        delay(1000); //Antirrebote.
  }
  //Publicar la temperatura interna del dispositivo y del DHT11.
      if (now - lastMsg > 60000){
          lastMsg = now;
          float temp = (temprature_sens_read() - 32) / 1.8;
          float wifi = WiFi.RSSI(); // Capturamos el nivel de la señal WIFI
          
          String ip = WiFi.localIP().toString(); //Capturamos el IP de la red local
          // Publicamos el Topic con los valores, RSSI, IP.
          String to_send = String(temp) + ","  + String(wifi) + "," + ip;
          to_send.toCharArray(payload, 50);
          String topico_aux = device_id + "/valores";
          topico_aux.toCharArray(topico,50);
          client.publish(topico, payload);
      }

  client.loop();

}
