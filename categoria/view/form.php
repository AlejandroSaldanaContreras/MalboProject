<?php include("../view/header.php") ?>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
                <h1><?php echo is_numeric($id_categoria)? "Modificar Proveedor":"Nuevo Proveedor" ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12">
            <form action="<?php echo $script; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Categoría</label>
                        <input name="categoria" value="<?php echo $data["categoria"]; ?>" type="text" class="form-control" >
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descripción</label>
                        <input name="descripcion" type="text" value="<?php echo $data["descripcion"]; ?>" class="form-control">
                    </div>
                    
            
                    <?php if(is_numeric($id_categoria)){  ?>
                        <input type="hidden" name="id_categoria" value="<?php echo $data["id_categoria"]; ?>">
                    <?php } ?>    
                    <button type="submit" type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>    

    </div>
<?php  include("../view/footer.php") ?>