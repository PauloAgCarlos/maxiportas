<?php

$servidor = "localhost";
$usuario = "hjalum89_maxi";
$senha = "HjAluminio123";
$dbname = "hjalum89_Maxi";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM tipo_do_item_agregar WHERE descricao LIKE '%$usuarios%' OR codigo_produto LIKE '%$usuarios%' LIMIT 20";
$resultado_user = mysqli_query($conn, $result_user);
?>

<table class="table table-striped table-hover table-borderless table-vcenter fs-sm resultado">
	<thead style="text-align: center;">
		<tr class="text-uppercase">
			<th>Código Produto</th>
			<th>Descrição</th>
			<th>Ver Mais</th>
		</tr>
	</thead>
	<tbody style="text-align: center;">

<?php
if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){ ?>

		<tr>
			<td>
				<span class="fw-semibold"><?php echo $row_user['codigo_produto']; ?></span>
			</td>
			<td>
			<span class="fs-sm text-muted"><?php echo $row_user['descricao'];?></span>
			</td>
			<td class="text-center text-nowrap fw-medium" style="display: flex; justify-content: center; align-items: center;">
			<a href="./atualizar_tipo_do_item_agregar.php?atualizar_agregar=<?php $idCriptografado = base64_encode($row_user['id']); echo $idCriptografado;?>">
				<i class="fa fa-pencil-alt me-1 opacity-100"></i>
			</a>

			<?php
				echo "<button class='btn' onclick='abrirModal(".$row_user['id'].")'><i class='fa fa-fw fa-times text-danger'></i></button>";
			?>
			</td>
		</tr>
		</tbody>
                  </table>
<?php	}
}else{
	echo "Nenhum usuário encontrado ...";
}