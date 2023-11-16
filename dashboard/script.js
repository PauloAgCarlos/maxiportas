// $(document).ready(function() {
//     $('#quantity').on('input', function() {
//         var quantity = $(this).val();

//         $.ajax({
//             type: 'POST',
//             url: 'verificar_estoque.php',
//             data: { quantity: quantity },
//             success: function(response) {
//                 $('#result').html(response);
//             }
//         });
//     });
// });

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


// $(document).ready(function() {
//     $('#quantityForm').submit(function(e) {
//         e.preventDefault();

//         var quantity = $('#quantity').val();

//         $.ajax({
//             type: 'POST',
//             url: 'verificar_estoque.php',
//             data: { quantity: quantity },
//             success: function(response) {
//                 $('#result').html(response);
//             }
//         });
//     });
// });
