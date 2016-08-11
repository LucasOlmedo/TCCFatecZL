<?php 
	// Script que pega as turmas e os professores

	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

	foreach($con->query('SELECT nome FROM PROFESSOR') as $row) {
 		echo json_encode($row);
	}

	foreach($con->query('SELECT DISTINCT CURSO.nome_curso, AULASEMESTRAL.turno, AULASEMESTRAL.id_periodo FROM AULASEMESTRAL INNER JOIN CURSO ON AULASEMESTRAL.ID_CURSO = CURSO.ID_CURSO ') as $row){
		echo json_encode($row);
	}

	$con = null;

?>