<?php

$array = array(
    array('fde432' => 1),
    array('fde1' => 7),
    array('fde3' => 2),
    array('fde1' => 6),
    array('fde3' => 3),
    array('fde2' => 5),
    array('fde1' => 4),
);

$merged = array();
$keys = array();
foreach($array as $key => $arr) {
    $innerKey = array_keys($arr)[0];
    if(!isset($keys[$innerKey])) {
        $keys[$innerKey] = 0;
    }
    else {
        $keys[$innerKey] += 1;
    }
    $prefix = $keys[$innerKey];
    $merged[$prefix. '_' .$innerKey] = $arr[$innerKey];
}
echo '<pre>', print_r($merged), '</pre>';
echo "<hr>";

if(in_array(7, $merged))
{
    echo "E";
}else{
    echo "N";
}
die();


// //array_union()
// $array1 = array("a" => "green", "red", "blue");
// $array2 = array("b" => "brwon", "yellow", "white");
// $array_multidimensional = array($array1, $array2);
// $union = array_merge($array1, $array2);
// echo "<pre>";
// var_dump($array_multidimensional);
// // die();
// // print_r($union);
// if(in_array('green', $array_multidimensional))
// {
//     echo "Existe";
// }else{
//     echo "Não";
// }


//array_intersect()
$array1 = array("a" => "green", "red", "blue");
$array2 = array("b" => "green", "yellow", "red");
$result = array_intersect($array1, $array2);
// $result = array($array1, $array2);
echo "<pre>";
print_r($result);
die();

$records = Array
(
    (0) => Array
        (
            ('uid') => '100',
            ('name') => 'Sandra Shush',
            ('url') => 'urlof100'
        ),

    (1) => Array
        (
            ('uid') => '5465',
            ('name') => 'Stefanie Mcmohn',
            ('url') => 'urlof5465'
        ),

    (2) => Array
        (
            ('uid') => '40489',
            ('name') => 'Michael',
            ('url') => 'urlof40489'
        )
);

function in_multidimensional_array($array, $column_key, $search) { 
    return in_array($search, array_column($array, $column_key)); 
 }
 
 function multidimensional_array_key_exists($array, $column_key) { 
    return in_array($column_key, array_keys(array_shift($array))); 
 }




die();

$userdb = Array
(
    (0) => Array
        (
            ('uid') => '100',
            ('name') => 'Sandra Shush',
            ('url') => 'urlof100'
        ),

    (1) => Array
        (
            ('uid') => '5465',
            ('name') => 'Stefanie Mcmohn',
            ('url') => 'urlof5465'
        ),

    (2) => Array
        (
            ('uid') => '40489',
            ('name') => 'Michael',
            ('url') => 'urlof40489'
        )
);

if(array_search('urlof5465', array_column($userdb, 'url')) !== false) {
    echo 'value is in multidim array';
}
else {
    echo 'value is not in multidim array';
}





// $userdb = Array
// (
//     (0) => Array
//         (
//             ('uid') => '100',
//             ('name') => 'Sandra Shush',
//             ('url') => 'urlof100'
//         ),

//     (1) => Array
//         (
//             ('uid') => '5465',
//             ('name') => 'Stefanie Mcmohn',
//             ('url') => 'urlof5465'
//         ),

//     (2) => Array
//         (
//             ('uid') => '40489',
//             ('name') => 'Michael',
//             ('url') => 'urlof40489'
//         )
// );

// $url_in_array = in_array('urlof5465', array_column($userdb, 'url'));

// if($url_in_array) {
//     echo 'value is in multidim array';
// }
// else {
//     echo 'value is not in multidim array';
// }






    // $array = ['Um', 'Dois', 'Tres'];

    // echo "<pre>";
    // print_r($array);
    // echo "<br>";

    // if(in_array('Um',$array))
    // {
    //     echo "Existe";
    // }
    // else
    // {
    //     echo "Não Existe";
    // }

    // $descricao_pedido = addslashes($_POST['descricao_pedido']);
    // $array_descricao_pedido = [$_POST['descricao_pedido']];
    // echo "<pre>";
    // print_r($array_descricao_pedido);
    // if(in_array('Porta', $array_descricao_pedido))
    // {
    //     echo "Existe Travessas";
    // }
    // else
    // {
    //     echo "Não Existe";
    // }