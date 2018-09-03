<?php

class Institucional extends CI_Controller {
    public function sobrenos(){
        $this->load->view('inset/head');
        $this->load->view('institucional/sobrenos');
        $this->load->view('inset/footer');
    }
    
    public function COP(){
        $this->load->view('inset/head');
        $this->load->view('institucional/mesaPortuaria');
        $this->load->view('inset/footer');
    }
    
    public function simulador(){
        $this->load->view('inset/head');
        $this->load->view('institucional/simulador');
        $this->load->view('inset/footer');
    }
    
    public function rosalia(){
        $this->load->view('inset/head');
        $this->load->view('institucional/navioRosalia');
        $this->load->view('inset/footer');
    }
    
    public function editais(){
        $data['edital'] = $this->getEditais();
        
        $this->load->view('inset/head');
        $this->load->view('institucional/editais', $data);
        $this->load->view('inset/footer');
    }
    
    public function termosdeuso(){
        $this->load->view('inset/head');
        $this->load->view('institucional/termosdeuso');
        $this->load->view('inset/footer');
    }
    
    public function getEditais(){
        $this->load->model('Institucionaldao');
        $inst = $this->Institucionaldao;
        
        return $inst->getEditais();
    }
}