<?php
    session_start();
    require_once "conexao-bd.php";
    // ob_start();
    // session_destroy();
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    $email = $_SESSION['email'];
    $selecinarUserLogado = $conn->prepare("SELECT * FROM logado WHERE email = :email");
    $selecinarUserLogado->bindValue(':email', $email);
    $selecinarUserLogado->execute();
    $row = $selecinarUserLogado->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User <?php echo $row['nome']; ?></h1>
    <button><a href="logout.php">Logout</a></button>
</body>
</html>