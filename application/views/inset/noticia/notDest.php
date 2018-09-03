<div class="col-lg-5">
    <ul class="list-group">
        <li class="list-group-item"><h1 class="container-titulo h6"><i class="fa fa-newspaper-o"></i> MAIS VISUALIZADAS</h1></li>
        
        <?php
            foreach($notDest as $nt){
        ?>
            <li class="list-group-item">
                <div class="row">
                    <a href="<?= base_url('Noticias/'.$nt->cd_not.'/'.$nt->nm_urlNot) ?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <img class="img-fluid" src="<?= base_url('assets/img/noticia/'.$nt->ds_imgNot) ?>" alt="">
                            </div>
                            
                            <div class="col-lg-8 d-flex align-items-center pl-0">
                                <h3 class="h6"><?= $nt->nm_not ?></h3>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        <?php
            }
        ?>
    </ul>
</div>