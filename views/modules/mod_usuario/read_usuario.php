
            <div class="container">
                <table class="table table-hover">
                    <h2 class="center">Usuarios ingresados</h2>
                            <a href="?c=usuario"><i class="fa fa-reply fa-2x" aria-hidden="true"></i></a>
                    <thead>
                        <tr>
                            <th data-field="id">#</th>
                            <th data-field="nom">Nombre</th>
                            <th data-field="des">Descripción</th>
                            <th data-field="fech">Fecha de creacion</th>
                            <th data-field="fech">Fecha de creacion</th>
                            <th data-field="fech">Fecha de creacion</th>
                            <th data-field="fech">Fecha de creacion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->Umodel->readUsuario() as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row["usu_codigo"]; ?></td>
                                    <td><?php echo $row["usu_nombre_comp"]; ?></td>
                                    <td><?php echo $row["usu_fech_naci"]; ?></td>
                                    <td><?php echo $row["usu_sexo"]; ?></td>
                                    <td><?php echo $row["usu_tel_cel"]; ?></td>
                                    <td><?php echo $row["usu_mail"]; ?></td>
                                    <td><?php echo $row["rol_codigo"]; ?></td>
                                    <td>
                                        <a href="?c=usuario&a=update&usucode=<?php echo $row['usu_codigo'];?>">
                                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="?c=usuario&a=delete&usucode=<?php echo $row['usu_codigo'];?>">
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
