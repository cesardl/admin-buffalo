<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleProducto
 *
 * @author Cesardl
 */
class DetalleProducto {

    private $id_detalle_producto;
    private $titulo;
    private $foto_detalle;
    private $descripcion;
    private $id_producto;

    public function __construct() {
        $this->id_detalle_producto = 0;
    }

    public function getId_detalle_producto() {
        return $this->id_detalle_producto;
    }

    public function setId_detalle_producto($id_detalle_producto) {
        $this->id_detalle_producto = $id_detalle_producto;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getFoto_detalle() {
        return $this->foto_detalle;
    }

    public function setFoto_detalle($foto_detalle) {
        $this->foto_detalle = $foto_detalle;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getId_producto() {
        return $this->id_producto;
    }

    public function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

}

?>
