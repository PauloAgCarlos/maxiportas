function getCookie(TesteCookie){
    var value = "; " + document.cookie;
    var split = value.split("; " + TesteCookie + "=");
    if (parts.length == 2) {
        return parts.pop().split(";").shift();

    } 
}

var meuCookie = getCookie("nomeDoCookie");
if(meuCookie){
    console.log("Valor do cookie:", meuCookie);
}else{
    console.log("Cookie não encontrado");
}