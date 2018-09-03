    <title>CENEP Santos - Cursos Finalizados</title>
</head>

    <!-- MENU -->
    <?php $this->load->view('inset/nav') ?>

    <!-- banner topo -->
    <header>
        <div class="banner-item" style="background: url(<?= base_url('assets/img/fundo/cursos.jpg') ?>)">
            <div class="banner-apres d-flex justify-content-center align-items-center">
                <h1>
                    <span>CATÁLOGO DE CURSOS</span><br>
                    <span>Veja todos os cursos disponíveis pela Fundação!</span>
                </h1>
            </div>
            
            <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
        </div>
    </header><!-- FIM BANNER TOPO -->
    
    <main>
        <div class="container first-container py-4">
            <div class="row">
                <div class="col-sm-12 d-flex align-items-center">
                    <img class="img-fluid" src="<?= base_url('assets/img/usuario/usuarioPadrao.png') ?>" alt="Nao tem imagem" style="width: 150px">
                    
                    <div>
                        <h3 class="h5 container-titulo">CURSOS IN COMPANY</h3>
                        <p class="lead">
                            Os cursos catálogados estarão disponiveis para serem requisitados para sua empresa, basta entrar em contato através
                            da nossa página de contatos e solicitar o curso desejado.
                        </p>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <hr class="my-4">
                </div>
                
                <div class="col-lg-12 pb-4">
                    <form method="GET" action="<?= base_url('Cursos/Page/1/Pesquisar_Catalogo') ?>">
                        <div class="form-row">
                            <div class="col-md-5">
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
                
                <div class="col-lg-12">
                        
                    <h2 class="container-titulo h6 pb-2"><i class="fa fa-book"></i> CURSOS EM DESTAQUE</h2>
                    
                    <div class="row">
                        <?php $this->load->view('inset/curso/listarCurso', $curso) ?>
                    </div>
                    
                    <div>
                        <ul class="pagination">
                            <?php
                                $page = ceil($page/9);
                                
                                for($i = 1; $i <= $page; $i++){
                                    $link = "Cursos/catalogoCursos/Page/".$i;
                                
                                    if(isset($_GET['pesq'])){
                                        $pesq = $_GET['pesq'];
                                        
                                        $link = $link."/listarFiltro?&pesq=".$pesq;
                                    }
        
                                    if($this->uri->segment(3) == $i or $this->uri->segment(4) == $i or $this->uri->segment(4) == null){
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
                </div><!-- fim cursos em destaque -->
            </div>
        </div>
    </main>