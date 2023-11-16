<?php

    $nome_cookie = "TesteCookie";
    $valor_cookie = "ValorCookie";

    $validade_do_cookie = time() + 3600;

    //Envia o cookie
    setcookie($nome_cookie, $validade_do_cookie, $validade_do_cookie, "/");

    echo "Cookie Enviado Com Sucesso";

?>
    <script>
        function getCookie(TesteCookie){
    var value = "; " + document.cookie;
    var split = value.split("; " + TesteCookie + "=");
    if (parts.length == 2) {
        return parts.pop().split(";").shift();

    } 
}

var meuCookie = getCookie("TesteCookie");
if(meuCookie){
    console.log("Valor do cookie:", meuCookie);
}else{
    console.log("Cookie não encontrado");
}
    </script>