<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
        <title>Operacion realizada</title>
    </head>
    <body>
        <?php
        include_once 'domain/DetalleProducto.php';
        include_once 'bussinessLogic/DetalleProductoBL.php';

        $messages = array('No es un archivo valido', 'Ya existe es un archivo con ese nombre', 'Tranferencia de imagen falló.');

        $id_producto = $_POST['id_producto'];

        $bl = new DetalleProductoBL();

        for ($i = 0; $i < 6; $i++) {
            $delete = $_POST["delete$i"];
            $id_detalle_producto = $_POST["id_det_prod$i"];
            if (count($delete) != 0) {
                if ($id_detalle_producto != 0) {
                    $bl->deleteDetalleProducto($id_detalle_producto);
                }
            } else {
                $descripcion = cleanString($_POST["descripcion$i"]);
                echo 'descripcion ' . $descripcion;
                if (strlen($descripcion) != 0) {
                    $detalleProducto = new DetalleProducto();
                    $detalleProducto->setId_detalle_producto(htmlspecialchars($id_detalle_producto));
                    $detalleProducto->setTitulo(strtoupper(cleanString($_POST["titulo$i"])));
                    $detalleProducto->setDescripcion($descripcion);

                    $foto_detalle = $_POST["v_imagen$i"];
                    $nombre_archivo = $_FILES["imagen$i"]['name'];
                    $tipo_archivo = $_FILES["imagen$i"]['type'];
                    $tamano_archivo = $_FILES["imagen$i"]['size'];
                    $imagen_temp = $_FILES["imagen$i"]['tmp_name'];
                    if ($tamano_archivo != 0) {
                        $foto_detalle = uploadPhoto($tipo_archivo, $tamano_archivo, $nombre_archivo, $imagen_temp, 0);
                        if (is_numeric($foto_detalle)) {
                            echo "No se ha podido cargar la imagen $nombre_archivo<br>$messages[$foto_detalle]";
                            echo "Intente carga la imagen de nuevo<br>";
                        }
                    }

                    $detalleProducto->setFoto_detalle($foto_detalle);
                    $detalleProducto->setId_producto($id_producto);

                    $detallesProducto[] = $detalleProducto;
                }
            }
        }

        echo '<br><br>Total a procesar ' . count($detallesProducto) . '<br>';

        $bl->insertOrUpdates($detallesProducto);
        ?>
        <a href='bienvenido.php'>&lt;&lt; Regresar</a>
    </body>
</html>

<?php

function cleanString($cadena) {
    return htmlspecialchars(trim($cadena));
}
?>

