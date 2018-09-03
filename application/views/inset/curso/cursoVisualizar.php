    <script src="<?= base_url('assets/js/usuario.js') ?>"></script> <!-- ARQUIVO GERAL -->
    
    <title><?= $curso->nm_curso ?></title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<header>
    <div class="banner-item" style="background: url(<?= base_url('assets/img/curso/'.$curso->ds_imgCurso) ?>)">
        <div class="banner-apres d-flex justify-content-center align-items-center">
            <h1>
                <span><?= $curso->nm_curso ?></span>
                <span class="share"></span>
            </h1>
        </div>
        
        <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
    </div>
</header><!-- FIM BANNER TOPO -->

<div class="container first-container">
    <div class="row py-4 justify-content-center">
        <div class="col-lg-12 text-center">
            <h1 class="h4"><?= $curso->nm_curso ?></h1>
        </div>
        
        <div class="col-lg-8 py-4">
            <img class="img-fluid" src="<?= base_url('assets/img/curso/'.$curso->ds_imgCurso) ?>" alt="">
        </div>
        
        <div class="col-lg-8 inf-bas">
            <div class="row">
                <div class="col-lg-6">
                    <h3>DURAÇÃO:</h3>
                    <p><?= $curso->ds_durCurso ?></p>
                </div>
        
                <div class="col-lg-6">
                    <h3>INSCRIÇÕES ATÉ</h3>
                    <?php
                        if($curso->dt_inicInsc == "0000-00-00"){
                    ?>
                        <p class="alert alert-warning">A data de inscrição esta a ser definida!</p>
                    <?php
                        }else{
                    ?>
                        <p class="limInsc" inicInsc="<?= $curso->dt_inicInsc ?>">
                            <?= nice_date($curso->dt_limInsc, 'd-m-Y') ?>
                        </p>
                    <?php
                        }
                    ?>
                </div>
                
                <div class="col-lg-6">
                    <h3>TIPO:</h3>
                    <p><?php 
                            switch($curso->tp_curso){
                                case 'gt':
                                    echo "Gratuito";
                                break;
                                
                                case 'pg':
                                    echo "Pago";
                                break;
                                
                                case 'cr':
                                    echo "Credenciado";
                                break;
                                
                                case 'pl':
                                    echo "Palestra";
                                break;
                                
                                case 'df':
                                    echo "À definir";
                                break;
                            }
                        ?></p>
                </div>
        
                <div class="col-lg-6">
                    <h3>PÚBLICO ALVO</h3>
                    <p><?= $curso->ds_paCurso ?></p>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="pt-3">VAGAS DISPONÍVEIS:</h3>
                    <p>Ao todo são <?= $curso->qt_vagaCurso ?> vagas disponíveis</p>
                </div>
        
                <div class="col-lg-6">
                    <h3 class="pt-3">PRÉ-REQUISITOS</h3>
                    <p><?= $curso->ds_prCurso ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="background: #f2f2f2">
    <div class="container inf-bas">
        <div class="row py-4 text-center">
            <div class="col-lg-12 text-area">
                <h3>INFORMAÇÕES GERAIS:</h3>
                <p class="h6 pb-3"><?= $curso->ds_descCurso ?></p>
                <p><strong>O curso ocorrerá entre: </strong> <?= $curso->ds_dtCurso ?></p>
                <p><strong>período: </strong> <?= $curso->ds_periodoCurso ?></p>
                <p style="color: #009334"><strong>VALOR DO CURSO: R$ <?= number_format($curso->vl_curso, 2, ',', '.'); ?></strong></p>
                <hr>
                
                <h3 class="pt-3">CONTEÚDO PROGRAMÁTICO:</h3>
                <p class="pb-3 h6"><?= $curso->ds_cpCurso ?></p>
                
                <hr>
                
                <h3 class="h6 pt-3">COMPARTILHE:</h3>
                <div class="share"></div>
            </div>
        </div>
    </div>
</div>


