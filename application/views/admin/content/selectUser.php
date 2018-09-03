<div id="user-dados" class="container">
    <div class="row">
        <div class="col-md-12 py-3" style="width: 600px; height: 550px; background: #f2f2f2">
            <form style="height: 490px; overflow-y: auto; overflow-x: hidden">
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <h2 class="h5">Registro</h2>
                        </div>
                    </div>
                    
                    <div class="col-1">
                        <div class="form-group">
                            <label for="cd_cad">Cód.</label>
                            <input type="text" name="cd_cad" id="cd_cad" class="form-control" value="<?= $_GET['cd_user'] ?>" disabled>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nome_cad">Nome</label>
                            <input type="text" name="nome_cad" id="nome_cad" class="form-control" value="<?= $_GET['nm_user'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('nome_cad'); ?></span>
                    </div>
                    
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nick_cad">Nome de Acesso</label>
                            <input type="text" name="nick_cad" id="nick_cad" class="form-control" value="<?= $_GET['nm_nickUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('nick_cad'); ?></span>
                    </div>
                    
                    <div class="col-5">
                        <div class="form-group">
                            <label for="senha_cad">Senha</label>
                            <input type="text" name="senha_cad" id="senha_cad" class="form-control" value="<?= $_GET['cd_senhaUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('senha_cad'); ?></span>
                    </div>
                </div>
                
                <!-- contato -->
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <h2 class="h5">Formas de Contato</h2>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email_cad">E-mail</label>
                            <input type="email" name="email_cad" id="email_cad" class="form-control" value="<?= $_GET['ds_emailUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('email_cad'); ?></span>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tel_cad">Telefone</label>
                            <input type="number" name="tel_cad" id="tel_cad" class="form-control" value="<?= $_GET['cd_telUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('tel_cad'); ?></span>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cel_cad">Celular</label>
                            <input type="number" name="cel_cad" id="cel_cad" class="form-control" value="<?= $_GET['cd_celUser'] ?>" disabled>
                        </div>
                    </div>
                </div><!-- fim contato -->
                
                <!-- endereço -->
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <h2 class="h5">Endereço</h2>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="form-group">
                            <label for="rua_cad">Logradouro</label>
                            <input type="text" name="rua_cad" id="rua_cad" class="form-control" value="<?= $_GET['ds_ruaUser'] ?>"disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('rua_cad'); ?></span>
                    </div>
                    
                    <div class="col-1">
                        <div class="form-group">
                            <label for="num_cad">N°</label>
                            <input type="number" name="num_cad" id="num_cad" class="form-control" value="<?= $_GET['num_casaUser'] ?>"disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('num_cad'); ?></span>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="comp_cad">Comp.</label>
                            <input type="text" name="comp_cad" id="comp_cad" class="form-control" value="<?= $_GET['ds_compUser'] ?>"disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('comp_cad'); ?></span>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="bairro_cad">Bairro</label>
                            <input type="text" name="bairro_cad" id="bairro_cad" class="form-control" value="<?= $_GET['ds_bairroUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('bairro_cad'); ?></span>
                    </div>
                    
                    <div class="col-2">
                        <div class="form-group">
                            <label for="est_cad">Estado</label>
                            <select name="est_cad" id="est_cad" class="form-control" disabled>
                                <option value="<?= $_GET['ds_estUser'] ?>"><?= $_GET['ds_estUser'] ?></option>
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
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cid_cad">Cidade</label>
                            <input type="text" name="cid_cad" id="cid_cad" class="form-control" value="<?= $_GET['ds_cidUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('cid_cad'); ?></span>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cep_cad">CEP</label>
                            <input type="number" name="cep_cad" id="cep_cad" class="form-control" value="<?= $_GET['num_cepUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('cep_cad'); ?></span>
                    </div>
                </div><!-- fim endereço -->
                
                <!-- registro portuario -->
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <h2 class="h5">Dados Trabalhistas</h2>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="trab_cad">Possui registro no ogmo?</label>
                            <select id="trab_cad" name="trab_cad" class="form-control" disabled>
                                <option value="<?= $_GET['ig_trabUser'] ?>" selected><?= $_GET['ig_trabUser'] ?></span>
                                <option value="<?= $_GET['ig_trabUser'] ?>"><?= $_GET['ig_trabUser'] ?></option>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="emp_cad">Nome da Empresa</label>
                            <input type="text" name="emp_cad" id="emp_cad" class="form-control" value="<?= $_GET['nm_empUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('emp_cad'); ?></span>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cip_cad">CIP</label>
                            <input type="text" name="cip_cad" id="cip_cad" class="form-control" value="<?= $_GET['cd_cipUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('cip_cad'); ?></span>
                    </div>
                    
                    <div class="col-3">
                        <div class="form-group">
                            <label for="rg_cad">RG</label>
                            <input type="text" name="rg_cad" id="rg_cad" class="form-control" value="<?= $_GET['cd_rgUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('rg_cad'); ?></span>
                    </div>
                    
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cpf_cad">CPF</label>
                            <input type="number" name="cpf_cad" id="cpf_cad" class="form-control" value="<?= $_GET['cd_cpfUser'] ?>" disabled>
                        </div>
                        <span class="form-error"><?php echo form_error('cpf_cad'); ?></span>
                    </div>
                </div><!-- registro portuario -->
            </form>
            
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-default edit-dados">Editar Dados <i class="fa fa-pencil"></i></button>
                    <button class="btn btn-success save-dados" disabled>Salvar Dados <i class="fa fa"></i></button>
                    <button class="btn btn-danger remover-item">Remover Usuário <i class="fa fa-close"></i></button>
                    
                    <button class="float-right btn btn-outline-danger close_modal">Fechar <i class="fa fa-close"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>