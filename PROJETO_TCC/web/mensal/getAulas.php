<?php

getHorarios();

    function getHorarios(){
        $con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

        $id_professor = $_GET['id'];

        echo $_GET['sem'];

        if(isset($id_professor) && $id_professor){
            $sql = 'SELECT disciplina.abreviacao as abreviacao, DIASEMANA.horario_inicio, DIASEMANA.horario_fim, DIASEMANA.id_DiaSemana, CURSO.nome_curso, DIASEMANA.id_periodo, DIASEMANA.turno FROM DIASEMANA INNER JOIN Professor ON DIASEMANA.id_professor = Professor.id_Professor INNER JOIN Disciplina ON DIASEMANA.id_Disciplina = Disciplina.id_Disciplina INNER JOIN CURSO ON DIASEMANA.id_curso = CURSO.id_curso WHERE DIASEMANA.id_professor = ?';
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$id_professor);
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