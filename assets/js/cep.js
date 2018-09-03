function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                $('.form-row[nivel=1] input, .form-row[nivel=1] select, .form-row[nivel=1] .btnNivel').removeAttr("disabled");

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#ds_ruaUser").val(dados.logradouro);
                    $("#ds_bairroUser").val(dados.bairro);
                    $("#ds_cidUser").val(dados.localidade);
                    $("#ds_estUser").val(dados.uf);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    $("#num_cepUser").val(valor);
                }
                
                $('.form-row[nivel=1] input, .form-row[nivel=1] select').removeAttr("style");
            });

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    $("#num_cepUser").val("").removeAttr("style");
    $("#ds_ruaUser").val("").removeAttr("style");
    $("#ds_bairroUser").val("").removeAttr("style");
    $("#cd_cipUser").val("").removeAttr("style");
    $("#ds_estUser").val("").removeAttr("style");
    $("#ds_cidUser").val("").removeAttr("style");
}