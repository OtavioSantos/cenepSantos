<!-- campo de pesquisa -->
<div class="col-md-6 pt-2">
    
    <label for="search_user">Pesquisar usuário:</label>
    <div class="input-group">
        <input type="search" name="search_user" id="search_user" class="form-control" placeholder="Digite o nome ou o código...">
    
        <div class="input-group-prepend">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
    </div>
    
</div><!-- fim campo de pesquisa -->

<div class="col-md-12 py-3" style="max-height: 450px; overflow: auto; border-bottom: 1px solid #f2f2f2">
    <div class="config-message p-3 mb-2 bg-info text-white">
        <?= $this->session->flashdata("msg-remove") ?>
    </div>
    
    <table class="table table-striped tbl-list" style="height: auto">
        <thead class="text-light">
            <tr class="bg-primary">
                <th>Sel.</th>
                <th>CÓD:</th>
                <th>NOME:</th>
                <th>N.ACESSO:</th>
                <th>E-MAIL:</th>
                <th>TEL:</th>
                <th>CEL:</th>
            </tr>
        </thead>
        
        <tbody>
            
        </tbody>
    </table>
</div>

<div class="col-md-12 py-3">
    <button class="btn btn-success add-user">Adicionar Usuário <i class="fa fa-plus"></i></button>
    <button class="btn btn-primary cursos-inscritos">Cursos Requeridos <i class="fa fa-book"></i></button>
    <button class="btn btn-danger remover-item" item="user">Remover Usuário <i class="fa fa-close"></i></button>
</div>