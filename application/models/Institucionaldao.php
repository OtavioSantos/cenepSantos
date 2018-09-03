<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Institucionaldao extends CI_Model{
        
        public function getEditais(){
            return $this->db->get('editail')->result();
        }
    }
?>