<?php
    if($curso->tp_curso != "cr"){
?>
<div class="container-fluid" style="background: #009334">
    <div class="container">
        <div class="row justify-content-center">
            <?php
                if(!$this->session->has_userdata('user')){
            ?>
                    <!-- corpo para cursos gratuitos e paletras -->
                    <div class="col-lg-4 col-sm-6 col-12 py-4">
                        <p class="text-center p-2 m-0" style="color: #FFF; border: 1px solid #FFF; border-radius:3px">
                            <span class="h5">Entre com a sua conta para realizar a requisição do curso</span><br>
                            <a href="" class="btn btn-primary mt-2 btn-curso-acesso">Acessar Conta <i class="fa fa-user"></i></a>
                        </p>
                    </div>
            <?php
                }else{
                    if((date('Y-m-d') >= $curso->dt_inicInsc) and (date('Y-m-d') <= $curso->dt_limInsc)){
;                       switch(true){
                            case ($curso->tp_curso == 'gt' or $curso->tp_curso == 'pl'):
            ?>
                            <!-- corpo para cursos gratuitos e paletras -->
                                <div class="col-lg-4 col-sm-4 col-4 py-4 req-screen text-center">
                                    <?php
                                        if(!$curso->insc){
                                    ?>
                                            <p class="text-center p-2 m-0" style="color: #FFF; border: 1px solid #FFF; border-radius:3px">
                                                <span class="h5">Clique abaixo para requisitar a inscrição no curso!</span><br>
                                                <button class="btn btn-primary btn_req mt-2">Requisitar Inscrição <i class="fa fa-check-circle text-light"></i></button>
                                            </p>
                                    <?php
                                        }else{
                                    ?>
                                            <p class='alert alert-warning mt-2'>REQUERIMENTO JÁ REALIZADO <i class='fa fa-check'></i></p>
                                            <small style="color: #FFF">Estamos verificando sua disponibilização, em breve retornaremos o contato via e-mail!</small>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <!-- fim corpo -->
            <?php
                            break;
                            
                            case ($curso->tp_curso == 'pg'):
            ?>
                                <!-- corpo para cusos pago -->
                                <div id="pg-screen" class="col-lg-4 my-4 text-center req-screen" style="border-radius: 3px; background: #f2f2f2">
                                    <h4 class="h6 py-2"><?= $curso->nm_curso ?></h4>
                                    
                                    <h5 class="py-3 mr-4" style="position: relative; font-size: 0.6rem; line-height: 25px">
                                        <span style="position: absolute; left: 20%">À VISTA</span><br>
                                        <span style="font-size: 3.2rem; margin-left: 25px">R$ <?= number_format($curso->vl_curso, 2, ',', '.'); ?></span>
                                    </h5>
                                    
                                    <p class="text-left"><i class="fa fa-check-circle"></i> Aulas online e presenciais</p>
                                    <p class="text-left"><i class="fa fa-check-circle"></i> Avaliação de aprendizagem</p>
                                    <p class="text-left"><i class="fa fa-check-circle"></i> Certificado de Conclusão</p>
                                    <p class="text-left"><i class="fa fa-check-circle"></i> Entidade certificada pela Marinha do Brasil</p>
                                    
                                    <?php
                                        if($this->session->has_userdata('carrinho')){
                                            if(!$curso->insc and !in_array($this->session->curso->cd_curso, $this->session->carrinho->item)){
                                    ?>
                                                <p class="text-center p-2 m-0" style="color: #000; border: 1px solid #FFF; border-radius:3px">
                                                    <span class="h5">Clique abaixo para requisitar a inscrição no curso!</span><br>
                                                    <button class="btn btn-primary btn-add-carrinho mt-2">Adicionar ao Carrinho <i class="fa fa-check-circle text-light"></i></button>
                                                </p>
                                    <?php
                                            }else if($curso->insc and !in_array($this->session->curso->cd_curso, $this->session->carrinho->item)){
                                    ?>
                                                <p class='alert alert-warning mt-2'>REQUERIMENTO JÁ REALIZADO <i class='fa fa-check'></i></p>
                                                <small style="color: #000">Estamos verificando sua disponibilização, em breve retornaremos o contato via e-mail!</small>
                                    <?php
                                            }else if(!$curso->insc and in_array($this->session->curso->cd_curso, $this->session->carrinho->item)){
                                    ?>
                                                <p class='alert alert-warning mt-2'>CURSO JA ADICIONADO AO CARRINHO <i class='fa fa-check'></i></p>
                                                <small style="color: #000">Estamos verificando sua disponibilização, em breve retornaremos o contato via e-mail!</small>
                                    <?php
                                            }else{
                                    ?>
                                                <p class="text-center p-2 m-0" style="color: #000; border: 1px solid #FFF; border-radius:3px">
                                                    <span class="h5">Clique abaixo para requisitar a inscrição no curso!</span><br>
                                                    <button class="btn btn-primary btn-add-carrinho mt-2">Adicionar ao Carrinho <i class="fa fa-check-circle text-light"></i></button>
                                                </p>
                                    <?php
                                            }
                                        }else{
                                            if(!$curso->insc){
                                        ?>
                                                    <p class="text-center p-2 m-0" style="color: #000; border: 1px solid #FFF; border-radius:3px">
                                                        <span class="h5">Clique abaixo para requisitar a inscrição no curso!</span><br>
                                                        <button class="btn btn-primary btn-add-carrinho mt-2">Adicionar ao Carrinho <i class="fa fa-check-circle text-light"></i></button>
                                                    </p>
                                        <?php
                                            }else{
                                        ?>
                                                    <p class='alert alert-warning mt-2'>REQUERIMENTO JÁ REALIZADO <i class='fa fa-check'></i></p>
                                                    <small style="color: #000">Estamos verificando sua disponibilização, em breve retornaremos o contato via e-mail!</small>
                                        <?php
                                            }
                                        }
                                    ?>
                                    
                                    <div class="col-lg-12 pb-3">
                                        <small style="color: red">Caso sua conta esteja nos conformes para a realização do curso, as formas de pagamento serão enviadas via e-mail.</small>
                                    </div>
                                </div>
                            <!-- fim corpo -->
            <?php
                            break;
                        }
                    
                    }else if($curso->dt_inicInsc == "0000-00-00"){
            ?>
                        <p class="text-center p-2 my-4 alert alert-warning">
                            <i class="fa fa-close"></i><br>
                            <span class="h5">INSCRIÇÕES AINDA NÃO DISPONÍVEIS!</span><br>
                            Siga a CENEP no face e fique por dentro de todas as noticias sobre a fundação!
                        </p>
            
            <?php
                    }else if(date('Y-m-d') > $curso->dt_limInsc){
            ?>
                    <p class="text-center p-2 my-4 alert alert-danger">
                        <i class="fa fa-close"></i><br>
                        <span class="h5">INSCRIÇÕES ENCERRADAS!</span><br>
                        O curso atingiu a sua quantidade de vagas limite ou encerrou o tempo de inscrição!
                    </p>    
            
            <?php
                    }
            ?>
            
            <?php
                }
            ?>
        </div>
    </div>
</div>
<?php
    }
?>