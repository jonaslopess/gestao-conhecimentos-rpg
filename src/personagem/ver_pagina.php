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
        <div class="row justify-content-center">
            <?php 

            include "../conexao.php";
            include "../pagina/pagina.php";

            if(isset($_GET['codigo'])){
                $codigo = $_GET['codigo'];
                $sql = "SELECT * FROM Pagina WHERE codigo = '$codigo'";
                $resultado = $mysqli->query($sql) or die("erro ao selecionar");
                if ($resultado->num_rows > 0) {
                    $pagina = new Pagina($resultado->fetch_assoc());
                    $mysqli->close();
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Página não encontrado');</script>";
                    $mysqli->close();
                    header("Location:lista_personagens");
                }

            }            
            echo "<h2>".$pagina->titulo."</h2>";
            echo "<p>".$pagina->descricao."</p>";
            
            if(isset($_GET['personagem'])){
                $personagem = "detalhes_personagem?codigo=".$_GET['personagem'];
            } else {
                $personagem = "lista_personagens";
            }
            echo '<a type="button" class="btn btn-primary" 
            href="'.$personagem.'">Voltar</a>';
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>