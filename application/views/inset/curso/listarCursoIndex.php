<?php foreach($curso as $curso){ ?>
    <div class="col-lg-6 col-sm-6 thumb-curso">
        <a href="<?= base_url('Cursos/'.$curso->cd_curso.'/'.$curso->nm_urlCurso) ?>" style="padding: 0px">
            <div class="thumb-curso-head">
                <h3>
                    <span class="status"><?= $curso->ds_status ?></span><br>
                    
                    <span class="nome-curso">
                        <?= $curso->nm_curso ?>
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
                    </span>
                </h3>
                
                <img class="img-fluid" src="<?= base_url('assets/img/curso/'.$curso->ds_imgCurso) ?>">
            </div>
                
            <div class="row">
                <div class="col-lg-6 col-6">
                    <strong>Inscrições em:</strong>
                    <p class="inicInsc"><?= nice_date($curso->dt_inicInsc, 'd-m-Y') ?></p>
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
<?php } ?>