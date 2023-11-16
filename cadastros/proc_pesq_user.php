<?php

//Incluir a conexão com banco de dados
/*$DBHOST = 'localhost';
$DBNAME = 'hjalum89_Maxi';
$DBUSER = 'hjalum89_maxi';
$DBPASS = 'HjAluminio123';*/
$servidor = "localhost";
$usuario = "hjalum89_maxi";
$senha = "HjAluminio123";
$dbname = "hjalum89_Maxi";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM clientes WHERE nome LIKE '%$usuarios%' LIMIT 20";
$resultado_user = mysqli_query($conn, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){
		echo "<li>".$row_user['nome']."</li>";
	}
}else{
	echo "Nenhum usuário encontrado ...";
}

/*$usuarios = $_POST['pesquisa'];
var_dump($_POST['pesquisa']);
die();
require_once "../config.php";
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

$usuarios = filter_input(INPUT_POST, 'pesquisa', FILTER_SANITIZE_STRING);
//$usuarios = $_POST['pesquisa'];

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM clientes WHERE cnpj LIKE '%$usuarios%' LIMIT 20";
$resultado_user = mysqli_query($conn, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){
		var_dump($_POST['pesquisa']);
		//echo "<li><a href=''>".$row_user['cnpj']."</a></li>";
	}
}else{
	echo "Nenhum usuário encontrado ...";
}*/