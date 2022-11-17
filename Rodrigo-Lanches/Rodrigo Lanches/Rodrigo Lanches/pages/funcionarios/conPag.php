<?php

    $nomeFuncionario = $_POST['nomeFuncionario'];
    $pedido = $_POST['pedido'];
    $formaPedido = $_POST['formaPedido'];
    $numeroCliente = $_POST['numeroCliente'];
    $msg = "";

    if ($numeroCliente=="" || $numeroCliente > 999 || $numeroCliente==NULL || !isset($_POST['numeroCliente'])) {
        $msg = "Por favor insira um numero de cliente válido!";
        $status="danger";
        $link = "inicio.php?folder=funcionarios/&file=confirmar.php";
    }else if (!isset($_POST['aceitarTermos'])){
        $msg = "Por favor aceite os termos antes de confirmar o pagamento!";
        $status="danger";
        $link = "inicio.php?folder=funcionarios/&file=confirmar.php";
    }else{

        $sql = "UPDATE pedidos SET andamento=0 WHERE numeroCliente=:numeroCliente";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':numeroCliente', $numeroCliente);
        $result = $stm_sql->execute();

        if ($result) {
            $msg="Pagamento confirmado com sucesso!";
            $status="success";
            $link = "inicio.php?folder=funcionarios/&file=funcionarios.php";
        }else{
            $msg="Erro ao confirmar pagamento!";
            $status="danger";
            $link = "inicio.php?folder=funcionarios/&file=confirmar.php";
        }
    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>