<?php
    include("../class/producto.class.php");
    include("../class/categoria.class.php");
    $action = (isset($_GET['action']))?$_GET['action']:null;

    switch($action){
        case 'new':
            $sistema->VerificarPermiso("Crear Producto");
            $datos=[
                'id_categoria' => (isset($_POST['id_categoria']))?$_POST['id_categoria']:'alguna id_categoria',
                'producto' => (isset($_POST['producto']))?$_POST['producto']:'alguna producto',
                'descripcion' => (isset($_POST['descripcion']))?$_POST['descripcion']:'alguna descripcion',
                'precio' => (isset($_POST['precio']))?$_POST['precio']:'alguna precio',
            ];
            $producto->setIdCategoria($datos['id_categoria']);
            $producto->setProducto($datos['producto']);
            $producto->setDescripcion($datos['descripcion']);
            $producto->setPrecio($datos['precio']);
            $producto->crearProducto();
            header("Location: producto.php");
            break;

        case 'modify':
            $sistema->VerificarPermiso("Actualizar Producto");
            $datos=[
                'id_categoria' => (isset($_POST['id_categoria']))?$_POST['id_categoria']:'alguna id_categoria',
                'producto' => (isset($_POST['producto']))?$_POST['producto']:'alguna producto',
                'descripcion' => (isset($_POST['descripcion']))?$_POST['descripcion']:'alguna descripcion',
                'precio' => (isset($_POST['precio']))?$_POST['precio']:'alguna precio',
                'id_producto' => ($_POST['id_producto'])
            ];
            $producto->setIdCategoria($datos['id_categoria']);
            $producto->setProducto($datos['producto']);
            $producto->setDescripcion($datos['descripcion']);
            $producto->setPrecio($datos['precio']);
            $producto->setIdProducto($datos['id_producto']);
            $producto->modificarProducto();
            header("Location: producto.php");
            break;
        
        case 'form':
            $id_producto=(isset($_GET["id_producto"]))?$_GET["id_producto"]:null;
            $data=[
                'id_categoria'=>'',
                'producto'=>'',
                'descripcion'=>'',
                'precio'=>'',
            ];

            $data_categoria = $categoria->leerCategorias();
            if(is_numeric($id_producto)){
                $sistema->VerificarPermiso("Actualizar Producto");
                $producto->setIdProducto($id_producto);
                $data = $producto->leerUnProducto();
                $script = "producto.php?action=modify";
                include("view/form.php");
            }else{
                $sistema->VerificarPermiso("Crear Producto");
                $script="producto.php?action=new";
                include("view/form.php");
            }
            break;

        case 'delete':
            $sistema->VerificarPermiso("Eliminar Producto");
            $id_producto=(isset($_GET["id_producto"]))?$_GET["id_producto"]:null;
            if(is_numeric($id_producto)){
                $producto->setIdProducto($id_producto);
                $producto->borrarProducto();
            }
            header("Location: producto.php");
            break;

        case 'JSON':
            $metodo = $_SERVER['REQUEST_METHOD'];
            switch($metodo){
                case 'POST':
                    $producto->insertarProductoJSON();
                    break;

                case 'DELETE':
                    $producto->borrarProductoJSON();
                    break;
                    
                case 'GET':
                default: 
                $producto->leerProductoJSON();      
                    break;               
            }
            
            break;
        
        case 'PDF':
            $data_categorias = $categoria->leerCategorias();
            $producto->reporteProductos($data_categorias);    
        case 'show':
            default:
            $sistema->VerificarPermiso("Leer Producto");
            $data= $producto->leerProducto();
            include("view/index.php");     
        
    }

?>
