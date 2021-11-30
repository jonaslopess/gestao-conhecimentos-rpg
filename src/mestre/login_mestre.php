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
    <div class="container">
        <div class="row align-items-center" style="height:80px; ">
            <div class="col">
                <h2>Login de Mestre</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" action="verificar_mestre.php">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="login">Login:</label>
                            <input type="text" id="login" name="login" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" name="senha" class="form-control"/>
                        </div>
                    </div>
                    
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            <button id="entrar" name="entrar" type="submit" class="btn btn-primary btn-block">
                                Entrar
                            </button>
                        </div>
                        <div class="form-group col-md-3">
                            <a href="../jogador/login_jogador" class="btn btn-primary btn-block">
                                Entrar como Jogador
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>