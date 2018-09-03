<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Cursodao extends CI_Model{
        
        public function getName($data){
            $nome = [];
            
            foreach($data as $d){
                $this->db->select("nm_curso");
                array_push($nome, $this->db->get_where('cursos', array('cd_curso'=>$d['cd_curso']))->result()[0]);
            }
            
            return $nome;
        }
        
        public function listarCurso($qt, $page, $dest, $filtro, $pesq){
            //verifica se precisa utilizar a variavel de destaque
            if($dest == true){
                $this->db->where('ig_destCurso', 'sim');
            }else if($filtro != null){
                if($filtro != 'Todos'){
                    $this->db->where('tp_curso', $filtro);
                }
            }
            
            if($pesq != null){
                $pesq = explode(' ', $pesq);
                
                foreach($pesq as $p){
                    $pesq2 = array('cd_keyCurso'=>$p);
                }
                
                $this->db->or_like($pesq2);
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
            
            //proibe a seleção de cursos finalizados
            $this->db->where('ds_status !=', 'FINALIZADO');
            $this->db->where('ds_status !=', 'CANCELADO');
            
            $this->db->order_by('dt_limInsc', 'ASC');
            $curso = $this->db->get("cursos", $qt, $page);
            
            if($curso->num_rows() > 0){
                return $curso->result();
            }else{
                return null;
            }
        }
        
        public function pagination($page, $filtro, $pesq){
            if($filtro != 'Todos'){
                $this->db->where('tp_curso', $filtro);
            }
            
            if($pesq != null){
                $pesq = explode(' ', $pesq);
                
                foreach($pesq as $p){
                    $pesq1 = array('cd_keyCurso'=>$p);
                }
                $this->db->or_like($pesq1);
            }
            
            $this->db->where('ds_status !=', 'FINALIZADO');
            $this->db->where('ds_status !=', 'CANCELADO');
            
            $this->db->from('cursos');
            $count = $this->db->count_all_results();
            
            return $count;
        }
        
        public function catalogoCursos($qt, $page, $pesq){
            if($pesq != null){
                $pesq = explode(' ', $pesq);
                
                foreach($pesq as $p){
                    $pesq1 = array('cd_keyCurso'=>$p);
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
            
            $this->db->order_by('dt_limInsc', 'ASC');
            $curso = $this->db->get("cursos", $qt, $page);
            
            if($curso->num_rows() > 0){
                return $curso->result();
            }else{
                return null;
            }
        }
        
        public function paginationCatalogoCursos($page, $pesq){
            if($pesq != null){
                $pesq = explode(' ', $pesq);
                
                foreach($pesq as $p){
                    $pesq1 = array('cd_keyCurso'=>$p);
                }
                
                $this->db->or_like($pesq1);
            }
            
            $this->db->from('cursos');
            $count = $this->db->count_all_results();
            
            return $count;
        }
        
        public function carregarCurso($id){
            $this->db->where('cd_curso', $id);
            $curso = $this->db->get('cursos');
            
            $array_curso = (object) array(
                                'cd_curso'=>$curso->result()[0]->cd_curso,
                                'nm_curso'=>$curso->result()[0]->nm_curso,
                                'vl_cursoAtual'=>$curso->result()[0]->vl_curso,
                            );
            
            $this->session->set_flashdata('curso', $array_curso);
            
            if($this->session->has_userdata('user')){
                //verifica se o usuario ja esta cadastrado no curso
                $inscricao = $this->db->get_where('user_curso', array('cd_aluno'=>$this->session->user->cd_user, 'cd_curso'=>$curso->result()[0]->cd_curso));
            
                if($inscricao->num_rows() > 0){
                    $curso->result()[0]->insc = true;
                }else{
                    $curso->result()[0]->insc = false;
                }
            }else{
                $curso->result()[0]->insc = false;
            }
            
            return $curso->result()[0];
        }
    }
?>