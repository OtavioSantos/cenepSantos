<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index(){
        if($this->session->has_userdata('admin')){
    		header("Location: ".base_url('Admin/dashboard'));
    	}else{
    		$this->load->view("admin/login");
    	}
    }
    
    public function logar(){
    	$config = array(
    				array(
    					'field'=>'log_login',
    					'label'=>'Login',
    					'rules'=>'required',
    				),
    				
    				array(
    					'field'=>'log_senha',
    					'label'=>'Senha',
    					'rules'=>'required',
    				),
    			);
    			
    	$this->form_validation->set_message(array('required'=>'O campo {field} deve ser preenchido!'));
    	$this->form_validation->set_rules($config);
    			
    	if($this->form_validation->run()){
    		$login = $this->input->post("log_login");
    		$senha = md5($this->input->post("log_senha"));
    		
    		$this->load->model('Admindao');
    		
    		$admin = $this->Admindao;
		
			$result = $admin->logar($login, $senha);
			
			if($result){
				header("Location: ".base_url('Admin/dashboard'));
			}else{
				header("Location: ".base_url('Admin/'));
			}
    	}else{
    		header("Location: ".base_url('Admin/'));
    	}
    }
    
    public function dashboard(){
    	if($this->session->has_userdata('admin')){
    		$this->load->view('inset/head');
        	$this->load->view('admin/dashboard');
    	}else{
    		header("Location: ".base_url('Admin/'));
    	}
    }
    
    public function listarUsuario(){
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->listarUsuario();
		
		echo json_encode($result);
    }
    
    public function selectUser(){
        $cd = $this->input->post("cd");
        
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->selectUser($cd);
		
		echo json_encode($result);
    }
    
    public function listarCursos(){
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->listarCursos();
		
		echo json_encode($result);
    }
    
    public function listarNoticias(){
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->listarNoticias();
		
		echo json_encode($result);
    }
    
    public function listarBanners(){
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->listarBanners();
		
		echo json_encode($result);
    }
    
    public function listarOpiniao(){
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->listarOpiniao();
		
		echo json_encode($result);
    }
    
    public function remover(){
        $this->load->model('Admindao');
		$admin = $this->Admindao;
		
        $tipo = $this->input->post("tipo");
        $cd = $this->input->post("item");
        
        switch($tipo){
            case 'user':
                $result = $admin->remover($tipo, $cd);
		        $text = "Usuario removido com sucesso!";
            break;
        }
        
        $this->session->set_flashdata("msg-remove", $text);
    }
    
    public function verificarCursosInscritos(){
        $cd = $this->input->post("userid");
        
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->listarUserCurso($cd);
		
		echo json_encode($result);
    }
    
    public function atualizarInscCurso(){
        $dados = [
            $this->input->post("cd_aluno"),
            $this->input->post("cd_curso"),
            $this->input->post("ds_status"),
        ];
        
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->atualizarInscCurso($dados);
    }
    
    public function atualizarCadastrarUsuario(){
    	$cd = $this->input->post("cd_cad");
		
		$config = array(
			//Informações de acesso
			array(
				'field'=>'nome_cad',
				'label'=>'Nome',
				'rules'=>'required',
			),
			
			array(
				'field'=>'nick_cad',
				'label'=>'Nome de Acesso',
				'rules'=>'required|max_length[15]|is_unique[user.nm_nickUser]',
				'errors'=> array(
								'max_length'=>'O campo {field} deve conter no máximo 15 digitos!',
								'is_unique'=>'{field} ja em uso! Escolha outro!',
							),
			),
			
			array(
				'field'=>'email_cad',
				'label'=>'Email',
				'rules'=>'required|valid_email|is_unique[user.ds_emailUser]',
				'errors'=> array(
								'valid_email'=>'O {field} inserido não apresenta caracteristicas de um email!',
								'is_unique'=>'Email já cadastrado! Utilize o campo de recuperação de senha!',
							),
			),
			//fim informações de acesso
			
			//informações endereço
			array(
				'field'=>'cep_cad',
				'label'=>'Cep',
				'rules'=>'exact_length[8]',
				'errors'=>array(
							'exact_length'=>'O campo cep deve conter exatamente 8 digitos',
						),
			),
			
			//informações gerais
			array(
				'field'=>'rg_cad',
				'label'=>'RG',
				'rules'=>'required|max_length[15]',
				'errors'=>array(
								'max_length'=>'O campo {field} deve conter no máximo 15 digitos!',
							),
			),
			
			array(
				'field'=>'cpf_cad',
				'label'=>'CPF',
				'rules'=>'required|exact_length[11]|integer|is_unique[user.cd_cpfUser]',
				'errors'=>array(
								'exact_length'=>'O campo {field} deve conter 11 dígitos!',
								'integer'=>'Só digite números!',
								'is_unique'=>'Ja existe um cadastro com esse cpf',
							),
			),
			//fim informações gerais
		);
		
		if($cd == null){
			$senha = md5($this->input->post("senha_cad"));
			
			array_push($config, array(
									'field'=>'senha_cad',
									'label'=>'Senha',
									'rules'=>'required|max_length[15]|min_length[8]',
									'errors'=> array(
													'max_length'=>'A {field} deve conter no máximo 15 digitos!',
													'min_length'=>'A {field} deve conter no mínimo 8 digitos!'
												),
			));
		}else{
			$senha = $this->input->post("senha_cad");
			
			if(strlen($senha) < 15){
				$senha = md5($senha);
			}
			
			array_push($config, array(
								'field'=>'senha_cad',
								'label'=>'Senha',
								'rules'=>'required|min_length[8]',
								'errors'=> array(
												'min_length'=>'A {field} deve conter no mínimo 8 digitos!'
											),
			));
		}
		
		$data = array(
		    'nm_user'=>$this->input->post("nome_cad"), 'ds_emailUser'=>$this->input->post("email_cad"), 'cd_telUser'=>$this->input->post("tel_cad"),
		    'cd_celUser'=>$this->input->post("cel_cad"), 'nm_nickUser'=>$this->input->post("nick_cad"), 'cd_senhaUser'=>$senha, 'ds_ruaUser'=>$this->input->post("rua_cad"),
		    'ds_bairroUser'=>$this->input->post("bairro_cad"), 'ds_estUser'=>$this->input->post("est_cad"), 'ds_cidUser'=>$this->input->post("cid_cad"), 'num_cepUser'=>$this->input->post("cep_cad"),
		    'num_casaUser'=>$this->input->post("num_cad"), 'ds_compUser'=>$this->input->post("comp_cad"), 'ig_trabUser'=>$this->input->post("trab_cad"), 'nm_empUser'=>$this->input->post("emp_cad"), 'cd_cipUser'=>$this->input->post("cip_cad"), 
		    'cd_rgUser'=>$this->input->post("rg_cad"), 'cd_cpfUser'=>$this->input->post("cpf_cad"),
		);
		
		$this->excludeUpdateDados($cd);
		
		$this->form_validation->set_message('required', 'O campo {field} deve ser preenchido!');
		$this->form_validation->set_rules($config);

	    if($this->form_validation->run() == true){
			
			$this->load->model('Admindao');
        	$admin = $this->Admindao;

			if($cd == null){
			    $tipo = "insert";
                
        		$result = $admin->inserirAtualizarUsuario($data, $tipo, $cd);
        		
        		if($result){
        			echo json_encode(["tipo"=>"insert"]);
        		}else{
        			echo json_encode(["tipo"=>"error"]);
        		}
        		
			}else{
			    $tipo = "update";
			    
			    $result = $admin->inserirAtualizarUsuario($data, $tipo, $cd);
        		
        		if($result){
        			echo json_encode(["tipo"=>"update"]);
        		}else{
        			echo json_encode(["tipo"=>"error"]);
        		}
			}
		}else{
			echo json_encode(["error"=>array($this->form_validation->error_array('field'))]);
		}
    }
    
    public function excludeUpdateDados($cd){
    	$data = array('nm_nickUser'=>"", 'ds_emailUser'=>"", 'cd_rgUser'=>"", 'cd_cpfUser'=>"");
    	
        $this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$admin->excludeUpdateDados($cd, $data);
    }
    
    public function gerarCertificado(){
    	$userid = $this->input->post("userid");
    	$cursoid = $this->input->post("cursoid");
    	
    	$this->load->model('Admindao');
		
		$admin = $this->Admindao;
		
		$result = $admin->gerarCertificado($userid, $cursoid);
    	
    	echo json_encode($result);
    }
    
    //telas
    public function exibirHome(){
        $this->load->view('admin/home');
    }
    
    public function listUser_board(){
        $this->load->view('admin/content/listUser');
    }
    
    public function selectUser_board(){
        $this->load->view('admin/content/selectUser');
    }
    
    public function listCurso_board(){
        $this->load->view('admin/content/listCurso');
    }
    
    public function listNoticia_board(){
        $this->load->view('admin/content/listNoticia');
    }
    
    public function listBanner_board(){
        $this->load->view('admin/content/listBanner');
    }
    public function listOpiniao_board(){
        $this->load->view('admin/content/listOpiniao');
    }
    
    public function verificarCursosInscritos_board(){
        $this->load->view('admin/content/selectUserCurso');
    }
    
    public function certificado_board(){
        $this->load->view('admin/content/certificado');
    }
    //fim telas
}