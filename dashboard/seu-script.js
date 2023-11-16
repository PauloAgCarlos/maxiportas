// Quando o botão "Selecionar" no modal é clicado
document.getElementById('selecionarBtn').addEventListener('click', function() {
    // Obtenha o valor selecionado no select
    var select = document.getElementById('selectValor');
    var valorSelecionado = select.options[select.selectedIndex].text;

    // Defina o valor selecionado no campo de input
    document.getElementById('valorSelecionado').value = valorSelecionado;

    // Obtenha o ID do valor selecionado e envie para a URL
    var idValorSelecionado = select.value;
    window.location.href = window.location.href + '?id=' + idValorSelecionado;

    // Feche o modal
    $('#myModal').modal('hide');
});
