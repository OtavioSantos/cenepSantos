<!-- campo de pesquisa -->
<div class="col-md-6 pt-2">
    
    <label for="search_user">Pesquisar Curso:</label>
    <div class="input-group">
        <input type="search" name="search_user" id="search_user" class="form-control" placeholder="Digite o nome ou o código...">
    
        <div class="input-group-prepend">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
    </div>
    
</div><!-- fim campo de pesquisa -->

<div class="col-md-12 py-3" style="height: auto; max-height: 450px; overflow: auto; border-bottom: 1px solid #f2f2f2">
    <table class="table table-striped user-list">
        <thead class="text-light">
            <tr class="bg-primary">
                <th>CÓD:</th>
                <th>NOTÍCIA:</th>
                <th>DATA DE POSTAGEM</th>
                <th>ACESSOS</th>
                <th>DESTAQUE</th>
            </tr>
        </thead>
        
        <tbody>
            
        </tbody>
    </table>
</div>

<div class="col-md-12 py-3">
    <button class="btn btn-primary">Ver Dados <i class="fa fa-pencil"></i></button>
    <button class="btn btn-danger">Remover Usuário <i class="fa fa-close"></i></button>
    <button class="btn btn-success">Novo Curso <i class="fa fa-plus"></i></button>
</div>