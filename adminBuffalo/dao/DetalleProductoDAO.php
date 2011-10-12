<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'util/Connection.php';

/**
 * Description of MasterProductoDAO
 *
 * @author Cesardl
 */
class DetalleProductoDAO {

    function insertDetalleProducto($detalleProducto) {
        $conexion = new Connection();
        $query = "INSERT INTO detalleproducto(modelo,foto_principal,descripcion) 
            VALUES('{$detalleProducto->getModelo()}','{$detalleProducto->getFoto_principal()}','{$detalleProducto->getDescripcion()}' )";

        $result = mysql_query($query, $conexion->getConnection());

         if (isset($result)) {
             return $result;
         } else {
             return -1;
         }
    }

}

?>
