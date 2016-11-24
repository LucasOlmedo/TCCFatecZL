<?php
	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Grade Horária - FATEC Zona Leste</title>
	<script src="scripts/arqSelects.js"></script>
	<link rel="stylesheet" href="scripts/bootstrap.min.css">
	<link rel="stylesheet" href="scripts/style.css">
	<link rel="shortcut icon" href="/images/favicon3.png" type="image/x-icon" />
	<meta charset="utf-8">
</head>
<body>
<div class="container">
	<header>
		<h1>Grade Horária - Fatec Zona Leste</h1>
	</header>
	<nav>
		<select id="select-curso">
			<option value="0">Escolha uma turma</option>
			<?php
				foreach($con->query('SELECT DISTINCT AULASEMESTRAL.id_curso, CURSO.nome_curso, AULASEMESTRAL.turno, AULASEMESTRAL.id_periodo FROM AULASEMESTRAL INNER JOIN CURSO ON AULASEMESTRAL.ID_CURSO = CURSO.ID_CURSO ') as $row){
					$turn = '';
					switch($row['turno']){
						case 0: $turn = 'Manhã'; break;
						case 1: $turn = 'Tarde'; break;
						case 2: $turn = 'Noite'; break;
					}
					echo '<option value=' . $row['id_curso'] . '-' . $row['id_periodo'] . '-' . $row['turno'] .'>' . $row['id_periodo'] . 'º ' . $row['nome_curso'] . ' ' . $turn . '</option>';
				}
			 ?>
		</select>

		-
		<select id="select-professor">
			<option value="0">Escolha um professor</option>
			<?php
				foreach($con->query('SELECT nome, id_professor FROM PROFESSOR') as $row) {
	 				echo '<option value="' . $row['id_professor'] .'">' . $row['nome'] . '</option>';
				}

				$con = null;
			?>
		</select>
	</nav>

	<p id='p'></p>
	<section>
		<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<h3 id=text-grade></h3>
			</thead>
			<tbody>
				<tr class="horarios info">
					<td></td>
					<td>7:30 - 8:20</td>
					<td>8:20 - 9:10</td>
					<td>9:20 - 10:10</td>
					<td>10:10 - 11:00</td>
					<td>11:10 - 12:00</td>
					<td>12:00 - 12:50</td>
					<td>13:00 - 14:40</td>
					<td>14:50 - 16:30</td>
					<td>16:40 - 18:20</td>
					<td>19:20 - 21:00</td>
					<td>21:10 - 22:50</td>
				</tr>
				<tr class="seg">
					<td class="dia">Seg</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="ter">
					<td class="dia">Ter</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="qua">
					<td class="dia">Qua</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="qui">
					<td class="dia">Qui</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="sex">
					<td class="dia">Sex</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="sab">
					<td class="dia">Sab</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	</section>
</div>
</body>
</html>
