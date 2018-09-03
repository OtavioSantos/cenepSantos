    <title>Contatos</title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<!-- BANNER TOPO -->
<header>
    <div class="banner-item" style="background: url(<?= base_url('assets/img/fundo/contato.jpg') ?>)">
        <div class="banner-apres d-flex justify-content-center align-items-center">
            <h1>
                <span>CONTATOS</span><br>
                <span>Ligue, envie um email, visite-nos</span>
            </h1>
        </div>
        
        <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
    </div>
</header><!-- FIM BANNER TOPO -->

<div class="container first-container">
    <div class="row text-center py-4">
        <div class="col-lg-12">
            <h2 class="container-titulo h5 pb-3">
                FORMAS DE CONTATO<br>
                <small>Email, Telefone, Local!</small>
            </h2>
        </div>
        
        <div class="col-lg-4">
            <img class="img-fluid mb-2" src="<?= base_url('assets/img/icone/redes/endereco.png') ?>" alt="">
            <p class="h6">R. Otávio Corrêa, 147 - Estuário Santos - SP, 11025-230</p>
        </div>
        
        <div class="col-lg-4">
            <img class="img-fluid mb-2" src="<?= base_url('assets/img/icone/redes/email.png') ?>" alt="">
            <p class="h6">
                Tel: <a href="tel:+551332026589">(13) 3202-6589</a><br>
                Whats: <a href="tel:+5513991231355">(13) 99123-1355</a>
            </p>
        </div>
        
        <div class="col-lg-4">
            <img class="img-fluid mb-2" src="<?= base_url('assets/img/icone/redes/celular.png') ?>" alt="">
            <p class="h6">contato@cenepsantos.com.br</p>
        </div>
        
        <div class="col-lg-12">
            <h2 class="container-titulo h5 py-4">
                REDES SOCIAIS<br>
                <small>Facebook, Youtube</small>
            </h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    <a href="https://www.facebook.com/Cenep-Santos-801786426616309/" target="_blank">
                        <img class="img-fluid" src="<?= base_url('assets/img/icone/redes/facebook.png') ?>" alt=""><br>
                        /CenepSantos
                    </a>
                </div>
                
                <div class="col-lg-2">
                    <a href="https://www.youtube.com/channel/UCoWXW2kyb01Kz3e_dMnrlwA" target="_blank">
                        <img class="img-fluid" src="<?= base_url('assets/img/icone/redes/youtube.png') ?>" alt=""><br>
                        /CenepSantos
                    </a>
                </div>
                
                <div class="col-lg-2">
                    <img class="img-fluid" src="<?= base_url('assets/img/icone/redes/whats2.png') ?>" alt=""><br>
                    <a href="tel:+5513991231355">(13) 99123-1355</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="h5 container-titulo text-center py-4">
                ENVIE-NOS UM EMAIL<br>
                <small>Preencha todos os campos para efetuar o envio.</small>
            </h2>
            
            <?= $this->session->flashdata('msg-send'); ?>
            <form method="POST" action="<?= base_url('Contatos/enviando-email') ?>">
                <div class="form row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nome_email">Nome: *</label>
                            <input type="text" class="form-control" name="nome_email" id="nome_email" placeholder="Ex: Cleiton Fernandes">
                            <span class="form-error"><?php echo form_error('nome_email'); ?></span>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-group">
                            <label for="email_email">Email: *</label>
                            <input type="email" class="form-control" name="email_email" id="email_email" placeholder="Ex: cl_fernandes@hotmail.com">
                            <span class="form-error"><?php echo form_error('email_email'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="form row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tel_email">Tel:</label>
                            <input type="tel" class="form-control" name="tel_email" id="tel_email" placeholder="Ex: 3364-8976">
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-group">
                            <label for="ass_email">Assunto: *</label>
                            <input type="text" class="form-control" name="ass_email" id="ass_email" placeholder="Ex: Elogio dos Cursos">
                            <span class="form-error"><?php echo form_error('ass_email'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="form row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control" id="msg_email" name="msg_email" placeholder="Deixe sua mensagem..."></textarea>
                            <span class="form-error"><?php echo form_error('msg_email'); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="btn-email">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>