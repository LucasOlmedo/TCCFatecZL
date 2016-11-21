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

		$psmt = $con->prepare('SELECT professor.nome, disciplina.abreviacao, DIASEMANA.horario_inicio, DIASEMANA.horario_fim, DIASEMANA.dia_semana, CURSO.abreviacao as nome_curso, AULASEMESTRAL.id_periodo  FROM DIASEMANA INNER JOIN AULASEMESTRAL ON DIASEMANA.id_aulasemestral = AULASEMESTRAL.id  INNER JOIN Professor ON AULASEMESTRAL.id_professor = Professor.id_Professor INNER JOIN Disciplina ON AULASEMESTRAL.id_Disciplina = Disciplina.id_Disciplina INNER JOIN CURSO ON AULASEMESTRAL.id_curso = CURSO.id_curso WHERE Professor.id_professor = ?  AND Disciplina.EXTERNO = 0');
		$psmt->bindParam(1 , $_GET['professor']);
		if($psmt->execute()){
			while($rs = $psmt->fetch()){
				echo json_encode($rs) . ',';
			}
		}
		$psmt = null;
	}
	else{

		$psmt = $con->prepare('SELECT professor.nome, disciplina.abreviacao, DIASEMANA.horario_inicio, DIASEMANA.horario_fim, DIASEMANA.dia_semana FROM DIASEMANA INNER JOIN AULASEMESTRAL ON DIASEMANA.id_aulasemestral = AULASEMESTRAL.id INNER JOIN Professor ON AULASEMESTRAL.id_professor = Professor.id_Professor INNER JOIN Disciplina ON AULASEMESTRAL.id_Disciplina = Disciplina.id_Disciplina WHERE AULASEMESTRAL.id_periodo = ? AND AULASEMESTRAL.id_curso = ? AND AULASEMESTRAL.turno = ? AND Disciplina.EXTERNO = 0');
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
