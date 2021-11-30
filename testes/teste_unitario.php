<?php

include "personagem.php";

$dados = array(
    "nome"=>"João",
    "idade"=>15,
    "raca"=>2,
    "etnia"=>4,
    "naturalidade"=>3,
    "cultura"=>6,
    "antepassado"=>5,
    "profissao"=>2
);

$p = new Personagem($dados);

$passou = true;

if(!$p){
    echo "Falhou na criação do objeto.";
    $passou = false;    
} else {
    echo "Objeto criado.";


    if($p->raca == 2)
        echo "Passou.";
    else{
        echo "Falhou. Esperado: 2 - Obtido: $p->raca";
        $passou = false;
    }

    if($p->cultura == 6)
        echo "Passou!";
    else{
        echo "Falhou! Esperado: 6 - Obtido: $p->cultura";
        $passou = false;
    }
}

if($passou){
    echo "Passou em todos os testes.";
}
?>