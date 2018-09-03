<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos extends CI_Controller {

    public function index(){
        $this->load->view('inset/head');
		$this->load->view('contato');
		$this->load->view('inset/footer');
    }
    
    public function enviarEmail(){
        $nome = $this->input->post('nome_email');
        $email = $this->input->post('email_email');
        $tel = $this->input->post('tel_email');
        $ass = $this->input->post('ass_email');
        $msg = $this->input->post('msg_email');
        
        //configuração da validação de formulario
        $config = array(
                    array(
                        'field'=>'nome_email',
                        'label'=>'Nome',
                        'rules'=>'required',
                    ),
                    
                    array(
                        'field'=>'email_email',
                        'label'=>'Email',
                        'rules'=>'valid_email|required',
                        'errors'=>array(
                                    'valid_email'=>'O email digitado não é válido!'
                                )
                    ),
                    
                    array(
                        'field'=>'ass_email',
                        'label'=>'Assunto',
                        'rules'=>'required',
                    ),
                    
                    array(
                        'field'=>'msg_email',
                        'label'=>'Mensagem',
                        'rules'=>'required',
                    ),
                );
        
        $this->form_validation->set_message('required', 'O campo {field} deve ser preenchido!');        
        
        $this->form_validation->set_rules($config);
        
        if($this->form_validation->run() == true){
            $this->load->library('email');

            $this->email->from($email, $nome);
            $this->email->to('cenepsantos@gmail.com, contato@cenepsantos.com.br');
            
            $this->email->subject($ass);
            $this->email->message($msg);
            
            //verificase o email foi enviado
            if($this->email->send()){
                $this->session->set_flashdata('msg-send', '
                    <div class="col-lg-12 success alert-success py-2 mb-2">
                        <p class="m-0">Mensagem enviada com sucesso!</p>
                    </div>
                ');
            }else{
                $this->session->set_flashdata('msg-send', '
                    <div class="col-lg-12 danger alert-danger py-2 mb-2">
                        <p class="m-0">Erro ao enviar mensagem!</p>
                    </div>
                ');
            }
        }else{
            $this->session->set_flashdata('msg-send', '
                <div class="col-lg-12 danger alert-danger py-2 mb-2">
                    <p class="m-0">Erro ao enviar mensagem!</p>
                </div>
            ');
        }
        
        $this->index();
    }
}