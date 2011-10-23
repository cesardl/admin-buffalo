<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'dao/ColorDAO.php';
include_once 'domain/Color.php';

/**
 * Description of ColorBL
 *
 * @author Cesardl
 */
class ColorBL {

    private $cDao;

    public function __construct() {
        $this->cDao = new ColorDAO();
    }

    public function getColores($id_color) {
        $colores = $this->cDao->getColores();
        for ($i = 0; $i < count($colores); $i++) {
            echo "compara {$colores[$i]->getId_color()} - $id_color<br>";
            if ($colores[$i]->getId_color() == $id_color) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $combo_colores = $combo_colores . "<option $selected value=\"{$colores[$i]->getId_color()}\">{$colores[$i]->getNombre()}</option>";
        }
        return $combo_colores;
    }

    public function getColoresProductoByIdProducto($id_producto) {
        return $this->cDao->getColoresProductoByIdProducto($id_producto);
    }

}

?>
