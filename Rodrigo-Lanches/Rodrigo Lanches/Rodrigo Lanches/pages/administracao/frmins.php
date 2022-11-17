<h2 style="text-align: center;">Cadastro de item no cardápio</h2><br>
<form action="inicio.php?folder=administracao/&file=ins.php" method="POST">
    <div class="row">
      <div class="col">
        <input name="nome" type="text" class="form-control input-transparent" placeholder="Nome do item" required>
      </div>
      <div class="col">
        <input name="descricao" type="text" class="form-control input-transparent" placeholder="Descrição do item" required>
      </div>
    </div><br>
    <div class="row">
        <div class="col">
          <select name="categoria" class="form-control input-transparent" required>
              <option value="">Selecione a categoria</option>
              <option value="Bebidas">Bebidas</option>
              <option value="Salgados">Salgados</option>
              <option value="Acompanhamentos">Acompanhamentos</option>
              <option value="Hamburgueres">Hambúrgueres</option>
              <option value="Doces">Doces</option>
          </select>
        </div>
        <div class="col">
          <input name="preco" type="text" class="form-control input-transparent" maxlenght="7" placeholder="Preço do item (xx.xx)" required>
        </div>
    </div><br>
    <p>Atencão: Ao cadastrar um item no cardápio, você está ciente de que qualquer cliente poderá visualizar este item incluso?</p><br>
    <div class="form-check form-check-inline">
        <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
        <label class="form-check-label" for="inlineRadio1"><h2>Sim</h2></label>
    </div><br><br>
    <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Inserir no cardápio</button>
    <a href="inicio.php?folder=administracao/&file=administracao.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
</form>