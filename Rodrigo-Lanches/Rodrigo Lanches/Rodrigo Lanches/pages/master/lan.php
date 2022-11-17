<?php

    $horarioAbertura = $_POST['horarioAbertura'];
    $horarioAberturaLen = strlen($horarioAbertura);
    $horarioFechamento = $_POST['horarioFechamento'];
    $horarioFechamentoLen = strlen($horarioFechamento);
    $nome = "Rodrigo Lanches";
    $msg = "";

    if ($horarioAbertura=="" || $horarioAberturaLen < 5 || $horarioAberturaLen > 5) {
        $msg = "Por favor insira um horário de Abertura válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=horarioLan.php";
    }elseif ($horarioFechamento=="" || $horarioFechamentoLen < 5 || $horarioFechamentoLen > 5) {
        $msg = "Por favor insira um horário de Fechamento válido!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=horarioLan.php";
    }elseif (!isset($_POST['aceitarTermos'])) {
        $msg = "Você deve aceitar os termos para definir o horário de abertura/fechamento!";
        $status="danger";
        $link = "inicio.php?folder=master/&file=horarioLan.php";
    }else{

        $sql = "UPDATE lanchonete SET horarioAbertura=:horarioAbertura, horarioFechamento=:horarioFechamento WHERE nome=:nome";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':nome', $nome);
        $stm_sql->bindParam(':horarioAbertura', $horarioAbertura);
        $stm_sql->bindParam(':horarioFechamento', $horarioFechamento);
        $result = $stm_sql->execute();

        if ($result) {
            $msg="Horários da lanchonete definido com sucesso!";
            $status="success";
            $link = "inicio.php?folder=master/&file=master.php";
        }else{
            $msg="Erro ao definir horários da lanchonete!";
            $status="danger";
            $link = "inicio.php?folder=master/&file=horarioLan.php";
        }

    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>