<?php 
    include("../class/distribuidor.class.php");
    $action = (isset($_GET['action']))?$_GET['action']:null;
    $sistema->VerificarPermiso("Distribuidor");
    switch($action){
        case 'new':
            $datos = [
                'nombre' => (isset($_POST['nombre']))?$_POST['nombre']:'alguna nombre',
                'apaterno' => (isset($_POST['apaterno']))?$_POST['apaterno']:'alguna apaterno',
                'amaterno' => (isset($_POST['amaterno']))?$_POST['amaterno']:'alguna amaterno',
                'ciudad' => (isset($_POST['ciudad']))?$_POST['ciudad']:'alguna ciudad',
                'estado' => (isset($_POST['estado']))?$_POST['estado']:'alguna estado',
                'antiguedad' => (isset($_POST['antiguedad']))?$_POST['antiguedad']:'alguna antiguedad',
            ];
            $distribuidor->setNombre($datos['nombre']);
            $distribuidor->setApaterno($datos['apaterno']);
            $distribuidor->setAmaterno($datos['amaterno']);
            $distribuidor->setCiudad($datos['ciudad']);
            $distribuidor->setEstado($datos['estado']);
            $distribuidor->setAntiguedad($datos['antiguedad']);
            $distribuidor->crearDistribuidor();
            header("Location: distribuidor.php");
            break;
        
        case 'modify':
            $datos = [
                'nombre' => (isset($_POST['nombre']))?$_POST['nombre']:'alguna nombre',
                'apaterno' => (isset($_POST['apaterno']))?$_POST['apaterno']:'alguna apaterno',
                'amaterno' => (isset($_POST['amaterno']))?$_POST['amaterno']:'alguna amaterno',
                'ciudad' => (isset($_POST['ciudad']))?$_POST['ciudad']:'alguna ciudad',
                'estado' => (isset($_POST['estado']))?$_POST['estado']:'alguna estado',
                'antiguedad' => (isset($_POST['antiguedad']))?$_POST['antiguedad']:'alguna antiguedad',
                'id_distribuidor' => ($_POST['id_distribuidor'])
            ];
            $distribuidor->setNombre($datos['nombre']);
            $distribuidor->setApaterno($datos['apaterno']);
            $distribuidor->setAmaterno($datos['amaterno']);
            $distribuidor->setCiudad($datos['ciudad']);
            $distribuidor->setEstado($datos['estado']);
            $distribuidor->setAntiguedad($datos['antiguedad']);
            $distribuidor->setIdDistribuidor($datos['id_distribuidor']);
            $distribuidor->modificarDistribuidor();
            header("Location: distribuidor.php");
            break;

        case 'form':
            $id_distribuidor=(isset($_GET["id_distribuidor"]))?$_GET["id_distribuidor"]:null;
            $data=[
                'nombre'=>'',
                'apaterno'=>'',
                'amaterno'=>'',
                'ciudad'=>'',
                'estado'=>'',
                'antiguedad'=>''
            ];
            if(is_numeric($id_distribuidor)){
                $distribuidor->setIdDistribuidor($id_distribuidor);
                $data = $distribuidor->leerUnDistribuidor();
                $script = "distribuidor.php?action=modify";
                include("view/form.php");
            }else{
                $script="distribuidor.php?action=new";
                include("view/form.php");
            }
            break;
            
        case 'delete':
            $id_distribuidor=(isset($_GET["id_distribuidor"]))?$_GET["id_distribuidor"]:null;
            if(is_numeric($id_distribuidor)){
                $distribuidor->setIdDistribuidor($id_distribuidor);
                $distribuidor->borrarDistribuidor();
            }
            header("Location: distribuidor.php");
            break;
            
        case 'show':
            default:
            $data= $distribuidor->leerDistribuidor();
            include("view/index.php");    
    }
?>