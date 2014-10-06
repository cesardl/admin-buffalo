<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'domain/Color.php';
include_once 'domain/Producto.php';

/**
 * Description of DetalleColor
 *
 * @author Cesardl
 */
class ColorProducto {

    private $id;
    private $producto;
    private $color_1;
    private $color_2;

    public function __construct() {
        $this->id = 0;
        $this->producto = new Producto();
        $this->color_1 = new Color();
        $this->color_2 = new Color();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function setProducto($producto) {
        $this->producto = $producto;
    }

    public function getColor_1() {
        return $this->color_1;
    }

    public function setColor_1($color_1) {
        $this->color_1 = $color_1;
    }

    public function getColor_2() {
        return $this->color_2;
    }

    public function setColor_2($color_2) {
        $this->color_2 = $color_2;
    }

}

?>
