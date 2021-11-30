<?php
include "../conexao.php";
include "pagina.php";
include "../conhecimento.php";

session_start();

$mestre = $_SESSION['mestre_login'];

$salvar = $_POST['salvar'];
if (isset($salvar)) {
    $pagina = new Pagina($_POST);
    $pagina->codigo = $_POST['codigo'];
    $sql = "UPDATE Pagina SET 
        titulo = '$pagina->titulo',
        descricao = '$pagina->descricao'
        WHERE codigo = '$pagina->codigo'
        AND login_mestre = '$mestre'";
    if ($mysqli->query($sql) === TRUE) {
        $sql = "DELETE FROM Caracteristicas_Pagina WHERE codigo_pagina = '$pagina->codigo'";
        if ($mysqli->query($sql) === TRUE) {
            foreach($pagina->caracteristicas as $caracteristica){
                $sql = "INSERT IGNORE INTO Caracteristicas_Pagina VALUES ('$pagina->codigo','$caracteristica')";
                if ($mysqli->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
            }
            set_conhecimento($pagina->codigo);
            $mysqli->close();
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizados');window.location.href = 'mestre/mestre_home';</script>";
        } else {
            $mysqli->close();
            echo "<script language='javascript' type='text/javascript'>
            alert('Error: " . $sql . " - " . $mysqli->error . "');window.location.href = 'mestre/mestre_home';</script>";
        }        
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