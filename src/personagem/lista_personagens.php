<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Gestão de conhecimento dos personagens | RPG</title>
</head>
<body>
    <?php include "../header.php"; ?>
    <div class="container">
        <div class="row">
            <h2>Personagens</h2>
        </div>
        <div class="row">
            <div class="list-group col">
            <?php

            include "../conexao.php";

            $jogador = $_SESSION['nome'];

            $resultados = $mysqli->query("SELECT * FROM personagem WHERE nome_jogador = '$jogador'") or die("erro ao selecionar");

            $num_personagens = $resultados->num_rows;

            for ($i = 0; $i < $num_personagens; $i++) {
                $resultados->data_seek($i);
                $row = $resultados->fetch_assoc();
                echo '<a class="list-group-item list-group-item-action" href="detalhes_personagem?codigo='.$row['codigo'].'">'.$row['nome'].'</a>';
            }
            $mysqli->close();
            ?>
        
            </div>
        </div>
        <div class="row py-2 justify-content-center">

            <a href="novo_personagem" type="button" class="btn btn-primary">
                Novo Personagem
            </a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>