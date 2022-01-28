<?php 
    include("../class/almacen.class.php");
    $action = (isset($_GET['action']))?$_GET['action']:null;

    switch($action){
        case 'new':
            $datos = [
                'ciudad' => (isset($_POST['ciudad']))?$_POST['ciudad']:'alguna ciudad',
                'direccion' => (isset($_POST['direccion']))?$_POST['direccion']:'alguna direccion',
            ];
            $almacen->setCiudad($datos['ciudad']);
            $almacen->setDireccion($datos['direccion']);
            $almacen->crearAlmacen();
            header("Location: almacen.php");
            break;

        case 'modify':
            $datos = [
                'ciudad' => (isset($_POST['ciudad']))?$_POST['ciudad']:'alguna ciudad',
                'direccion' => (isset($_POST['direccion']))?$_POST['direccion']:'alguna direccion',
                'id_almacen' => ($_POST['id_almacen']),
            ];
            $almacen->setIdAlmacen($datos['id_almacen']);
            $almacen->setCiudad($datos['ciudad']);
            $almacen->setDireccion($datos['direccion']);
            $almacen->modificarAlmacen();
            header("Location: almacen.php");
        break;
        
        case 'form':
            $id_almacen=(isset($_GET["id_almacen"]))?$_GET["id_almacen"]:null;
            $data = [
                'ciudad'=>'',
                'direccion'=>'',
            ];

            if(is_numeric($id_almacen)){
                $almacen->setIdAlmacen($id_almacen);
                $data = $almacen->leerUnAlmacen();
                $script="almacen.php?action=modify";
                include("view/form.php");
            }else{
                $script = "almacen.php?action=new";
                include("view/form.php");
            }
        break;

        case 'delete':
            $id_almacen=(isset($_GET["id_almacen"]))?$_GET["id_almacen"]:null;
            if(is_numeric($id_almacen)){
                $almacen->setIdAlmacen($id_almacen);
                $almacen->borrarAlmacen();
            }
            header("Location: almacen.php");
        break;

        case 'show':
        default:
            $data = $almacen->leerAlmacenes();
            include("view/index.php");
        break;    
    }
?>