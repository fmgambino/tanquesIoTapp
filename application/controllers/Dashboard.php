<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model("Dispositivos_model");
        //esto va en cada controlador ya que no deja que acceda si no esta logeado
        if(!$this->session->userdata("login")){
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            'dispositivos' => $this->Dispositivos_model->getDispositivos(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('layouts/footer');
    }

}