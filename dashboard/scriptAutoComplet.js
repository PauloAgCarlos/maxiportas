// Referências aos elementos do DOM
var openModalBtn = document.getElementById('openModalBtn');
var searchInput = document.getElementById('searchInput');
var databaseNamesList = document.getElementById('databaseNamesList');
var selectedNameInput = document.getElementById('selectedNameInput');

// Adicionar um ouvinte de eventos ao botão para abrir o modal
openModalBtn.addEventListener('click', function() {
  fetchDataS(); // Chama a função para buscar dados do banco de dados ao abrir o modal
});

// Adicionar um ouvinte de eventos ao campo de pesquisa
searchInput.addEventListener('input', function() {
  var searchTerm = searchInput.value.toLowerCase();
  autoComplete(searchTerm);
});

// Função para buscar dados do banco de dados usando AJAX
function fetchDataS() {
  $.ajax({
    url: 'getData.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      // Limpar a lista antes de adicionar os novos itens
      databaseNamesList.innerHTML = '';

      // Adicionar nomes do banco de dados à lista
      data.forEach(function(name) {
        var listItem = document.createElement('li');
        listItem.textContent = name;
        listItem.classList.add('list-group-item');
        
        // Adicionar um ouvinte de evento para selecionar o nome
        listItem.addEventListener('click', function() {
          selectName(name);
        });

        databaseNamesList.appendChild(listItem);
      });

      // Exibir o modal
      $('#myModal').modal('show');
    },
    error: function(error) {
      console.error('Erro ao buscar dados:', error);
    }
  });
}

// Função para auto completar com base nos resultados da busca
function autoComplete(searchTerm) {
  $.ajax({
    url: 'getData.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      var filteredResults = data.filter(function(item) {
        return item.toLowerCase().includes(searchTerm);
      });

      databaseNamesList.innerHTML = '';

      filteredResults.forEach(function(item) {
        var listItem = document.createElement('li');
        listItem.textContent = item;
        listItem.classList.add('list-group-item');
        
        // Adicionar um ouvinte de evento para selecionar o nome
        listItem.addEventListener('click', function() {
          selectName(item);
        });

        databaseNamesList.appendChild(listItem);
      });
    },
    error: function(error) {
      console.error('Erro ao buscar dados:', error);
    }
  });
}

// Função para selecionar o nome e fechar o modal
function selectName(name) {
  selectedNameInput.value = name;
  $('#myModal').modal('hide');
}
