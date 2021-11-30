<?php
function set_conhecimentos($personagem){
    include 'conexao.php';

    $sql = "DELETE FROM Conhecimento WHERE codigo_personagem = '$personagem'";
    if ($mysqli->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $sql = "INSERT INTO Conhecimento(codigo_pagina, codigo_personagem) 
    SELECT DISTINCT( Caracteristicas_Pagina.codigo_pagina ), Personagem.codigo FROM Caracteristicas_Pagina
    INNER JOIN Personagem ON (Personagem.cultura = Caracteristicas_Pagina.caracteristica OR Personagem.antepassado = Caracteristicas_Pagina.caracteristica OR Personagem.profissao = Caracteristicas_Pagina.caracteristica) AND Personagem.codigo = '$personagem'";
    if ($mysqli->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}

function set_conhecimento($pagina){
    include 'conexao.php';
    
    $sql = "DELETE FROM Conhecimento WHERE codigo_pagina = '$pagina'";
    if ($mysqli->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $sql = "INSERT IGNORE INTO Conhecimento ( SELECT DISTINCT(Personagem.codigo), Pagina.codigo
    FROM Personagem 
    INNER JOIN Caracteristica ON (Personagem.cultura = Caracteristica.codigo or Personagem.antepassado = Caracteristica.codigo or Personagem.profissao = Caracteristica.codigo)
    INNER JOIN Caracteristicas_Pagina ON Caracteristicas_Pagina.caracteristica = Caracteristica.codigo
    INNER JOIN Pagina ON Pagina.codigo = Caracteristicas_Pagina.codigo_pagina and Pagina.codigo = '$pagina')";
    if ($mysqli->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
}
?>