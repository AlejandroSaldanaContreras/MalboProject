<?php include("../view/header.php") ?>
    
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
            <h1>Categorías</h1>
            </div>
        </div>

        <div class="row text-right">
            <div class="col col-lg-12">
                <a class="btn btn-success" href="categoria.php?action=form" role="button">Nueva Categoría</a>
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
                    <th scope="col">Categorias</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Descripción</th>
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
                        <td><?php echo $row["categoria"]; ?></td>
                        <td><?php echo $row["descripcion"]; ?></td>
                        <td><a class="btn btn-secondary" href="categoria.php?action=form&id_categoria=<?php echo $row["id_categoria"] ?>" role="button">Actualizar</a></td>
                        <td><a class="btn btn-danger" href="categoria.php?action=delete&id_categoria=<?php echo $row["id_categoria"] ?>" role="button">Eliminar</a></td>
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