<?php
    require_once("database.class.php");

    Class Categoria extends Database{
        var $id_categoria;
        var $categoria;
        var $descripcion;

        function getidCategoria(){return $this->id_categoria;}
        function getCategoria(){return $this->categoria;}
        function getDescripcion(){return $this->descripcion;}

        function setidCategoria($id_categoria){return $this->id_categoria=$id_categoria;}
        function setCategoria($categoria){return $this->categoria=$categoria;}
        function setDescripcion($descripcion){return $this->descripcion=$descripcion;}

        function crearCategoria(){
            $this->connect();
                if($stmt = $this->con->prepare("INSERT INTO categoria(categoria, descripcion) VALUES (?,?)")){
                    $categoria = $this->getCategoria();
                    $descripcion = $this->getDescripcion();
                    $stmt->bindParam(1,$categoria);
                    $stmt->bindParam(2,$descripcion);
                    $stmt->execute();
                }
            $this->close();
        }
        
        function leerCategorias(){
            $this->connect();
            $datos = array();
            $result = $this->con->query("SELECT * FROM categoria");
            $datos = $result->fetchAll();
            $this->close();
            return $datos;
        }

        function borrarCategoria(){
            $this->connect();
            if($stmt = $this->con->prepare("DELETE FROM categoria WHERE id_categoria = ?")){
                $id_categoria = $this->getidCategoria();
                $stmt->bindParam(1,$id_categoria);
                $stmt->execute();
            }
            $this->close();
        }

        function leerUnaCategoria(){
            $this->connect();
            $datos = array();

            if($stmt = $this->con->prepare("SELECT * FROM categoria WHERE id_categoria = ?")){
                $id_categoria = $this->getidCategoria();
                $stmt->bindParam(1, $id_categoria);
                $stmt->execute();
                $datos = $stmt->fetchAll();
                return $datos[0];
            }
            $this->close();
        }

        function modificarCategoria(){
            $this->connect();
            if($stmt = $this->con->prepare("UPDATE categoria SET categoria=?, descripcion=? WHERE id_categoria=?")){
                $datos = [
                    'id_categoria' => $this->getidCategoria(),
                    'categoria' => $this->getCategoria(),
                    'descripcion' => $this->getDescripcion(),
                ];
                
                $stmt->bindParam(1, $datos['categoria']);
                $stmt->bindParam(2, $datos['descripcion']);
                $stmt->bindParam(3, $datos['id_categoria']);
                $stmt->execute();
            }

            $this->close();

        }


    }
    $categoria = new Categoria;

?>