<?php 
	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Grade Horária - FATEC Zona Leste</title>
	<script>
		document.addEventListener("DOMContentLoaded", function(){
			var selectCurso = document.getElementById('select-curso');
		 	var selectProfessor = document.getElementById('select-professor');

		 	selectCurso.addEventListener('change',function(){
		 		if(selectProfessor.selectedIndex != 0){
		 			selectProfessor.selectedIndex = 0;
		 		}
		 	});	

		 	selectProfessor.addEventListener('change',function(){
		 		if(selectCurso.selectedIndex != 0){
		 			selectCurso.selectedIndex = 0;
		 		}
		 	});
	 	});


	</script>

</head>
<body>
	<h1>Grade Horária Fatec Zona Leste</h1>
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
				echo '<option value=' . $row['id_curso'] . '-' . $row['id_periodo'] . '-' . $row['turno'] .'>' . $row['turno'] . 'º ' . $row['nome_curso'] . ' ' . $turn . '</option>';	
			}
		 ?>
	</select>
	<select id="select-professor">
		<option value="0">Escolha um professor</option>
		<?php 
			foreach($con->query('SELECT nome, id_professor FROM PROFESSOR') as $row) {
 				echo '<option value="' . $row['id_professor'] .'">' . $row['nome'] . '</option>';
			}

			$con = null;
		?>
	</select>
</body>
</html>
