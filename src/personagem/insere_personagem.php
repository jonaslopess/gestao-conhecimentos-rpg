<?php
include "personagem.php";
include "../conhecimento.php";

function insere_personagem($personagem, $jogador) {
    include "../conexao.php";
    $sql = "INSERT INTO Personagem (
        nome, 
        idade, 
        raca, 
        etnia, 
        naturalidade, 
        cultura, 
        antepassado, 
        profissao,
        nome_jogador
    ) VALUES (
        '$personagem->nome', 
        '$personagem->idade', 
        '$personagem->raca', 
        '$personagem->etnia', 
        '$personagem->naturalidade', 
        '$personagem->cultura', 
        '$personagem->antepassado', 
        '$personagem->profissao',
        '$jogador'
    )";
    if ($mysqli->query($sql) === TRUE) {
        $codigo = $mysqli->insert_id;
        set_conhecimentos($codigo);
        $mysqli->close();
        return $codigo;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
        return -1;
    }

}

session_start();

$jogador = $_SESSION['nome'];

if (isset($_POST['salvar'])) {
    $personagem = new Personagem($_POST);
    $codigo = insere_personagem($personagem, $jogador);
    if ($codigo != -1) {
        header("Location:detalhes_personagem?codigo=".$codigo);
    }
    
    
} else if (isset($_POST['cancelar'])) {
    header("Location:../../index.php");
}


?>