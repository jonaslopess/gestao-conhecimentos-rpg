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
		<h2>Detalhes do Jogador</h2>
		<?php
		include "../conexao.php";
		include "jogador.php";

		$pagina = null;
		$codigo = 0;

		if (isset($_GET['nome'])) {
			$nome = $_GET['nome'];
			$sql = "SELECT * FROM Jogador WHERE nome = '$nome'";
			$resultado = $mysqli->query($sql) or die("erro ao selecionar");
			if ($resultado->num_rows > 0) {
				$jogador = new Jogador($resultado->fetch_assoc());
				$mysqli->close();
			} else {
				echo "<script language='javascript' type='text/javascript'> alert('Jogador não encontrado');</script>";
				$mysqli->close();
				header("Location:mestre/mestre_home");
			}
		}
		?>

		<form method="POST" action="edita_jogador.php">
			<div class="form-row">
				<div class="form-group  col-md-12">
					<label for="nome">Nome:</label>
					<input readonly type="text" id="nome" name="nome" <?php if ($jogador) echo "value = '$jogador->nome'" ?> class="form-control" />
				</div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-12">
                    <label for="descricao">Nova Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-control" />
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