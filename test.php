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