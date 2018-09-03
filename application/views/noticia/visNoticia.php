<title><?= $not->nm_not ?></title>
</head>

<?php $this->load->view('inset/nav.php') ?>

<!-- slide topo -->
<header class="slide-resp">
    <!-- container de itens do slide -->
    <div class="slide-inner">
        <div class="slide-item">
            <div class="slide-text d-flex justify-content-center align-items-center">
                <h1>
                    <span><?= $not->nm_not ?></span>
                    <div class="share"></div>
                </h1>
            </div>
            
            <img id="curso-img-front" src="<?= base_url('assets/img/fundo/curso-img-front.png') ?>" alt="">
            
            <img class="img-fundo" src="<?= base_url('assets/img/noticia/'.$not->ds_imgNot) ?>" alt="">
        </div>
    </div><!-- fim items do slide -->
</header>

<div class="container first-container">
    <div class="row py-4">
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-12 lead py-4">
                    <?= $not->ds_textNot ?>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <p class="h6">COMPARTILHE:</p>
                            <div class="share"></div>
                        </div>
                        
                        <div class="col-md-6">
                            <p class="h6">Postado em:</p>
                            <p><?= nice_date($not->dt_postNot, 'd-m-Y') ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 pb-4">
                    <div id="disqus_thread"></div>
                    <script>
                    
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://cenepsantos.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
            </div>
        </div>
        
        <!-- mais visualizadas -->
        <?php $this->load->view('noticia/notDest'); ?>
        <!-- fim mais visualizadas -->
    </div>
</div>

<script id="dsq-count-scr" src="//cenepsantos.disqus.com/count.js" async></script>