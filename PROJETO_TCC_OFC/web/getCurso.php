<?php
function garantirIDCurso(){
  if(isset($_COOKIE['ID_CURSO-COORD'])){
    header("Location: /index.php"); exit;
  }
}
function garantirAltCurso(){
  if(isset($_GET['id']) && isset($_COOKIE['ID_CURSO-COORD']) && $_GET['id'] != $_COOKIE['ID_CURSO-COORD']){
    header("Location: /index.php"); exit;
  }
}

function garantirCurso(){
  if(isset($_SESSION['usuario']['ID_CURSO']) && $_SESSION['usuario']['ID_CURSO'] != $_GET['id']){
    header("Location: /index.php"); exit;
  }
}
 ?>
