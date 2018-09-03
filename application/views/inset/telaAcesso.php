<div class="d-flex align-items-center">
    <div class="modal_close">
        <button class="btn-close-modal btn-not-focus">
            <img class="img-fluid" src="<?= base_url('assets/img/icone/close_modal.png') ?>" alt="">
            FECHAR
        </button>
    </div>
    
    <div class="modal_content container">
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
                            
                            <form method="POST" action="<?= base_url('Usuario/validarLogin') ?>">
                                <div class="form-group">
                                    <label for="log_log"><strong>Nome de Acesso</strong> ou <strong>E-mail:</strong></label>
                                    <input type="text" name="log_log" id="log_log" class="form-control" placeholder="Ex: CENEP ou contato@cenep...">
                                    <span class="form-error"></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="sen_log"><strong>Senha:</strong></label>
                                    <input type="password" name="sen_log" id="sen_log" class="form-control" placeholder="**********" maxLenth="15">
                                    <span class="form-error"></span>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-logar-usuario">Acessar</button>
                                </div>
                            </form>
                            
                            <div class="row my-2">
                                <div class="col-sm-12 text-center">
                                    <p class="text-center divisor">OU</p>
                                
                                    <a class="text-center text-white py-2 m-2 btn-recuperar-senha" href="">Esqueceu login/senha ?</a>
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
                            
                            <form>
                                <div class="form-row" nivel="0">
                                    <div class="col-12">
                                        <h2 class="h6">Informações de Acesso:</h2>
                                    </div>
                                    
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
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email_confirm">E-mail *</label>
                                            <input type="email" name="email_confirm" id="email_confirm" class="form-control" value="" placeholder="Ex: contato@cenepsantos.com.br">
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cd_senhaUser">Senha *</label>
                                            <input type="password" name="cd_senhaUser" id="cd_senhaUser" class="form-control" value="" placeholder="Ex: **********">
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="senha_confirm">Confirmar Senha *</label>
                                            <input type="password" name="senha_confirm" id="senha_confirm" class="form-control" value="" placeholder="Ex: **********">
                                            <span class="form-error"></span>
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
                                            <label for="num_cepUser">CEP *</label>
                                            <input type="text" name="num_cepUser" id="num_cepUser" class="form-control" value="" placeholder="Ex: 11025-230">
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="ds_ruaUser">Logradouro*</label>
                                            <input type="text" name="ds_ruaUser" id="ds_ruaUser" class="form-control" value="" placeholder="Ex: Rua Otávio Corrêa" disabled>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="num_casaUser">N° *</label>
                                            <input type="number" name="num_casaUser" id="num_casaUser" class="form-control" value="" placeholder="Ex: 147" disabled>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="ds_compUser">Comp.</label>
                                            <input type="text" name="ds_compUser" id="ds_compUser" class="form-control" value="" placeholder="Ex: Fundos" disabled>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="ds_bairroUser">Bairro *</label>
                                            <input type="text" name="ds_bairroUser" id="ds_bairroUser" class="form-control" value="" placeholder="Ex: Estuário" disabled>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="ds_estUser">Estado *</label>
                                            <select name="ds_estUser" id="ds_estUser" class="form-control" disabled>
                                                <option value="null">Selecionar</option>
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
                                            <input type="text" name="ds_cidUser" id="ds_cidUser" class="form-control" value="" placeholder="Ex: Santos" disabled>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cd_telUser">Telefone *</label>
                                            <input type="tel" name="cd_telUser" id="cd_telUser" class="form-control" value="" placeholder="(13)3202-6589" disabled>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cd_celUser">Celular *</label>
                                            <input type="tel" name="cd_celUser" id="cd_celUser" class="form-control" value="" disabled>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label for="ds_neUser">Nível Escolar *</label>
                                        <select name="ds_neUser" id="ds_neUser" class="form-control" disabled>
                                            <option value="null">Selecionar</option>
                                            <option value="Ensino Fundamental C">E. Fundamental Completo</option>
                                            <option value="Ensino Médio C">E. Médio Completo</option>
                                            <option value="Ensino Superior C">E. Superior</option>
                                            <option value="Pós Graduação">Pós Graduação</option>
                                        </select>
                                        <span class="form-error"></span>
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
                                        <label for="ig_trabUser">Possui registro no ogmo? *</label>
                                        <select id="ig_trabUser" name="ig_trabUser" class="form-control" >
                                            <option selected>Selecionar</option>
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
                                                <option value="null">Selecionar</option>
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
                                            <select class="form-control" name="ds_pneUser" id="ds_pneUser" >
                                                <option value="null">Selecionar</option>
                                                <option value="nao">Não</option>
                                                <option value="sim">Sim</option>
                                            </select>
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div id="pneo_cad_label" class="col-lg-4">
                                        <div class="form-group">
                                            <label for="ds_pneoUser">Quais são? Descreva-as... *</label>
                                            <input type="text" class="form-control" name="ds_pneoUser" id="ds_pneoUser" value="" placeholder="..." >
                                            <span class="form-error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <small style="color: gray">Todos os campos marcados com '*' são de preenchimento obrigatório</small><br>
                                            <button type="button" class="btn btn-success text-left btnNivel btn-cadastrar-usuario" nivel="2">
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