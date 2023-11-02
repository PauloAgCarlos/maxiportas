<?php
session_start();
require_once "../config.php";
$conection_bd = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$resul = $conection_bd->query("SELECT * FROM clientes WHERE id = $id");
	$row_image = $resul->fetch_array();
	$delete = $conection_bd->query("DELETE FROM clientes WHERE id='$id'");

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:red;'>O usuário " .$row_image['nome_razao_socil'] . " foi apagado com sucesso.</p>";
		header("Location: visualizar_clientes.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso.</p>";
		header("Location: visualizar_clientes.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: visualizar_clientes.php");
}
