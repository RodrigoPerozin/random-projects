<h2 style="text-align: center;">Registrar Usuário</h2>
    <form action="inicio.php?folder=master/&file=ins.php" method="POST">
    <div class="row">
        <div class="col">
        <input name="nomeUsuario" maxlength="45" type="text" class="form-control input-transparent" placeholder="Nome do usuário" required>
        </div>
        <div class="col">
            <select  name="permissao" class="form-control input-transparent" required>
                <option value="">Selecione a permissão</option>
                <option value="0">Funcionário</option>
                <option value="1">Administrador</option>
                <option value="2">Master</option>
            </select>
        </div>
    </div><br>
    <div class="row">
        <div class="col">
        <input name="email" type="text" class="form-control input-transparent" placeholder="E-mail do usuário" maxlength="85" required>
        </div>
    </div><br>
    <div class="row">
        <div class="col">
        <input name="senhaUsuario" type="password" maxlength="80" class="form-control input-transparent" placeholder="Senha do usuário" maxlength="65" required>
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <input name="inicioEspediente" type="text" maxlength="5" class="form-control input-transparent" placeholder="Início espediente (xx:xx)" required>
        </div>
        <div class="col">
            <input name="fimEspediente" type="text" maxlength="5" class="form-control input-transparent" placeholder="Fim espediente (xx:xx)" required>
        </div>
    </div>
    <div class="form-check form-check-inline">
        <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
        <label class="form-check-label" for="inlineRadio1"><p style="margin-bottom: 0;">Estou ciente que ao registrar este usuário, ele terá acesso a este sistema, bem como usar algumas funcionalidades dele.</p></label>
    </div><br><br>
    <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Registrar usuário</button>
    <a href="inicio.php?folder=master/&file=master.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
</form>