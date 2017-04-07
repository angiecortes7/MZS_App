
            <div class="container">

                <table class="table table-hover">
                    <h2 class="center">Paginas ingresadas</h2>
                    <a href="?c=pagina"><i class="fa fa-reply fa-2x" aria-hidden="true"></i></a>
                    <thead>
                        <tr>
                            <th data-field="id">#</th>
                            <th data-field="nom">Nombre</th>
                            <th data-field="menu">menu</th>
                            <th data-field="icono">icono</th>
                            <th data-field="seccion">seccion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->Pmodel->readPagina() as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row["pag_codigo"]; ?></td>
                                    <td><?php echo $row["pag_nombre"]; ?></td>
                                    <td><?php echo $row["pag_menu"]; ?></td>
                                    <td><?php echo $row["pag_icono"]; ?></td>
                                    <td><?php echo $row["pag_seccion"]; ?></td>
                                    <td>
                                        <a href="?c=pagina&a=update&rcode=<?php echo $row['pag_codigo'];?>">
                                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="?c=pagina&a=delete&rcode=<?php echo $row['pag_codigo'];?>">
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
