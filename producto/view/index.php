<?php include("../view/header.php") ?>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
            <h1>Productos</h1>
            </div>
        </div>

    <div class="row text-right">
        <div class="col col-lg-12">
            <a class="btn btn-info" href="producto.php?action=PDF" role="button">Reporte Productos</a>
            &nbsp;
            <a class="btn btn-success" href="producto.php?action=form" role="button">Nuevo Producto</a>
        </div>
    </div>

    <div class="row text-right">
        <div class="col col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row ">
        <div class="col col-lg-12">
            <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Productos</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Foto</th>
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
                    <td><?php echo $row["id_categoria"]; ?></td>
                    <td><?php echo $row["producto"]; ?></td>
                    <td><?php echo $row["descripcion"]; ?></td>
                    <td><?php echo $row["precio"]; ?></td>
                    <td>
                        <img class="rounded-circle" alt="100x100" src="../fotos/<?php echo ($row['foto'] != null)  ? $row['foto'] : 'noproduct.png'  ?>" width="70" height="70">
                    </td>

                    <td><a class="btn btn-secondary" href="producto.php?action=form&id_producto=<?php echo $row["id_producto"] ?>" role="button">Actualizar</a></td>
                    <td><a class="btn btn-danger" href="producto.php?action=delete&id_producto=<?php echo $row["id_producto"] ?>" role="button">Eliminar</a></td>
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