<?php
    class Admindao extends CI_Model{
        
        public function logar($login, $senha){
            echo $senha;
            $result = $this->db->get_where('acesso', array('nm_login'=>$login, 'cd_senha'=>$senha));
            
            if($result->num_rows() > 0){
                $this->session->set_userdata("admin", true);
                
                return true;
            }else{
                return false;
            }
        }
        
        public function listarUsuario(){
            $user = $this->db->get("user");
            return $user->result();
        }
        
        public function listarCursos(){
            $user = $this->db->get("cursos");
            return $user->result();
        }
        
        public function listarNoticias(){
            $user = $this->db->get("noticias");
            return $user->result();
        }
        
        public function listarBanners(){
            $user = $this->db->get("banner");
            return $user->result();
        }
        
        public function listarOpiniao(){
            $user = $this->db->get("opiniao");
            return $user->result();
        }
        
        public function selectUser($cd){
            $user = $this->db->get_where('user', array('cd_user'=>$cd));
            
            if($user->result() > 0){
                return $user->result()[0];
            }else{
                return null;
            }
        }
        
        //configuração
        public function remover($tipo, $cd){
            switch($tipo){
                case 'user':
                    for($i = 0; $i < count($cd); $i++){
                        $this->db->delete($tipo, array('cd_user' => $cd[$i]));
                        $this->db->delete("user_curso", array('cd_aluno' => $cd[$i]));
                    }
                break;
            }
            
            return true;
        }
        
        public function listarUserCurso($cd){
            $result = [];
            
            for($i = 0; $i < count($cd); $i++){
                $this->db->select('C.cd_curso, C.nm_curso, UC.dt_cadastro, UC.vl_cursoAtual, UC.ds_status, UC.nm_emp');
                $this->db->from('user_curso as UC');
                $this->db->where("UC.cd_aluno", $cd[$i]);
                $this->db->join("cursos as C", "C.cd_curso = UC.cd_curso", "inner");
                
                array_push($result, $this->db->get()->result());
            }

            return $result;
        }
        
        public function atualizarInscCurso($dados){
            $this->db->set("ds_status", $dados[2]);
            $this->db->where(array("cd_aluno"=>$dados[0], "cd_curso"=>$dados[1]));
            $this->db->update("user_curso");
            
            return $dados[2];
        }
        
        public function inserirAtualizarUsuario($data, $tipo, $cd){
            
            if($tipo == "insert"){
                $insert = $this->db->insert('user', $data);
                
                if($insert){
                    return true;
                }else{
                    return false;
                }
            }else{
                $update = $this->db->update('user', $data, "cd_user = $cd");
                
                if($update){
                    return true;
                }else{
                    return false;
                }
            }
        }
        
        public function excludeUpdateDados($cd, $data){
            $this->db->update("user", $data, "cd_user = $cd");
        }
        
        public function gerarCertificado($userid, $cursoid){
            $result = [];
            
            for($i = 0; $i < count($userid); $i++){
                $this->db->select('C.cd_curso, C.nm_curso, U.cd_user, U.nm_user');
                $this->db->from('user_curso as UC');
                $this->db->where("UC.cd_aluno", $userid[$i]);
                $this->db->where("UC.cd_curso", $cursoid[$i]);
                $this->db->join("cursos as C", "C.cd_curso = UC.cd_curso", "inner");
                $this->db->join("user as U", "U.cd_user = UC.cd_aluno", "inner");
                
                array_push($result, $this->db->get()->result()[0]);
            }
            
            return $result;
        }
        //fim configuração
    }
?>