<?php
    header("Location: /login.php");
    session_destroy();
    if(isset($_COOKIE)){
      foreach($_COOKIE as $key=>$ck){
        setcookie($key, $ck, time()-3600); //seta o cookie com vencimento no passado, invalidando-o
      }
    }
    exit;

?>
