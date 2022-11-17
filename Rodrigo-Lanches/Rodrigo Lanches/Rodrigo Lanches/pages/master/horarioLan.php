
<h2 style="text-align: center;">Definir horário de funcionamento da lanchonete</h2><br>
    <form action="inicio.php?folder=master/&file=lan.php" method="POST">
    <?php
        $sql = "SELECT horarioAbertura, horarioFechamento FROM lanchonete";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();
        $info = $stm_sql->fetch(PDO::FETCH_ASSOC);
    ?>
    <p>Horário atual: Abre as <?php echo $info['horarioAbertura'];?> e fecha as <?php echo $info['horarioFechamento'];?>.</p>
    <div class="row">
        <div class="col">
            <input name="horarioAbertura" type="text" maxlength="5" class="form-control input-transparent" placeholder="Horário de abertura (xx:xx)" required>
        </div>
        <div class="col">
            <input name="horarioFechamento" type="text" maxlength="5" class="form-control input-transparent" placeholder="Horário de fechamento(xx:xx)" required>
        </div>
    </div><br>
    <div class="form-check form-check-inline">
        <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
        <label class="form-check-label" for="inlineRadio1"><p style="margin-bottom: 0;">Estou ciente que fazendo esta alteração, a Rodrigo Lanches será aberta/fechada nos horários definidos acima.</p></label>
    </div><br><br>
    <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Definir horário</button>
    <a href="inicio.php?folder=master/&file=master.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
</form>