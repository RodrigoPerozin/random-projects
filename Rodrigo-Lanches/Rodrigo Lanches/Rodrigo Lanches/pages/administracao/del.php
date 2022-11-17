<?php

    $id = $_POST['id'];

    if (!isset($_POST['aceitarTermos'])){
        $msg = "Por favor aceite os termos antes de excluir o item!";
        $status = "danger";
        $link = "inicio.php?folder=administracao/&file=excluir.php&id=".$id;
    }else{

        $sql = "DELETE FROM cardapio WHERE id=:id";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(":id", $id);
        $result = $stm_sql->execute();

        if ($result){
            $msg = "Item excluído do cardápio com sucesso!";
            $status = "success";
            $link = "inicio.php?folder=administracao/&file=administracao.php";
        }else{
            $msg = "Falha ao excluír item do cardápio!";
            $status = "danger";
            $link = "inicio.php?folder=administracao/&file=excluir.php&id=".$id;
        }

    }
    
    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>