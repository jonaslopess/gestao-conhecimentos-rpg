<?php

include "../conexao.php";

session_start();

$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);

  if (isset($entrar)) {

    $verifica = $mysqli->query("SELECT * FROM mestre WHERE login =
    '$login' AND senha = '$senha'") or die("erro ao selecionar");
    
    if ($verifica->num_rows <= 0){
      $mysqli->close();
      echo"<script language='javascript' type='text/javascript'>
      alert('Login e/ou senha incorretos');window.location.href = 'login_mestre.php';</script>";
      die();
    }else{
      $_SESSION['mestre_login'] = $login;
      $_SESSION['mestre_senha'] = $senha;
      $mysqli->close();
      header("Location:mestre_home.php");
    }
  }
?>