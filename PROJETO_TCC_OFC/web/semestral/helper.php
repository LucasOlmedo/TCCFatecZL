<?php

$con = new PDO('mysql:host=localhost;dbname=tcc_fateczl','root','123456');

function getNomeProf($con){
    $id_professor = $_GET['id'];

    if(isset($id_professor)){
        $sql = 'SELECT PROFESSOR.NOME AS nome FROM PROFESSOR WHERE PROFESSOR.id_professor = ?';
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$id_professor);
        $stmt->execute();
        $rs = $stmt->fetch();
        return $rs['nome'];
    }
    else{
        return "Professor não selecionado!";
    }
}


function getCatProf($con){
    $id_professor = $_GET['id'];

    if(isset($id_professor)){
        $sql = 'SELECT PROFESSOR.CATEGORIA AS cat FROM PROFESSOR WHERE PROFESSOR.id_professor = ?';
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$id_professor);
        $stmt->execute();
        $rs = $stmt->fetch();
        return $rs['cat'];
    }
    else{
        return "Professor não selecionado!";
    }
}

?>
