<?php

    $nomeUsuario = $_POST['nomeUsuario'];
    $msg = "";

    if ($nomeUsuario=="") {
        $msg = "Por favor insira um usuário válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=delFun.php";
    }elseif (isset($_POST['aceitarTermos'])==false) {
        $msg = "Você deve aceitar os termos para deletar o usuário!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=delFun.php";
    }else{

        $sql = "DELETE FROM usuarios WHERE nome=:nome";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':nome', $nomeUsuario);
        $result = $stm_sql->execute();

        if ($result) {
            $msg="Usuário deletado com sucesso!";
            $status="success";
            $link = "inicio.php?folder=master/&file=master.php";
        }else{
            $msg="Erro ao deletar usuário!";
            $status="danger";
            $link = "inicio.php?folder=master/&file=delFun.php";
        }
    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>