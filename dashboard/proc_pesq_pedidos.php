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

<table class="table table-striped table-hover table-borderless table-vcenter fs-sm resultado">
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
    </table>
<?php	}
}else{
	echo "Nenhum usuário encontrado ...";
}