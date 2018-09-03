        <script src="<?= base_url('assets/js/jquery.mask.js') ?>"></script>
        <script src="<?= base_url('assets/js/mask.js') ?>"></script>
        <script src="<?= base_url('assets/js/cep.js') ?>"></script>
        <script src="<?= base_url('assets/js/loginscreen.js') ?>"></script>
        
        <title>Acesso</title>
    </head>
    
    <?php $this->load->view('inset/nav') ?>
        
        <main>
            <div id="login-screen" class="d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 py-2">
                                    <div id="logar" class="col-lg-12 log-window">
                                        <h1 class="h4">
                                            Acesso:<br>
                                            <small>Preencha os campos abaixo corretamente</small>
                                        </h1>
                                        
                                        <hr>
                                        
                                        <?= $this->session->flashdata('msg-error'); ?>
                                        
                                        <form method="POST" action="<?= base_url('Usuario/validarLogin') ?>">
                                            <div class="form-group">
                                                <label for="log_log">Nome de Acesso:</label>
                                                <input type="text" name="log_log" id="log_log" class="form-control" placeholder="Ex: CENEP" maxlength="15">
                                                <span class="form-error"><?php echo form_error('log_log'); ?></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="sen_log">Senha:</label>
                                                <input type="password" name="sen_log" id="sen_log" class="form-control" placeholder="**********" maxLenth="15">
                                                <span class="form-error"><?php echo form_error('sen_log'); ?></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Acessar</button>
                                            </div>
                                        </form>
                                        
                                        <div class="row my-2">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-center divisor">OU</p>
                                            
                                                <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>
                                                
                                                <a class="text-center text-white py-2" href="">Esqueceu login/senha ?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- cadastro -->
                                <div id="cadastrar" class="col-lg-8 col-md-12 py-2">
                                    <div class="col-lg-12 log-window">
                                        <h1 class="h4 container-titulo">
                                            Cadastro:<br>
                                            <small>Preencha os campos abaixo corretamente para se cadastrar</small>
                                        </h1>
                                        
                                        <hr>
                                        
                                        <form action="<?= base_url('Usuario/validarCadastro') ?>" method="POST">
                                            <div class="form-row" nivel="0">
                                                <div class="col-12">
                                                    <h2 class="h6">Informações de Acesso:</h2>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="nome_cad">Nome *</label>
                                                        <input type="text" id="nome_cad" name="nome_cad" class="form-control" placeholder="Ex: Cleiton da Silva Junior" value="<?php echo set_value('nome_cad'); ?>">
                                                        <span class="form-error"><?php echo form_error('nome_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="nick_cad">Nome de Acesso *</label>
                                                        <input type="text" id="nick_cad" name="nick_cad" class="form-control" placeholder="Ex: Kleiton" value="<?php echo set_value('nick_cad'); ?>" maxlength="15">
                                                        <span class="form-error"><?php echo form_error('nick_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email_cad">Email *</label>
                                                        <input type="text" id="email_cad" name="email_cad" class="form-control"  placeholder="Ex: cleiton@hotmail.com" value="<?php echo set_value('email_cad'); ?>">
                                                        <span class="form-error"><?php echo form_error('email_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email_val_cad">Confirmar Email *</label>
                                                        <input type="text" id="email_val_cad" name="email_val_cad" class="form-control"  placeholder="Ex: cleiton@hotmail.com" value="<?php echo set_value('email_val_cad'); ?>">
                                                        <span class="form-error"><?php echo form_error('email_val_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="senha_cad">Senha *</label>
                                                        <input type="password" id="senha_cad" name="senha_cad" class="form-control" placeholder="********" maxlength="15">
                                                       <span class="form-error"><?php echo form_error('senha_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="senha_val_cad">Confirmar Senha *</label>
                                                        <input type="password" id="senha_val_cad" name="senha_val_cad" class="form-control" placeholder="********" maxlength="15">
                                                        <span class="form-error"><?php echo form_error('senha_val_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <small style="color: gray">Todos os campos marcados com '*' são de preenchimento obrigatório</small><br>
                                                        <button type="button" class="btn btn-primary btnNivel" nivel="0">Próximo</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row" nivel="1">
                                                <div class="col-12">
                                                    <h2 class="h6">Endereço e Contato:</h2>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="cep_cad">Cep *</label>
                                                        <input type="text" name="cep_cad" id="cep_cad" class="form-control" placeholder="Ex: 12345678" value="<?php echo set_value('cep_cad'); ?>" maxlength="9">
                                                        <span class="form-error"><?php echo form_error('cep_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="rua_cad">Logradouro *</label>
                                                        <input type="text" name="rua_cad" id="rua_cad" class="form-control" placeholder="Ex: Otávio Corrêa" value="<?php echo set_value('rua_cad'); ?>" disabled>
                                                        <span class="form-error"><?php echo form_error('rua_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="num_cad">Nº *</label>
                                                        <input type="number" name="num_cad" id="num_cad" class="form-control" placeholder="Ex: 147" value="<?php echo set_value('num_cad'); ?>" min="0" disabled>
                                                        <span class="form-error"><?php echo form_error('num_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="comp_cad">Complemento</label>
                                                        <input type="text" name="comp_cad" id="comp_cad" class="form-control" placeholder="Ex: Ap 27 Bloco 2" value="<?php echo set_value('comp_cad'); ?>" disabled>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="bairro_cad">Bairro *</label>
                                                        <input type="text" name="bairro_cad" id="bairro_cad" class="form-control" placeholder="Ex: Estuário" value="<?php echo set_value('bairro_cad'); ?>" disabled>
                                                        <span class="form-error"><?php echo form_error('bairro_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="est_cad" >Estado *</label>
                                                        <select name="est_cad" id="est_cad" class="form-control" disabled>
                                                            <?php
                                                                if(set_value("est_cad")){
                                                                    echo '<option value="'.set_value("est_cad").'">'.set_value("est_cad").'</option>';
                                                                }else{
                                                            ?>
                                                                    <option value="Selecionar">Selecionar</option>
                                                            <?php
                                                                }
                                                            ?>
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
                                                        <span class="form-error"><?php echo form_error('est_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="cid_cad">Cidade *</label>
                                                        <input type="text" name="cid_cad" id="cid_cad" class="form-control" placeholder="Ex: Santos" value="<?php echo set_value('cid_cad'); ?>" disabled>
                                                        <span class="form-error"><?php echo form_error('cid_cad'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tel_cad">Telefone *</label>
                                                        <input type="tel" name="tel_cad" id="tel_cad" class="form-control" placeholder="Ex: 1333026589" value="<?php echo set_value('tel_cad'); ?>" maxlength="10" min="0" disabled>
                                                        <span class="form-error"><?php echo form_error('tel_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="cel_cad">Celular *</label>
                                                        <input type="tel" name="cel_cad" id="cel_cad" class="form-control" placeholder="Ex: 13991234567" value="<?php echo set_value('cel_cad'); ?>" maxlength="11" min="0" disabled>
                                                        <span class="form-error"><?php echo form_error('cel_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-4">
                                                    <label for="ne_cad">Nível Escolar *</label>
                                                    <select name="ne_cad" id="ne_cad" class="form-control" disabled>
                                                        <?php
                                                            if(set_value("ne_cad")){
                                                                echo '<option value="'.set_value("ne_cad").'">'.set_value("ne_cad").'</option>';
                                                            }else{
                                                        ?>
                                                                <option value="Selecionar">Selecionar</option>
                                                        <?php
                                                            }
                                                        ?>
                                                        <option value="Ensino Fundamental Completo">E. Fundamental Completo</option>
                                                        <option value="Ensino Médio Completo">E. Médio Completo</option>
                                                        <option value="Ensino Superior Completo">E. Superior</option>
                                                        <option value="Pós Graduação">Pós Graduação</option>
                                                    </select>
                                                    <span class="form-error"><?php echo form_error('ne_cad'); ?></span>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <small style="color: gray">Todos os campos marcados com '*' são de preenchimento obrigatório</small><br>
                                                        <button type="button" class="btn btn-primary btnNivel" nivel="1" disabled>Próximo</button>
                                                        <button type="button" class="btn btn-default btnVoltar ml-2" nivel="1">Voltar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row" nivel="3">
                                                <div class="col-lg-12">
                                                    <h2 class="h6">Informações Gerais</h2>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <label for="trab_cad">Possui registro no OGMO ?</label>
                                                    <select name="trab_cad" id="trab_cad" class="form-control">
                                                        <?php
                                                            if(set_value("trab_cad")){
                                                                echo '<option value="'.set_value("trab_cad").'">'.set_value("trab_cad").'</option>';
                                                            }else{
                                                        ?>
                                                                <option value="Selecionar">Selecionar</option>
                                                        <?php
                                                            }
                                                        ?>
                                                        <option value="nao">Não</option>
                                                        <option value="sim">Sim</option>
                                                    </select>
                                                    <span class="form-error"><?php echo form_error('trab_cad'); ?></span>
                                                </div>
                                                
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="emp_cad">Nome da Empresa:</label>
                                                        <input type="text" name="emp_cad" id="emp_cad" class="form-control" placeholder="Ex: Vale" value="<?php echo set_value('emp_cad'); ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="cip_cad">CIP *</label>
                                                        <input type="number" name="cip_cad" id="cip_cad" class="form-control" placeholder="Ex: 11111111" value="<?php echo set_value('cip_cad'); ?>" disabled min="0">
                                                        <span class="form-error"><?php echo form_error('cip_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="rg_cad">RG *</label>
                                                        <input type="text" name="rg_cad" id="rg_cad" class="form-control" placeholder="Digite apenas números..." value="<?php echo set_value('rg_cad'); ?>" maxlength="15">
                                                        <span class="form-error"><?php echo form_error('rg_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="cpf_cad">CPF *</label>
                                                        <input type="text" name="cpf_cad" id="cpf_cad" class="form-control" placeholder="Digite apenas números..." value="<?php echo set_value('cpf_cad'); ?>" maxlength="11" min="0">
                                                        <span class="form-error"><?php echo form_error('cpf_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="ph_cad">Preferência de horário: *</label>
                                                        <select class="form-control" name="ph_cad" id="ph_cad">
                                                            <?php
                                                                if(set_value("pne_cad")){
                                                                    echo '<option value="'.set_value("ph_cad").'">'.set_value("ph_cad").'</option>';
                                                                }else{
                                                            ?>
                                                                    <option value="Selecionar">Selecionar</option>
                                                            <?php
                                                                }
                                                            ?>
                                                            <option value="Todos">Todos</option>
                                                            <option value="Manhã">Manhã</option>
                                                            <option value="Tarde">Tarde</option>
                                                            <option value="Noite">Noite</option>
                                                        </select>
                                                        <span class="form-error"><?php echo form_error('ph_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="pne_cad">É portador de necessidades especiais? *</label>
                                                        <select class="form-control" name="pne_cad" id="pne_cad">
                                                            <?php
                                                                if(set_value("pne_cad")){
                                                                    echo '<option value="'.set_value("pne_cad").'">'.set_value("pne_cad").'</option>';
                                                                }else{
                                                            ?>
                                                                    <option value="Selecionar">Selecionar</option>
                                                            <?php
                                                                }
                                                            ?>
                                                            <option value="nao">Não</option>
                                                            <option value="sim">Sim</option>
                                                        </select>
                                                        <span class="form-error"><?php echo form_error('pne_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div id="pneo_cad_label" class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="pneo_cad">Quais são? Descreva-as</label>
                                                        <input type="text" class="form-control" name="pneo_cad" id="pneo_cad" value="<?= set_value("pneo_cad") ?>" placeholder="...">
                                                        <span class="form-error"><?php echo form_error('pneo_cad'); ?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <small style="color: gray">Todos os campos marcados com '*' são de preenchimento obrigatório</small><br>
                                                        <button type="submit" class="btn btn-success text-left" nivel="2">
                                                            <b>CADASTRAR</b><br>
                                                            <p style="font-size: 0.6rem; color: #f2f2f2; margin: 0px">Aceito os termos de uso e politicas da instituição.</p>
                                                        </button>
                                                        <button type="button" class="btn btn-default btnVoltar ml-2" nivel="2">Voltar</button>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-12 text-right">
                                                            <a href="">Termos de uso e políticas da instituição.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- fim cadastro -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <?= $this->session->flashdata('modal'); ?>
    </body>
</html>