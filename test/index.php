<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <title>Modal com PHP e Auto Completar</title>
</head>
<body>



<?php require_once "../template/sidebar.php" ?>

<?php require_once "../template/header.php" ?>

<!-- Botão para abrir o modal -->
<button type="button" id="openModalBtn" class="btn btn-primary">Abrir Modal</button>

<!-- O modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nomes do Banco de Dados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <!-- Campo de pesquisa com autocompletar -->
        <label for="searchInput" class="form-label">Pesquisar:</label>
        <input type="text" id="searchInput" class="form-control" placeholder="Digite para pesquisar...">
        <ul id="databaseNamesList" class="list-group mt-2">
          <!-- Lista de nomes do banco de dados será exibida aqui -->
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Input onde o nome selecionado será enviado -->
<input type="text" id="selectedNameInput" class="form-control mt-3" placeholder="Nome selecionado" readonly>

<script src="script.js"></script>

<?php require_once "../template/footer.php"; ?>
</body>
</html>
