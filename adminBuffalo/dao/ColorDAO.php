<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'domain/Color.php';
include_once 'domain/ColorProducto.php';
include_once 'util/Connection.php';

/**
 * Description of ColorDAO
 *
 * @author Cesardl
 */
class ColorDAO {

    public function getColores() {
        $conexion = new Connection();
        $query = "SELECT id_color, nombre, codigo FROM color";
        $result = mysql_query($query, $conexion->getConnection());
        $total_registros = mysql_num_rows($result);

        if ($total_registros > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $color = new Color();
                $color->setId_color($row['id_color']);
                $color->setNombre($row['nombre']);
                $color->setCodigo($row['codigo']);

                $colores[] = $color;
            }
        }
        return $colores;
    }

    public function getColoresProductoByIdProducto($id_producto) {
        $conexion = new Connection();
        $query = "SELECT id, id_color_1, id_color_2, 
                producto.id_producto as p_id, producto.modelo as p_modelo
                FROM colorproducto 
                INNER JOIN producto on colorproducto.id_producto = producto.id_producto
                WHERE producto.id_producto = $id_producto";

        $result = mysql_query($query, $conexion->getConnection());
        $total_registros = mysql_num_rows($result);

        if ($total_registros > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $colorProducto = new ColorProducto();
                $colorProducto->setId($row['c_color']);

                $color_1 = new Color();
                $color_1->setId_color($row['id_color_1']);
                $colorProducto->setColor_1($color_1);
                
                $color_2 = new Color();
                $color_2->setId_color($row['id_color_2']);
                $colorProducto->setColor_2($color_2);

                $producto = new Producto();
                $producto->setId_producto($row['p_id']);
                $producto->setModelo($row['p_modelo']);
                $colorProducto->setProducto($producto);

                $coloresProducto[] = $colorProducto;
            }
        }
        return $coloresProducto;
    }

}

?>
