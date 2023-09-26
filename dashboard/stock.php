<?php

$host = "localhost";
$user = "root";
$password = "";
$bd_name = "maxportas";
try
{
    $conn = new PDO("mysql:host=$host;dbname=" . $bd_name, $user, $password);
}
catch(PDOException $error)
{
    die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
}

//produtos
$stock_seguranca = 10;
$result_produtos = $conn->prepare("SELECT * FROM produtos");
$result_produtos->bindParam(1, $stock_seguranca);
$result_produtos->execute();
$row_produtos = $result_produtos->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($row_produtos); $i++){
    echo "<pre>";
    echo ($row_produtos[$i]["quantidade_stock"]); 
}
die();

// // $array_meu = [2, 3, 5, 6];
// // echo count($row_produtos); die();
// if(count($row_produtos) > 0)
// {

//     if($row_produtos[0]['quantidade_stock'] <= 5)
//     {
//         foreach($row_produtos as $ro)
//         {
//             echo "<p style='color: #f00;'> O Produto: ". $ro['descricao_do_produto'] . " - esta com Stock minimo de " . $ro['quantidade_stock'] . " Quantidade(s)<br></p>";
//         }
//     }else{
//         echo "Vasio";
//     }
// }else{
//     echo "Sem Stock minimo";
// }
//     // Array bidimensional de exemplo
$bidimensionalArray = array(
    array('Teste' => 'A', 'B', 'C'),
    array('D', 'E', 'F'),
    array('G', 'H', 'I')
);
echo "<pre>";   
print_r($bidimensionalArray);
// die();
// Inicialize um novo array unidimensional
$unidimensionalArray = array();

// Percorra o array bidimensional
foreach ($bidimensionalArray as $row) {
    foreach ($row as $key => $value) {
        // Adicione cada valor ao novo array unidimensional
        $unidimensionalArray[][] = $key . $value;
    }
}

// O novo array unidimensional conterá todos os valores do array bidimensional
// echo "<pre>";   
// print_r($unidimensionalArray);

foreach($unidimensionalArray as $key => $ro)
{
    echo $key . $ro . "<br>";
    echo "<hr>";
}
die();

//         //Começa AQui        
//         $host = "localhost";
//         $user = "root";
//         $password = "";
//         $bd_name = "maxportas";
//         try
//         {
//             $conn = new PDO("mysql:host=$host;dbname=" . $bd_name, $user, $password);
//         }
//         catch(PDOException $error)
//         {
//             die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
//         }

//         //produtos
//         $result_produtos = $conn->prepare("SELECT descricao_do_produto, quantidade_stock FROM produtos ORDER BY id DESC");
//         $result_produtos->execute();
//         $row_produtos = $result_produtos->fetchAll(PDO::FETCH_ASSOC);

//         $array_unido = array();
//             $keys = array();
//             foreach($row_produtos as $key => $arr) {
//                 $innerKey = array_keys($arr)[0];
//                 if(!isset($keys[$innerKey])) {
//                     $keys[$innerKey] = 0;
//                 }
//                 else {
//                     $keys[$innerKey] += 1;
//                 }
//                 $prefix = $keys[$innerKey];
//                 $array_unido[$prefix. '_' .$innerKey] = $arr[$innerKey];
//             }
//         echo "<pre>";
//         var_dump($array_unido); die();

//         if(in_array($dados["produto_servico"][0], $array_unido))
//         {
//             //Atualizar Stock
//             $qtd_produtos = $conn->prepare("SELECT quantidade_stock FROM produtos WHERE descricao_do_produto = ?");
//             $qtd_produtos->bindParam(1, $dados["produto_servico"][0]);
//             $qtd_produtos->execute();
//             $row_qtd = $qtd_produtos->fetch(PDO::FETCH_ASSOC);

//             if($dados["quantidade_produto_servico"][0] > $row_qtd['quantidade_stock'])
//             {
//                 header('Location: dashboard.php?stock_baixo');
//                 exit;
//             }else 
//             {
//                 $qtd_atualizada = $row_qtd['quantidade_stock'] - $dados["quantidade_produto_servico"][0]; 

//                 //Atualizar Stock da tbl produtos
//                 $atualizar_estoque_produtos = $conn->prepare("UPDATE produtos SET quantidade_stock = ? WHERE descricao_do_produto = ?");
//                 $atualizar_estoque_produtos->bindParam(1, $qtd_atualizada);
//                 $atualizar_estoque_produtos->bindParam(2, $dados["produto_servico"][0]);
//                 $qtd_stock_atualizado = $atualizar_estoque_produtos->execute();

//             }//Last produtos

//             // echo "Exite";
//         } else{
//             echo "Não Existe";
//         }

?>