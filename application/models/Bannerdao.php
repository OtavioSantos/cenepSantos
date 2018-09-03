<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Bannerdao extends CI_Model{
        public function listarBanner(){
            $this->db->where('ig_destBanner', 'sim');
            $this->db->order_by('cd_banner', 'DESC');
            $banner = $this->db->get("banner");
            return $banner->result();
        }
    }
?>