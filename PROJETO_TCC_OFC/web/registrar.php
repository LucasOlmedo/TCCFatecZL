<?php
	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');
?>
<?php include 'validacaoUsuario.php';
include 'validacaoUsuarioCurso.php';


if(isset($_POST)){
	$erros = verErros();
	if(!$erros){
	  if(isset($_POST['usuario']) && isset($_POST['senha']) && ($_POST['curso'] == "")){
	    $sql = "INSERT INTO USERS(usuario,senha) VALUES (?,?)";
	    $stmt = $con->prepare($sql);
	    $stmt->bindParam(1,$_POST['usuario']);
	    $stmt->bindParam(2,$_POST['senha']);
	    if(!$stmt->execute()){$erros[5] = "O usuário já existe!";}
	  }
	  else if (isset($_POST['usuario']) && isset($_POST['senha']) && $_POST['curso'] != ""){
	    $sql = "INSERT INTO USERS(usuario,senha,id_curso) VALUES (?,?,?)";
	    $stmt = $con->prepare($sql);
	    $stmt->bindParam(1,$_POST['usuario']);
	    $stmt->bindParam(2,$_POST['senha']);
	    $stmt->bindParam(3,$_POST['curso']);
	    if(!$stmt->execute()){$erros[5] = "O usuário já existe!";}
	  }
	}
}

function verErros(){
	$erros = array();
	if(isset($_POST['usuario']) && strlen($_POST['usuario']) == 0){
		$erros[1] = "Digite um nome de usuário";
	}
	if(isset($_POST['senha']) && strlen($_POST['senha']) == 0){
		$erros[2] = "Digite uma senha";
	}
	if(isset($_POST['usuario']) && strlen($_POST['usuario']) > 1 && strlen($_POST['usuario']) < 5){
		$erros[3] = "O usuário deve possuir pelo menos 6 caracteres";
	}
	if(isset($_POST['senha']) && strlen($_POST['senha']) > 1 && strlen($_POST['senha']) < 5){
		$erros[4] = "A senha deve possuir pelo menos 6 caracteres";
	}
	return $erros;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inserir novo Usuário</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/site.css" rel="stylesheet">
  </head>
  <body>
		<div class="wrap">
			<nav id="w1" class="navbar-inverse navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w1-collapse"><span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span></button><a class="navbar-brand" href="/index.php">FATEC Zona Leste - Sistema Gerenciador</a></div><div id="w1-collapse" class="collapse navbar-collapse"><ul id="w1" class="navbar-nav navbar-right nav"><li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul><ul id="w2" class="navbar-nav navbar-right nav"><li><a href="/index.php?r=site%2Findex"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Cadastros <b class="caret"></b></a><ul id="w3" class="dropdown-menu"><li><a href="index.php?r=curso/index" tabindex="-1">Cursos</a></li>
	<li class="divider"></li>
	<li><a href="index.php?r=periodo/index" tabindex="-1">Períodos</a></li>
	<li class="divider"></li>
	<li><a href="index.php?r=disciplina/index" tabindex="-1">Disciplinas</a></li>
	<li class="divider"></li>
	<li><a href="index.php?r=professor/index" tabindex="-1">Professores</a></li>
	<li class="divider"></li>
	<li><a href="index.php?r=situacao/index" tabindex="-1">Situação</a></li>
	<li class="divider"></li>
	<li><a href="index.php?r=horarios-externos/index" tabindex="-1">Horarios</a></li>
	<li class="divider"></li>
	<li><a href="index.php?r=aula-semestral/index" tabindex="-1">Aula Semestral</a></li>
	<li class="divider"></li>
	<li><a href="index.php?r=dia-semana/index" tabindex="-1">Dia da semana</a></li>
	<li class="divider"></li>
	<li><a href="/usuarios.php" tabindex="-1">Usuários</a></li></ul></li></ul></div></div></nav>
    <div class="container">
			<ul class="breadcrumb"><li><a href="/index.php">Home</a></li>
				<li><a href="/usuarios.php">Usuários</a></li>
				<li class="active">Inserir novo Usuário</li>
			</ul>
					<h1>Inserir novo Usuário</h1>
			    	<form method="post">
							<div <?php if(isset($erros) && count($erros) > 0 && (isset($erros[1]) || isset($erros[3]) || isset($erros[5]) )){
	              echo "class='form-group has-error'";
	            } else{
	                echo 'class="form-group"';
	            }?>

	            >
			        	<label class="control-label">Usuário</label>
				        <input type="text" class="form-control" name="usuario" maxlength="25" <?php if(isset($_POST['usuario']) && strlen($_POST['usuario']) > 1){ echo "value='".$_POST['usuario']."'";}  ?>/>
								<?php if(isset($erros[1])){echo "<p class='control-label'>".$erros[1]."</p>";}?>
								<?php if(isset($erros[3])){echo "<p class='control-label'>".$erros[3]."</p>";}?>
								<?php if(isset($erros[5])){echo "<p class='control-label'>".$erros[5]."</p>";}?>
							</div>
							<div <?php if(isset($erros) && count($erros) > 0 && (isset($erros[2]) || isset($erros[4]) )){
								echo "class='form-group has-error'";
							} else{
									echo 'class="form-group"';
							}?>

							>
							  <label class="control-label">Senha</label>
				        <input type="password" class="form-control" name="senha" maxlength="25" <?php if(isset($_POST['senha']) && strlen($_POST['senha']) > 1){ echo "value='".$_POST['senha']."'";}  ?>/>
								<?php if(isset($erros[2])){echo "<p class='control-label'>".$erros[2]."</p>";}?>
								<?php if(isset($erros[4])){echo "<p class='control-label'>".$erros[4]."</p>";}?>
				  		</div>
							<div class="form-group">
								<label class="control-label">Curso</label>
				        <select class="form-control" name="curso">
				          <option value="" <?php if(isset($_POST['curso']) && $_POST['curso'] == ""){ echo " selected "; } ?>>Sem curso</option>
				          <?php foreach($con->query('SELECT ID_CURSO, NOME_CURSO FROM CURSO') as $row){
				            echo "<option value='".$row['ID_CURSO']."' ";
										if(isset($_POST['curso']) && $_POST['curso'] == $row['ID_CURSO']){ echo " selected "; }
										echo ">".$row['NOME_CURSO']."</option>";
				          }
									$con = null;
				          ?>
				        </select>
							</div>
							<div class="form-group">
			        	<button class="btn btn-primary" type="submit"> <span class="glyphicon glyphicon-ok"> </span> Salvar</button>
							</div>
			    </form>
		</div>
	</div>
		<footer class="footer">
			<div class="container">
					<p class="pull-left">&copy; FATEC Zona Leste <?php echo date('Y');?></p>
			</div>
		</footer>
		<script src="js/newJQuery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="toolbar.js"></script>
  </body>
</html>
