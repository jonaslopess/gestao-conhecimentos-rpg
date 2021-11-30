<?php 
    function get_options($tipo){
        include "../conexao.php";
        $options = '';
        $sql = "SELECT codigo,descricao from caracteristica 
        WHERE tipo = '$tipo'";
        $resultados = $mysqli->query($sql);
        $num_caracteristicas = $resultados->num_rows;
        if($num_caracteristicas > 0){
            for ($i = 0; $i < $num_caracteristicas; $i++) {
                $resultados->data_seek($i);
                $row = $resultados->fetch_assoc();
                $options = $options.'<option value="'.$row['codigo'].'">'.$row['descricao'].'</option>';
            } 
        }
        $mysqli->close();
        return $options;
    }
?>
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
        <h2>Novo Personagem</h2>
        <form method="POST" action="insere_personagem.php">
            <div class="form-row">
                <div class="form-group  col-md-6">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome"
                    class="form-control"/>
                </div>
                <div class="form-group  col-md-6">
                    <label for="idade">Idade:</label>
                    <input type="number" step="1" id="idade" name="idade"
                    class="form-control"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-6">
                    <label for="raca">Raça:</label>
                    <select class="form-control" id="raca" name="raca">
                        <?php echo get_options(0); ?>
                    </select>
                </div>
                <div class="form-group  col-md-6">
                    <label for="etnia">Etnia:</label>
                    <select id="etnia" class="form-control" name="etnia">
                        <?php echo get_options(1); ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-6">
                    <label for="naturalidade">Naturalidade:</label>
                    <select id="naturalidade" class="form-control" name="naturalidade">
                        <?php echo get_options(2); ?>
                    </select>
                </div>
                <div class="form-group  col-md-6">
                    <label for="cultura">Cultura:</label>
                    <select id="cultura" class="form-control" name="cultura">
                        <?php echo get_options(3); ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-6">
                    <label for="antepassado">Antepassado:</label>
                    <select id="antepassado" class="form-control" name="antepassado">
                        <?php echo get_options(4); ?>
                    </select>
                </div>
                <div class="form-group  col-md-6">
                    <label for="profissao">Profissão:</label>
                    <select id="profissao" class="form-control" name="profissao">
                        <?php echo get_options(5); ?>
                    </select>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-md-3">
                    <button id="salvar" name="salvar" type="submit" class="btn btn-primary btn-block">
                        Salvar
                    </button>
                </div>
                <div class="form-group col-md-3">
                    <button id="cancelar" name="cancelar" type="submit" class="btn btn-primary btn-block">
                        Cancelar
                    </button>
                </div>

            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>