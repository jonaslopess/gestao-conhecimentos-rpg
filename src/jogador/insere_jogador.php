<?php
include "../conexao.php";
include "jogador.php";

session_start();

$mestre = $_SESSION['mestre_login'];

$salvar = $_POST['salvar'];
if (isset($salvar)) {
    $jogador = new Jogador($_POST);
    
    $sql = "INSERT INTO Jogador (
        nome,
        senha,
        login_mestre
    ) VALUES (
        '$jogador->nome', 
        '$jogador->senha',
        '$mestre'
    )";
    if ($mysqli->query($sql) === TRUE) {
        $nome = $mysqli->insert_id;
        header("Location:detalhes_jogador?nome=".$nome);
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
    
}

$cancelar = $_POST['cancelar'];
if (isset($cancelar)) {
    $mysqli->close();
    header("Location:../../index.php");
}
?>