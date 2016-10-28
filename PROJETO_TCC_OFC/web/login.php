<?php
session_start();
if(usuarioEstaLogado()){
  header("Location: index.php"); exit;
}

function usuarioEstaLogado(){
    return !empty($_SESSION['usuario']);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FATEC Zona Leste - Sistema Gerenciador</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrap">
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button><a class="navbar-brand" href="/index.php">FATEC Zona Leste - Sistema Gerenciador</a></div><div id="w0-collapse" class="collapse navbar-collapse"><ul id="w1" class="navbar-nav navbar-right nav">
</ul></li></ul></div></div></nav>
    <div class="container">
      <div class="site-index">
        <div class="page-header">
          <h1>Login</h1>
          <form action="validacao.php" method="post">
            <div <?php if(isset($_GET['err']) || isset($_GET['no'])){
              echo "class='form-group has-error'";
            } else{
                echo 'class="form-group"';
            }?>

            >
              <label class="control-label">Usuário</label>
              <input type="text" name="usuario" maxlength="25" class="form-control" <?php if(isset($_GET['user'])){echo "value='".$_GET['user']."'";} ?>/>
              <?php if(isset($_GET['err'])){
                echo "<p class='control-label'>Usuário ou senha inválidos</p>";
              } else if(isset($_GET['no'])){
                echo "<p class='control-label'>Usuário inexistente</p>";
              }

              ?>
            </div>
            <div <?php if(isset($_GET['err'])){
              echo "class='form-group has-error'";
            } else{
                echo 'class="form-group"';
            }?>

            >
              <label class="control-label">Senha</label>

              <input type="password" name="senha" maxlength="25" class="form-control"/>
              <?php if(isset($_GET['err'])){
                    echo "<p class='control-label'>Digite sua senha</p>";
              }?>
            </div>
              <input type="submit" class="btn btn-primary" value="Entrar" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; FATEC Zona Leste <?php echo date('Y');?></p>
    </div>
  </footer>
  </body>
</html>
