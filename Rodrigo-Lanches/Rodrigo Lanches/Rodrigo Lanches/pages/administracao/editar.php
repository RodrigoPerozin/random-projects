                <?php
                    $id = $_GET['id'];
                ?>
                <h2 style="text-align: center;">Editar item</h2><br>
                <form action="inicio.php?folder=administracao/&file=alt.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="row">
                        <div class="col">
                            <?php
                                $sql = "SELECT * FROM cardapio WHERE id=:id";
                                $stm_sql = $db_connection->prepare($sql);
                                $stm_sql->bindParam(":id", $id);
                                $stm_sql->execute();
                                $info = $stm_sql->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <input name="nome" type="text" class="form-control input-transparent" placeholder="Nome do item" value="<?php echo $info['nome'];?>" required>
                        </div>
                        <div class="col">
                            <input name="descricao" type="text" class="form-control input-transparent" placeholder="Descrição do item" value="<?php echo $info['descricao'];?>" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <select id="categoria" name="categoria" class="form-control input-transparent" required>
                                <option value="">Selecione a categoria</option>
                                <option value="Bebidas">Bebidas</option>
                                <option value="Salgados">Salgados</option>
                                <option value="Acompanhamentos">Acompanhamentos</option>
                                <option value="Hamburgueres">Hambúrgueres</option>
                                <option value="Doces">Doces</option>
                            </select>
                            <script>
                                categoriaInfo("<?php echo $info['categoria'];?>")
                            </script>
                        </div>
                        <div class="col">
                            <input name="preco" type="text" class="form-control input-transparent" maxlenght="6" placeholder="Preço do item" value="<?php echo $info['preco'];?>" required>
                        </div>
                        </div><br>
                        <p>Atencão: Ao alterar um item do cardápio, você está ciente de que qualquer cliente poderá visualizar este item alterado? E também que a Rodrigo Lanches está de acordo com essas mudanças?</p><br>
                        <div class="form-check form-check-inline">
                            <input name="aceitarTermos" class="form-check-input checkbox-rod" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="sim" required>
                            <label class="form-check-label" for="inlineRadio1"><h2>Sim</h2></label>
                        </div><br><br>
                        <button type="submit" class="btn btn-warning" style="background-color:#ffc107;">Alterar item</button>
                        <a href="inicio.php?folder=administracao/&file=visuCardapio.php"><button type="button" class="btn btn-warning" style="background-color:#ffc107;">Cancelar</button></a>
                    </div>
                </form>