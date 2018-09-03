<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulador extends CI_Controller {

    public function index(){
        $this->load->view('inset/head');
        $this->load->view('institucional/simulador.php');
        $this->load->view('inset/footer');
    }
}