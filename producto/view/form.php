<?php include("../view/header.php") ?>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col col-lg-12">
                <h1><?php echo is_numeric($id_producto)? "Modificar Producto":"Nuevo Producto" ?></h1>
            </div>
        </div>


        <div class="row ">
            <div class="col col-lg-12">
                <form action="<?php echo $script; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="id_categoria" class="form-control" >
                            <?php foreach($data_categoria as $prov): ?>
                            
                                
                            <option value="<?php echo $prov['id_categoria'] ?>" <?php if($data['id_categoria'] == $prov['id_categoria']){echo "selected";} ?> > <?php echo $prov['categoria'] ?></option>
                            
                            
                            <?php endforeach; ?>
                                
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Producto</label>
                        <input name="producto" type="text" value="<?php echo $data["producto"]; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input name="descripcion" type="text" value="<?php echo $data["descripcion"]; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input name="precio" value="<?php echo $data["precio"]; ?>" type="number" min="0" step=".01"  class="form-control">
                    </div>

                    <?php if(isset($id_producto)): ?>
                        <img class="rounded-circle" alt="100x100" src="../fotos/<?php echo $data['foto'] ?>" width="210" height="210">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Foto</label>
                        <input name="foto" type="file" value="<?php echo $data["foto"]; ?>" class="form-control">
                    </div>
            
                    <?php if(is_numeric($id_producto)){  ?>
                        <input type="hidden" name="id_producto" value="<?php echo $data["id_producto"]; ?>">
                    <?php } ?>    
                    <button type="submit" type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
<?php  include("../view/footer.php") ?>
