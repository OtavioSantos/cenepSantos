<div class="col-12 col-md-3 pb-3">
    <div class="col-sm-12 menu-usuario-lateral">
        <div class="row">
            <div class="d-flex mx-auto text-center img-user">
                <label for="ds_imgUser">
                    <span class="d-flex align-items-center">
                        Clique para alterar Imagem...
                    </span>
                    
                    <img style="border-radius: 100px; width: 100%; height: 135px" class="img-fluid" src="<?= base_url('assets/img/usuario/'.$this->session->user->ds_imgUser) ?>" alt="" style="border-radius: 100%">
                </label>
            </div>
            
            <div class="col-sm-12 px-0 mt-2">
                <a href="<?= base_url('Usuario/painel-do-usuario') ?>" class="list-group-item text-white text-center bg-success"><strong>Painel do Usuário</strong></a>
                
                <div class="list-group">
                    <a href="<?= base_url('Usuario/painel-do-usuario') ?>" class="list-group-item">Alterar Dados</a>
                    <a href="<?= base_url('Usuario/cursos-inscritos') ?>" class="list-group-item">Cursos Inscritos</a>
                    <a href="<?= base_url('Usuario/logoff') ?>" class="list-group-item">Sair</a>
                </div>
            </div>
        </div>
    </div>
</div>