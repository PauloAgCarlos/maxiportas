<?php

    $array = ['Um', 'Dois', 'Tres'];

    echo "<pre>";
    print_r($array);
    echo "<br>";

    if(in_array('Um',$array))
    {
        echo "Existe";
    }
    else
    {
        echo "Não Existe";
    }

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