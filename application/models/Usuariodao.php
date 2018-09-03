<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Usuariodao extends CI_Model{
    
        public function logarUsuario($data){
            $this->db->where("nm_nickUser = '".$data['nm_nickUser']."' or ds_emailUser = '".$data['nm_nickUser']."' and cd_senhaUser = '".$data['cd_senhaUser']."'");
            $get = $this->db->get('user');
            
            if($get->num_rows() > 0){
                
                if($get->result()[0]->ds_status != "valido"){
                    return "error1";
                }
                
                //CRIA UMA SESSION PRO USUÁRIO LOGADO
                $dados = (array) $get->result()[0];
                unset($dados['cd_senhaUser']);
                
                $this->session->set_userdata('user', (object) $dados);
                return $get->result()[0];
            }
            
            return "error2";
        }
        
        public function cadastrarUsuario($data){
            $insert = $this->db->insert('user', $data);
            
            if($insert){
                return true;
            }else{
                return false;
            }
        }
        
        public function atualizarDados($data){
            $r = false;
            
            $this->db->set($data);
            $this->db->where('cd_user', $this->session->user->cd_user);
            $update = $this->db->update("user");
            $this->db->trans_complete();
            
            if($this->db->trans_status() == true){
                //ERRO NA LINHA DE BAIXO
                $attSession = $this->db->get_where('user', array('cd_user'=>$this->session->user->cd_user))->result()[0];
            
                $this->session->set_userdata('user', $attSession);
                
                $r = true;
            }
            
            return $r;
        }
        
        public function removerDadosParaAtualizacao(){
            $this->db->set(
                [
                    'nm_nickUser'=>"",
                    'ds_emailUser'=>"",
                    'cd_cpfUser'=>"",
                    'cd_cipUser'=>"",
                ]
            );
            
            $this->db->where('cd_user', $this->session->user->cd_user);
            $update = $this->db->update("user");
        }
        
        public function resetarDadosdeAtualizacao(){
            $this->db->set(
                [
                    'nm_nickUser'=>$this->session->user->nm_nickUser,
                    'ds_emailUser'=>$this->session->user->ds_emailUser,
                    'cd_cpfUser'=>$this->session->user->cd_cpfUser,
                    'cd_cipUser'=>$this->session->user->cd_cipUser,
                ]
            );
            
            $this->db->where('cd_user', $this->session->user->cd_user);
            $update = $this->db->update("user");
        }
        
        public function gerarValidacaoEmail($email, $code){
            $insert = $this->db->insert('validarEmail', array("ds_emailUser"=>$email, "cd_code"=>$code));
            
            if($insert){
                return true;
            }else{
                return false;
            }
        }
        
        public function verificarEmail($data){
            $return = false;
            
            $email = $this->db->get_where('user', $data)->result();
            
            if(count($email) > 0){
                $return = true;
            }
            
            return $return;
        }
        
        public function verificarValidacaoEmail($email, $code){
            $return = false;
            
            $result = $this->db->get_where('validarEmail', array('ds_emailUser'=>$email, 'cd_code'=>$code))->result();
            
            var_dump($result);
            
            if(count($result) > 0){
                //APAGA AS VALIDAÇÕES DESNECESSÁRIAS
                $this->db->where("ds_emailUser", $email);
                $this->db->delete("validarEmail");
                
                //ATUALIZA O STATUS DA CONTA
                $this->db->set(array('ds_status'=>"valido"));
                $this->db->where("ds_emailUser", $email);
                $this->db->update("user");
                
                $return = true;
            }
            
            return $return;
        }
        
        public function socilitarRecSenha($email, $code){
            $return = false;
            
            $insert = $this->db->insert('recuperarSenha', array('ds_emailUser'=>$email, 'cd_codeRec'=>$code, 'dt_horaRec'=>date('Y/m/d H:i:s')));
            
            if($insert){
                $return = true;
            }
            
            return $return;
        }
        
        public function recuperarNick($email){
            $this->db->select("nm_nickUser");
            $result = $this->db->get_where('user', array('ds_emailUser'=>$email))->result();
            
            return $result[0]->nm_nickUser;
        }
        
        public function verificarSolicitaoRecSenha($email, $code){
            $return = false;
            
            $result = $this->db->get_where('recuperarSenha', array('ds_emailUser'=>$email, 'cd_codeRec'=>$code))->result();
            
            if(count($result) > 0){
                $return = true;
            }
            
            return $return;
        }
        
        public function alterarSenha($email, $senha, $code){
            $return = false;
            
            $this->db->set(array('cd_senhaUser'=>md5($senha)));
            $this->db->where("ds_emailUser", $email);
            $this->db->update("user");
            
            if($this->db->affected_rows() == '1'){
                $this->db->where(['ds_emailUser'=>$email, 'cd_codeRec'=>$code]);
                $this->db->delete('recuperarSenha');
                
                $return = true;
            }
            
            return $return;
        }
        
        public function limparSolRecSenha(){
            $result = $this->db->get('recuperarSenha')->result();
            
            foreach($result as $r){
                $horario = strtotime(explode(' ', $r->dt_horaRec)[1]);
                
                //Diferença em minutos
                $intervalo  = round(abs(strtotime(date('H:i:s')) - $horario) / 60, 2);
                
                if($intervalo > 60){
                    $this->db->where(['ds_emailUser'=>$r->ds_emailUser, 'cd_codeRec'=>$r->cd_codeRec]);
                    $this->db->delete('recuperarSenha');
                }
            }
        }
        
        public function cadastrarAlunoCurso($data){
            $r = true;
            
            //PREPARANDO O CÓDIGO DE COMPRA
            $cd_compra = $this->session->user->cd_user;
            
            foreach($data as $d){
                if(strlen($d['cd_curso']) == 1){
                    $cd_compra = $cd_compra."0".$d['cd_curso'];
                }else{
                    $cd_compra = $cd_compra.$d['cd_curso'];
                }
            }
            
            foreach($data as $d){
                $d['cd_compra'] = $cd_compra;
                
                $d['vl_cursoAtual'] = $this->db->get_where('cursos', array('cd_curso'=>$d['cd_curso']))->result()[0]->vl_curso;
                
                $result = $this->db->get_where('user_curso', array('cd_aluno'=>$this->session->user->cd_user, 'cd_curso'=>$d['cd_curso']));
                
                if($result->num_rows() > 0){
                    $pos = array_search($data, $d);
                    unset($data[$pos]);
                    
                    $pos = array_search($this->session->carrinho->item, $d);
                    unset($this->session->carrinho->item[$pos]);
                    
                }else{
                    $this->db->insert("user_curso", $d);
                }
            }
            
                if(empty($data)){
                    return false;
                }else{
                    return true;
                }
        }
        
        public function visualizarCursosInscritos(){
            $this->db->select('C.ds_imgCurso, C.nm_curso, UC.dt_cadastro, UC.vl_cursoAtual, UC.ds_status');
            $this->db->from('user_curso as UC');
            $this->db->where("UC.cd_aluno", $this->session->user->cd_user);
            $this->db->join("cursos as C", "C.cd_curso = UC.cd_curso", "inner");
            
            return $this->db->get()->result();
        }
        
        public function getCd($nmUser){
            return $this->db->get_where('user', array('nm_user'=>$nmUser))->result()[0];
        }
    }
?>