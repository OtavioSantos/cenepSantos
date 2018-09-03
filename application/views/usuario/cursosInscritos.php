<title>Painel do Usuário</title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<!-- BANNER TOPO -->
<header class="dashboard-topo">
    <div class="banner-item" style="background: url(<?= base_url('assets/img/fundo/contato.jpg') ?>)">
        <div class="banner-apres d-flex justify-content-center align-items-center">
            <h1>
                <span>CONTATOS</span><br>
                <span>Ligue, envie um email, visite-nos</span>
            </h1>
        </div>
    </div>
</header><!-- FIM BANNER TOPO -->

<div class="container first-container">
    <div class="row py-3">
        <div class="username_apres"><strong style="padding: 1px 5px; background: #0072FF; border-radius: 3px"><span>Olá, </span><?= $this->session->user->nm_user ?></strong></div>
        
        <?php $this->load->view('usuario/menu.php'); ?>
        
        <div class="col-12 col-md-9">
            <h2 class="h6 container-titulo"><i class="fa fa-pencil"></i> CURSOS INSCRITOS</h2>
            
            <p>Todos os cursos que você se inscrever serão listados aqui. Você poderá imprimir certificados dos cursos quando os tiver concluidos e acompanhar o status do curso inscrito.</p>
            
            <table class="table">
                <thead class="bg-primary text-white">
                    <th></th>
                    <th>Nome</th>
                    <th>Inscrição em</th>
                    <th>Valor pago</th>
                    <th>Status</th>
                </thead>
                
                <tbody>
                    <?php
                        if(count($inscricoes) > 0){
                            foreach($inscricoes as $i){
                    ?>
                            <tr>
                                <td><img src="<?= base_url('assets/img/curso/'.$i->ds_imgCurso) ?>" alt="" style="width: 100px"></td>
                                <td class="d-flex "><?= $i->nm_curso ?></td>
                                <td><?= $i->dt_cadastro ?></td>
                                <td>R$ <?= number_format($i->vl_cursoAtual, 2, ',', '.'); ?></td>
                                <td><?= $i->ds_status ?></td>
                            </tr>
                    <?php
                            }
                        }else{
                    ?>
                            <tr>
                                <td colspan="5">
                                    <strong>Você ainda não realizou nenhuma inscrição!</strong><br>
                                    <a href="<?= base_url('Cursos/Page/1') ?>">Clique aqui</a> para ver os nossos cursos...
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>