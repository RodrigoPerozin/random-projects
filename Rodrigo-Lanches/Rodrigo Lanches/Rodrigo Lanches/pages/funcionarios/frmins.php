<h2 style="text-align: center;">Registro de pedidos</h2><br>
<form action="inicio.php?folder=funcionarios/&file=insPedido.php" method="POST">
    <div class="row">
        <div class="col">
        <input name="numeroCliente" type="number" class="form-control input-transparent" max="999" placeholder="Número do cliente" required>
        </div>
        <div class="col">
            <select name="formaPedido" class="form-control input-transparent" required>
                <option value="">Selecione a forma do pedido</option>
                <option value=0>Comer no local</option>
                <option value=1>Levar pra viagem</option>
            </select>
        </div>
    </div><br>
    <select name="nomeFuncionario" class="form-control input-transparent" required>
        <option value="">Nome do funcionário</option>
        <?php
            $sql = "SELECT nome FROM usuarios WHERE permissao=0";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql->execute();
            $usuarios = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($usuarios as $usuarios){
        ?>
            <option value="<?php echo $usuarios['nome']?>"><?php echo $usuarios['nome']?></option>
        <?php
            }
        ?>
    </select><br>
    <textarea name="pedido" cols="135" rows="6" class="form-control input-transparent" style="font-size: 14px;" placeholder="Liste o pedido aqui." required></textarea><br>
    <div class="form-check form-check-inline">
        <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
        <label class="form-check-label" for="inlineRadio1"><h2>Estou conformado de que todas as informações estão corretas.</h2></label>
    </div><br><br>
    <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Registrar pedido</button>
    <a href="inicio.php?folder=funcionarios/&file=funcionarios.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
</form>
</div>