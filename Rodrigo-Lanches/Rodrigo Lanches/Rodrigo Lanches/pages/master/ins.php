<?php

    $nomeUsuario = $_POST['nomeUsuario'];
    $nomeUsuarioLen = strlen($nomeUsuario);
    $email = $_POST['email'];
    $emailLen = strlen($email);
    $permissao = $_POST['permissao'];
    $senhaUsuario = $_POST['senhaUsuario'];
    $inicioEspediente = $_POST['inicioEspediente'];
    $inicioEspedienteLen = strlen($inicioEspediente);
    $fimEspediente = $_POST['fimEspediente'];
    $fimEspedienteLen = strlen($fimEspediente);
    $senhaCriptografada = md5($senhaUsuario);
    $msg = "";

    if ($senhaUsuario=="") {
        $msg = "Por favor insira uma senha válida!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=insFun.php";
    }elseif ($nomeUsuario=="" || $nomeUsuarioLen > 45) {
        $msg = "Por favor insira um usuário válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=insFun.php";
    }elseif ($email=="" || $emailLen > 85) {
        $msg = "Por favor insira um email válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=insFun.php";
    }elseif ($permissao=="") {
        $msg = "Por favor insira um permissão válida!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=insFun.php";
    }elseif ( $inicioEspediente=="" || $inicioEspedienteLen < 5 || $inicioEspedienteLen > 5) {
        $msg = "Por favor insira o início de espediente de forma válida!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=insFun.php";
    }elseif ($fimEspediente=="" || $fimEspedienteLen < 5 || $fimEspedienteLen > 5) {
        $msg = "Por favor insira o fim de espediente de forma válida!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=insFun.php";
    }elseif (!isset($_POST['aceitarTermos'])) {
        $msg = "Você deve aceitar os termos para registrar o usuário!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=insFun.php";
    }else{

        $id = NULL;

        $sql = "INSERT INTO usuarios (id, nome, senha, email, permissao, inicioEspediente, fimEspediente) VALUES (:id, :nome, :senha, :email, :permissao, :inicioEspediente, :fimEspediente)";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':id', $id);
        $stm_sql->bindParam(':nome', $nomeUsuario);
        $stm_sql->bindParam(':senha', $senhaCriptografada);
        $stm_sql->bindParam(':email', $email);
        $stm_sql->bindParam(':permissao', $permissao);
        $stm_sql->bindParam(':inicioEspediente', $inicioEspediente);
        $stm_sql->bindParam(':fimEspediente', $fimEspediente);
        $result = $stm_sql->execute();

        if ($result) {
            $msg="Usuário registrado com sucesso!";
            $status="success";
            $link = "inicio.php?folder=master/&file=master.php";
        }else{
            $msg="Erro ao cadastrar usuário!";
            $status="danger";
            $link = "inicio.php?folder=master/&file=insFun.php";
        }
    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>