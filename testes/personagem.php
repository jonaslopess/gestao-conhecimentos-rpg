<?php
class Personagem{
    public $codigo;
    public $nome;
    public $idade;
    public $raca;
    public $etnia;
    public $naturalidade;
    public $cultura;
    public $antepassado;
    public $profissao;

    function __construct($dados){
        $this->nome = $dados['nome'];
        $this->idade = $dados['idade'];
        $this->raca = $dados['raca'];
        $this->etnia = $dados['etnia'];
        $this->naturalidade = $dados['naturalidade'];
        $this->cultura = $dados['cultura'];
        $this->antepassado = $dados['antepassado'];
        $this->profissao = $dados['profissao'];

    }

    function atualizar($dados){
        $this->nome = $dados['nome'];
        $this->idade = $dados['idade'];
        $this->raca = $dados['raca'];
        $this->etnia = $dados['etnia'];
        $this->naturalidade = $dados['naturalidade'];
        $this->cultura = $dados['cultura'];
        $this->antepassado = $dados['antepassado'];
        $this->profissao = $dados['profissao'];
    }
}

?>
