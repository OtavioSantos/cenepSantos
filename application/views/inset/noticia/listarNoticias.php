<?php
        
    foreach($not as $not){
?>
        <div class="col-lg-12 my-4">
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-fluid" src="<?= base_url('assets/img/noticia/'.$not->ds_imgNot) ?>" alt="">
                </div>
                
                <div class="col-lg-8">
                    <h2 class="h6"><?= $not->nm_not ?></h2>
                    
                    <hr class="m-0">
                    
                    <p><?= $not->ds_not ?></p>
                    <a class="btn btn-primary btn-sm mt-1" href="<?= base_url('Noticias/'.$not->cd_not.'/'.$not->nm_urlNot) ?>">SAIBA MAIS +</a>
                </div>
            </div>
        </div>
<?php
    }
?>