<?php 
    include("../class/categoria.class.php");
    $action = (isset($_GET['action']))?$_GET['action']:null;

    switch($action){
        case 'new':
            $datos = [
                'categoria' => (isset($_POST['categoria']))?$_POST['categoria']:'alguna categoria',
                'descripcion' => (isset($_POST['descripcion']))?$_POST['descripcion']:'alguna descripcion',
            ];
            $categoria->setCategoria($datos['categoria']);
            $categoria->setDescripcion($datos['descripcion']);
            $categoria->crearCategoria();
            header("Location: categoria.php");
        break;

        case 'modify':
            $datos = [
                'categoria' => (isset($_POST['categoria']))?$_POST['categoria']:'alguna categoria',
                'descripcion' => (isset($_POST['descripcion']))?$_POST['descripcion']:'alguna descripcion',
                'id_categoria' => ($_POST['id_categoria']),
            ];
            $categoria->setidCategoria($datos['id_categoria']);
            $categoria->setCategoria($datos['categoria']);
            $categoria->setDescripcion($datos['descripcion']);
            $categoria->modificarCategoria();
            header("Location: categoria.php");
        break;

        case 'form':
            $id_categoria=(isset($_GET["id_categoria"]))?$_GET["id_categoria"]:null;
            $data = [
                'categoria'=>'',
                'descripcion'=>'',
            ];

            if(is_numeric($id_categoria)){
                $categoria->setidCategoria($id_categoria);
                $data = $categoria->leerUnaCategoria();
                $script="categoria.php?action=modify";
                include("view/form.php");
            }else{
                $script = "categoria.php?action=new";
                include("view/form.php");
            }
        break;

        case 'delete':
            $id_categoria=(isset($_GET["id_categoria"]))?$_GET["id_categoria"]:null;
            if(is_numeric($id_categoria)){
                $categoria->setidCategoria($id_categoria);
                $categoria->borrarCategoria();
            }
            header("Location: categoria.php");
        break;

        case 'show':
        default:
            $data = $categoria->leerCategorias();
            include("view/index.php");
        break;    
    }
?>