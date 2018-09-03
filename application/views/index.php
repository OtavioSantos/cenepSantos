    <title>CENEP SANTOS</title>
</head>

<!-- MENU -->
<?php $this->load->view('inset/nav') ?>

<!-- banner topo -->
<header>
    <!-- items do banner -->
    <?php
        foreach($banner as $banner){
    ?>
            <div class="banner-item" target="_blank" style="background: url(<?= base_url($banner->ds_imgBanner) ?>)">
                <div class="banner-conteudo container" style="background: url(<?= base_url($banner->ds_imgContBanner) ?>)">
                    <?php
                        if($banner->ig_captionBanner == "sim"){
                    ?>
                        <div class="banner-caption">
                            <h2><?= $banner->nm_banner ?></h2>
                            
                            <p><?= $banner->ds_banner ?></p>
                            
                            <a href="<?= $banner->ds_linkBanner ?>" class="btn btn-sm btn-primary">Saiba Mais +</a>
                        </div>
                    <?php        
                        }
                    ?>
                </div>
            </div>
    <?php
        }
    ?>
    
    <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
</header><!-- fim banner -->

<main>
    <div class="container first-container">
        <div class="row justify-content-center py-4">
            <!-- cursos em destaque -->
            <div class="col-lg-6">
                
                <h2 class="container-titulo h6 pb-2"><i class="fa fa-book"></i> CURSOS EM DESTAQUE</h2>
                
                <div class="row">
                    <?php
                        $this->load->view('inset/curso/listarCursoIndex', $curso);
                    ?>
                </div>
            </div><!-- fim cursos em destaque -->
            
            <!-- noticias em destaque -->
            <div class="col-lg-6 pb-2">
                <div class="col-lg-12">
                    
                    <h2 class="container-titulo h6 pb-2"><i class="fa fa-newspaper-o"></i> ÚLTIMAS NOTÍCIAS</h2>
                    
                    <div class="list-group">
                        <?php
                            $this->load->view('inset/noticia/listarNoticiaIndex', $not);
                        ?>
                    </div>
                </div>
            </div><!-- fim noticias em destaque -->
            
            <div class="col-lg-6 pb-2">
                <hr>
            </div>
            
            <div class="col-lg-12 text-center">
                <p>
                    <strong>Têm Muito Mais</strong><br>
                    Clique abaixo para ver todos os cursos e noticias!
                </p>
                
                <a class="btn btn-primary btn-sm mx-2" href="<?= base_url('Cursos/Page/1') ?>"><i class="fa fa-plus"></i> Cursos</a>
                
                <a class="btn btn-primary btn-sm mx-2" href="<?= base_url('Noticias/Page/1') ?>"><i class="fa fa-plus"></i> Notícias</a>
            </div>
        </div>
    </div>
    
    <!-- opiniao do usuario -->
    <div id="opiniao" class="container-fluid">
        <div class="row py-3 text-center justify-content-center" style="background: #f2f2f2">
            <div class="col-lg-9">
                <p class="container-titulo h6 pb-4">VEJA O QUE OS NOSSOS ALUNOS TÊM A DIZER</p>
                
                <div id="slide-opiniao" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid mb-2" src="<?= base_url('assets/img/icone/'.$op[0]->ds_imgOp) ?>" alt="">
                            
                            <h5>
                                <?= $op[0]->nm_op ?><br>
                                <span><?= $op[0]->nm_cursoOp ?></span>
                            </h5>
                            <p>
                                <span class="h6">"<?= $op[0]->ds_op ?>"</span>
                            </p>
                        </div>
                        
                        <?php
                            unset($op[0]);
                        
                            foreach($op as $op){
                        ?>
                            <div class="carousel-item">
                                <img class="img-fluid mb-2" src="<?= base_url('assets/img/icone/'.$op->ds_imgOp) ?>" alt="">
                                
                                <h5>
                                    <?= $op->nm_op ?><br>
                                    <span><?= $op->nm_cursoOp ?></span>
                                </h5>
                                <p>
                                    <span class="h6">"<?= $op->ds_op ?>"</span>
                                </p>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                  
                    <a class="carousel-control-prev" href="#slide-opiniao" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                
                    <a class="carousel-control-next" href="#slide-opiniao" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                
                <p class="container-titulo h6 pt-4">BUSCAMOS SEMPRE O MELHOR PARA MELHORAR</p>
            </div>
        </div>
    </div><!-- FIM OPINIÃO -->
    
    <!-- PROPAGANDA FUNDAÇÃO -->
    <div class="container-fluid" style="background: #64e370">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 py-4">
                    <div class="row text-center h6">
                        <div class="col-lg-4">
                            <img src="<?= base_url('assets/img/prop/icone1.png') ?>" alt="">
                            <p>São mais de 50 cursos presenciais do setor portuário com certificado.</p>
                        </div>
                        
                        <div class="col-lg-4">
                            <img src="<?= base_url('assets/img/prop/icone2.png') ?>" alt="">
                            <p>Ambiente online utilizado como apoio aos cursos presenciais da Fundação</p>
                        </div>
                        
                        <div class="col-lg-4">
                            <img src="<?= base_url('assets/img/prop/icone3.png') ?>" alt="">
                            <p>Aprimore suas habilidades profissionais e destaque-se no mercado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fim propaganda -->
    
    <!-- formas de contato -->
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-12">
                <h2 class="container-titulo h6 text-center">
                    CONTATE-NOS<br>
                    <small>Envie-nos um Email, Telefone, ou venha conhecer a fundação!</small>
                </h2>
            </div>
            
            <div class="col-lg-12">
                <div class="row">
                    <!-- hcard -->
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 col-3 text-center">
                                <img class="img-fluid" src="<?= base_url('assets/img/icone/logo.png') ?>" alt="">
                            </div>
                            
                            <div class="col-lg-9 col-sm-9 d-flex align-items-center">
                                <div class="vcard">
                                    <a class="url fn n" href="https://cenepsantos.com.br/">  <span class="given-name"></span>
                                        <span class="additional-name"></span>
                                        <span class="family-name"></span>
                                    </a>
                                    
                                    <div class="org"><strong>CENTRO DE EXCELÊNCIA PORTUÁRIA DE SANTOS</strong></div>
                                    
                                    <a class="email" href="mailto:contato@cenepsantos.com.br">contato@cenepsantos.com.br</a>
                                    
                                    <div class="adr">
                                        <span class="street-address">Rua Otávio Corrêa - </span>
                                        <span class="locality">Santos </span>
                                        - 
                                        <span class="region"> SP </span>
                                        -
                                        <span class="postal-code"> 11025230 </span>
                                        <span class="country-name"> Brasil </span>
                                    </div>
                                    
                                    <div class="tel">
                                        Tel: <a href="tel:+551332026589">(13) 3202-6589</a>,
                                        Whats: <a href="tel:+5513991231355">(13) 99123-1355</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- fim hcard -->
                    
                    <!-- redes sociais -->
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="h6">Confira as nossas redes sociais:</p>
                            </div>
                            
                            <div class="col-lg-4 col-sm-4 col-xs-4 d-flex align-items-center">
                                <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/face1.png') ?>" alt="">
                                
                                <a href="https://www.facebook.com/Cenep-Santos-801786426616309/" target="_blank" style="color: #2a9af0">/CenepSantos</a>
                            </div>
                            
                            <div class="col-lg-4 col-sm-4 d-flex align-items-center">
                                <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/ytb1.png') ?>" alt="">
                                
                                <a href="https://www.youtube.com/channel/UCoWXW2kyb01Kz3e_dMnrlwA" target="_blank" style="color: #2a9af0">/Cenep Santos</a>
                            </div>
                            
                            <div class="col-lg-4 col-sm-4 d-flex align-items-center">
                                <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/whats1.png') ?>" alt="">
                                
                                <a href="tel:1332313930" style="color: #2a9af0">(13) 3231-3930</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- google maps -->
            <div class="col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14582.492014759737!2d-46.2967966!3d-23.9737678!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a50d05f5986cc8e!2sCentro+de+Excel%C3%AAncia+Portu%C3%A1ria+de+Santos!5e0!3m2!1spt-BR!2sbr!4v1519531621431" frameborder="0" style="width: 100%; height: 280px; border:0" allowfullscreen></iframe>
            </div>
            
            <!-- formulario de email -->
            <div class="col-lg-6">
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
</main>