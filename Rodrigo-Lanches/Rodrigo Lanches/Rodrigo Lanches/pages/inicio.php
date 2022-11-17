<?php
    session_start();
    include "../security/database/connection.php";
    include "../security/authentication/validation.php";
?>
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
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="icon" href="../assets/imgs/icon.ico" type="image/x-icon"/>
    <script src="../assets/js/main.js"></script>
</head>
<body>
    <div class="bgImage">
        <div class="container">
            <div class="header navbar navbar-expand-lg">
                <div class="col-md-collapse navbar-collapse justify-content-center">
                    <div class="navbar-nav">
                        <h3 class="col-md-navbar-brand title">Rodrigo Lanches</h3>
                        <a class="nav-link navegacao" href="inicio.php">Início</a>
                        <?php
                            if ($_SESSION['permissao']==0) {
                        ?>
                        <a class="nav-link navegacao" href="inicio.php?folder=funcionarios/&file=funcionarios.php">Funcionário</a>
                        <?php        
                            }elseif ($_SESSION['permissao']==1) {
                        ?>
                        <a class="nav-link navegacao" href="inicio.php?folder=administracao/&file=administracao.php">Administração</a>
                        <?php       
                            }elseif ($_SESSION['permissao']==2) {
                        ?>
                        <a class="nav-link navegacao" href="inicio.php?folder=master/&file=master.php">Master</a>
                        <?php
                            }
                        ?>
                        <a class="nav-link navegacao" href="../security/authentication/logout.php">Sair</a>
                    </div>
                </div>
            </div>
            <div name="dinamic-pages" class="container-fluid table-responsive dinamic-pages-div" style="margin-top:15px;">
            <?php
                if (isset($_GET['mensagem'])==true) {
            ?>
            <div class="alert alert-<?php echo $_GET['status'];?> fade show" style="margin-bottom:0; margin-top: 15px; padding: 10px; opacity: 60%;" role="alert">
                <?php echo $_GET['mensagem'];?>
                <button type="button" class="close" style="height: 5px;" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
            </div>
            <?php
                }
            ?>
            <?php 
                if(isset($_GET['folder']) || isset($_GET['file'])){
                include $_GET['folder'].$_GET['file'];
                }else{
                    include "noticias.php";
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>