<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Carrinhodao extends CI_Model{
        
        public function exibirCarrinho(){
            $data = [];
            
            foreach($this->session->carrinho->item as $c){
                $this->db->select('cd_curso, ds_imgCurso, nm_curso, vl_curso');
                array_push($data, $this->db->get_where('cursos', array('cd_curso'=>$c))->result()[0]);
            }
            
            return $data;
        }
        
        public function verificarDesconto($desc){
            $ver = $this->db->get_where('desconto', array('cd_desc'=>$desc));
            
            if($ver->num_rows() > 0){
                return $ver->result()[0];
            }else{
                return false;
            }
        }
        
        public function relacionarCursoCupom($desc){
            $r = false;
            
            foreach($desc as $d){
                $cdcurso = explode(" ", $d->cd_cursos);
                
                foreach($cdcurso as $cdc){
                    if(in_array($cdc, $this->session->carrinho->item)){
                        $r = true;
                    }
                }
            }
            
            return $r;
        }
        
        public function aplicarDesconto(){
            $vt = $this->session->carrinho->vlTotal;
            
            foreach($this->session->carrinho->desc as $d){
                $vt = $vt - $d->vl_desc;
            }
            
            $this->session->carrinho->vlTotalDesc = $vt;
            return $vt;
        }
        
        public function alterarStatusCompra($cp, $status){
            $this->db->set(array('ds_status'=>$status));
            $this->db->where("cd_compra", $cp);
            $this->db->update("user_curso");
        }
    }
?>