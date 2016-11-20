<?php 

if(isset($_GET['idCurso'])){
	getPeriodos($_GET['idCurso']);
}

if(isset($_GET['idAula'])){
	getAulas($_GET['idAula']);
}

function getPeriodos($idCurso){
	$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

	$sql = "SELECT Periodo.id_Periodo, nome_Periodo FROM GRADE_CURSO INNER JOIN PERIODO ON GRADE_CURSO.ID_PERIODO = PERIODO.ID_PERIODO WHERE ID_CURSO = ?";

	$smtm = $con->prepare($sql);

	$smtm->bindParam(1, $idCurso);

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

	$sql = "SELECT id_Periodo FROM AULASEMESTRAL WHERE ID = ?";

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

