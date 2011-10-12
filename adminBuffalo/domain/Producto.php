<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Master.php';

/**
 * Description of Producto
 *
 * @author Cesardl
 */
class Producto {

    private $id_producto;
    private $modelo;
    private $foto_principal;
    private $foto_zoom_1;
    private $foto_zoom_2;
    private $foto_zoom_3;
    private $foto_zoom_4;
    private $descripcion;
    private $ficha_tecnica;
    private $master;

    public function __construct() {
        $this->master = new Master();
    }

    public function getId_producto() {
        return $this->id_producto;
    }

    public function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getFoto_principal() {
        return $this->foto_principal;
    }

    public function setFoto_principal($foto_principal) {
        $this->foto_principal = $foto_principal;
    }

    public function getFoto_zoom_1() {
        return $this->foto_zoom_1;
    }

    public function setFoto_zoom_1($foto_zoom_1) {
        $this->foto_zoom_1 = $foto_zoom_1;
    }

    public function getFoto_zoom_2() {
        return $this->foto_zoom_2;
    }

    public function setFoto_zoom_2($foto_zoom_2) {
        $this->foto_zoom_2 = $foto_zoom_2;
    }

    public function getFoto_zoom_3() {
        return $this->foto_zoom_3;
    }

    public function setFoto_zoom_3($foto_zoom_3) {
        $this->foto_zoom_3 = $foto_zoom_3;
    }

    public function getFoto_zoom_4() {
        return $this->foto_zoom_4;
    }

    public function setFoto_zoom_4($foto_zoom_4) {
        $this->foto_zoom_4 = $foto_zoom_4;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFicha_tecnica() {
        return $this->ficha_tecnica;
    }

    public function setFicha_tecnica($ficha_tecnica) {
        $this->ficha_tecnica = $ficha_tecnica;
    }

    public function getMaster() {
        return $this->master;
    }

    public function setMaster($master) {
        $this->master = $master;
    }

}

?>
