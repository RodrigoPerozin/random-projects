<?php
    if((!isset($_SESSION['idsessao'])) || (($_SESSION["idsessao"])!=session_id())){
    header("Location: http://localhost/Rodrigo%20Lanches/index.php");
    exit;
    }
?>