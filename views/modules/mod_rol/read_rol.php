
            <div class="container">
                <table class="table table-hover">
                    <h2 class="center">Roles ingresados</h2>
                            <a href="?c=rol"><i class="fa fa-reply fa-2x" aria-hidden="true"></i></a>
                    <thead>
                        <tr>
                            <th data-field="id">#</th>
                            <th data-field="nom">Nombre</th>
                            <th data-field="des">Descripción</th>
                            <th data-field="fech">Fecha de creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->Rmodel->readRol() as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row["rol_codigo"]; ?></td>
                                    <td><?php echo $row["rol_nombre"]; ?></td>
                                    <td><?php echo $row["rol_descripcion"]; ?></td>
                                    <td><?php echo $row["rol_fech_creacion"]; ?></td>
                                    <td>
                                        <a href="?c=rol&a=update&rcode=<?php echo $row['rol_codigo'];?>">
                                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="?c=rol&a=delete&rcode=<?php echo $row['rol_codigo'];?>">
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
