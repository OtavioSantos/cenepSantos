<title>Notícias</title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<header>
    <div class="banner-item" style="background: url(<?= base_url('assets/img/fundo/noticias.jpg') ?>)">
        <div class="banner-apres d-flex justify-content-center align-items-center">
            <h1>
                <span>NOTÍCIAS</span><br>
                <span>Saiba tudo o que envolve a CENEP e o porto de Santos</span>
            </h1>
        </div>
        
        <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
    </div>
</header><!-- FIM BANNER TOPO -->

<main>
    <div class="container first-container">
        <div class="row py-4">
            <!-- lista de noticias -->
            <div class="col-lg-7">
                <div class="col-lg-12">
                    <h1 class="container-titulo h6"><i class="fa fa-newspaper-o"></i> ÚLTIMAS NOTÍCIAS</h1>
                </div>
                
                <div class="col-lg-12 pt-2">
                    <form method="GET" action="<?= base_url('Noticias/Page/1/listarFiltro') ?>">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="sr_filtro" class="h6">Faça uma pesquisa mais detalhada:</label>
                                <div class="row">
                                    <div class="col-lg-9 col-10 pr-0">
                                        <input type="search" name="pesq" id="pesq" class="form-control search-input" placeholder="Pesquisar...">
                                    </div>
                                    
                                    <div class="col-lg-3 col-2 px-0">
                                        <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <hr>
                
                <!-- LISTAGEM DAS NOTÍCIAS -->
                <?php
                    if(!isset($result_error)){
                        $this->load->view('inset/noticia/listarNoticias', $not);
                    }else{
                        echo $result_error;
                    }
                ?><!-- FIM LISTAGEM DAS NOTICIAS -->
                
                <div class="col-lg-12">
                    <div>
                        <ul class="pagination">
                            <?php
                                $page = ceil($page/5);
                                
                                for($i = 1; $i <= $page; $i++){
                                    $link = "Noticias/Page/".$i;
                                
                                    if(isset($_GET['pesq'])){
                                        $pesq = $_GET['pesq'];
                                        
                                        $link = $link."/listarFiltro?pesq=".$pesq;
                                    }
        
                                    if($this->uri->segment(3) == $i){
                            ?>
                                        <li class="page-item active"><a class="page-link" href="<?= base_url($link) ?>"><?= $i ?></a></li>
                            <?php
                                    }else{
                            ?>
                                        <li class="page-item"><a class="page-link" href="<?= base_url($link) ?>"><?= $i ?></a></li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div><!-- fim lista -->
            
            <!-- mais visualizadas -->
            <?php $this->load->view('inset/noticia/notDest'); ?>
            <!-- fim mais visualizadas -->
        </div>
    </div>
</main>