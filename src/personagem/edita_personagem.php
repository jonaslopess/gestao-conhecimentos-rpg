<?php
include "../conexao.php";
include "personagem.php";
include "../conhecimento.php";

$jogador = $_SESSION['nome'];
if(!isset($jogador)){
    $mysqli->close();
    header("Location:../index");
}

$salvar = $_POST['salvar'];
if (isset($salvar)) {
    $personagem = new Personagem($_POST);
    $personagem->codigo = $_POST['codigo'];
    $sql = "UPDATE Personagem SET 
        nome = '$personagem->nome',
        idade = '$personagem->idade',
        raca = '$personagem->raca', 
        etnia = '$personagem->etnia', 
        naturalidade = '$personagem->naturalidade', 
        cultura = '$personagem->cultura',  
        antepassado = '$personagem->antepassado',  
        profissao = '$personagem->profissao'
        WHERE codigo = '$personagem->codigo'
        AND nome_jogador = '$jogador'    
    ";
    if ($mysqli->query($sql) === TRUE) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados atualizados');</script>";
        set_conhecimentos($personagem->codigo);
        $mysqli->close();
        header("Location:lista_personagens");
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Error: " . $sql . " - " . $mysqli->error . "');</script>";
        $mysqli->close();
        header("Location:lista_personagens");
    }
    
}

$cancelar = $_POST['cancelar'];
if (isset($cancelar)) {
    $mysqli->close();
    header("Location:../../index.php");
}
?>