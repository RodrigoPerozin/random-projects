<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="Rodrigo Destri Perozin">
    <meta name="description" content="A melhor lanchonete que você poderia ir!">    
    <title>Rodrigo Lanches</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="icon" href="assets/imgs/icon.ico" type="image/x-icon"/>
</head>
<body>
    <div class="bgImage">
        <div class="container h-100">
            <div class="header">
                <h1>Rodrigo Lanches</h1>
            </div>
            <div class="row h-100 align-items-center">
                <form name="frmAcess" action="security/authentication/login.php" method="POST" class="col-md-6 offset-md-3 text-center">
                    <div class="form-group">
                        <?php if(isset($_GET['mensagem'])){ ?>
                            <div class="alert alert-danger" style="height: 80px; font-size: 34px;" role="alert">
                                <?php echo $_GET['mensagem'];?>
                            </div>
                        <?php }?>
                        <label for="exampleInputEmail1">Usuário</label>
                        <input name="usuario" type="name" class="form-control input-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input name="senha" type="password" class="form-control input-transparent" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" class="btn btn-warning acessBtn" style="width: 100%; height: 60px;">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>