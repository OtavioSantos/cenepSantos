    <title>CENEP Santos - Cursos</title>
</head>

    <!-- MENU -->
    <?php $this->load->view('inset/nav') ?>

    <!-- banner topo -->
    <header>
        <div class="banner-item" style="background: url(<?= base_url('assets/img/fundo/cursos.jpg') ?>)">
            <div class="banner-apres d-flex justify-content-center align-items-center">
                <h1>
                    <span>CURSOS</span><br>
                    <span>Não perca as datas de inscrições!</span>
                </h1>
            </div>
            
            <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
        </div>
    </header><!-- FIM BANNER TOPO -->
    
    <main>
        <div class="container first-container py-4">
            <div class="row">
                <div class="col-lg-12 pb-4">
                    <form method="GET" action="<?= base_url('Cursos/Page/1/listarFiltro') ?>">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="filtro" class="h6">Filtro:</label>
                                    <select class="form-control" name="filtro" id="filtro">
                                        <option value="Todos">Todos</option>
                                        <option value="gt">Gratuito</option>
                                        <option value="pg">Pago</option>
                                        <option value="cr">Credenciado</option>
                                        <option value="pl">Palestra</option>
                                    </select>
                                </div>
                            </div>
                            
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
                        <?php
                            if(!isset($result_error)){
                                $this->load->view('inset/curso/listarCurso', $curso);
                            }else{
                                echo $result_error;
                            }
                        ?>
                    </div>
                    
                    <div>
                        <ul class="pagination">
                            <?php
                                $page = ceil($page/9);
                                
                                for($i = 1; $i <= $page; $i++){
                                    $link = "Cursos/Page/".$i;
                                
                                    if(isset($_GET['filtro']) or isset($_GET['pesq'])){
                                        $filtro = $_GET['filtro'];
                                        $pesq = $_GET['pesq'];
                                        
                                        $link = $link."/listarFiltro?filtro=".$filtro."&pesq=".$pesq;
                                    }
        
                                    if($this->uri->segment(3) == $i or $this->uri->segment(3) == null){
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
                    
                    <a href="<?= base_url('Cursos/listarCursosFinalizados') ?>">Clique aqui para ver todos os cursos já realizados na fundação até hoje!</a>
                </div><!-- fim cursos em destaque -->
            </div>
        </div>
    </main>