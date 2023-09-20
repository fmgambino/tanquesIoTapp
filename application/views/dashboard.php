<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Inicio</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


  <!-- Main content -->
    <section class="content">
 <!--  MAIN CONTENT "contenido dentro del card desplegable" -->
      <?php if(!empty($dispositivos)):?>
       <?php foreach($dispositivos as $dispositivo):?>

         <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Datos del <b>Dispositivo: </b><?php echo $dispositivo->dispositivo_nombre;?> <b>Serie: </b><?php echo $dispositivo->dispositivo_serial?>
                  </h3>

                  <div class="card-tools">
                    
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                    </button>

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    
                   
                    <br>
                     <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-wifi"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Señal WiFi</span>
                      <span id="wifi_<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">0 dBm</span>
                      <span id="wifi2_<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">Calidad</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-history"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Ultima Conexión</span>
                      <span id="display_time<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">--/--/----</span>
                      <span id="display_time2<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">--:--:--</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-bell"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Ultimo Evento</span>
                      <span id="display_time3<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">--/--/----</span>
                      <span id="display_time4<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">--:--:--</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-ethernet"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Dirección IP</span>
                      <span id="display_time5<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">Red_Local</span>
                      <span id="display_ip<?php echo $dispositivo->dispositivo_serial?>" class="info-box-number">---.---.---.---</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

              </div> 

             </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                    <!-- ./col -->
                    
                    <!-- ./col -->
                   
                    <!-- ./col -->
                   
                    <!-- ./col -->
                    <!-- /.row Boton ON -->
                
                    <!-- ./col Boton OFF -->

              

   <?php endforeach;?>
  <?php endif;?>

  </section >


 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">TANQUES</h3>
              </div>
   <br>
 
   <div class="card-body">

    <div class="card mb-3" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
       <img src="<?php echo base_url(); ?>dist/img/tanqueCombustoleo.jpg"     alt="Photo 1" class="img-fluid" />
      </div>
      <div class="col-md-8">
        
         
 <!-- /.row Boton ON -->
                <div class="row">

                    <div class="col-6 col-md-3 text-center">

                        <a id="btnON_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-success" onclick="setRelay('on','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>ON</a>
                        <div class="knob-label">GPIO-13</div>

                      

                    </div>
                    
                    <!-- ./col Boton OFF -->
                    <div class="col-6 col-md-3 text-center">

                        <a id="btnOFF_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-danger disabled" onclick="setRelay('off','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>OFF</a>
                        <div class="knob-label">GPIO-13</div>

                    </div>
                    <!-- ./col Slider -->
                    <div class="col-6 col-md-3 text-center">

                        <input class="rang" id="range_<?php echo $dispositivo->dispositivo_serial?>" onchange="process_dimmer('<?php echo $dispositivo->dispositivo_serial?>');" type="text"  value="">
                        <div class="knob-label">Dimmer GPIO-2 LED BOARD</div>

                    </div>
                    <!-- ./col Alarma -->
                    <div class="col-6 col-md-3 text-center">

                      <a class="btn btn-app bg-gradient-purple disabled" id="Alrange_<?php echo $dispositivo->dispositivo_serial?>">
                      <i class="fa fa-bell" aria-hidden="true"></i></a>
                      <!-- 
                           <i class="far fa-lightbulb"></i> 
                           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      -->
                      <div class="knob-label">Input GPIO-25</div>
                    </div>
                    <!-- ./col -->
               </div>

       

    </div>
</div>
</div>

 <br>


 <div class="card mb-3" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
       <img src="<?php echo base_url(); ?>dist/img/tanqueDiesel.jpg"     alt="Photo 1" class="img-fluid" />
      </div>
      <div class="col-md-8">
        
               
 <!-- /.row Boton ON -->
                <div class="row">

                    <div class="col-6 col-md-3 text-center">

                        <a id="btnON_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-success" onclick="setRelay('on','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>ON</a>
                        <div class="knob-label">GPIO-13</div>

                      

                    </div>
                    
                    <!-- ./col Boton OFF -->
                    <div class="col-6 col-md-3 text-center">

                        <a id="btnOFF_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-danger disabled" onclick="setRelay('off','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>OFF</a>
                        <div class="knob-label">GPIO-13</div>

                    </div>
                    <!-- ./col Slider -->
                    <div class="col-6 col-md-3 text-center">

                        <input class="rang" id="range_<?php echo $dispositivo->dispositivo_serial?>" onchange="process_dimmer('<?php echo $dispositivo->dispositivo_serial?>');" type="text"  value="">
                        <div class="knob-label">Dimmer GPIO-2 LED BOARD</div>

                    </div>
                    <!-- ./col Alarma -->
                    <div class="col-6 col-md-3 text-center">

                      <a class="btn btn-app bg-gradient-purple disabled" id="Alrange_<?php echo $dispositivo->dispositivo_serial?>">
                      <i class="fa fa-bell" aria-hidden="true"></i></a>
                      <!-- 
                           <i class="far fa-lightbulb"></i> 
                           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      -->
                      <div class="knob-label">Input GPIO-25</div>
                    </div>
                    <!-- ./col -->
               </div>
  </div>
