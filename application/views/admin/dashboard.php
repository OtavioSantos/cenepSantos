    <?php $this->load->view("admin/nav"); ?>
    
    <main>
        <div id="dashboard-painel" class="container" style="position: relative; background: #f8f9fa; height: 580px; max-height: 580px; margin-top: 5px; border-radius: 3px">
            <div class="row">
                <!-- conteudo -->
                <div class="col-12 dashboard-cont" style="width: 100%">
                    <?php $this->load->view("admin/home"); ?>
                </div><!-- fim conteudo -->
            </div>
        </div>
    </main>
</body>