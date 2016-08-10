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

		$psmt = $con->prepare('SELECT * FROM DIASEMANA WHERE id_professor = ?');
		$psmt->bindParam(1 , $_GET['professor']);
		if($psmt->execute()){
			while($rs = $psmt->fetch()){
				echo json_encode($rs);
			}
		}

	}
	else{

		$psmt = $con->prepare('SELECT * FROM DIASEMANA WHERE id_periodo = ? AND id_curso = ? AND turno = ?');
		$psmt->bindParam(1, $_GET['periodo']);
		$psmt->bindParam(2, $_GET['curso']);

		$psmt->bindParam(3, $_GET['turno']);

		if($psmt->execute()){
			while($rs = $psmt->fetch()){
				echo json_encode($rs);
			}
		}

	}
	

	





?>