</div>
</div>

 <br>



 <div class="card mb-3" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
       <img src="<?php echo base_url(); ?>dist/img/tanqueMagna.jpg"     alt="Photo 1" class="img-fluid" />
      </div>
      <div class="col-md-8">
         <!-- /.row Boton ON -->
                <div class="row">

                    <div class="col-6 col-md-3 text-center">

                        <a id="btnON_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-success" onclick="setRelay('on','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>ON</a>
                        <div class="knob-label">GPIO-13</div>

                      

                    </div>
                    
                    <!-- ./col Boton OFF -->
                    <div class="col-6 col-md-3 text-center">

                        <a id="btnOFF_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-danger disabled" onclick="setRelay('off','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>OFF</a>
                        <div class="knob-label">GPIO-13</div>

                    </div>
                    <!-- ./col Slider -->
                    <div class="col-6 col-md-3 text-center">

                        <input class="rang" id="range_<?php echo $dispositivo->dispositivo_serial?>" onchange="process_dimmer('<?php echo $dispositivo->dispositivo_serial?>');" type="text"  value="">
                        <div class="knob-label">Dimmer GPIO-2 LED BOARD</div>

                    </div>
                    <!-- ./col Alarma -->
                    <div class="col-6 col-md-3 text-center">

                      <a class="btn btn-app bg-gradient-purple disabled" id="Alrange_<?php echo $dispositivo->dispositivo_serial?>">
                      <i class="fa fa-bell" aria-hidden="true"></i></a>
                      <!-- 
                           <i class="far fa-lightbulb"></i> 
                           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      -->
                      <div class="knob-label">Input GPIO-25</div>
                    </div>
                    <!-- ./col -->
               </div>
  </div>
</div>
</div>

 <br>




  <div class="card mb-3" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
       <img src="<?php echo base_url(); ?>dist/img/tanquePremium.jpg"     alt="Photo 1" class="img-fluid" />
      </div>
      <div class="col-md-8">
         <!-- /.row Boton ON -->
                <div class="row">

                    <div class="col-6 col-md-3 text-center">

                        <a id="btnON_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-success" onclick="setRelay('on','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>ON</a>
                        <div class="knob-label">GPIO-13</div>

                      

                    </div>
                    
                    <!-- ./col Boton OFF -->
                    <div class="col-6 col-md-3 text-center">

                        <a id="btnOFF_<?php echo $dispositivo->dispositivo_serial?>" class="btn btn-app bg-gradient-danger disabled" onclick="setRelay('off','<?php echo $dispositivo->dispositivo_serial?>');">
                        <i class="fas fa-power-off"></i>OFF</a>
                        <div class="knob-label">GPIO-13</div>

                    </div>
                    <!-- ./col Slider -->
                    <div class="col-6 col-md-3 text-center">

                        <input class="rang" id="range_<?php echo $dispositivo->dispositivo_serial?>" onchange="process_dimmer('<?php echo $dispositivo->dispositivo_serial?>');" type="text"  value="">
                        <div class="knob-label">Dimmer GPIO-2 LED BOARD</div>

                    </div>
                    <!-- ./col Alarma -->
                    <div class="col-6 col-md-3 text-center">

                      <a class="btn btn-app bg-gradient-purple disabled" id="Alrange_<?php echo $dispositivo->dispositivo_serial?>">
                      <i class="fa fa-bell" aria-hidden="true"></i></a>
                      <!-- 
                           <i class="far fa-lightbulb"></i> 
                           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      -->
                      <div class="knob-label">Input GPIO-25</div>
                    </div>
                    <!-- ./col -->
               </div>
  </div>
</div>
</div>


           
              


            
    </div>
  </div>
</section>

</div>
<!-- /.content-wrapper -->