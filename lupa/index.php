<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css" crossorigin="anonymous">
    <!-- Bootstrap Bundle com Popper.js -->
    <script src="cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-vSZAnhjrpq8y8vBgjyOqBouaeE/RsKvXmhSkaV+cbzU4Jw9/6zA5BkSkKpNIzjN" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css"> -->
    <title>Document</title>
</head>
<body>
    
    <input type="text" id="seu_input" class="form-control" placeholder="Dado Selecionado" readonly>

    <button type="button" id="seuBotao" class="btn btn-primary" onclick="abrirModal(2)" data-toggle="modal" data-target="#myModal">
        Abrir Modal
      </button> 
      
      
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecione um dado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Aqui você vai exibir os dados do banco de dados -->
        <ul>
          <?php
          // Conecte-se ao banco de dados e busque os dados
          // Substitua com sua lógica de conexão e consulta ao banco de dados
          $conn = new mysqli('localhost', 'root', '', 'maxportas');
          $query = 'SELECT * FROM perfil';
          $result = $conn->query($query);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<li data-bs-dismiss="modal"><a href="#" class="select-data" data-id="' . $row['id'] . '">' . $row['descricao'] . '</a></li>';
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle com Popper.js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-y3a3r1I2aZc3S3ZSjUM5e8ZXgmcMj8F+8tzoLY7uJ70/2GsXiDKT2pXdJ9+9eDJ" crossorigin="anonymous"></script> -->
<!-- <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0-alpha1_dist_js_bootstrap.bundle.min.js"></script> -->

<script>
    let idProdutoParaExcluir;
    function abrirModal(idProduto) {
        idProdutoParaExcluir = idProduto;
        const modal = new bootstrap.Modal(document.getElementById('myModal'), {});
        modal.show();
    }

// Start
    // Função para lidar com o clique no botão
    // function handleButtonClick(id) {
    //   // Redirecionar para a URL com o ID
    //   window.location.href = 'index.php?id=' + id;
    // }

    // // Exemplo de uso: associar essa função a um botão
    // var idDoSeuDado = 123; // Substitua pelo ID real que você quer enviar
    // var seuBotao = document.getElementById('seuBotao'); // Substitua pelo seu elemento real
    // seuBotao.addEventListener('click', function() {
    //   handleButtonClick(idDoSeuDado);
    // });
// Last

    document.querySelectorAll('.select-data').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();
        const selectedData = item.innerText;
        const input = document.getElementById('seu_input');
        input.value = selectedData;
        $('#myModal').modal('hide');
        });
    });

    //   document.getElementById('btnConfirmarExclusao').addEventListener('click', function() {
    //       window.location.href = `eliminar_perfil.php?id=${idProdutoParaExcluir}`;
    //   });
    </script>
<!-- <script>
  document.querySelectorAll('.select-data').forEach(item => {
    item.addEventListener('click', event => {
      event.preventDefault();
      const selectedData = item.innerText;
      const input = document.getElementById('seu_input');
      input.value = selectedData;
      $('#myModal').modal('hide');
    });
  });
</script> -->
</body>
</html>
