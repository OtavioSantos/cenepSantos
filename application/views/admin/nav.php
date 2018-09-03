    <script src="<?= base_url('assets/js/admin.js') ?>"></script>
    
    <link href="<?= base_url('assets/css/admin.css') ?>" rel="stylesheet" type="text/css">
    
    <title>Dashboard</title>
</head>

<body style="position: absolute; width: 100%; height: 100%; background: #0095b0">
    <nav class="navbar navbar-expand-md navbar-light bg-light option-menu" style="z-index: 9999">
        <!-- home -->
        <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center">
            <img class="float-left mr-2" src="<?= base_url('assets/img/icone/logoMini.png') ?>" width="30" height="30" alt="">
            
            <p class="p-0 m-0 pl-2">
                  CENTRO DE EXCELÊNCIA<br>
                  PORTUÁRIA DE SANTOS  
            </p>
        </a>
        
        <!-- botão de baixa resolução -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-topo" aria-controls="menu-topo" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div id="menu-topo" class="collapse navbar-collapse">
            <ul id="navigation" class="navbar-nav text-center">
                <li class="nav-item">
                    <button class="nav-link" option="usuario">
                        <i class="fa fa-user"></i><br>
                        USUÁRIOS
                    </button>
                </li>
                
                <li class="nav-item">
                    <button class="nav-link" option="curso">
                        <i class="fa fa-user"></i><br>
                        CURSOS
                    </button>
                </li>
                
                <li class="nav-item">
                    <button class="nav-link" option="noticia">
                        <i class="fa fa-user"></i><br>
                        NOTICIAS
                    </button>
                </li>
                
                <li class="nav-item">
                    <button class="nav-link" option="banner">
                        <i class="fa fa-user"></i><br>
                        BANNER
                    </button>
                </li>
                
                <li class="nav-item">
                    <button class="nav-link" option="opiniao">
                        <i class="fa fa-user"></i><br>
                        OPINIÃO
                    </button>
                </li>
            </ul>
        </div>
        
        <div class="">
            <ul class="navbar-nav ml-auto d-flex align-items-center text-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Contatos') ?>">
                        <i class="fa fa-book"></i><br>
                        MANUAL
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Contatos') ?>">
                        <i class="fa fa-close"></i><br>
                        SAIR
                    </a>
                </li>
            </ul>
        </div>
    </nav>