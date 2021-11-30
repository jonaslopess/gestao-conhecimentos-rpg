<?php
include "../conexao.php";
include "jogador.php";

session_start();

$mestre = $_SESSION['mestre_login'];

$salvar = $_POST['salvar'];
if (isset($salvar)) {
    $jogador = new Jogador($_POST);
    $sql = "UPDATE Jogador SET 
        senha = '$jogador->senha'
        WHERE nome = '$jogador->nome'
        AND login_mestre = '$mestre'";
    if ($mysqli->query($sql) === TRUE) {
        $mysqli->close();
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados atualizados');window.location.href = 'mestre/mestre_home';</script>";
    } else {
        $mysqli->close();
        echo "<script language='javascript' type='text/javascript'>
        alert('Error: " . $sql . " - " . $mysqli->error . "');window.location.href = 'mestre/mestre_home';</script>";
    }    
} else {
    $cancelar = $_POST['cancelar'];
    if (isset($cancelar)) {
        $mysqli->close();
        header("Location:../../index.php");
    }
}
?>