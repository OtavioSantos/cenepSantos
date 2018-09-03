    <script src="<?= base_url('assets/js/usuario.js') ?>"></script>
    
    <title>Recuperar Senha</title>
</head>

    <!-- MENU -->
    <?php $this->load->view('inset/nav') ?>

    <div class="container p-4 my-5">
        <div class="row justify-content-center">
            <div class="col-sm-4 p-2" style="border: 1px solid #cfcfcf; border-radius: 5px">
                <h1 class="container-titulo h6">Recuperar Senha</h1>
                
                <form>
                    <div class="form-group">
                        <label for="cd_senhaUser">Nova Senha:</label>
                        <input type="password" id="cd_senhaUser" name="cd_senhaUser" class="form-control" placeholder="********">
                        <small>Digite entre 8 à 15 dígitos</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="senha_confirm">Confirmar Senha:</label>
                        <input type="password" id="senha_confirm" name="senha_confirm" class="form-control" placeholder="********">
                        <small>Digite novamente sua nova senha</small>
                    </div>
                    
                    <div class="text-center">
                        <button class="btn btn-success btn-alterar-senha">ALTERAR SENHA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>