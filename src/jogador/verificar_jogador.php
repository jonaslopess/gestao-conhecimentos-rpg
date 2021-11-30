<?php

include "../conexao.php";

session_start();

$nome = $_POST['nome'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);

  if (isset($entrar)) {

    $verifica = $mysqli->query("SELECT * FROM jogador WHERE nome =
    '$nome' AND senha = '$senha'") or die("erro ao selecionar");
    
    if ($verifica->num_rows <= 0){
      $mysqli->close();
      echo"<script language='javascript' type='text/javascript'>
      alert('Login e/ou senha incorretos');window.location.href = 'login_jogador.php';</script>";
      die();
    }else{
      $_SESSION['nome'] = $nome;
      $_SESSION['senha'] = $senha;
      $mysqli->close();
      header("Location:../personagem/lista_personagens.php");
    }
  }
?>