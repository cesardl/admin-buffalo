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
            if ($colores[$i]->getId_color() == $id_color) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $combo_colores = $combo_colores .
                    "<option $selected value=\"{$colores[$i]->getId_color()}\" style=\"background-color: #{$colores[$i]->getCodigo()};color: #FFFFFF;\">
                    {$colores[$i]->getNombre()}
                    </option>";
        }
        return $combo_colores;
    }

    public function getColoresProductoByIdProducto($id_producto) {
        return $this->cDao->getColoresProductoByIdProducto($id_producto);
    }

    public function insertOrUpdates($coloresProducto) {
        echo '<br>Total a procesar ' . count($coloresProducto) . '<br>';
        for ($i = 0; $i < count($coloresProducto); $i++) {
            $colorProducto = new ColorProducto();

            $colorProducto = $coloresProducto[$i];

            if ($colorProducto->getId() == 0) {
                if ($colorProducto->getColor_1()->getId_color() != 0) {
                    $val = $this->cDao->insert($colorProducto);
                }
            } else {
                $val = $this->cDao->update($colorProducto);
            }
        }
    }

}

?>
