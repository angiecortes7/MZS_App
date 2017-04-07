
    <div class="container">
                <table class="table table-hover" id="myTable">
                    <h2 class="center">Restaurantes ingresados</h2>
                    <a href="?c=restaurante"><i class="fa fa-reply fa-2x" aria-hidden="true"></i></a>
                    <thead>
                        <tr>
                            <th data-field="id">#</th>
                            <th data-field="nom">Nombre</th>
                            <th data-field="tel">Telefono</th>
                            <th data-field="dir">Direccion </th>
                            <th data-field="hora">Horario</th>
                            <th data-field="cant">Cantidad de mesas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($this->REmodel->readRestaurante() as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row["restau_codigo"]; ?></td>
                                    <td><?php echo $row["restau_nombre"]; ?></td>
                                    <td><?php echo $row["restau_telefono"]; ?></td>
                                    <td><?php echo $row["restau_direccion"]; ?></td>
                                    <td><?php echo $row["restau_horario"]; ?></td>
                                    <td><?php echo $row["restau_cant_mesas"]; ?></td>
                                    <td>
                                        <a href="?c=restaurante&a=update&rcode=<?php echo $row['restau_codigo'];?>">
                                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="?c=restaurante&a=delete&rcode=<?php echo $row['restau_codigo'];?>">
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
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
