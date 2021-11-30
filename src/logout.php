<?php
    session_start();
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    unset($_SESSION['mestre_login']);
    unset($_SESSION['mestre_senha']);
    header('location:../index.php');

?>