<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispositivos_model extends CI_Model {

   public function getDispositivos(){
      $this->db->where("dispositivo_estado","1");
      $resultados = $this->db->get("dispositivos");
      return $resultados->result();
   }

   public function getDispositivo($id){
      $this->db->where("dispositivo_id",$id);
      $resultado = $this->db->get("dispositivos");
      return $resultado->row();
   }

   public function save($data){
      return $this->db->insert("dispositivos",$data);
   }

   public function update($id,$data){
      $this->db->where("dispositivo_id",$id);
      return $this->db->update("dispositivos",$data);
   }

   public function delete($id){
      $this->db->where("dispositivo_id",$id);
      return $this->db->delete("dispositivos");
   }



}