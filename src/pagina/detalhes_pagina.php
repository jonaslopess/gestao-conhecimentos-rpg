<?php 
    function get_options($tipo, $selected){
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
				$is_selected = '';
				if(in_array($row['codigo'], $selected))
					$is_selected = 'selected';
				$options = $options.'<option '.$is_selected.' value="'.$row['codigo'].'">'.$row['descricao'].'</option>';
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
	<?php include "../mestre/header_mestre.php"; ?>
	<div class="container">
		<h2>Detalhes da Página</h2>
		<?php
		include "../conexao.php";
		include "pagina.php";

		$pagina = null;
		$codigo = 0;

		if (isset($_GET['codigo'])) {
			$codigo = $_GET['codigo'];
			$sql = "SELECT * FROM Pagina WHERE codigo = '$codigo'";
			$resultado = $mysqli->query($sql) or die("erro ao selecionar");
			if ($resultado->num_rows > 0) {
				$pagina = new Pagina($resultado->fetch_assoc());
				$sql = "SELECT Caracteristica.codigo FROM Caracteristica INNER JOIN Caracteristicas_Pagina ON Caracteristica.codigo = Caracteristicas_Pagina.caracteristica AND Caracteristicas_Pagina.codigo_pagina = '$codigo'";
				$resultados = $mysqli->query($sql) or die("erro ao selecionar");
				$num_caracteristicas = $resultados->num_rows;
				if($num_caracteristicas > 0){
					for ($i = 0; $i < $num_caracteristicas; $i++) {
						$resultados->data_seek($i);
						$row = $resultados->fetch_assoc();
						$pagina->addCaracteristica($row['codigo']);
					} 
				}
				$mysqli->close();
			} else {
				echo "<script language='javascript' type='text/javascript'> alert('Página não encontrado');</script>";
				$mysqli->close();
				header("Location:mestre/mestre_home");
			}
		}
		?>

		<form method="POST" action="edita_pagina.php">
			<input type="hidden" id="codigo" name="codigo" <?php echo "value = '$codigo'"; ?> />
			<div class="form-row">
				<div class="form-group  col-md-12">
					<label for="titulo">Título:</label>
					<input type="text" id="titulo" name="titulo" <?php if ($pagina) echo "value = '$pagina->titulo'" ?> class="form-control" />
				</div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-12">
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="6"><?php if ($pagina) echo "$pagina->descricao" ?></textarea>
                </div>
            </div>
			<div class="form-row">
                <div class="form-group col-md-4">
                    <h5>Características:</h5>
                    <small id="caractHelp" class="form-text text-muted">
                        (Segure ctrl para selecionar)
                    </small>
                </div>
            </div>
			<div class="form-row">
                <div class="form-group  col-md-4">
                    <label for="culturas">Cultura:</label>
                    <select id="culturas" multiple class="form-control" name="culturas[]">
                        <?php echo get_options(3, $pagina? $pagina->caracteristicas : -1); ?>
                    </select>
                </div>
                <div class="form-group  col-md-4">
                    <label for="antepassados">Antepassado:</label>
                    <select id="antepassados" multiple class="form-control" name="antepassados[]">
                        <?php echo get_options(4, $pagina? $pagina->caracteristicas : -1); ?>
                    </select>
                </div>
                <div class="form-group  col-md-4">
                    <label for="profissoes">Profissão:</label>
                    <select id="profissoes" multiple class="form-control" name="profissoes[]">
                        <?php echo get_options(5, $pagina? $pagina->caracteristicas : -1); ?>
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