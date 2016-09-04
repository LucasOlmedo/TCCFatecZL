<?php

	// Script que pega os dias semana de acordo com os dados passados
	// Dados: Periodo - Curso - Turno ou Professor

	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

	/* Teste para ver se a conexao ta funcionando

		foreach($con->query('SELECT * FROM AULASEMESTRAL') as $row){
			echo json_encode($row) . '</br>';		
		}
	*/	

	if(isset($_GET['professor'])){

		$psmt = $con->prepare('SELECT professor.nome, disciplina.abreviacao, DIASEMANA.horario_inicio, DIASEMANA.horario_fim, DIASEMANA.id_DiaSemana, CURSO.nome_curso, DIASEMANA.id_periodo  FROM DIASEMANA INNER JOIN Professor ON DIASEMANA.id_professor = Professor.id_Professor INNER JOIN Disciplina ON DIASEMANA.id_Disciplina = Disciplina.id_Disciplina INNER JOIN CURSO ON DIASEMANA.id_curso = CURSO.id_curso WHERE DIASEMANA.id_professor = ? ');
		$psmt->bindParam(1 , $_GET['professor']);
		if($psmt->execute()){
			while($rs = $psmt->fetch()){
				echo json_encode($rs) . ',';
			}
		}
		$psmt = null;
	}
	else{

		$psmt = $con->prepare('SELECT professor.nome, disciplina.abreviacao, DIASEMANA.horario_inicio, DIASEMANA.horario_fim, DIASEMANA.id_DiaSemana FROM DIASEMANA INNER JOIN Professor ON DIASEMANA.id_professor = Professor.id_Professor INNER JOIN Disciplina ON DIASEMANA.id_Disciplina = Disciplina.id_Disciplina WHERE DIASEMANA.id_periodo = ? AND DIASEMANA.id_curso = ? AND DIASEMANA.turno = ?');
		$psmt->bindParam(1, $_GET['periodo']);
		$psmt->bindParam(2, $_GET['curso']);

		$psmt->bindParam(3, $_GET['turno']);

		if($psmt->execute()){
			while($rs = $psmt->fetch()){
				echo json_encode($rs) . ',';
			}
		}

		$psmt = null;
	}
	
	$con = null;




?>