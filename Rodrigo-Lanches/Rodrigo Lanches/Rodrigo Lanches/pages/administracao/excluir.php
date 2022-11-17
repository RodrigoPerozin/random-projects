<h2 style="text-align: center;">Excluir item</h2><br>
<form action="inicio.php?folder=administracao/&file=del.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <p>Atencão: Ao excluir um item do cardápio, você está ciente de que qualquer cliente poderá ver que este item foi excluído? E também que a Rodrigo Lanches está de acordo com essas mudanças?</p><br>
    <div class="form-check form-check-inline">
        <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
        <label class="form-check-label" for="inlineRadio1"><h2>Sim</h2></label>
    </div><br><br>
    <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Excluir item</button>
    <a href="inicio.php?folder=administracao/&file=visuCardapio.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
</form>