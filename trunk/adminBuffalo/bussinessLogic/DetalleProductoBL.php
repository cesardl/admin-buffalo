<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleProductoBL
 *
 * @author Cesardl
 */
include_once 'dao/DetalleProductoDAO.php';
include_once 'domain/DetalleProducto.php';

class DetalleProductoBL {

    private $dpDao;

    public function __construct() {
        $this->dpDao = new DetalleProductoDAO();
    }

    public function insert($detalleProducto) {
        $total = $this->dpDao->insertDetalleProducto($detalleProducto);
        if ($total == -1) {
            return "No se pudo ingresar el producto";
        } else {
            return "Se insertaron $total productos";
        }
    }

}

?>
