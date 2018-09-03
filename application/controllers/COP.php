<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class COP extends CI_Controller {

    public function index(){
        $this->load->view('inset/head');
        $this->load->view('institucional/mesaPortuaria.php');
        $this->load->view('inset/footer');
    }
}