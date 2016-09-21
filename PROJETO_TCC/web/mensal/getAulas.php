<?php

getHorarios();

    function getHorarios(){
        $con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

        $id_professor = $_GET['id'];
        $semestre = $_GET['sem'];

        $arrSemestre = explode('/',$semestre);

        $semestreFull = $arrSemestre[1] . '-' . $arrSemestre[0] . '-28';

        $semestreFull2 = $arrSemestre[1] . '-' . $arrSemestre[0] . '-29';

        $semestreFull3 = $arrSemestre[1] . '-' . $arrSemestre[0] . '-28';

        $semestreFull4 = $arrSemestre[1] . '-' . $arrSemestre[0] . '-30';

        $semestreFull5 = $arrSemestre[1] . '-' . $arrSemestre[0] . '-31';

        $semestreFull6 = $arrSemestre[1] . '-' . $arrSemestre[0] . '-01';

        if(isset($id_professor) && $id_professor){


            $sql = "SELECT DISTINCT disciplina.abreviacao as 
            abreviacao, DIASEMANA.horario_inicio, DIASEMANA.horario_fim, DIASEMANA.id_DiaSemana, CURSO.nome_curso,
             DIASEMANA.id_periodo, DIASEMANA.turno FROM DIASEMANA INNER JOIN AULASEMESTRAL ON (AULASEMESTRAL.ID_PROFESSOR = DIASEMANA.ID_PROFESSOR AND
              AULASEMESTRAL.ID_CURSO = DIASEMANA.ID_CURSO AND 
              AULASEMESTRAL.id_Disciplina = DIASEMANA.id_Disciplina AND AULASEMESTRAL.id_periodo = DIASEMANA.id_periodo AND
              AULASEMESTRAL.TURNO = DIASEMANA.TURNO) INNER JOIN Professor ON DIASEMANA.id_professor = 
             Professor.id_Professor INNER JOIN Disciplina ON DIASEMANA.id_Disciplina = Disciplina.id_Disciplina INNER JOIN
              CURSO ON DIASEMANA.id_curso = CURSO.id_curso  WHERE DIASEMANA.id_professor = ? AND ((SELECT EXTRACT(YEAR FROM AULASEMESTRAL.DATA_INICIO))
              = (SELECT EXTRACT(YEAR FROM ?)) OR (SELECT EXTRACT(YEAR FROM AULASEMESTRAL.DATA_FIM))
              = (SELECT EXTRACT(YEAR FROM ?))) AND (? >= AULASEMESTRAL.DATA_INICIO AND (? <= AULASEMESTRAL.DATA_FIM OR ? <= AULASEMESTRAL.DATA_FIM
              OR ? <= AULASEMESTRAL.DATA_FIM OR ? <= AULASEMESTRAL.DATA_FIM OR ? <= AULASEMESTRAL.DATA_FIM))   ";

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