<table class="table table-borderless table-dark table-rod">
    <thead>
      <tr>
        <th scope="row">Número do cliente</th>
        <th scope="col">Pedido</th>
        <th scope="col">Forma do pedido</th>
        <th scope="col">Status</th>
        <th scope="col">Funcionário responsável</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT * FROM pedidos";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->execute();
      $pedidos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

      foreach($pedidos as $pedidos){

        $formaPedido = ($pedidos['formaPedido'] == 1) ? "Comer no local": "Levar para viagem";
        $andamento = ($pedidos['andamento'] == 1) ? "<span style='color:green;'>Não finalizado</span>": "<span style='color:red;'>Finalizado</span>";

    ?>
        <tr>
            <th scope="row"><?php echo $pedidos['numeroCliente'];?></th>
            <td><?php echo $pedidos['pedido'];?></td>
            <td><?php echo $formaPedido;?></td>
            <td id="andamento"><?php echo $andamento;?></td>
            <td><?php echo $pedidos['nomeFuncionario'];?></td>
        </tr>
    <?php
      }
    ?>
    </tbody>
</table>