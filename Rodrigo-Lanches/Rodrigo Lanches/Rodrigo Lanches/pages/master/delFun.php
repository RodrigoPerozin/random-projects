<h2 style="text-align: center;">Remover usuário</h2>
    <form action="inicio.php?folder=master/&file=del.php" method="POST">
    <div class="row">
        <div class="col">
            <select name="nomeUsuario" class="form-control input-transparent" required>
                <option value="">Selecione o usuário</option>
                <?php
                    $sql = "SELECT nome FROM usuarios";
                    $stm_sql = $db_connection->prepare($sql);
                    $stm_sql->execute();
                    $usuarios = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

                    foreach($usuarios as $usuarios){
                ?>
                <option value="<?php echo $usuarios['nome']?>"><?php echo $usuarios['nome']?></option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div><br>
    <div class="form-check form-check-inline">
        <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
        <label class="form-check-label" for="inlineRadio1"><p style="margin-bottom: 0;">Estou ciente que ao remover este usuário, ele perderá todo acesso a este sistema, bem como os dados dele.</p></label>
    </div><br><br>
    <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Remover usuário</button>
    <a href="inicio.php?folder=master/&file=master.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
</form>