<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemails{
        private $CI, $emailUser, $code;

        public function __Construct($param){
            $this->CI =& get_instance();
            
            $this->emailUser = $param['emailUser'];
            
            $config = array(
                    /*'protocol' => 'ssl',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 587,
                    'smtp_user' => 'cenepsantos@gmail.com',
                    'smtp_pass' => 'cenep2016',*/
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'
                );
            
            $this->CI->email->initialize($config);
            
            $this->CI->email->set_mailtype("html");
    
            $this->CI->email->from("naoresponda@cenepsantos.com.br", "Cenep Santos");
            $this->CI->email->to($this->emailUser);
        }
        
        //ENVIA UM EMAIL PARA RECUPERAR A SENHA DO USUÁRIO
        public function enviarLinkRecuperarSenha($code, $nick){
            $this->CI->email->subject("Solicitação de Troca de Senha");
            
            $msg = file_get_contents(base_url('assets/email/emailTrocaSenha.php'));
            
            $msg = str_replace("{URLEMAIL}", base_url()."Usuario/recuperarSenha?email=".$this->emailUser."&code=".$code, $msg);
            $msg = str_replace("{NICK}", $nick, $msg);
            $msg = str_replace("{URL}", base_url(), $msg);
            	
            $this->CI->email->message($msg);
            
            if($this->CI->email->send()){
                return true;
            }else{
                return false;
            }
        }
        
        //ENVIA UM EMAIL DE CONFIRMAÇÃO DE CADASTRO
        public function enviarEmailCadastro($email, $code, $nick, $nome){
            $this->CI->email->subject("Confirmação de cadastro");
            
            $msg = file_get_contents(base_url('assets/email/emailEnviarCadastro.php'));
            
            $msg = str_replace("{APELIDO}", $nick, $msg);
            $msg = str_replace("{NOME_PESSOA}", $nome, $msg);
            $msg = str_replace("{URL_CONFIRM_EMAIL}", base_url()."Usuario/validarEmail?email=".$this->emailUser."&code=".$code, $msg);
            $msg = str_replace("{URL}", base_url(), $msg);
            	
            $this->CI->email->message($msg);
            
            if($this->CI->email->send()){
                return true;
            }else{
                return false;
            }
        }
        
        //ENVIA UM EMAIL INFORMANDO OS CURSOS INSCRITOS
        public function enviarEmailCursoRequerido($data){
            $this->CI->email->subject("Cursos inscritos com sucesso.");
            
            $this->CI->load->model("Cursodao");
            $curso = $this->CI->Cursodao;
            
            $curso = $curso->getName($data);
            
            $nm_curso = "";
            foreach($curso as $c){
                $nm_curso = $nm_curso.", ".$c->nm_curso;
            }
            
            $msg = file_get_contents(base_url('assets/email/requerimentoEmCurso.php'));
            
            $msg = str_replace("{URL}", base_url(), $msg);
            $msg = str_replace("{CURSOS}", $nm_curso, $msg);
            	
            $this->CI->email->message($msg);
            
            if($this->CI->email->send()){
                return true;
            }else{
                return false;
            }
        }
        
}