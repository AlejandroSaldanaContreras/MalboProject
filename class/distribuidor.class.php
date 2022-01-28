<?php 
    require_once("database.class.php");

    Class Distribuidor extends Database{
        var $id_distribuidor;
        var $nombre;
        var $apaterno;
        var $amaterno;
        var $ciudad;
        var $estado;
        var $antiguedad;

        function getIdDistribuidor(){return $this->id_distribuidor;}
        function getNombre(){return $this->nombre;}
        function getApaterno(){return $this->apaterno;}
        function getAmaterno(){return $this->amaterno;}
        function getCiudad(){return $this->ciudad;}
        function getEstado(){return $this->estado;}
        function getAntiguedad(){return $this->antiguedad;}

        function setIdDistribuidor($id_distribuidor){return $this->id_distribuidor=$id_distribuidor;}
        function setNombre($nombre){return $this->nombre=$nombre;}
        function setApaterno($apaterno){return $this->apaterno=$apaterno;}
        function setAmaterno($amaterno){return $this->amaterno=$amaterno;}
        function setCiudad($ciudad){return $this->ciudad=$ciudad;}
        function setEstado($estado){return $this->estado=$estado;}
        function setAntiguedad($antiguedad){return $this->antiguedad=$antiguedad;}

        function crearDistribuidor(){
            $this->connect();
            if($stmt = $this->con->prepare("INSERT INTO distribuidor(nombre, apaterno, amaterno, ciudad, estado, antiguedad) VALUES (?,?,?,?,?,?)")){
                $nombre = $this->getNombre();
                $apaterno = $this->getApaterno();
                $amaterno = $this->getAmaterno();
                $ciudad = $this->getCiudad();
                $estado = $this->getEstado();
                $antiguedad = $this->getAntiguedad();
                $stmt->bindParam(1,$nombre);
                $stmt->bindParam(2,$apaterno);
                $stmt->bindParam(3,$amaterno);
                $stmt->bindParam(4,$ciudad);
                $stmt->bindParam(5,$estado);
                $stmt->bindParam(6,$antiguedad);
                $stmt->execute();
            }
            $this->close();
        }

        function leerDistribuidor(){
            $this->connect();
            $datos = array();
            $result = $this->con->query("SELECT * FROM distribuidor");
            $datos = $result->fetchAll();
            $this->close();
            return $datos;
        }

        function borrarDistribuidor(){
            $this->connect();
            if($stmt = $this->con->prepare("DELETE FROM distribuidor WHERE id_distribuidor = ?")){
                $id_distribuidor = $this->getIdDistribuidor();
                $stmt->bindParam(1,$id_distribuidor);
                $stmt->execute();
            }
            $this->close();
        }

        function leerUnDistribuidor(){
            $this->connect();
            $datos = array();

            if($stmt = $this->con->prepare("SELECT * FROM distribuidor WHERE id_distribuidor = ?")){
                $id_distribuidor = $this->getIdDistribuidor();
                $stmt->bindParam(1, $id_distribuidor);
                $stmt->execute();
                $datos = $stmt->fetchAll();
                return $datos[0];
            }
            $this->close();
        }

        function modificarDistribuidor(){
            $this->connect();
            if($stmt = $this->con->prepare("UPDATE distribuidor SET nombre=?, apaterno=?, amaterno=?, ciudad=?, estado=?, antiguedad=? WHERE id_distribuidor=?")){
                $datos = [
                    'id_distribuidor' => $this->getIdDistribuidor(),
                    'nombre' => $this->getNombre(),
                    'apaterno' => $this->getApaterno(),
                    'amaterno' => $this->getAmaterno(),
                    'ciudad' => $this->getCiudad(),
                    'estado' => $this->getEstado(),
                    'antiguedad' => $this->getAntiguedad()
                ];
                
                $stmt->bindParam(1,$datos['nombre']);
                $stmt->bindParam(2,$datos['apaterno']);
                $stmt->bindParam(3,$datos['amaterno']);
                $stmt->bindParam(4,$datos['ciudad']);
                $stmt->bindParam(5,$datos['estado']);
                $stmt->bindParam(6,$datos['antiguedad']);
                $stmt->bindParam(7,$datos['id_distribuidor']);
                $stmt->execute();
            }

            $this->close();

        }
        
    }
    $distribuidor = new Distribuidor;

    
    
?>