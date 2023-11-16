<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css" crossorigin="anonymous">
    <!-- Bootstrap Bundle com Popper.js -->
    <script src="cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<input type="text" id="seuInput" placeholder="Selecione um dado" readonly>
<img id="imagemSelecionada" src="" alt="Imagem Selecionada" width="100">

<button type="button" class="btn btn-primary" onclick="abrirModal(2)" data-toggle="modal" data-target="#myModal">
  Abrir Modal
</button>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecione um Dado</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <!-- Aqui será exibida a lista de dados -->
        <ul id="listaDados"></ul>
      </div>
    </div>
  </div>
</div>
<script src="./code.jquery.com_jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {

    let idProdutoParaExcluir;

    function abrirModal(idProduto) {
        idProdutoParaExcluir = idProduto;
        const modal = new bootstrap.Modal(document.getElementById('myModal'), {});
        modal.show();
    }
    // Função para carregar dados do BD e exibir no modal
    function carregarDados() {
      // Lógica para carregar dados do BD (usando AJAX, por exemplo)
      // ...

      // Simulando dados do banco de dados
      var dados = [
        { id: 1, nome: "Dado 1", imagem: "caminho_imagem_1" },
        { id: 2, nome: "Dado 2", imagem: "caminho_imagem_2" },
        // ... outros dados
      ];

      // Limpa a lista de dados no modal
      $('#listaDados').empty();

      // Adiciona os dados ao modal
      dados.forEach(function(dado) {
        $('#listaDados').append('<li><button onclick="selecionarDado(' + dado.id + ', \'' + dado.nome + '\', \'' + dado.imagem + '\')">' + dado.nome + '</button></li>');
      });
    }

    // Função para selecionar um dado e inseri-lo no input
    function selecionarDado(id, nome, imagem) {
      $('#seuInput').val(nome);  // Insere o nome do dado no input
      $('#imagemSelecionada').attr('src', imagem);  // Exibe a imagem do dado
      $('#myModal').modal('hide');  // Fecha o modal
    }

    // Ao abrir o modal, carrega os dados do BD
    $('#myModal').on('shown.bs.modal', function() {
      carregarDados();
    });
  });
</script>

</body>
</html>