<?php
    class Noticiadao extends CI_Model{
        public function filtrarCurso($tipo, $pesq){
            
            if($pesq == null){
                
                $this->db->where('tp_curso', $tipo);
                $result = $this->db->get('cursos');
                
                if($result->result() > 0){
                    return $result->result();
                }
                
            }else{
                
            }
        }
    }
?>