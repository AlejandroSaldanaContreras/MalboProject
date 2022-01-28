<?php include("../view/header.php") ?>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
            <h1>Distribuidores</h1>
            </div>
        </div>

        <div class="row text-right">
            <div class="col col-lg-12">
                <a class="btn btn-success" href="distribuidor.php?action=form" role="button">Nuevo Distribuidor</a>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12">
                <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Distribuidores</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Antiguedad</th>
                        <th scope="col">Actualizar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i = 1;
                        foreach ($data as $resultado => $row) {
                    ?>
                        <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["apaterno"]; ?></td>
                        <td><?php echo $row["amaterno"]; ?></td>
                        <td><?php echo $row["ciudad"]; ?></td>
                        <td><?php echo $row["estado"]; ?></td>
                        <td><?php echo $row["antiguedad"]; ?></td>
                        <td><a class="btn btn-secondary" href="distribuidor.php?action=form&id_distribuidor=<?php echo $row["id_distribuidor"] ?>" role="button">Actualizar</a></td>
                        <td><a class="btn btn-danger" href="distribuidor.php?action=delete&id_distribuidor=<?php echo $row["id_distribuidor"] ?>" role="button">Eliminar</a></td>
                        </tr>

                    <?php
                        $i++;  
                        }
                    ?>            
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include("../view/footer.php") ?>