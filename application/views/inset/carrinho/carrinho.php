    <script src="<?= base_url('assets/js/usuario.js') ?>"></script> <!-- ARQUIVO GERAL -->
    
    <title>CENEP Santos - Carrinho</title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<div class="container mt-5 py-5">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="h4 container-titulo">SEU CARRINHO <i class="fa fa-shopping-cart"></i></h1>
            
            <table id="list-car" class="table">
                <thead>
                    <tr class="bg-success text-white">
                        <th></th>
                        <th>Nome do Curso</th>
                        <th>Valor Atual:</th>
                        <th class="text-center">Remover Curso</th>
                    </tr>
                </thead>
                
                <tbody class="table-bordered">
                    <?php
                        if(!empty($this->session->carrinho->item)){
                            foreach($car as $c){
                    ?>
                        <tr curso="<?= $c->cd_curso ?>">
                            <td style="width: 10%"><img class="img-fluid" src="<?= base_url('assets/img/curso/'.$c->ds_imgCurso) ?>" alt=""></td>
                            <td style="vertical-align: middle"><?= $c->nm_curso ?></td>
                            <td style="vertical-align: middle">R$ <?= number_format($c->vl_curso, 2, ',', '.'); ?></td>
                            <td style="vertical-align: middle" class="text-center"><img class="btn-remover-carrinho" src="<?= base_url('assets/img/icone/close_modal.png') ?>" alt="" style="cursor: pointer"></td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td colspan="4">
                                <strong>Você não possui nenhum curso adicionado ao carrinho...</strong><br>
                                <small>Apenas os cursos pagos são adicionados ao carrinho de compras. As inscrições dos cursos gratuitos são realizadas na mesma hora quando requeridas!</small>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td colspan="4">
                            <a href="<?= base_url("Cursos/Page/1") ?>">
                                Continuar fazendo inscrições...
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row justify-content-end">
        <div class="col-sm-4">
            <div class="col-sm-12 py-2" style="border: 1px solid #cfcfcf; border-radius: 3px">
                <div class="input-group mb-2">
                    <strong style="width: 100%">
                        <strong>VALOR TOTAL:</strong>
                    </strong>
                    
                    <p style="font-size: 1.2rem">
                        <?php 
                            if($this->session->carrinho->vlTotalDesc < $this->session->carrinho->vlTotal){
                                echo "<span class='price-tc'>R$ ".number_format($this->session->carrinho->vlTotal, 2, ',', '.')."</span> <span class='price-desc'>R$".number_format($this->session->carrinho->vlTotalDesc, 2, ',', '.');
                            }else{
                                echo "<span class='price-desc'>R$ ".number_format($this->session->carrinho->vlTotal, 2, ',', '.')."</span>";
                            }
                        ?>
                    </p>
                </div>
                
                <div class="input-group my-3">
                    <label for="cd_cupom" style="width: 100%">
                        <strong>CUPOM DE DESCONTO:</strong>
                    </label>
                    
                    <input type="text" class="form-control" id="cd_cupom" name="cd_cupom" placeholder="Digite o código..." style="text-transform: uppercase;">
                
                    <div class="input-group-prepend">
                        <button class="btn btn-success btn-ver-desc">VERIFICAR</button><br>
                    </div>
                    
                    <div class="col-sm-12">
                        <p>
                            cupons utilizados:
                            <?php
                                if(!empty($this->session->carrinho->desc)){
                                    foreach($this->session->carrinho->desc as $c){
                                        echo "<span style='color: aqua'>".$c->cd_desc.", </span>";
                                    }
                                }
                            ?>
                        </p>
                    </div>
                </div>
                
                <div class="input-group mb-2">
                    <strong style="width: 100%">REALIZAR PAGAMENTO:</strong>
                    
                    <input class="finalizar-compra" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                </div>
            </div>
        </div>
    </div>
</div>