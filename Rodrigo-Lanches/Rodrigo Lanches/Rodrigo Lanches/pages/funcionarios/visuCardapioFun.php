<table class="table table-borderless table-dark table-rod">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Categoria</th>
        <th scope="col">Preço</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM cardapio";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();
        $items = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($items as $items){
      ?>
        <tr>
          <th scope="row"><?php echo $items['id'];?></th>
          <td><?php echo $items['nome'];?></td>
          <td><?php echo $items['descricao'];?></td>
          <td><?php echo $items['categoria'];?></td>
          <td><?php echo "R$".$items['preco'];?></td>
        </tr>
      <?php
        }
      ?>
    </tbody>
</table>