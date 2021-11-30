<?php

include "personagem.php";
include "insere_personagem.php";

$dados = array(
    "nome"=>"João",
    "idade"=>15,
    "raca"=>1,
    "etnia"=>4,
    "naturalidade"=>6,
    "cultura"=>8,
    "antepassado"=>11,
    "profissao"=>15
);

$p = new Personagem($dados);
$j = 'massume';

$passou = true;

$codigo = insere_personagem($p,$j);

if($codigo == 7)
    echo "Passou.";
else{
    echo "Falhou. Esperado: 7 - Obtido: $codigo";
    $passou = false;
}


?>