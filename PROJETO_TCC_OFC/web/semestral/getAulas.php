<?php

getHorarios();

function getHorarios(){
    $con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

    $id_professor = $_GET['id'];
    $semestre = $_GET['sem'];

    $arrSemestre = explode('-',$semestre);

    $semestreFull = $arrSemestre[0] . '-' . $arrSemestre[1] . '-28';

    $semestreFull2 = $arrSemestre[0] . '-' . $arrSemestre[1] . '-29';

    $semestreFull3 = $arrSemestre[0] . '-' . $arrSemestre[1] . '-28';

    $semestreFull4 = $arrSemestre[0] . '-' . $arrSemestre[1] . '-30';

    $semestreFull5 = $arrSemestre[0] . '-' . $arrSemestre[1] . '-31';

    $semestreFull6 = $arrSemestre[0] . '-' . $arrSemestre[1] . '-01';

    if(isset($id_professor)){


        $sql = "SELECT DISTINCT disciplina.nome_disc, disciplina.abreviacao as
            abreviacao, curso.abreviacao as curso_abreviacao, DIASEMANA.horario_inicio, DIASEMANA.horario_fim, DIASEMANA.dia_semana, CURSO.nome_curso,
             AULASEMESTRAL.id_periodo, AULASEMESTRAL.turno, DISCIPLINA.EXTERNO FROM DIASEMANA INNER JOIN AULASEMESTRAL ON 
             DIASEMANA.id_aulasemestral = AULASEMESTRAL.id INNER JOIN Professor ON AULASEMESTRAL.id_professor =
             Professor.id_Professor INNER JOIN Disciplina ON AULASEMESTRAL.id_Disciplina = Disciplina.id_Disciplina INNER JOIN HORARIOSEXTERNOS
             ON Disciplina.externo = HORARIOSEXTERNOS.ID_HAE INNER JOIN CURSO ON AULASEMESTRAL.id_curso = CURSO.id_curso  WHERE AULASEMESTRAL.id_professor
              = ? AND ((SELECT EXTRACT(YEAR FROM AULASEMESTRAL.DATA_INICIO))
              <= (SELECT EXTRACT(YEAR FROM ?)) AND (SELECT EXTRACT(YEAR FROM AULASEMESTRAL.DATA_FIM))
              >= (SELECT EXTRACT(YEAR FROM ?))) AND (? >= AULASEMESTRAL.DATA_INICIO AND (? <= AULASEMESTRAL.DATA_FIM OR ? <= AULASEMESTRAL.DATA_FIM
              OR ? <= AULASEMESTRAL.DATA_FIM OR ? <= AULASEMESTRAL.DATA_FIM OR ? <= AULASEMESTRAL.DATA_FIM))";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$id_professor);
        $stmt->bindParam(2,$semestreFull);
        $stmt->bindParam(3,$semestreFull);
        $stmt->bindParam(4,$semestreFull);
        $stmt->bindParam(5,$semestreFull2);
        $stmt->bindParam(6,$semestreFull3);
        $stmt->bindParam(7,$semestreFull4);
        $stmt->bindParam(8,$semestreFull5);
        $stmt->bindParam(9,$semestreFull6);

        if($stmt->execute()){
            while($rs = $stmt->fetch()) {
                echo json_encode($rs) . ',';
            }
        }
        $stmt = null;
    }
    else{
        echo "Professor não selecionado!";
    }
    $con = null;
}
?>
