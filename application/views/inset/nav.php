<body>
    <?php $this->load->view('inset/facePlugin'); ?>
    
    <div class="menu-acessbilidade fixed-top p-1">
        <div class="row">
            <div class="col-sm-4">
                <div id="google_translate_element"></div>
                <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                
                <div id="select_lang">
                    <div id="selected_lang">
                        <i class="fa fa-caret-down ml-2"></i>
                        <img src alt>
                        <span>Selecionar idioma</span>
                    </div>
                    
                    <div id="select_item_lang">
                        <div class="item-lang" value="pt"><img src="<?= base_url('assets/img/icone/brasil.jpg') ?>" alt=""> <span>Português</span></div>
                        <div class="item-lang" value="en"><img src="<?= base_url('assets/img/icone/eua.jpg') ?>" alt=""> <span>Inglês</span></div>
                        <div class="item-lang" value="es"><img src="<?= base_url('assets/img/icone/espanha.jpg') ?>" alt=""> <span>Espanhol</span></div>
                        <div class="item-lang" value="hl"><img src="<?= base_url('assets/img/icone/holanda.jpg') ?>" alt=""> <span>Holandês</span></div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4 p-0">
                <div class="d-flex align-items-center">
                    <button id="aumentar_letra" class="tam_letra">A+</button>
                    <button id="diminuir_letra" class="tam_letra">A-</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- menu topo -->
    <nav id="menu-geral" class="navbar navbar-expand-md navbar-light bg-light fixed-top justify-content-start" style="z-index: 9999">
        <!-- home -->
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
            <img class="float-left mr-2" src="<?= base_url('assets/img/logo/logoMini.png') ?>" width="30" height="30" alt="">
            
            <p class="p-0 m-0 pl-2">
                CENTRO DE EXCELÊNCIA<br>
                PORTUÁRIA DE SANTOS  
            </p>
        </a>
        
        <!-- botão de baixa resolução -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-topo" aria-controls="menu-topo" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- menu geral -->
        <div id="menu-topo" class="collapse navbar-collapse">
            <ul id="navigation" class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      INSTITUCIONAL
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <h6 class="dropdown-header">A Fundação</h6>
                        <a class="dropdown-item" href="<?= base_url('Institucional/sobrenos') ?>"><i class="fa fa-user"></i> Sobre Nós</a>
                        <a class="dropdown-item" href="<?= base_url('Institucional/editais') ?>"><i class="fa fa-newspaper-o"></i> Editais</a>
                        
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Projetos</h6>
                        
                        <a class="dropdown-item" href="<?= base_url('Institucional/COP') ?>"><i class="fa fa-briefcase"></i> Centro de Operações Portuária</a>
                        <a class="dropdown-item" href="<?= base_url('Institucional/Simulador') ?>"><i class="fa fa-briefcase"></i> Simulador</a>
                        <a class="dropdown-item" href="<?= base_url('Institucional/Rosalia') ?>"><i class="fa fa-briefcase"></i> Réplica de Návio</a>
                        
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" href="<?= base_url('Institucional/termosdeuso') ?>">Termos de Uso</a>
                    </div>
                </li>
                    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      SERVIÇOS
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <h6 class="dropdown-header">Cursos</h6>
                        <a class="dropdown-item" href="<?= base_url('Cursos/Page/1') ?>"><i class="fa fa-book"></i> Cursos Abertos!</a>
                        <a class="dropdown-item" href="<?= base_url('Cursos/catalogoCursos/Page/1') ?>"><i class="fa fa-book"></i> Catálogo de Cursos</a>
                        
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Notícias</h6>
                        <a class="dropdown-item" href="<?= base_url('Noticias/Page/1') ?>"><i class="fa fa-newspaper-o"></i> Noticias</a>
                    </div>
                </li>
                    
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Contatos') ?>">CONTATOS</a>
                </li>
                    
                <li class="nav-item">
                    
                </li>
            </ul>
                
            <div class="navbar-nav ml-auto d-flex align-items-center">
                <div class="nav-redes d-flex justify-content-center">
                    <div class="nav-item">
                        <a href="https://www.facebook.com/Cenep-Santos-801786426616309/" target="_blank" style="color: #2a9af0">
                            <img src="<?= base_url('assets/img/icone/redes/face1.png') ?>" alt="">
                        </a>
                    </div>
                        
                    <div class="nav-item mx-3">
                        <a href="https://www.youtube.com/channel/UCoWXW2kyb01Kz3e_dMnrlwA" target="_blank" style="color: red">
                            <img src="<?= base_url('assets/img/icone/redes/ytb1.png') ?>" alt="">
                        </a>
                    </div>
                        
                    <div class="nav-item">
                        <a href="<?= base_url('Contatos') ?>" style="color: #009334">
                            <img src="<?= base_url('assets/img/icone/redes/whats1.png') ?>" alt="">
                        </a>
                    </div>
                    
                    <?php
                        //USUARIO LOGADO
                        if($this->session->has_userdata('user')){
                    ?>
                        <div class="nav-item ml-2">
                            <a href="<?= base_url('Usuario/logoff') ?>" style="color: #009334">
                                <img src="<?= base_url('assets/img/icone/sair.png') ?>" alt="Sair">
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                    
                <div class="nav-item ml-2">
                        <?php
                            //USUARIO NAO LOGADO
                            if(!$this->session->has_userdata('user')){
                        ?>
                                <a id="btnUserDesl" class="nav-link d-flex align-items-center px-2" href="<?= base_url('Usuario/login') ?>" style="background: #FFF">
                                    <i class="fa fa-user nav-icon" style="font-size: 20px"></i>
                                        
                                    <p class="p-0 m-0 ml-2" style="color: #1b1b1b">
                                        <strong>Seja Bem-vindo, <span>Usuário</span></strong><br>
                                        <small>Clique para logar/cadastrar</small>
                                    </p>
                                </a>
                        <?php
                            //USUARIO LOGADO
                            }else{
                    ?>          <a href="<?= base_url('Usuario/painel-do-usuario') ?>">
                                    <div id="btnUserLog" class="nav-link d-flex align-items-center px-2" href="<?= base_url() ?>">
                                        <img style="width: 25px; height: 25px; border-radius: 100%" class="img-fluid" src="<?= base_url('assets/img/usuario/'.$this->session->user->ds_imgUser) ?>" alt="">
    
                                        <p class="p-0 m-0 ml-2" style="#FFF">
                                            <strong>Seja Bem-vindo, <span><?= $this->session->user->nm_nickUser ?></span></strong><br>
                                            <small>Ir ao painel de controle</small>
                                        </p>
                                    </div>
                                </a> 
                        <?php
                            }
                        ?>
                </div>
                
                <?php
                    if($this->session->has_userdata('user')){
                ?>
                    <a href="<?= base_url('Carrinho') ?>">
                        <div class="carrinho">
                            <img class="img-fluid mx-2" src="<?= base_url('assets/img/icone/carrinho.png') ?>" alt="">
                        
                            <div class="meu-carrinho">
                                <strong>MEU CARRINHO</strong><br>
                                <span>
                                    <?php
                                        if(($this->session->carrinho) and (!empty($this->session->carrinho->item))){
                                            echo count($this->session->carrinho->item)." curso(s)";
                                        }else{
                                            echo "Sem itens no carrinho";
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>