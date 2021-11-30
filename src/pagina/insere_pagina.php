<?php
include "../conexao.php";
include "personagem.php";
include "../conhecimento.php";

$mestre = $_SESSION['mestre_login'];

$salvar = $_POST['salvar'];
if (isset($salvar)) {
    $pagina = new Pagina($_POST);
    
    $sql = "INSERT INTO Pagina (
        titulo,
        descricao,
        login_mestre
    ) VALUES (
        '$pagina->titulo', 
        '$pagina->descricao',
        '$mestre'
    )";
    if ($mysqli->query($sql) === TRUE) {
        $codigo = $mysqli->insert_id;
        header("Location:detalhes_pagina?codigo=".$codigo);
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    foreach($pagina->caracteristicas as $caracteristica){
        $sql = "INSERT IGNORE INTO Caracteristicas_Pagina VALUES ('$pagina->codigo','".
        $caracteristica."')";
        if ($mysqli->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
    set_conhecimento($codigo);
    $mysqli->close();
    
}

$cancelar = $_POST['cancelar'];
if (isset($cancelar)) {
    $mysqli->close();
    header("Location:../../index.php");
}
?>