<?php 
    require_once("database.class.php");

    class Almacen extends Database{
        var $id_almacen;
        var $ciudad;
        var $direccion;
        
        function getIdAlmacen(){return $this->id_almacen;}
        function getCiudad(){return $this->ciudad;}
        function getDireccion(){return $this->direccion;}

        function setIdAlmacen($id_almacen){return $this->id_almacen=$id_almacen;}
        function setCiudad($ciudad){return $this->ciudad=$ciudad;}
        function setDireccion($direccion){return $this->direccion=$direccion;}

        function crearAlmacen(){
            $this->connect();
            if($stmt = $this->con->prepare("INSERT INTO almacen(ciudad, direccion) VALUES (?,?)")){
                $ciudad = $this->getCiudad();
                $direccion = $this->getDireccion();
                $stmt->bindParam(1,$ciudad);
                $stmt->bindParam(2,$direccion);
                $stmt->execute();
            }
            $this->close();
        }

        function leerAlmacenes(){
            $this->connect();
            $datos = array();
            $result = $this->con->query("SELECT * FROM almacen");
            $datos = $result->fetchAll();
            $this->close();
            return $datos;
        }

        function borrarAlmacen(){
            $this->connect();
            if($stmt = $this->con->prepare("DELETE FROM almacen WHERE id_almacen = ?")){
                $id_almacen = $this->getIdAlmacen();
                $stmt->bindParam(1,$id_almacen);
                $stmt->execute();
            }
            $this->close();
        }

        function leerUnAlmacen(){
            $this->connect();
            $datos = array();

            if($stmt = $this->con->prepare("SELECT * FROM almacen WHERE id_almacen = ?")){
                $id_almacen = $this->getIdAlmacen();
                $stmt->bindParam(1, $id_almacen);
                $stmt->execute();
                $datos = $stmt->fetchAll();
                return $datos[0];
            }
            $this->close();
        }

        function modificarAlmacen(){
            $this->connect();
            if($stmt = $this->con->prepare("UPDATE almacen SET ciudad=?, direccion=? WHERE id_almacen=?")){
                $datos = [
                    'id_almacen' => $this->getIdAlmacen(),
                    'ciudad' => $this->getCiudad(),
                    'direccion' => $this->getDireccion(),
                ];
                
                $stmt->bindParam(1, $datos['ciudad']);
                $stmt->bindParam(2, $datos['direccion']);
                $stmt->bindParam(3, $datos['id_almacen']);
                $stmt->execute();
            }

            $this->close();

        }

    }
    $almacen = new Almacen;
?>