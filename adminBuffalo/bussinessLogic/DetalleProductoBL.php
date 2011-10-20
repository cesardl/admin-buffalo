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

    public function getDetallesProductos($id_producto) {
        return $this->dpDao->getDetallesProductos($id_producto);
    }

    public function insertOrUpdates($detallesProducto) {
        for ($i = 0; $i < count($detallesProducto); $i++) {
            $detalleProducto = new DetalleProducto();
            $detalleProducto = $detallesProducto[$i];
            if ($detalleProducto->getId_detalle_producto() == 0) {
                $val = $this->dpDao->insert($detalleProducto);
            } else {
                $val = $this->dpDao->update($detalleProducto);
            }
        }
    }

    public function deleteDetalleProducto($id_detalle_producto) {
        return $this->dpDao->deleteDetalleProducto($id_detalle_producto);
    }

}

?>
