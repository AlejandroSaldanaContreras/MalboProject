<?php include("../view/header.php") ?>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
            <h1>Almacenes</h1>
            </div>
        </div>

        <div class="row text-right">
            <div class="col col-lg-12">
                <a class="btn btn-success" href="almacen.php?action=form" role="button">Nuevo Almacén</a>
            </div>
        </div>

        <div class="row text-right">
            <div class="col col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12">
                <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Almacenes</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Dirección</th>
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
                        <td><?php echo $row["ciudad"]; ?></td>
                        <td><?php echo $row["direccion"]; ?></td>
                        <td><a class="btn btn-secondary" href="almacen.php?action=form&id_almacen=<?php echo $row["id_almacen"] ?>" role="button">Actualizar</a></td>
                        <td><a class="btn btn-danger" href="almacen.php?action=delete&id_almacen=<?php echo $row["id_almacen"] ?>" role="button">Eliminar</a></td>
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