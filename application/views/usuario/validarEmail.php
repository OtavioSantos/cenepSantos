    <title>CENEP Santos - Validar E-mail</title>
</head>

<!-- MENU -->
<?php $this->load->view('inset/nav') ?>

<div class="container" style="margin: 100px auto">
    <div class="row justify-content-center">
        <div class="col-sm-6" style="border: 1px solid #009334;">
            <div class="row py-2">
                <div class="col-sm-2 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('assets/img/logo/logo.png') ?>" alt="" style="width: 50px">
                </div>
                
                <?php 
                    if($email_val){
                ?>
                        <div class="col-sm-10 text-left">
                            <h6 style="color: #009334">
                                <i class="fa fa-check-circle"></i>
                                E-MAIL CONFIRMADO COM SUCESSO
                            </h6>
                            
                            <span>Seu cadastro ja foi validado e você ja pode acessar sua conta CENEP Santos. Seja bem vindo.</span>
                        </div>
                <?php
                    }else{
                ?>
                        <div class="col-sm-10 text-left">
                            <h6 style="color: red">
                                <i class="fa fa-check-circle"></i>
                                E-MAIL JA CONFIRMADO OU DADOS INCORRETOS!
                            </h6>
                            
                            <span>Se você tentou acessar o link de validação ja utilizado ou acessou essa página sem todos os dados completos o sistema não poderá efetuar a validação!</span>
                        </div>
                <?php
                    }
                    
                ?>
            </div>
        </div>
    </div>
</div>