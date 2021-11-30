<?php
    session_start();
    if(isset($_SESSION['nome']) && isset($_SESSION['senha'])){
        header("Location:src/personagem/lista_personagens");
    } else if(isset($_SESSION['mestre_login']) && isset($_SESSION['mestre_senha'])){
        header("Location:src/mestre/mestre_home");
    } else {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        unset($_SESSION['mestre_login']);
        unset($_SESSION['mestre_senha']);
        header('location:src/jogador/login_jogador');
    }
?>