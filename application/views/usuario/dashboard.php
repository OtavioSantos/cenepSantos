    <script src="<?= base_url('assets/js/jquery.mask.js') ?>"></script>
    <script src="<?= base_url('assets/js/mask.js') ?>"></script>
    <script src="<?= base_url('assets/js/cep.js') ?>"></script>
    <script src="<?= base_url('assets/js/usuario.js') ?>"></script>
    
    <title>Painel do Usuário</title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<!-- BANNER TOPO -->
<header class="dashboard-topo">
    <div class="banner-item" style="background: url(<?= base_url('assets/img/fundo/contato.jpg') ?>)">
        <div class="banner-apres d-flex justify-content-center align-items-center">
            <h1>
                <span>CONTATOS</span><br>
                <span>Ligue, envie um email, visite-nos</span>
            </h1>
        </div>
    </div>
</header><!-- FIM BANNER TOPO -->

<div class="container first-container">
    <div class="row py-3">
        <div class="username_apres"><strong style="padding: 1px 5px; background: #0072FF; border-radius: 3px"><span>Olá, </span><?= $this->session->user->nm_user ?></strong></div>
        
        <?php $this->load->view('usuario/menu.php'); ?>
        
        <div id="atualizar-dados-user" class="col-12 col-md-9">
            <form enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-sm-12 form-dados-header">
                        <h2 class="h5 p-0 m-0"><i class="fa fa-user-circle"></i> DADOS DE ACESSO</h2>
                    </div>
                </div>
                
                <div class="form-row form-dados-body">
                    <input id="ds_imgUser" name="ds_imgUser" type="file" style="display: none">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nm_user">Nome *</label>
                            <input type="text" name="nm_user" id="nm_user" class="form-control" value="" placeholder="Ex: CENEP SANTOS">
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nm_nickUser">Nome de Acesso *</label>
                            <input type="text" name="nm_nickUser" id="nm_nickUser" class="form-control" value="" placeholder="Ex: CSantos">
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ds_emailUser">E-mail *</label>
                            <input type="email" name="ds_emailUser" id="ds_emailUser" class="form-control" value="" placeholder="Ex: contato@cenepsantos.com.br">
                            <span class="form-error"></span>
                        </div>
                    </div>
                </div>
            </form>
            
            <form class="my-3">
                <div class="form-row">
                    <div class="col-sm-12 form-dados-header">
                        <h2 class="h5 p-0 m-0"><i class="fa fa-user-circle"></i> ENDEREÇO</h2>
                    </div>
                </div>
                
                <div class="form-row form-dados-body atualizar-user">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="num_cepUser">CEP *</label>
                            <input type="text" name="num_cepUser" id="num_cepUser" class="form-control" value="" placeholder="Ex: 11025-230">
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="ds_ruaUser">Logradouro*</label>
                            <input type="text" name="ds_ruaUser" id="ds_ruaUser" class="form-control" value="" placeholder="Ex: Rua Otávio Corrêa" >
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="num_casaUser">N° *</label>
                            <input type="number" name="num_casaUser" id="num_casaUser" class="form-control" value="" placeholder="Ex: 147" >
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="ds_compUser">Comp.</label>
                            <input type="text" name="ds_compUser" id="ds_compUser" class="form-control" value="" placeholder="Ex: Fundos" >
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="ds_bairroUser">Bairro *</label>
                            <input type="text" name="ds_bairroUser" id="ds_bairroUser" class="form-control" value="" placeholder="Ex: Estuário" >
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="ds_estUser">Estado *</label>
                            <select name="ds_estUser" id="ds_estUser" class="form-control" >
                                <option value="null" selected>Selecionar</option>
                            	<option value="AC">Acre</option>
                            	<option value="AL">Alagoas</option>
                            	<option value="AP">Amapá</option>
                            	<option value="AM">Amazonas</option>
                            	<option value="BA">Bahia</option>
                            	<option value="CE">Ceará</option>
                            	<option value="DF">Distrito Federal</option>
                            	<option value="ES">Espírito Santo</option>
                            	<option value="GO">Goiás</option>
                            	<option value="MA">Maranhão</option>
                            	<option value="MT">Mato Grosso</option>
                            	<option value="MS">Mato Grosso do Sul</option>
                            	<option value="MG">Minas Gerais</option>
                            	<option value="PA">Pará</option>
                            	<option value="PB">Paraíba</option>
                            	<option value="PR">Paraná</option>
                            	<option value="PE">Pernambuco</option>
                            	<option value="PI">Piauí</option>
                            	<option value="RJ">Rio de Janeiro</option>
                            	<option value="RN">Rio Grande do Norte</option>
                            	<option value="RS">Rio Grande do Sul</option>
                            	<option value="RO">Rondônia</option>
                            	<option value="RR">Roraima</option>
                            	<option value="SC">Santa Catarina</option>
                            	<option value="SP">São Paulo</option>
                            	<option value="SE">Sergipe</option>
                            	<option value="TO">Tocantins</option>
                            </select>
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="ds_cidUser">Cidade *</label>
                            <input type="text" name="ds_cidUser" id="ds_cidUser" class="form-control" value="" placeholder="Ex: Santos" >
                            <span class="form-error"></span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cd_telUser">Telefone *</label>
                            <input type="tel" name="cd_telUser" id="cd_telUser" class="form-control" value="" placeholder="(13)3202-6589" >
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cd_celUser">Celular *</label>
                            <input type="tel" name="cd_celUser" id="cd_celUser" class="form-control" value="" >
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <label for="ds_neUser">Nível Escolar *</label>
                        <select name="ds_neUser" id="ds_neUser" class="form-control" >
                            <option value="null" selected>Selecionar</option>
                            <option value="Ensino Fundamental C">E. Fundamental Completo</option>
                            <option value="Ensino Médio C">E. Médio Completo</option>
                            <option value="Ensino Superior C">E. Superior</option>
                            <option value="Pós Graduação">Pós Graduação</option>
                        </select>
                        <span class="form-error"></span>
                    </div>
                </div>
            </form>
            
            <form class="my-3">
                <div class="form-row">
                    <div class="col-sm-12 form-dados-header">
                        <h2 class="h5 p-0 m-0"><i class="fa fa-user-circle"></i> DADOS GERAIS</h2>
                    </div>
                </div>
                
                <div class="form-row form-dados-body">
                    <div class="col-lg-4">
                        <label for="ig_trabUser">Possui registro no ogmo? *</label>
                        <select id="ig_trabUser" name="ig_trabUser" class="form-control" >
                            <option value="null" selected>Selecionar</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="nm_empUser">Nome da Empresa</label>
                            <input type="text" name="nm_empUser" id="nm_empUser" class="form-control" value="" placeholder="Ex: CENEP Santos">
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="cd_cipUser">CIP</label>
                            <input type="text" name="cd_cipUser" id="cd_cipUser" class="form-control" value="" placeholder="Ex: 12345678">
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="cd_rgUser">RG *</label>
                            <input type="text" name="cd_rgUser" id="cd_rgUser" class="form-control" value="" placeholder="Ex: 3670789234">
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="cd_cpfUser">CPF *</label>
                            <input type="text" name="cd_cpfUser" id="cd_cpfUser" class="form-control" value="" placeholder="Ex: 123.456.789-01">
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="ds_phUser">Preferência de horário: *</label>
                            <select class="form-control" name="ds_phUser" id="ds_phUser" >
                                <option value="null" selected>Selecionar</option>
                                <option value="Todos">Todos</option>
                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                            </select>
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="ds_pneUser">É portador de necessidades especiais? *</label>
                            <select class="form-control" name="ds_pneUser" id="ds_pneUser">
                                <option value="null" selected>Selecionar</option>
                                <option value="nao">Não</option>
                                <option value="sim">Sim</option>
                            </select>
                            <span class="form-error"></span>
                        </div>
                    </div>
                    
                    <div id="pneo_cad_label" class="col-lg-4">
                        <div class="form-group">
                            <label for="ds_pneoUser">Quais são? Descreva-as... *</label>
                            <input type="text" class="form-control" name="ds_pneoUser" id="ds_pneoUser" value="" placeholder="...">
                            <span class="form-error"></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group text-right">
                        <small style="color: gray">Todos os campos marcados com '*' são de preenchimento obrigatório</small><br>
                        <button type="button" class="btn btn-primary text-left btnNivel btn-atualizar-usuario" nivel="2">
                            <b>ATUALIZAR DADOS</b><br>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>