<?php
    class Noticiadao extends CI_Model{
        public function listarNoticia($qt, $page, $dest, $pesq){
            //verifica se precisa utilizar a variavel de destaque
            if($dest == true){
                $this->db->where('ig_destNot', 'sim');
            }
            
            if($pesq != null){
                $pesq = explode(' ', $pesq);
                
                foreach($pesq as $p){
                    $pesq1 = array('cd_keyNot'=>$p);
                }
                
                $this->db->or_like($pesq1);
            }
            
            //verifica a pagina no momento
            if($page == null or $page == 1){
                $page = 0;
            }else{
                $page = $page - 1;
            }

            //regula o controle de paginas
            if($page > 0){
                $page = ($qt * $page)/$page;   
            }
            
            $this->db->order_by('dt_postNot', 'DESC');
            $not = $this->db->get("noticias", $qt, $page);
            
            if($not->num_rows() > 0){
                return $not->result();
            }else{
                return null;
            }
        }
        
        public function pagination($page, $pesq){
            if($pesq != null){
                $pesq = explode(' ', $pesq);
                
                foreach($pesq as $p){
                    $pesq1 = array('cd_keyNot'=>$p);
                }
                $this->db->or_like($pesq1);
            }
            
            $this->db->from('noticias');
            $count = $this->db->count_all_results();
            
            return $count;
        }
        
        public function carregarNoticia($id){
            $this->db->where('cd_not', $id);
            $not = $this->db->get('noticias');
            
            $result = $not->result()[0];
            
            $this->db->set('qt_clickNot', $result->qt_clickNot + 1);
            $this->db->where('cd_not', $result->cd_not);
            $this->db->update('noticias');
            
            return $result;
        }
        
        public function listarNotDest(){
            $this->db->select(array('nm_not', 'ds_imgNot', 'cd_not', 'nm_urlNot'));
            $this->db->order_by('qt_clickNot', 'DESC');
            $result = $this->db->get('noticias', 4);
            
            return $result->result();
        }
    }
?>