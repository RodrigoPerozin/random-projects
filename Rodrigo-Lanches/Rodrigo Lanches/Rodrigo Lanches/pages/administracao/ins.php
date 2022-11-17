<?php

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $precoLen = strlen($preco);
    $msg = "";

    if ($nome=="" || !isset($_POST['nome'])) {
        $msg = "Por favor informe um nome válido!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=frmins.php";
    }elseif ($descricao=="" || !isset($_POST['descricao'])) {
        $msg = "Por favor informe uma descrição válida!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=frmins.php";
    }elseif ($categoria=="" || !isset($_POST['categoria'])) {
        $msg = "Por favor informe uma categoria válida!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=frmins.php";
    }elseif ($preco=="" || $precoLen < 1 || $precoLen > 7 || ((strpos($preco, ','))==true)) {
        $msg = "Por favor insira um preço válido!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=frmins.php";
    }elseif (!isset($_POST['aceitarTermos'])) {
        $msg = "Por favor aceite os termos antes de inserir!";
        $status="danger";
        $link = "inicio.php?folder=administracao/&file=frmins.php";
    }else{

        $id = NULL;

        $sql = "INSERT INTO cardapio (id, nome, descricao, categoria, preco) VALUES (:id, :nome, :descricao, :categoria, :preco)";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':id', $id);
        $stm_sql->bindParam(':nome', $nome);
        $stm_sql->bindParam(':descricao', $descricao);
        $stm_sql->bindParam(':categoria', $categoria);
        $stm_sql->bindParam(':preco', $preco);

        $result = $stm_sql->execute();

        if ($result) {
            $msg="Item registrado com sucesso!";
            $status="success";
            $link = "inicio.php?folder=administracao/&file=administracao.php";
        }else{
            $msg="Erro ao cadastrar item!";
            $status="danger";
            $link = "inicio.php?folder=administracao/&file=frmins.php";
        }
    }

    header("Location: ".$link."&mensagem=".$msg."&status=".$status);

?>