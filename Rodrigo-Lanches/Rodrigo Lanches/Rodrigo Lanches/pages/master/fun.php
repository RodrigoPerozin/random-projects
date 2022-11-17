<?php

    $nomeUsuario = $_POST['nomeUsuario'];
    $inicioEspediente = $_POST['inicioEspediente'];
    $fimEspediente = $_POST['fimEspediente'];
    $msg = "";

    if ($nomeUsuario=="") {
        $msg = "Por favor insira um usuário válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=horarioFun.php";
    }elseif ($inicioEspediente=="") {
        $msg = "Por favor insira um início de espediente válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=horarioFun.php";
    }elseif ($fimEspediente=="") {
        $msg = "Por favor insira um fim de espediente válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=horarioFun.php";
    }elseif (!isset($_POST['aceitarTermos'])) {
        $msg = "Você deve aceitar os termos para registrar o usuário!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=horarioFun.php";
    }else{

        $sql = "UPDATE usuarios SET inicioEspediente=:inicioEspediente, fimEspediente=:fimEspediente WHERE nome=:nome";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':nome', $nomeUsuario);
        $stm_sql->bindParam(':inicioEspediente', $inicioEspediente);
        $stm_sql->bindParam(':fimEspediente', $fimEspediente);
        $result = $stm_sql->execute();

        if ($result) {
            $msg="Horários do usuário definido com sucesso!";
            $status="success";
            $link = "inicio.php?folder=master/&file=master.php";
        }else{
            $msg="Erro ao definir horários do usuário!";
            $status="danger";
            $link = "inicio.php?folder=master/&file=horarioFun.php";
        }
    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>