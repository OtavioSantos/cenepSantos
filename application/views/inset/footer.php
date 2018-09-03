            <!-- instituidores -->
            <div class="container-fluid" style="background: url(<?= base_url('assets/img/fundo/inst.jpg') ?>); background-size: cover; background-attachment: fixed">
                <div class="row justify-content-center">
                    <div class="container">
                        <div class="row text-center py-4">
                            <div class="col-lg-4">
                                <img src="<?= base_url('assets/img/icone/inst/inst1.png') ?>" alt="">
                            </div>
                            
                            <div class="col-lg-4">
                                <img src="<?= base_url('assets/img/icone/inst/inst2.png') ?>" alt="">
                            </div>
                            
                            <div class="col-lg-4">
                                <img src="<?= base_url('assets/img/icone/inst/inst3.png') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer style="background: #009334">
                <?php
                    if(!$this->session->has_userdata('user')){
                ?>
                        <div class="container-fluid d-flex justify-content-center text-center p-4" style="background: #00852f">
                            <a href="" class="m-0 btn-curso-acesso" style="font-size: 2rem; color: #89d4ff">Não perca tempo! Crie agora a sua conta CENEP!</a>
                        </div>
                <?php
                    }else{
                ?>
                        <div class="container-fluid d-flex justify-content-center text-center p-4" style="background: #00852f">
                            <a href="<?= base_url() ?>" class="m-0" style="font-size: 2rem; color: #89d4ff">Bem Vindo <?= $this->session->user->nm_nickUser ?></a>
                        </div>
                <?php
                    }
                ?>
                
                <div class="container pt-4 pb-3">
                    <div class="row justify-content-center">
                        <!-- contato -->
                        <div class="col-lg-3 col-md-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <h6>Formas de Contato:</h6>
                                </li>
                                
                                <li class="nav-item">
                                    <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/face1.png') ?>" alt="">
                                    
                                    <a href="https://www.facebook.com/Cenep-Santos-801786426616309/" target="_blank">/CenepSantos</a>
                                </li>
                                
                                <li class="nav-item">
                                    <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/ytb1.png') ?>" alt="">
                                    
                                    <a href="https://www.youtube.com/channel/UCoWXW2kyb01Kz3e_dMnrlwA" target="_blank">/Cenep Santos</a>
                                </li>
                                
                                <li class="nav-item">
                                    <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/whats1.png') ?>" alt="">
                                    
                                    <a href="tel:+551332026589">(13) 3202-6589</a>
                                </li>
                                
                                <li class="nav-item">
                                    <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/whats1.png') ?>" alt="">
                                    
                                    <a href="tel:+5513991231355">(13) 99123-1355</a>
                                </li>
                                
                                <li class="nav-item">
                                    <img class="img-fluid mr-2" src="<?= base_url('assets/img/icone/redes/email1.png') ?>" alt="">
                                    
                                    <a href="<?= base_url('Contatos') ?>">E-mail</a>
                                </li>
                            </ul>
                        </div><!-- fim contato -->
                        
                        <!-- endereço -->
                        <div class="col-lg-4 col-md-4 my-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>Endereço:</h6>
                                </div>
                                
                                <div class="col-lg-12 d-flex align-items-center">
                                    <div class="vcard">
                                        <a class="url fn n" href="https://cenepsantos.com.br/">  <span class="given-name"></span>
                                            <span class="additional-name"></span>
                                            <span class="family-name"></span>
                                        </a>
                                        
                                        <div class="org"><strong>CENTRO DE EXCELÊNCIA PORTUÁRIA DE SANTOS</strong></div>
                                        
                                        <a class="email" href="mailto:contato@cenepsantos.com.br">contato@cenepsantos.com.br</a>
                                        
                                        <div class="adr">
                                            <span class="street-address">Rua Otávio Corrêa - </span>
                                            <span class="locality">Santos </span>
                                            - 
                                            <span class="region"> SP </span>
                                            -
                                            <span class="postal-code"> 11025230 </span>
                                            <span class="country-name"> Brasil </span>
                                        </div>
                                        
                                        <div class="tel"><a href="tel:+551332026589">(13) 3202-6589</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- curta face -->
                        <div class="col-lg-5 col-md-5">
                            <h6>Curta a Página no Face</h6>
                            
                            <div class="fb-page" data-href="https://www.facebook.com/Cenep-Santos-801786426616309/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Cenep-Santos-801786426616309/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Cenep-Santos-801786426616309/">Cenep Santos</a></blockquote></div>
                        </div><!-- fim curta -->
                        
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        
                        <div class="col-lg-8 text-center">
                            <img src="//assets.pagseguro.com.br/ps-integration-assets/banners/pagamento/todos_animado_550_50.gif" alt="Logotipos de meios de pagamento do PagSeguro" title="Este site aceita pagamentos com as principais bandeiras e bancos, saldo em conta PagSeguro e boleto." style="width: 100%;"></div>
                        </div>
                        
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        
                        <div id="otvss-prop"class="col-lg-12 d-flex align-items-center">
                            <a class="d-flex align-items-center ml-auto" href="https://www.otvss.com.br">
                                <p>Desenvolvido por:</p>
                                
                                <img class="img-fluid mx-2" src="<?= base_url('assets/img/icone/otvss.png') ?>" alt="">
                                
                                <p id="otvss-desc" class="mt-1">
                                    www.otvss.com.br<br>
                                    <span>Otávio Santos</span>
                                </p>
                            </a>
                        </div>
                        
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        
                        <div class="col-lg-12">
                            <p class="m-0 text-center">Todos os direitos reservados à CENEP SANTOS | 2018</p>
                        </div>
                    </div>
                </div>
            </footer>
        
        <script>
            $(".share").jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["email", "twitter", "facebook", "linkedin", "whatsapp"]
            });
        </script>
        
        <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,nl,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>