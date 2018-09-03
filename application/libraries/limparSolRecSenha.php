<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    class limparSolRecSenha{
        private $rec, $CI;
        
        public function __Construct(){
            $this->CI =& get_instance();
            $this->CI->load->model('Usuariodao');
            
            $this->rec = $this->CI->Usuariodao;
        }
        
        public function limpar(){
            $this->rec->limparSolRecSenha();
        }
    }
    
    $ls = new limparSolRecSenha();
    
    $ls->limpar();