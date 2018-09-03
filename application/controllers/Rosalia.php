<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rosalia extends CI_Controller {

    public function index(){
        $this->load->view('inset/head');
        $this->load->view('institucional/navioRosalia');
        $this->load->view('inset/footer');
    }
}