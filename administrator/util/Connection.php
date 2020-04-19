<?php

class Connection
{

    private $connection;

    public function __construct()
    {
        $server = "localhost";
        $username = "buffalo9_root";
        $password = "r00tr00t";
        $database_name = "buffalo9_portal";

        $connection = mysql_connect($server, $username, $password) or die("Problemas en la conexión");
        //Seleccionamos la base
        mysql_select_db($database_name, $connection) or die("Problemas al seleccionar la BD");
        mysql_set_charset("UTF-8", $connection);
        $this->connection = $connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }

}
