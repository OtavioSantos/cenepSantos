<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Opiniaodao extends CI_Model{
        public function listarOpiniao(){
            $op = $this->db->get("opiniao");
            return $op->result();
        }
    }
?>