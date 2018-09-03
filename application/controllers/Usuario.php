<?php
    defined('BASEPATH');
    
    class Usuario extends CI_Controller {
        
        public function index(){
            if($this->session->has_userdata('user')){
                header('Location: '.base_url('Usuario/painel-do-usuario'));
            }else{
                header('Location: '.base_url());
            }
        }

        public function exibirTelaAcesso(){
            $this->load->view('inset/telaAcesso.php');
        }
        
        public function dashboard(){
            if($this->session->has_userdata('user')){
                $this->load->view('inset/head.php');
                $this->load->view('usuario/dashboard.php');
                $this->load->view('inset/footer.php');
            }else{
                header('Location: '.base_url());
            }
        }
        
        public function cursosInscritos(){
            $data['inscricoes'] = $this->visualizarCursosInscritos();
            
            if($this->session->has_userdata('user')){
                $this->load->view('inset/head.php');
                $this->load->view('usuario/cursosInscritos.php', $data);
                $this->load->view('inset/footer.php');
            }else{
                header('Location: '.base_url());
            }
        }
        
        public function logarUsuario(){
            $data = [
                'nm_nickUser'=>$this->input->post('log_log'),
                'cd_senhaUser'=>$this->input->post('sen_log'),
            ];
            
            $validacao = $this->validarAcesso();
            
            //VERIFICA O RESULTADO DA VALIDAÇÃO
            if($validacao){
                $this->load->model('Usuariodao');
                //REALIZA O TRATAMENTO DA SENHA
                $data['cd_senhaUser'] = md5($data['cd_senhaUser']);
                
                $user = $this->Usuariodao;
                
                $result = $user->logarUsuario($data);
                
                if($result == "error2"){
                    echo json_encode([
    					'tipo'=>'error',
    					'titulo'=>'LOGIN OU SENHA INVÁLIDOS!',
    					'msg'=>'Não conseguimos encontrar um usuário com os dados inseridos. Certifique-se de digitar corretamente
    					        os campos de "nome de acesso" e "senha" e tente novamente.',
    				]);
                }else if($result == "error1"){
                    echo json_encode([
        					'tipo'=>'alerts',
        					'titulo'=>'CADASTRO NÃO VALIDADO!',
        					'msg'=>'Ao realizar seu cadastro um email foi enviado para sua caixa de mensagens para validar o seu registro. Abra o e-mail, clique no link e faça o seu primeiro login no site.',
        				]);
                }else{
                    echo json_encode(['tipo'=>'confirm']);
                }
            }else{
                echo json_encode([
    					'tipo'=>'error',
    					'titulo'=>'LOGIN OU SENHA INVÁLIDOS!',
    					'msg'=>'Parece que houve um erro ao tentar acessar a sua conta. Verifique os erros abaixo e tente novamente!<br>
    							<strong>erros:</strong> <strong style="color: red">'.implode(", ", array_values($this->form_validation->error_array())).'</strong>',
    				]);
            }
        }
        
        public function validarAcesso(){
            $config = [
                array(
                    'field'=>'log_log',
                    'label'=>'Nome de Acesso',
                    'rules'=>'required',
                ),
                
                array(
                    'field'=>'sen_log',
                    'label'=>'Senha',
                    'rules'=>'required|max_length[15]',
                    'errors'=>array(
                                'max_length'=>'A Senha deve conter no máximo 15 dígitos!',
                            ),
                ),
            ];
            
            //MENSAGEM PADRÃO
            $this->form_validation->set_message('required', 'O campo {field} deve ser preenchido!');
            
            //SETA A CONFIGURAÇÃO DE VALIDAÇÃO DO FORMULÁRIO A SER VERIFICADA COM OS DADOS DIGITADOS PELO USUÁRIO
            $this->form_validation->set_rules($config);
            
            if($this->form_validation->run() == true){
			    return true;
    		}else{
    		    return false;
    		}
        }
        
        public function cadastrarUsuario(){
            $data = $this->input->post();
            $data['cd_senhaUser'] = md5($data['cd_senhaUser']);
            
            $validacao = $this->validarCadastro($data);
            
            if($validacao){
                //ELIMINANDO DADOS DESNECESSÁRIOS
                unset($data['email_confirm'], $data['senha_confirm']);
                
                $this->load->model('Usuariodao');
                $user = $this->Usuariodao;
                
                $code = $this->gerarLinkRecuperarSenha();
                
                if(!$this->gerarValidacaoEmail($data['ds_emailUser'], $code)){
                    echo json_encode([
        					'tipo'=>'error',
        					'titulo'=>'ERRO AO CRIAR VALIDAÇÃO!',
        					'msg'=>'Contate o administrador.',
        				]);
                }else{
                    $this->load->library('sendemails', ['emailUser'=>$data['ds_emailUser']]);
                    
                    $r =  $this->sendemails->enviarEmailCadastro($data['ds_emailUser'], $code, $data['nm_nickUser'], $data['nm_user']);
                
                    if($r){
                        $cadastro = $user->cadastrarUsuario($data);
                    
                        //VERIFICA O RESULTADO DA TENTATIVA DE CADASTRO
                        if($cadastro){
                            echo json_encode([
            					'tipo'=>'confirm',
            					'titulo'=>'CADASTRO REALIZADO COM SUCESSO!',
            					'msg'=>'Parabéns sua conta CENEP Santos ja foi criada.<br>
            					        Enviaremos um email para sua caixa de mensagens contendo um link de confirmação. Você poderá acessar sua conta após realizar a confirmação em seu e-mail!<br>
            					        <small><strong>Obs: </strong> caso não encontre, não esqueça de verificar a caixa de spam ou a lixeira.</small>',
            				]);
                        }else{
                            echo json_encode([
            					'tipo'=>'error',
            					'titulo'=>'OPA, TEMOS UM PROBLEMA...',
            					'msg'=>'Parece que houve um problema na sua tentativa de cadastro. Aguarde um momento e tente novamente mais tarde. Caso o problema persista contate-nos. A equipe
            					        CENEP agradece!',
            				]);
                        }
                    }else{
                        echo json_encode([
        					'tipo'=>'error',
        					'titulo'=>'ERROR AO ENVIAR E-MAIL DE CONFIRMAÇÃO!',
        					'msg'=>'Houve um problema durante o seu cadastro, não conseguimos envar o email de confirmação para a sua caixa de mensagens. O cadastro não foi finalizado. Aguarde alguns minutos e tente novamente. Caso o problema persista contate-nos.',
        				]);
                    }
                }
            }else{
                echo json_encode([
    					'tipo'=>'error',
    					'titulo'=>'NÃO CONSEGUIMOS REALIZAR O SEU CADASTRO!',
    					'msg'=>'Houve um problema ao tentar cadastrar o seu usuário. Corrija os campos abaixo e tente novamente<br>
    					    <strong style="color: red">'.implode(", ", array_values($this->form_validation->error_array())).'</strong>',
    					'campos'=>[
    						$this->form_validation->error_array('field')
    					],
    				]);
            }
        }
        
        public function validarCadastro($data){
    		$config = array(
    			//Informações de acesso
    			array(
    				'field'=>'nm_user',
    				'label'=>'Nome',
    				'rules'=>'required',
    			),
    			
    			array(
    				'field'=>'nm_nickUser',
    				'label'=>'Nome de Acesso',
    				'rules'=>'required|max_length[15]|is_unique[user.nm_nickUser]|regex_match[/^[a-zA-Z0-9]+$/]',
    				'errors'=> array(
    								'max_length'=>'O campo {field} deve conter no máximo 15 digitos!',
    								'is_unique'=>'{field} ja em uso! Escolha outro!',
    								'regex_match'=>'Digite apenas letras e numeros sem caracateres especiais!'
    							),
    			),
    			
    			array(
    				'field'=>'ds_emailUser',
    				'label'=>'Email',
    				'rules'=>'required|valid_email|is_unique[user.ds_emailUser]',
    				'errors'=> array(
    								'valid_email'=>'O {field} inserido não apresenta caracteristicas de um email!',
    								'is_unique'=>'Email já cadastrado! Utilize o campo de recuperação de senha!',
    							),
    			),
    			
    			array(
    				'field'=>'email_confirm',
    				'label'=>'Confirmar E-mail',
    				'rules'=>'required|matches[ds_emailUser]',
    				'errors'=> array(
    								'required'=>'O campo "Confirmar E-mail" deve ser igual ao campo E-mail!',
    								'matches'=>'Emails diferentes!',
    							),
    			),
    			
    			array(
    				'field'=>'cd_senhaUser',
    				'label'=>'Senha',
    				'rules'=>'required|max_length[15]|min_length[8]',
    				'errors'=> array(
    								'max_length'=>'A {field} deve conter no máximo 15 digitos!',
    								'min_length'=>'A {field} deve conter no mínimo 8 digitos!'
    							),
    			),
    			
    			array(
    				'field'=>'senha_confirm',
    				'label'=>'Confirmar Senha',
    				'rules'=>'required|matches[cd_senhaUser]',
    				'errors'=> array(
    								'required'=>'O campo "Confirmar Senha" deve ser igual ao campo Senha!',
    								'matches'=>'O campo {field} deve ser igual ao campo {param}!',
    							),
    			),
    			//fim informações de acesso
    			
    			//informações endereço
    			array(
    				'field'=>'ds_ruaUser',
    				'label'=>'Logradouro',
    				'rules'=>'required',
    				'errors'=>array(
    							'exact_length'=>'O campo cep deve conter exatamente 8 digitos',
    						),
    			),
    			
    			array(
    				'field'=>'num_casaUser',
    				'label'=>'Número',
    				'rules'=>'required|numeric',
    				'errors'=>array(
    							'numeric'=>'Digite apenas números!',
    						),
    			),
    			
    			array(
    				'field'=>'ds_bairroUser',
    				'label'=>'Bairro',
    				'rules'=>'required',
    			),
    			
    			array(
    				'field'=>'ds_estUser',
    				'label'=>'Estado',
    				'rules'=>'required|exact_length[2]',
    				'errors'=>array(
    							'exact_length'=>'Selecione um valor disponível',
    							'regex_match'=>'Seleciona uma opção válida!',
    						),
    			),
    			
    			array(
    				'field'=>'ds_cidUser',
    				'label'=>'Cidade',
    				'rules'=>'required',
    			),
    			
    			array(
    				'field'=>'num_cepUser',
    				'label'=>'CEP',
    				'rules'=>'required|exact_length[8]',
    				'errors'=>array(
    							'exact_length'=>'Digite exatamente 8 números',
    						),
    			),
    			
    			array(
    				'field'=>'cd_telUser',
    				'label'=>'Telefone',
    				'rules'=>'required|exact_length[10]',
    				'errors'=>array(
    							'numeric'=>'Digite apenas números!',
    							'exact_length'=>'Digite exatamente 9 números',
    						),
    			),
    			
    			array(
    				'field'=>'cd_celUser',
    				'label'=>'Celular',
    				'rules'=>'max_length[11]',
    				'errors'=>array(
    							'numeric'=>'Digite apenas números!',
    							'max_length'=>'Digite no máximo 9 números',
    						),
    			),
    			
    			array(
    				'field'=>'ds_neUser',
    				'label'=>'Nível Escolar',
    				'rules'=>'in_list[Ensino Fundamental C,Ensino Médio C,Ensino Superior C,Pós Graduação]',
    				'errors'=>array(
    							'in_list'=>"Selecione um item válido!"
    						),
    			),
    			
    			//informações gerais
    			array(
    				'field'=>'ig_trabUser',
    				'label'=>'Registro',
    				'rules'=>'required|exact_length[3]',
    				'errors'=>array(
    								'exact_length'=>'Escolha uma opção válida',
    							),
    			),
    			
    			array(
    				'field'=>'cd_rgUser',
    				'label'=>'RG',
    				'rules'=>'required|max_length[20]',
    				'errors'=>array(
    								'max_length'=>'O campo {field} deve conter no máximo 15 digitos!',
    							),
    			),
    			
    			array(
    				'field'=>'cd_cpfUser',
    				'label'=>'CPF',
    				'rules'=>'required|exact_length[11]|is_unique[user.cd_cpfUser]',
    				'errors'=>array(
    								'exact_length'=>'O campo {field} deve conter 11 dígitos!',
    								'numeric'=>'Só digite números!',
    								'is_unique'=>'Ja existe um cadastro com esse cpf',
    							),
    			),
    			
    			array(
    				'field'=>'ds_phUser',
    				'label'=>'Preferência de Horário',
    				'rules'=>'in_list[Todos,Manhã,Tarde,Noite]',
    				'errors'=>array(
    							'in_list'=>'Selecione um valor disponível',
    						),
    			),
    			
    			array(
    				'field'=>'ds_pneUser',
    				'label'=>'Portador de Necessidades Esp.',
    				'rules'=>'in_list[sim,nao]',
    				'errors'=>array(
    							'in_list'=>'Selecione uma das opções válidas',
    							'exact_length'=>'Selecione um valor disponível',
    						),
    			),
    			//fim informações gerais
    		);
    		
    		if($data['ds_pneUser'] == "sim"){
    			array_push($config, array(
    				'field'=>'ds_pneoUser',
    				'label'=>'Descreva as suas necessidades!',
    				'rules'=>'required',
    			));
    		}
    		
    		if($data['ig_trabUser'] == "sim"){
    			array_push($config, array(
    				'field'=>'cd_cipUser',
    				'label'=>'Registro CIP',
    				'rules'=>'required|integer|is_unique',
    				'errors'=>array(
    							'integer'=>'Só digite números!',
    							'is_unique'=>'Ja existe um cadastro com esse registro!'
    						)
    			));
    		}
    		
    		$this->form_validation->set_message('required', 'O campo {field} deve ser preenchido!');
    		$this->form_validation->set_rules($config);
    		
    		if($this->form_validation->run() == true){
    			return true;
    		}else{
    		    return false;
    		}
        }
        
        public function atualizarDados(){
            $this->load->model('Usuariodao');
            $user = $this->Usuariodao;
            
            $data = $this->input->post();
            
            $user->removerDadosParaAtualizacao();
            
            $validacao = $this->validarDadosAtualizacao($data);
            
            if($validacao){
                //CONFIGURAÇÃO PARA VALIDAÇÃO DE FOTO ENVIADA
                $config['upload_path'] = "assets/img/usuario";
                $config['allowed_types'] = "jpg|png|bmp|JPG|PNG|BMP";
                $config['max_size'] = "500";
                $config['overwrite'] = TRUE;
                $config['file_name'] = $this->session->user->nm_user;
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('file') or !isset($data->ds_imgUser)){
    
                    $att = $user->atualizarDados($data);
                    
                    if($att){
                        echo json_encode([
        					'tipo'=>'confirm',
        					'titulo'=>'ATUALIZAÇÃO COMPLETA!',
        					'msg'=>'Dados atualizados com sucesso!',
        				]);
                    }else{
                        $user->resetarDadosdeAtualizacao();
                        
                        echo json_encode([
        					'tipo'=>'error',
        					'titulo'=>'FALHA DURANTE ATUALIZAÇÃO!',
        					'msg'=>'Verifique sua conexao com a internet e tente novamente mais tarde.',
        				]);
                    }
                }else{
                    $user->resetarDadosdeAtualizacao();
                    
                    echo json_encode([
        					'tipo'=>'error',
        					'titulo'=>'ERRO AO ENVIAR FOTO!',
        					'msg'=>'Envie uma foto que atenda os seguintes requisitos:<br>
        					        * Tamanho máximo de 500kb,<br>
        					        * Preferência por fotos 4x3 <br>',
        				]);
                }
            }else{
                $user->resetarDadosdeAtualizacao();
                
                echo json_encode([
        					'tipo'=>'error',
        					'titulo'=>'NÃO CONSEGUIMOS REALIZAR O SEU CADASTRO!',
        					'msg'=>'Houve um problema ao tentar cadastrar o seu usuário. Corrija os campos abaixo e tente novamente<br>
        					    <strong style="color: red">'.implode(", ", array_values($this->form_validation->error_array())).'</strong>',
        					'campos'=>[
        						$this->form_validation->error_array('field')
        					],
        				]);
            }
        }
        
        public function validarDadosAtualizacao($data){
            $config = array(
    			//Informações de acesso
    			array(
    				'field'=>'nm_user',
    				'label'=>'Nome',
    				'rules'=>'required',
    			),
    			
    			array(
    				'field'=>'nm_nickUser',
    				'label'=>'Nome de Acesso',
    				'rules'=>'required|max_length[15]|is_unique[user.nm_nickUser]|regex_match[/^[a-zA-Z0-9]+$/]|min_length[1]',
    				'errors'=> array(
    								'max_length'=>'O campo {field} deve conter no máximo 15 digitos!',
    								'is_unique'=>'{field} ja em uso! Escolha outro!',
    								'regex_match'=>'Digite apenas letras e numeros sem caracateres especiais!',
    								'min_length'=>'Digite um apelido válido!'
    							),
    			),
    			
    			array(
    				'field'=>'ds_emailUser',
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
    				'field'=>'ds_ruaUser',
    				'label'=>'Logradouro',
    				'rules'=>'required',
    				'errors'=>array(
    							'exact_length'=>'O campo cep deve conter exatamente 8 digitos',
    						),
    			),
    			
    			array(
    				'field'=>'num_casaUser',
    				'label'=>'Número',
    				'rules'=>'required|numeric',
    				'errors'=>array(
    							'numeric'=>'Digite apenas números!',
    						),
    			),
    			
    			array(
    				'field'=>'ds_bairroUser',
    				'label'=>'Bairro',
    				'rules'=>'required',
    			),
    			
    			array(
    				'field'=>'ds_estUser',
    				'label'=>'Estado',
    				'rules'=>'required|exact_length[2]',
    				'errors'=>array(
    							'exact_length'=>'Selecione um valor disponível',
    							'regex_match'=>'Seleciona uma opção válida!',
    						),
    			),
    			
    			array(
    				'field'=>'ds_cidUser',
    				'label'=>'Cidade',
    				'rules'=>'required',
    			),
    			
    			array(
    				'field'=>'num_cepUser',
    				'label'=>'CEP',
    				'rules'=>'required|exact_length[8]',
    				'errors'=>array(
    							'exact_length'=>'Digite exatamente 8 números',
    						),
    			),
    			
    			array(
    				'field'=>'cd_telUser',
    				'label'=>'Telefone',
    				'rules'=>'required|exact_length[10]',
    				'errors'=>array(
    							'numeric'=>'Digite apenas números!',
    							'exact_length'=>'Digite exatamente 9 números',
    						),
    			),
    			
    			array(
    				'field'=>'cd_celUser',
    				'label'=>'Celular',
    				'rules'=>'max_length[11]',
    				'errors'=>array(
    							'numeric'=>'Digite apenas números!',
    							'max_length'=>'Digite no máximo 9 números',
    						),
    			),
    			
    			array(
    				'field'=>'ds_neUser',
    				'label'=>'Nível Escolar',
    				'rules'=>'in_list[Ensino Fundamental C,Ensino Médio C,Ensino Superior C,Pós Graduação]',
    				'errors'=>array(
    							'in_list'=>"Selecione um item válido!"
    						),
    			),
    			
    			//informações gerais
    			array(
    				'field'=>'ig_trabUser',
    				'label'=>'Registro',
    				'rules'=>'required|exact_length[3]',
    				'errors'=>array(
    								'exact_length'=>'Escolha uma opção válida',
    							),
    			),
    			
    			array(
    				'field'=>'cd_rgUser',
    				'label'=>'RG',
    				'rules'=>'required|max_length[20]',
    				'errors'=>array(
    								'max_length'=>'O campo {field} deve conter no máximo 15 digitos!',
    							),
    			),
    			
    			array(
    				'field'=>'cd_cpfUser',
    				'label'=>'CPF',
    				'rules'=>'required|exact_length[11]|is_unique[user.cd_cpfUser]',
    				'errors'=>array(
    								'exact_length'=>'O campo {field} deve conter 11 dígitos!',
    								'numeric'=>'Só digite números!',
    								'is_unique'=>'Ja existe um cadastro com esse cpf',
    								'greater_than'=>'Digite um cpf válido!'
    							),
    			),
    			
    			array(
    				'field'=>'ds_phUser',
    				'label'=>'Preferência de Horário',
    				'rules'=>'in_list[Todos,Manhã,Tarde,Noite]',
    				'errors'=>array(
    							'in_list'=>'Selecione um valor disponível',
    						),
    			),
    			
    			array(
    				'field'=>'ds_pneUser',
    				'label'=>'Portador de Necessidades Esp.',
    				'rules'=>'in_list[sim,nao]',
    				'errors'=>array(
    							'in_list'=>'Selecione uma das opções válidas',
    							'exact_length'=>'Selecione um valor disponível',
    						),
    			),
    			//fim informações gerais
    		);
    		
    		if($data['ds_pneUser'] == "sim"){
    			array_push($config, array(
    				'field'=>'ds_pneoUser',
    				'label'=>'Descreva as suas necessidades!',
    				'rules'=>'required',
    			));
    		}
    		
    		if($data['ig_trabUser'] == "sim"){
    			array_push($config, array(
    				'field'=>'cd_cipUser',
    				'label'=>'Registro CIP',
    				'rules'=>'required|integer|greater_than[0]|is_unique',
    				'errors'=>array(
    							'integer'=>'Só digite números!',
    							'greater_than'=>'O registro deve ser maior que 0.',
    							'is_unique'=>'Ja existe um cadastro com esse registro!'
    						)
    			));
    		}
    		
    		$this->form_validation->set_message('required', 'O campo {field} deve ser preenchido!');
    		$this->form_validation->set_rules($config);
    		
    		if($this->form_validation->run() == true){
    			return true;
    		}else{
    		    return false;
    		}
        }
        
        public function gerarValidacaoEmail($email, $code){
            $this->load->model("Usuariodao");
            $user = $this->Usuariodao;
            
            if($user->gerarValidacaoEmail($email, $code)){
                return true;
            }else{
                return false;
            }
        }
        
        public function validarEmail(){
            if(!isset($_GET['email']) or !isset($_GET['code'])){
                $this->load->view('errors/html/error_404.php');
            }else{
                $email = $_GET['email'];
                $code = $_GET['code'];
                
                if($email != "" or $code != ""){
                    $this->load->model('Usuariodao');
                
                    $user = $this->Usuariodao;
                    
                    $data['email_val'] = $user->verificarValidacaoEmail($email, $code);
                
                    $this->load->view('inset/head');
                    $this->load->view('usuario/validarEmail', $data);
                    $this->load->view('inset/footer');
                }else{
                    $this->load->view('errors/html/error_404.php');
                }
            }
        }
        
        public function recuperarSenha(){
            if(isset($_GET['email']) and isset($_GET['code'])){
                $email = $_GET['email'];
                $code = $_GET['code'];
                
                if($email == null or $code == null){
                    $this->load->view('errors/html/error_404.php');
                }else{
                    $this->load->model('Usuariodao');
            
                    $user = $this->Usuariodao;
                    
                    $result = $user->verificarSolicitaoRecSenha($email, $code);
                    
                    if($result){
                        $this->load->view('inset/head');
                        $this->load->view('usuario/recuperarSenha');
                        $this->load->view('inset/footer');
                    }else{
                        $this->load->view('errors/html/error_404.php');
                    }
                }
            }else{
                $this->load->view('errors/html/error_404.php');
            }
        }
        
        public function verificarEmail(){
            $data = $this->input->post();
            
            $this->load->model('Usuariodao');
            
            $user = $this->Usuariodao;
            
            $email = $user->verificarEmail($data);
            
            if($email){
                
                //GERANDO CÓDIGO UNICO
                $code = $this->gerarLinkRecuperarSenha();
                
                //GRAVANDO NO BANCO O PEDIDO DE TROCA TEMPORÁRIO
                $result = $user->socilitarRecSenha($data['ds_emailUser'], $code);
                
                if($result){
                    $nick = $user->recuperarNick($data['ds_emailUser']);
                    
                    $this->load->library('sendemails', ['emailUser'=>$data['ds_emailUser']]);
                    
                    $r =  $this->sendemails->enviarLinkRecuperarSenha($code, $nick);
                    
                    if($r){
                        echo json_encode([
                            'tipo'=>'confirm',
                            'titulo'=>'E-MAIL VERIFICADO COM SUCESSO!',
                            'msg'=>'Verifique sua caixa de mensagem, em breve você receberá um e-mail contendo um link que encaminhará você
                                    para realizar a recuperação da sua senha!<br>
                                    <small>
                                        <strong>Obs:</strong> Não deixe de verificar sua caixa de spam ou lixeira caso não encontre o email
                                        em sua caixa de mensagens.
                                    </small>',
                        ]);
                    }else{
                        echo json_encode([
                            'tipo'=>'error',
                            'titulo'=>'ERRO AO ENVIAR O E-MAIL',
                            'msg'=>'Parece que tivemos um problema ao enviar o e-mail. Aguarde um momento e tente novamente.',
                        ]);
                    }
                    
                }else{
                    echo json_encode([
                        'tipo'=>'error',
                        'titulo'=>'ERRO AO GERAR SOLICITAÇÃO DE TROCA DE SENHA',
                        'msg'=>'Parece que tivemos um problema durante a sua solicitação. Aguarde um momento e tente novamente.',
                    ]);
                }

            }else{
                echo json_encode([
                    'tipo'=>'error',
                    'titulo'=>'E-MAIL NÃO ENCONTRADO',
                    'msg'=>'O e-mail digitado não consta cadastrado no sistema. Verifique se foi digitado corretamente e tente novamente.',
                ]);
            }
        }
        
        public function gerarLinkRecuperarSenha(){
            //GERANDO CÓDIGO DE CONFIRMAÇÃO ALEATÓRIO
            $cifra = [];
            
            $cifra[0] = "abcdefghijklmnopqrstuvwyxz";
            $cifra[1] = "ABCDEFGHIJKLMNOPQRSTUVWYXZ";
            $cifra[2] = "0123456789";
            
            $confirmation = "";
            
            for($i = 0; $i < rand(30, 50); $i++){
                $val = $cifra[rand(0, 2)];
                
                $confirmation = $confirmation.substr($val, rand(0, strlen($val)), 1);
            }
            
            return $confirmation;
        }
        
        public function alterarSenha(){
            $data = $this->input->post();
            
            $this->load->model('Usuariodao');
            
            $user = $this->Usuariodao;
            
            $valAlterSenha = $this->validarAlteracaoSenha();
            
            if($valAlterSenha){
                $ver_solic = $user->verificarSolicitaoRecSenha($data['ds_emailUser'], $data['cd_codeRec']);
            
                if($ver_solic){
                    $alterSenha = $user->alterarSenha($data['ds_emailUser'], $data['cd_senhaUser'], $data['cd_codeRec']);
                    
                    if($alterSenha){
                        echo json_encode([
                            'tipo'=>'confirm',
                            'titulo'=>'SENHA ALTERADA COM SUCESSO!',
                            'msg'=>'Você realizou a sua recuperação de senha. Esse link deixou de ser funcional.<br>
                                    Agora você ja pode acessar sua conta com a nova senha digitada. Bons estudos!',
                        ]);
                    }else{
                        echo json_encode([
                            'tipo'=>'alerts',
                            'titulo'=>'SENHA INVÁLIDA!',
                            'msg'=>'Não foi possível alterar sua senha.<br>
                                    A senha digitada é a sua própria senha atual!',
                        ]);
                    }
                }else{
                    echo json_encode([
                        'tipo'=>'error',
                        'titulo'=>'SOLICITAÇÃO INVÁLIDA!',
                        'msg'=>'A troca de senha ja foi realizada, portanto a solicitação de recuperação de senha foi encerrada. Realize uma nova caso necessário.',
                    ]);
                }
                
            }else{
                echo json_encode([
                    'tipo'=>'error',
                    'titulo'=>'PREENCHIMENTO INVÁLIDO!',
                    'msg'=>'Certifique-se de preencher os campos corretamente e tente novamente!',
                ]);
            }
        }
        
        public function validarAlteracaoSenha(){
            $config = [
                    [
                        'field'=>'cd_senhaUser',
                        'label'=>'Nova Senha',
                        'rules'=>'required|max_length[15]|min_length[8]',
                        'errors'=>[
                                'max_length'=>'A senha deve conter no máximo 15 dig.',
                                'min_length'=>'A senha deve conter no mínimo 8 dig.'
                            ],
                    ],
                    
                    [
                        'field'=>'senha_confirm',
                        'label'=>'Confirmar Senha',
                        'rules'=>'required|max_length[15]|min_length[8]|matches[cd_senhaUser]',
                        'errors'=>[
                                'max_length'=>'A senha deve conter no máximo 15 dig.',
                                'min_length'=>'A senha deve conter no mínimo 8 dig.',
                                'matches'=>'O campo {field} deve ser igual ao campo {param}',
                            ],
                    ]
                ];
                
            //MENSAGEM PADRÃO
            $this->form_validation->set_message('required', 'O campo {field} deve ser preenchido!');

    		$this->form_validation->set_rules($config);
    		
    		if($this->form_validation->run() == true){
    			return true;
    		}else{
    		    return false;
    		}
        }
        
        public function cadastrarCurso(){
            $tipo = $this->input->post('tipo');
            
            $this->load->model("Usuariodao");
            $user = $this->Usuariodao;
            
            $data = [];
            $cupomList = "";
            
            switch($tipo){
                case "free":
                    array_push($data, [
                        "cd_compra"=>0,
                        "cd_aluno"=>$this->session->user->cd_user,
                        "cd_curso"=>$this->session->curso->cd_curso,
                        "dt_cadastro"=>date('Y-m-d H:i:s'),
                        "vl_cursoAtual"=>0,
                        "cd_descPago"=>"",
                        "ds_status"=>"confirmada",
                        "nm_emp"=>"",
                    ]);
                break;
                
                case "car":
                    foreach($this->session->carrinho->desc as $d){
                        $cupomList = $cupomList." ".$d->cd_desc;
                    }
                    
                    foreach($this->session->carrinho->item as $c){
                        
                        array_push($data, array(
                                            "cd_compra"=>0,
                                            "cd_aluno"=>$this->session->user->cd_user,
                                            "cd_curso"=>$c,
                                            "dt_cadastro"=>date('Y-m-d H:i:s'),
                                            "vl_cursoAtual"=>0,
                                            "cd_descPago"=>$cupomList,
                                            "ds_status"=>"aguardando pagamento",
                                            "nm_emp"=>""
                                        ));
                    }
                break;
            }
            
            $result = $user->cadastrarAlunoCurso($data);
            
            if($result){
                $this->load->library('sendemails', ['emailUser'=>$this->session->user->ds_emailUser]);
                    
                $r =  $this->sendemails->enviarEmailCursoRequerido($data);
                
                if($tipo != "free"){
                    
                    echo json_encode([
    					'tipo'=>'confirm',
    					'titulo'=>'INSCRIÇÕES REALIZADAS, AGUARDE...',
    					'msg'=>'Preparando pagamento...<br>Em breve você será redirecionado para a tela de pagamento!',
    				]);
                }else{
                
                    echo json_encode([
    					'tipo'=>'confirm',
    					'titulo'=>'INSCRIÇÃO REALIZADA COM SUCESSO!',
    					'msg'=>'A inscrição no curso <strong>'.$this->session->curso->nm_curso.'</strong>ja foi realizada e confirmada!',
    				]);
                }
            }else{
                echo json_encode([
    					'tipo'=>'error',
    					'titulo'=>'ERRO AO REALIZAR INSCRIÇÕES!',
    					'msg'=>'Parece que tivemos um problema durante suas requisições. o botão de requerimento ainda esteja disponivel, significa que seu requerimento
    					        para o curso em questão não foi realizado. Espere um momento e tente novamente.',
    				]);
            }
    	}
    	
    	public function visualizarCursosInscritos(){
    	    $this->load->model('Usuariodao');
    	    
    	    return $this->Usuariodao->visualizarCursosInscritos();
    	}
        
        public function logoff(){
            $this->session->sess_destroy();
            header('Location: '.base_url());
        }
        
        public function getDadosUser(){
            echo json_encode($this->session->user);
        }
    }
?>