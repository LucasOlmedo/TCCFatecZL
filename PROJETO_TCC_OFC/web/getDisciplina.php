<?php 

if(isset($_GET['idCurso']) && isset($_GET['idPeriodo'])){
	getPeriodos($_GET['idCurso'],$_GET['idPeriodo']);
}

if(isset($_GET['idAula'])){
	getAulas($_GET['idAula']);
}

function getPeriodos($idCurso,$idPeriodo){
	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

	$sql = "SELECT Disciplina.id_Disciplina, nome_Disc FROM GRADE_CURSO INNER JOIN DISCIPLINA ON GRADE_CURSO.id_Disciplina = DISCIPLINA.id_Disciplina WHERE ID_CURSO = ? AND id_Periodo = ?";

	$smtm = $con->prepare($sql);

	$smtm->bindParam(1, $idCurso);
	$smtm->bindParam(2, $idPeriodo);

	if($smtm->execute()){
            while($rs = $smtm->fetch()) {
                echo json_encode($rs);
            }
        }
      	$smtm = null;
     $con = null;
}

function getAulas($idAula){
	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

	$sql = "SELECT id_Disciplina FROM AULASEMESTRAL WHERE ID = ?";

	$smtm = $con->prepare($sql);

	$smtm->bindParam(1, $idAula);

	if($smtm->execute()){
            while($rs = $smtm->fetch()) {
                echo json_encode($rs);
            }
        }
      	$smtm = null;
     $con = null;
}
   

?>

