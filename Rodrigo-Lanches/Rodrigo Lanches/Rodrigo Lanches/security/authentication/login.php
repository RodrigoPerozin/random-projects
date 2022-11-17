<?php
    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];

    $senha_criptografada = md5($senha);

    $msg = "";
    if($usuario==""){
        $msg = "Preencha o campo usuário!";
        $link = "../../index.php"."?mensagem=".$msg;
    }else if($senha==""){
        $msg = "Preencha o campo senha!";
        $link = "../../index.php"."?mensagem=".$msg;
    }else{
        include "../database/connection.php";

        $sql = "SELECT nome, senha, permissao FROM usuarios WHERE nome=:usuario AND senha=:senha";

        $stm_sql = $db_connection->prepare($sql);
        $stm_sql-> bindParam(':usuario', $usuario);
        $stm_sql->bindParam(":senha", $senha_criptografada);
        $stm_sql->execute();
        $info = $stm_sql->fetch(PDO::FETCH_ASSOC);

        if($stm_sql->rowCount()==1){

            session_start();
            $_SESSION['idsessao'] = session_id();
            $_SESSION['nome'] = $usuario;
            $_SESSION['permissao'] = $info['permissao'];

            $link = "../../pages/inicio.php";
        }else{
            $msg = "Usuário ou senha incorretos!";
            $link = "../../index.php"."?mensagem=".$msg;
        }
    }

    header("Location: ".$link);

?>