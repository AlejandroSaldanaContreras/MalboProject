<?php
    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;
    require_once("database.class.php");

    Class Producto extends Database{
        var $id_producto; 
        var $id_categoria;
        var $producto;
        var $descripcion;
        var $precio;
        var $foto;

        function getIdProducto(){return $this->id_producto;}
        function getIdCategoria(){return $this->id_categoria;}
        function getProducto(){return $this->producto;}
        function getDescripcion(){return $this->descripcion;}
        function getPrecio(){return $this->precio;}
        function getFoto(){return $this->foto;}

        function setIdProducto($id_producto){return $this->id_producto=$id_producto;}
        function setIdCategoria($id_categoria){return $this->id_categoria=$id_categoria;}
        function setProducto($producto){return $this->producto=$producto;}
        function setDescripcion($descripcion){return $this->descripcion=$descripcion;}
        function setPrecio($precio){return $this->precio=$precio;}
        function setFoto($foto){return $this->foto=$foto;}

        function crearProducto(){
            $this->connect();

            if(isset($_FILES['foto']['name'])){
            $_FILES['foto']['name'] = preg_replace('([^A-Za-z0-9_.])', '', $_FILES['foto']['name']);
            move_uploaded_file($_FILES['foto']['tmp_name'],'C:\xampp\htdocs\Proyecto\fotos/'.$_FILES['foto']['name']);
            $stmt = $this->con->prepare("INSERT INTO producto(id_categoria, producto, descripcion, precio, foto) VALUES (?,?,?,?,?)");
            }else{
                $stmt = $this->con->prepare("INSERT INTO producto(id_categoria, producto, descripcion, precio) VALUES (?,?,?,?)");
            }
            
                $id_categoria = $this->getIdCategoria();
                $producto = $this->getProducto();
                $descripcion = $this->getDescripcion();
                $precio = $this->getPrecio();
                $stmt->bindParam(1,$id_categoria);
                $stmt->bindParam(2,$producto);
                $stmt->bindParam(3,$descripcion);
                $stmt->bindParam(4,$precio);
                
                if(isset($_FILES['foto']['name'])){
                $stmt->bindParam(5,$_FILES['foto']['name']);
                }
                $stmt->execute();
            $this->close();
        }

        function leerProducto(){
            $this->connect();
            $datos = array();
            $result = $this->con->query("SELECT * FROM producto");
            $datos = $result->fetchAll();
            $this->close();
            return $datos;
        }

        function borrarProducto(){
            $this->connect();
            if($stmt = $this->con->prepare("DELETE FROM producto WHERE id_producto = ?")){
                $id_producto = $this->getIdProducto();
                $stmt->bindParam(1,$id_producto);
                $stmt->execute();
            }
            $this->close();
        }

        function leerUnProducto(){
            $this->connect();
            $datos = array();

            if($stmt = $this->con->prepare("SELECT * FROM producto WHERE id_producto = ?")){
                $id_producto = $this->getIdProducto();
                $stmt->bindParam(1, $id_producto);
                $stmt->execute();
                $datos = $stmt->fetchAll();
                return $datos[0];
            }
            $this->close();
        }

        function leerProductoJSON(){
            $datos = $this->leerProducto();
            header('Content-Type: application/json');
            echo json_encode($datos);   
        }

        function borrarProductoJSON(){
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $this->setIdProducto($data[0]["id_producto"]);
            $this->borrarProducto();

            $res = Array();
            $res['mensaje'] = "Producto eliminado";
            $res['id_producto'] = $data[0]['id_producto'];
            header('Content-Type: application/json');
            echo json_encode($res);
        }

        function insertarProductoJSON(){
            $this->setIdCategoria($_POST["id_categoria"]);
            $this->setProducto($_POST["producto"]);
            $this->setDescripcion($_POST["descripcion"]);
            $this->setPrecio($_POST["precio"]);
            if(isset($_POST['id_producto'])){
                $this->setIdProducto($_POST['id_producto']);
                $this->modificarProducto();
                $res = Array();
                $res['mensaje'] = "Producto modificado";
                $res['producto'] =$_POST["producto"];
                header('Content-Type: application/json');
                echo json_encode($res);
            }else{
            $this->crearProducto();
            $res = Array();
            $res['mensaje'] = "Producto creado";
            $res['producto'] =$_POST["producto"];
            header('Content-Type: application/json');
            echo json_encode($res);
            }
        }
        


        function modificarProducto(){
            $this->connect();

            if($_FILES['foto']['name']){
                $_FILES['foto']['name'] = preg_replace('([^A-Za-z0-9_.])', '', $_FILES['foto']['name']);
                if(move_uploaded_file($_FILES['foto']['tmp_name'],'C:\xampp\htdocs\Proyecto\fotos/'.$_FILES['foto']['name'])){
                    
                    if($stmt = $this->con->prepare("UPDATE producto SET id_categoria=?, producto=?, descripcion=?, precio=?, foto=? WHERE id_producto=?")){
                        $datos = [
                            'id_producto' => $this->getIdProducto(),
                            'id_categoria' => $this->getIdCategoria(),
                            'producto' => $this->getProducto(),
                            'descripcion' => $this->getDescripcion(),
                            'precio' => $this->getPrecio(),
                            'foto' => $_FILES['foto']['name']
                        ];
                        $stmt->bindParam(1,$datos['id_categoria']);
                        $stmt->bindParam(2,$datos['producto']);
                        $stmt->bindParam(3,$datos['descripcion']);
                        $stmt->bindParam(4,$datos['precio']);
                        $stmt->bindParam(5,$datos['foto']);
                        $stmt->bindParam(6,$datos['id_producto']);
                        $stmt->execute();
                    }
                }

            }else{
                if($stmt = $this->con->prepare("UPDATE producto SET id_categoria=?, producto=?, descripcion=?, precio=? WHERE id_producto=?")){
                    $datos = [
                        'id_producto' => $this->getIdProducto(),
                        'id_categoria' => $this->getIdCategoria(),
                        'producto' => $this->getProducto(),
                        'descripcion' => $this->getDescripcion(),
                        'precio' => $this->getPrecio()
                    ];
                    $stmt->bindParam(1,$datos['id_categoria']);
                    $stmt->bindParam(2,$datos['producto']);
                    $stmt->bindParam(3,$datos['descripcion']);
                    $stmt->bindParam(4,$datos['precio']);
                    $stmt->bindParam(5,$datos['id_producto']);
                    $stmt->execute();
                }
            }
            
            $this->close();
        }

        function reporteProductos($data_categoria){
            require $_SERVER['DOCUMENT_ROOT'].'/proyecto/vendor/autoload.php';
            try {
                $content = '<page><h1 style= "color:green" >Productos</h1>';
                $datos = $this->leerProducto();
                $content.= "<table>";
                $content.= "<tr><th>Categoria</th><th>Producto</th><th>Descripción</th><th>Precio</th></tr>";
                foreach($datos as $key => $value){
                    $content.= "<tr>";
                    for($j=0; $j<count($data_categoria); $j++){
                        if($value['id_categoria'] == $data_categoria[$j]['id_categoria']){
                            $content.= "<td>".$data_categoria[$j]['categoria']."</td>";
                        }
                    }
                    $content.= "<td>".$value['producto']."</td>";
                    $content.= "<td>".$value['descripcion']."</td>";
                    $content.= "<td>".$value['precio']."</td>";
                    $content.= "</tr>";
                }
                $content.="</table>";
                $content.= "</page>";
                $html2pdf = new Html2Pdf('P', 'A4', 'fr');
                $html2pdf->writeHTML($content);
                ob_end_clean();
                $html2pdf->output('example01.pdf');
            } catch (Html2PdfException $e) {
                $html2pdf->clean();

                $formatter = new ExceptionFormatter($e);
                echo $formatter->getHtmlMessage();
            }
        }
    }
    $producto = new Producto;

?>