<?php 
class Pagina{
    public $codigo;
    public $titulo;
    public $descricao;
    public $caracteristicas;

    function __construct($dados)
    {
        $this->titulo = $dados['titulo'];
        $this->descricao = $dados['descricao'];
        $antepassados = array_key_exists('antepassados', $dados) ? $dados['antepassados'] : array() ;
        $culturas = array_key_exists('culturas', $dados) ? $dados['culturas'] : array() ;
        $profissoes = array_key_exists('profissoes', $dados) ? $dados['profissoes'] : array() ;
        $this->caracteristicas = array_merge($antepassados, $culturas, $profissoes);
    }

    function addCaracteristica($caracteristica){
        array_push($this->caracteristicas, $caracteristica);
    }
}
?>