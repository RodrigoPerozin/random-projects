<h2 style="text-align: center;">Confirmar pagamento</h2>
<form action="inicio.php?folder=funcionarios/&file=conPag.php" method="POST">
    <select name="numeroCliente" class="form-control input-transparent" required>
        <option value="">Número do cliente</option>
        <?php
            $sql = "SELECT numeroCliente FROM pedidos WHERE andamento=1";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql->execute();
            $numeroClientes = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($numeroClientes as $numeroClientes){
        ?>
            <option value="<?php echo $numeroClientes['numeroCliente']?>"><?php echo $numeroClientes['numeroCliente']?></option>
        <?php
            }
        ?>
    </select><br>
    <div class="form-check form-check-inline">
        <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
        <label class="form-check-label" for="inlineRadio1"><h2>Ciente que estou fechando o pedido do cliente.</h2></label>
    </div><br><br>
    <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Confirmar pagamento</button>
    <a href="inicio.php?folder=funcionarios/&file=funcionarios.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
</form>