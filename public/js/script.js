$(document).ready(function () {
    var $cep = $("#inputCep");
    var $telefone = $("#inputTelefone");
    var $dataNasc = $("#inputDataNasc");
    $cep.mask('00000000', { reverse: true });
    $telefone.mask('(00)0000-0000', { reverse: true });
    $dataNasc.mask('00/00/0000', { reverse: true });
  });

  function consultaCep() {
    var cep = $('#inputCep').val();
    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/", function (dados) {
      if (!("erro" in dados)) {
        $("#inputEstado").val(dados.uf)
        $("#inputCidade").val(dados.localidade)
      }
    });
  }