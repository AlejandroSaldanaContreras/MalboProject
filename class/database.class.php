<?php
    session_start();
    class Database{
        var $host;
        var $port;
        var $user;
        var $password;
        var $db;
        var $con;

        function connect(){
            $this->host = "localhost";
            $this->user= "administrador";
            $this->password = "alex130798";
            $this->db = "proyecto2"; 
            $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->password);
        }
    

        function close(){
            $this->con = null;
        }

    }
    require_once("sistema.class.php");
?>