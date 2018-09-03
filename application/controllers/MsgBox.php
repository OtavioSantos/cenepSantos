<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MsgBox extends CI_Controller {
        
        public function exibirMensagem(){
            $this->load->view('inset/msgBox/msgBox');
        }
    }
?>