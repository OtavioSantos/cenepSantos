    <title>Editais</title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<!-- BANNER TOPO -->
<header>
    <div class="banner-item" style="background: url(<?= base_url('assets/img/fundo/editais.jpg') ?>)">
        <div class="banner-apres d-flex justify-content-center align-items-center">
            <h1>
                <span>EDITAIS</span><br>
                <span>Boletim informativo sobre a CENEP Santos</span>
            </h1>
        </div>
        
        <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
    </div>
</header><!-- FIM BANNER TOPO -->

<div class="container first-container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="container-titulo h4">Acompanhe os boletins informaticos da Fundação</h2>
            <p class="lead">Clique nos arquivos abaixo para baixá-los e visualizar o seu conteúdo.</p>
        </div>
        
        <?php
            foreach($edital as $e){
        ?>
            <div class="col-lg-4 text-center">
                <a href="<?= base_url('assets/download/'.$e->ds_linkEdital) ?>" class="text-center">
                    <img class="img-fluid" src="<?= base_url('assets/img/icone/edital.png') ?>" alt=""><br>
                    <h3 class="h4"><?= $e->nm_edital ?></h3>
                </a>
            </div>
        <?php
            }
        ?>
    </div>
</div>