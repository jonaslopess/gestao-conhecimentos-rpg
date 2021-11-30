<?php

function insere_personagem($personagem, $jogador) {
    include "conexao.php";
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
        //set_conhecimentos($codigo);
        $mysqli->close();
        return $codigo;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
        return -1;
    }

}


?>