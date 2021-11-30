<?php

$dados = $_POST;

$passou = true;

if(!isset($_POST)){
    echo "Falhou na submissão do formulário.";
    $passou = false;    
} else {
    echo "Dados submetidos.";


    if($dados['raca'] == 1)
        echo "Passou.";
    else{
        echo "Falhou. Esperado: 1 - Obtido: ".$dados['raca'];
        $passou = false;
    }

    if($dados['etnia'] == 4)
        echo "Passou!";
    else{
        echo "Falhou! Esperado: 4 - Obtido: ".$dados['etnia'];
        $passou = false;
    }
}

if($passou){
    echo "Passou em todos os testes.";
}
?>