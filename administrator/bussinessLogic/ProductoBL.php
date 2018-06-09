<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'dao/ProductoDAO.php';

/**
 * Description of ProductoBL
 *
 * @author Cesardl
 */
class ProductoBL {

    private $pDao;

    public function __construct() {
        $this->pDao = new ProductoDAO();
    }

    public function getProductos() {
        return $this->pDao->getProductos();
    }

    public function getProductoById($id_producto) {
        return $this->pDao->getProductoById($id_producto);
    }

    public function insertProducto($producto) {
        $total = $this->pDao->insertProducto($producto);
        if ($total == 1) {
            return "Se inserto $total producto";
        } else {
            return "No se pudo insertar el producto";
        }
    }

    public function updateProducto($producto) {
        $total = $this->pDao->updateProducto($producto);
        if ($total == 1) {
            return "Se actualizo $total producto";
        } else {
            return "No se pudo actualizar el producto";
        }
    }

    public function deleteProducto($id_producto) {
        $result = $this->pDao->deleteProducto($id_producto);
        if ($result == 1) {
            return "Se elimino $result producto";
        } else {
            return "No se pudo actualizar el producto";
        }
    }

}

?>
