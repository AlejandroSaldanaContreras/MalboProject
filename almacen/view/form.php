<?php include("../view/header.php") ?>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
                <h1><?php echo is_numeric($id_almacen)? "Modificar Almacén":"Nuevo Almacén" ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12">
            <form action="<?php echo $script; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ciudad</label>
                        <input name="ciudad" value="<?php echo $data["ciudad"]; ?>" type="text" class="form-control" >
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Dirección</label>
                        <input name="direccion" type="text" value="<?php echo $data["direccion"]; ?>" class="form-control">
                    </div>
                    
            
                    <?php if(is_numeric($id_almacen)){  ?>
                        <input type="hidden" name="id_almacen" value="<?php echo $data["id_almacen"]; ?>">
                    <?php } ?>    
                    <button type="submit" type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>    

    </div>
<?php  include("../view/footer.php") ?>