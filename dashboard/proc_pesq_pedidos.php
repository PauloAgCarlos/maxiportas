<?php

$servidor = "localhost";
$usuario = "hjalum89_maxi";
$senha = "HjAluminio123";
$dbname = "hjalum89_Maxi";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM tbl_ordem_producao WHERE cliente LIKE '%$usuarios%' OR produto LIKE '%$usuarios%' LIMIT 20";
$resultado_user = mysqli_query($conn, $result_user);
?>

<div class="table-responsive">   
                  
                
                  <div style="margin: 5px; display: flex; align-items: center; justify-content: space-between;">
                      <button style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; height: 40px; padding: 0px 16px;"><a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Novo</a></button>                   

                      <div>    
                          <form action="pdf_dashboard.php" method="post" target="_blank" id="resultFormPedidos">
                              <input type="hidden" id="selectedIdsPedidos" name="selectedIdsPedidos">
                              <div class="btn-group">
                                  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 0 5px 16px;">
                                    <a style="color: #1d1d1d; font-size: 0.9em;"  style="text-decoration: none;"  href="#" role="button" aria-expanded="false">Imprimir <img src="../assets/img/icons8-ordem-descendente-24.png" width="16px" alt=""></a>
                                  </button>
                                  <ul class="dropdown-menu">
                                      <li> 
                                          <button class="dropdown-item" type="submit" name="btn_submit" value="Ficha de Corte">Ficha de Corte (Vidro)</button>
                                      </li>
                                      <li>
                                          <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético - Cliente">Sintético - Cliente</button>
                                      </li>
                                      <li>
                                          <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético 3 - Cliente">Sintético 3 - Cliente</button>
                                      </li>
                                      <li>
                                          <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético 3 - Sem Valor">Sintético 3 - Sem Valor</button>
                                      </li>
                                      <li style="width: 100%;"><hr class="dropdown-divider" style="color: black; padding: 1px;"></li>
                                      <li>
                                          <button class="dropdown-item" type="submit" name="btn_submit" value="Relátorio de Vendas (OP)">Relátorio de Vendas (OP)</button>
                                      </li>
                                      <li>
                                          <button class="dropdown-item" type="submit" name="btn_submit" value="Relátorio para Entrega Por Cliente">Relátorio para Entrega Por Cliente</button>
                                      </li>
                                  </ul>
                              </div>
                          </form>
                      </div>
                    </div>

<table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
	<thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
		<tr class="text-uppercase">
			<th>ID</th>
			<th><input type="checkbox"></th>
			<th>Cliente</th>
			<th>Produto</th>
			<th>Quantidade</th>
			<th>Ver Mais</th>
		</tr>
	</thead>
	<tbody>

	<?php
	if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
		while($row_user = mysqli_fetch_assoc($resultado_user)){ ?>

		<tr>
			<td class="text-center text-end fw-medium">
				<?= $row_user['id']; ?>
			</td>
			<td class="text-center text-end fw-medium">
				<form id="selectFormPedidos">
					<?php
					$items = array(1, 2, 3, 4, 5);
					echo '<input type="checkbox" name="selectedItemsPedidos[]" value="' . $row_user['id'] . '">';
					?>
				</form>
			</td>
			<td class="text-center text-end fw-medium">
				<?= $row_user['cliente']; ?>
			</td>
			<td class="text-center text-end fw-medium">
				<?= $row_user['produto']; ?>
			</td>
			<td class="text-center text-end fw-medium">
				<?= $row_user['qtd']; ?>
			</td>
			<td class="text-center text-nowrap fw-medium" style="display: flex; justify-content: center; align-items: center;">
				<a href="vermais_pedidos.php?view_pedidos=<?php $idCriptografado = base64_encode($row_user['id']); echo $idCriptografado;?>">
					<i class="fa fa-eye me-1 opacity-50"></i>
				</a>
			</td>
			
		</tr>
		</tbody>
		<?php	}
}else{
	echo "Nenhum usuário encontrado ...";
} ?>
    </table>
	
</div>

<script>
			const checkboxesPedidos = document.querySelectorAll("#selectFormPedidos input[type='checkbox']");
			const selectedIdsPedidosInput = document.getElementById("selectedIdsPedidos");

			checkboxesPedidos.forEach((checkbox) => {
				checkbox.addEventListener("change", updateSelectedIdsPedidos);
			});

			function updateSelectedIdsPedidos() {
				const selectedCheckboxesPedidos = Array.from(checkboxesPedidos).filter((checkbox) => checkbox.checked);
				const selectedIdsPedidos = selectedCheckboxesPedidos.map((checkbox) => checkbox.value);

				selectedIdsPedidosInput.value = JSON.stringify(selectedIdsPedidos);
			}
		</script>