    <title>Cursos</title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<!-- slide topo -->
<header class="slide-resp">
    <!-- container de itens do slide -->
    <div class="slide-inner">
        <div class="slide-item">
            <div class="slide-text d-flex justify-content-center align-items-center">
                <h1>
                    <span>CURSOS</span><br>
                    <p>Veja todos os cursos do site!</p>
                </h1>
            </div>
            
            <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
            
            <img class="img-fundo" src="<?= base_url('assets/img/fundo/cursos.jpg') ?>" alt="">
        </div>
    </div><!-- fim items do slide -->
</header>

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
                
                        foreach($curso as $curso){
                ?>
                            <!-- exibição de cursos -->
                            <div class="col-lg-4 col-sm-6 thumb-curso">
                                <a href="<?= base_url('Cursos/'.$curso->cd_curso.'/'.$curso->nm_urlCurso) ?>" style="padding: 0px">
                                    <div class="thumb-curso-head">
                                        <h3>
                                            <i class="fa fa-circle"></i> <?= $curso->nm_curso ?>
                                            (
                                            <?php
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
                                            ?>
                                            )
                                        </h3>
                                        
                                        <img class="img-fluid" src="<?= base_url('assets/img/curso/'.$curso->ds_imgCurso) ?>">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <strong>Início das Inscrições:</strong>
                                            <p><?= nice_date($curso->dt_inicInsc, 'd-m-Y') ?></p>
                                        </div>
                                        
                                        <div class="col-lg-6 col-6">
                                            <strong>Inscrições Até:</strong>
                                            <p class="limInsc" inicinsc="<?= $curso->dt_inicInsc ?>">
                                                <?= nice_date($curso->dt_limInsc, 'd-m-Y') ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div><!-- fim exibição de cursos -->
                <?php
                        }
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
        </div><!-- fim cursos em destaque -->
    </div>
</div>