<table class="table table-borderless table-dark table-rod">
    <thead>
      <tr>
        <th scope="row">Número do cliente</th>
        <th scope="col">Forma do pedido</th>
        <th scope="col">Pedido</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT * FROM pedidos WHERE nomeFuncionario=:nomeFuncionario";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->bindParam(":nomeFuncionario", $_SESSION['nome']);
      $stm_sql->execute();
      $pedidos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

      foreach($pedidos as $pedido){

        $formaPedido = ($pedido['formaPedido'] == 1) ? "Comer no local": "Levar para viagem";
        $andamento = ($pedido['andamento'] == 1) ? "<span style='color:green;'>Não finalizado</span>": "<span style='color:red;'>Finalizado</span>";

    ?>
        <tr>
            <th scope="row"><?php echo $pedido['numeroCliente'];?></th>
            <td><?php echo $formaPedido;?></td>
            <td><?php echo $pedido['pedido'];?></td>
            <td id="andamento"><?php echo $andamento;?></td>
        </tr>
    <?php
      }
    ?>
    </tbody>
</table>