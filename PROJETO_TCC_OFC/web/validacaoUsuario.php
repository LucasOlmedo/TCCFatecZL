<?php
session_start();
setcookie('ID_CURSO-COORD',$_SESSION['usuario']['ID_CURSO']);
if(!usuarioEstaLogado()){
    header("Location: /login.php"); exit;
}

function usuarioEstaLogado(){
    return !empty($_SESSION['usuario']);
}
?>
