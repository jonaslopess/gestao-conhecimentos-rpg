<?php 
class Jogador{
    public $nome;
    public $senha;

    function __construct($dados){
        $this->nome = $dados['nome'];
        $this->senha = md5($dados['senha']);
    }
}
?>