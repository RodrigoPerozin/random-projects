<table class="table table-borderless table-dark table-rod">
    <thead>
      <tr>
        <th scope="row">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Cargo</th>
        <th scope="col">Inicio espediente</th>
        <th scope="col">Fim espediente</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT nome, email, permissao, inicioEspediente, fimEspediente FROM usuarios";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->execute();
      $usuarios = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

      foreach($usuarios as $usuarios){

        $permissao = ($usuarios['permissao'] == 1) ? "Administrador": "Funcionário";
        if ($usuarios['permissao'] == 2) {
            $permissao = "Master";
        }

    ?>
        <tr>
            <th scope="row"><?php echo $usuarios['nome'];?></th>
            <td><?php echo $usuarios['email'];?></td>
            <td><?php echo $permissao;?></td>
            <td id="andamento"><?php echo $usuarios['inicioEspediente'];?></td>
            <td><?php echo $usuarios['fimEspediente'];?></td>
        </tr>
    <?php
      }
    ?>
    </tbody>
</table>