<?php 
session_start();
if(!isset ($_SESSION['mestre_login']) || !isset ($_SESSION['mestre_senha'])){
    unset($_SESSION['mestre_login']);
    unset($_SESSION['mestre_senha']);
    header('location:login_mestre.php');
}

?>

<div class="container-fluid">
    <div class="row align-items-center" 
    style="height:80px; "
    >
        <div class="col-11">
            <h1> Gestão de Conhecimento de Personagens | RPG </h1>
        </div>
        <div class="col">
            <a href="../logout.php" class="btn btn-danger">Sair</a>
        </div>
    </div>
    
</div>