<?php

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $precoLen = strlen($preco);
    $msg = "";

    if ($nome=="" || !isset($_POST['nome'])) {
        $msg = "Por favor informe um nome válido!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=editar.php";
    }elseif ($descricao=="" || !isset($_POST['descricao'])) {
        $msg = "Por favor informe uma descrição válida!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=editar.php";
    }elseif ($categoria=="" || !isset($_POST['categoria'])) {
        $msg = "Por favor informe uma categoria válida!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=editar.php";
    }elseif ($preco=="" || $precoLen < 1 || $precoLen > 7 || ((strpos($preco, ','))==true)) {
        $msg = "Por favor insira um preço válido!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=editar.php";
    }elseif (!isset($_POST['aceitarTermos'])) {
        $msg = "Por favor aceite os termos antes de inserir!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=editar.php";
    }else{

        $sql = "SELECT * FROM cardapio WHERE nome=:nome AND id<>:id";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':nome', $nome);
        $stm_sql->bindParam(':id', $id);
        $stm_sql->execute();

        if ($stm_sql->rowCount()==0) {
            
            $sql = "UPDATE cardapio SET nome=:nome, descricao=:descricao, categoria=:categoria, preco=:preco WHERE id=:id";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql->bindParam(':id', $id);
            $stm_sql->bindParam(':nome', $nome);
            $stm_sql->bindParam(':descricao', $descricao);
            $stm_sql->bindParam(':categoria', $categoria);
            $stm_sql->bindParam(':preco', $preco);

            $result = $stm_sql->execute();

            if ($result) {
                $msg="Item alterado com sucesso!";
                $status="success";
                $link = "inicio.php?folder=administracao/&file=administracao.php";
            }else{
                $msg="Erro ao alterar item!";
                $status="danger";
                $link = "inicio.php?folder=administracao/&file=editar.php";
            }

        }else{
            $msg="Já existe um item com o mesmo nome!";
            $status="danger";
            $link = "inicio.php?folder=administracao/&file=editar.php";
        }

    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status."&id=".$id);

?>

?>