<?php include("../view/header.php") ?>

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
                <h1><?php echo is_numeric($id_distribuidor)? "Modificar Distribuidor":"Nuevo Distribuidor" ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12">
                <form action="<?php echo $script; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" value="<?php echo $data["nombre"]; ?>" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Apellido Paterno</label>
                        <input name="apaterno" type="text" value="<?php echo $data["apaterno"]; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Apellido Materno</label>
                        <input name="amaterno" type="text" value="<?php echo $data["amaterno"]; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <input name="ciudad" type="text" value="<?php echo $data["ciudad"]; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <input name="estado" type="text" value="<?php echo $data["estado"]; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Antiguedad</label>
                        <input name="antiguedad" type="date" value="<?php echo $data["antiguedad"]; ?>" class="form-control">
                    </div>
            
                    <?php if(is_numeric($id_distribuidor)){  ?>
                        <input type="hidden" name="id_distribuidor" value="<?php echo $data["id_distribuidor"]; ?>">
                    <?php } ?>    
                    <button type="submit" type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>    

<?php  include("../view/footer.php") ?>