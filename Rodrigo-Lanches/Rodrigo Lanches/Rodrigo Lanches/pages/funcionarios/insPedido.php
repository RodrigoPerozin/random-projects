<?php

    $nomeFuncionario = $_POST['nomeFuncionario'];
    $pedido = $_POST['pedido'];
    $formaPedido = $_POST['formaPedido'];
    $numeroCliente = $_POST['numeroCliente'];
    $msg = "";

    if ($nomeFuncionario=="" || !isset($_POST['nomeFuncionario'])) {
        $msg = "Por favor informe um funcionário válido!";
        $status="danger";
        $link = "inicio.php?folder=funcionarios/&file=frmins.php";
    }elseif ($pedido=="" || !isset($_POST['pedido'])) {
        $msg = "Por favor informe um pedido válido!";
        $status="danger";
        $link = "inicio.php?folder=funcionarios/&file=frmins.php";
    }elseif ($formaPedido=="" || !isset($_POST['formaPedido'])) {
        $msg = "Por favor informe uma forma de pedido válida!";
        $status="danger";
        $link = "inicio.php?folder=funcionarios/&file=frmins.php";
    }elseif ($numeroCliente=="" || $numeroCliente > 999 || $numeroCliente==NULL || !isset($_POST['numeroCliente'])) {
        $msg = "Por favor insira um numero de cliente válido!";
        $status="danger";
        $link = "inicio.php?folder=funcionarios/&file=frmins.php";
    }else{

        $id = NULL;
        $andamento = 1;

        $sql = "INSERT INTO pedidos (id, pedido, nomeFuncionario, formaPedido, numeroCliente, andamento) VALUES (:id, :pedido, :nomeFuncionario, :formaPedido, :numeroCliente, :andamento)";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':id', $id);
        $stm_sql->bindParam(':pedido', $pedido);
        $stm_sql->bindParam(':formaPedido', $formaPedido);
        $stm_sql->bindParam(':numeroCliente', $numeroCliente);
        $stm_sql->bindParam(':andamento', $andamento);
        $stm_sql->bindParam(':nomeFuncionario', $nomeFuncionario);

        $result = $stm_sql->execute();

        if ($result) {
            $msg="Pedido registrado com sucesso!";
            $status="success";
            $link = "inicio.php?folder=funcionarios/&file=funcionarios.php";
        }else{
            $msg="Erro ao cadastrar pedido!";
            $status="danger";
            $link = "inicio.php?folder=funcionarios/&file=frmins.php";
        }
    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>