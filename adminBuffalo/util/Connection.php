<?php

class Connection {

    private $connection;

    public function __construct() {
        $server = "localhost";
        $username = "root";
        $password = "root";
        $database_name = "buffalo";

        $connection = mysql_connect($server, $username, $password) or die("Problemas en la conexión");
        //Seleccionamos la base
        mysql_select_db($database_name, $connection) or die("Problemas al seleccionar la BD");
        $this->connection = $connection;
    }

    public function getConnection() {
        return $this->connection;
    }

}

?>