var controleCampo = 1;
function adicionarCampo() {
    controleCampo++;
    document.getElementById('formulario').insertAdjacentHTML('beforeend', '<div style="margin: auto 1.5em auto 1.2em !important;" id="campo' + controleCampo + '"><div style="display: flex;"><div class="mb-1" style="width: 80%;"> <label class="form-label" for="produto_servico" style="font-size: 0.9em;">Produto</label> <span style="color: red;">*</span><div><input type="text" name="produto_servico[]" placeholder="Produto" class="form-control"></div></div><div class="mb-1 ms-2"><label class="form-label" for="quantidade_produto_servico" style="font-size: 0.9em;">Quantidade</label> <span style="color: red;">*</span><div><input type="text" id="quantity" name="quantidade_produto_servico[]" placeholder="Quantidade" class="form-control"></div></div><div class="mb-1 ms-2" style="margin-top: 30px;"> <div><button type="button" class="form-control" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div></div></div></div>');
    document.getElementById("qnt_campo").value = controleCampo;}
    
    function removerCampo(idCampo){document.getElementById('campo' + idCampo).remove();
}

$(document).ready(function() {
    $('#quantity').on('input', function() {
        var quantity = parseInt($(this).val());
        var maxQuantity = 10; // Defina a quantidade máxima disponível

        if (quantity > maxQuantity) {
            $(this).val(maxQuantity); // Define a quantidade máxima no campo
        }

        $.ajax({
            type: 'POST',
            url: 'verificar_estoque.php',
            data: { quantity: quantity },
            success: function(response) {
                $('#result').html(response);
            }
        });
    });
});