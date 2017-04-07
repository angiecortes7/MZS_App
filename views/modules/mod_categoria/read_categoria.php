
            <div class="container">
                <table class="table table-hover">
                    <h2 class="center">Categorias ingresadas</h2>
                    <a href="?c=categoria"><i class="fa fa-reply fa-2x" aria-hidden="true"></i></a>
                    <thead>
                        <tr>
                            <th data-field="id">#</th>
                            <th data-field="nom">Nombre</th>
                            <th data-field="imagen">imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->Cmodel->readCategoria() as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row["categ_codigo"]; ?></td>
                                    <td><?php echo $row["categ_nombre"]; ?></td>
                                    <td><?php echo $row["categ_imagen"]; ?></td>
                                    <td>
                                        <a href="?c=categoria&a=update&rcode=<?php echo $row['categ_codigo'];?>">
                                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="?c=categoria&a=delete&rcode=<?php echo $row['categ_codigo'];?>">
                                            <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                                        </a>

                                    </td>

                                </tr>
                            <?php
                            }
                            ?>

                    </tbody>
                </table>
            </div>
