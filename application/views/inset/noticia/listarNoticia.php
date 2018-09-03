<?php foreach($not as $not){ ?>
    <a class="list-group-item list-group-item-action list-group-item-light thumb-not-dest" href="<?= base_url('Noticias/'.$not->cd_not.'/'.$not->nm_urlNot) ?>">
        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <img class="img-fluid" src="<?= base_url('assets/img/noticia/'.$not->ds_imgNot) ?>" alt="">
            </div>
            
            <div class="col-lg-9 col-sm-9">
                <div class="row">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1" style="width: 85%"><?= $not->nm_not ?></h6>
                        <small><?= nice_date($not->dt_postNot, 'd-m-Y') ?></small>
                    </div>
                    
                    <p class="mb-1" style="font-size: 0.6rem"><?= $not->ds_not ?></p>
                </div>
            </div>
        </div>
    </a><!-- fim exibição de noticias -->
<?php } ?>