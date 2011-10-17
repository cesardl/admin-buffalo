<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'domain/Master.php';
include_once 'domain/Producto.php';
include_once 'bussinessLogic/ProductoBL.php';

$messages[0] = 'No es un archivo valido';
$messages[1] = 'Ya existe es un archivo con ese nombre';
$messages[2] = 'Tranferencia de imagen falló.';

$title = $_POST['title'];
$id_producto = $_POST['id_producto'];
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];
$foto_principal = $_POST['v_imagen'];
$foto_zoom1 = $_POST['v_zoom1'];
$foto_zoom2 = $_POST['v_zoom2'];
$foto_zoom3 = $_POST['v_zoom3'];
$foto_zoom4 = $_POST['v_zoom4'];
$ficha_tecnica = $_POST['v_fichtec'];
$id_master = $_POST['master'];

$nombre_archivo = $_FILES['imagen']['name'];
$tipo_archivo = $_FILES['imagen']['type'];
$tamano_archivo = $_FILES['imagen']['size'];
$imagen_temp = $_FILES['imagen']['tmp_name'];

$nombre_archivo_z1 = $_FILES['zoom1']['name'];
$tipo_archivo_z1 = $_FILES['zoom1']['type'];
$tamano_archivo_z1 = $_FILES['zoom1']['size'];
$imagen_temp_z1 = $_FILES['zoom1']['tmp_name'];

$nombre_archivo_z2 = $_FILES['zoom2']['name'];
$tipo_archivo_z2 = $_FILES['zoom2']['type'];
$tamano_archivo_z2 = $_FILES['zoom2']['size'];
$imagen_temp_z2 = $_FILES['zoom2']['tmp_name'];

$nombre_archivo_z3 = $_FILES['zoom3']['name'];
$tipo_archivo_z3 = $_FILES['zoom3']['type'];
$tamano_archivo_z3 = $_FILES['zoom3']['size'];
$imagen_temp_z3 = $_FILES['zoom3']['tmp_name'];

$nombre_archivo_z4 = $_FILES['zoom4']['name'];
$tipo_archivo_z4 = $_FILES['zoom4']['type'];
$tamano_archivo_z4 = $_FILES['zoom4']['size'];
$imagen_temp_z4 = $_FILES['zoom4']['tmp_name'];

$nombre_archivo_ficha = $_FILES['fichtec']['name'];
$tipo_archivo_ficha = $_FILES['fichtec']['type'];
$tamano_archivo_ficha = $_FILES['fichtec']['size'];
$pdf_temp_ficha = $_FILES['fichtec']['tmp_name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Operacion realizada</title>
    </head>
    <body>
        <?php include 'menu.html' ?>
        <h3><?php echo $title ?></h3>
        <?php
        if (empty($foto_principal)) {
            $foto_principal = uploadPhoto($tipo_archivo, $tamano_archivo, $nombre_archivo, $imagen_temp, 0);
        }
        if (empty($foto_zoom1)) {
            $foto_zoom1 = uploadPhoto($tipo_archivo_z1, $tamano_archivo_z1, $nombre_archivo_z1, $imagen_temp_z1, 1);
        }
        if (empty($foto_zoom2)) {
            $foto_zoom2 = uploadPhoto($tipo_archivo_z2, $tamano_archivo_z2, $nombre_archivo_z2, $imagen_temp_z2, 1);
        }
        if (empty($foto_zoom3)) {
            $foto_zoom3 = uploadPhoto($tipo_archivo_z3, $tamano_archivo_z3, $nombre_archivo_z3, $imagen_temp_z3, 1);
        }
        if (empty($foto_zoom4)) {
            $foto_zoom4 = uploadPhoto($tipo_archivo_z4, $tamano_archivo_z4, $nombre_archivo_z4, $imagen_temp_z4, 1);
        }
        if (empty($ficha_tecnica)) {
            $ficha_tecnica = uploadPDF($tipo_archivo_ficha, $tamano_archivo_ficha, $nombre_archivo_ficha, $pdf_temp_ficha);
        }

        if (is_numeric($foto_principal)) {
            echo "No se ha podido cargar la imagen $nombre_archivo<br>$messages[$foto_principal]";
            echo "<a href='index.php'>Regresar</a>";
        } else if (is_numeric($foto_zoom1)) {
            echo "No se ha podido cargar la imagen $nombre_archivo_z1<br>$messages[$foto_zoom1]";
            echo "<a href='index.php'>Regresar</a>";
        } else if (is_numeric($foto_zoom2)) {
            echo "No se ha podido cargar la imagen $nombre_archivo_z2<br>$messages[$foto_zoom2]";
            echo "<a href='index.php'>Regresar</a>";
        } else if (is_numeric($foto_zoom3)) {
            echo "No se ha podido cargar la imagen $nombre_archivo_z3<br>$messages[$foto_zoom3]";
            echo "<a href='index.php'>Regresar</a>";
        } else if (is_numeric($foto_zoom4)) {
            echo "No se ha podido cargar la imagen $nombre_archivo_z4<br>$messages[$foto_zoom4]";
            echo "<a href='index.php'>Regresar</a>";
        } else if (is_numeric($ficha_tecnica)) {
            echo "No se ha podido cargar el archivo";
            echo "<a href='index.php'>Regresar</a>";
        } else {
            $producto = new Producto();
            $producto->setId_producto($id_producto);
            $producto->setModelo($modelo);
            $producto->setDescripcion(utf8_decode($descripcion));
            $producto->setFoto_principal($foto_principal);
            $producto->setFoto_zoom_1($foto_zoom1);
            $producto->setFoto_zoom_2($foto_zoom2);
            $producto->setFoto_zoom_3($foto_zoom3);
            $producto->setFoto_zoom_4($foto_zoom4);
            $producto->setFicha_tecnica($ficha_tecnica);

            $master = new Master();
            $master->setId_master($id_master);
            $producto->setMaster($master);

            $dao = new ProductoBL();
            if ($id_producto == 0) {
                echo '<h2>' . $dao->insertProducto($producto) . '</h2><br>';
            } else {
                echo '<h2>' . $dao->updateProducto($producto) . '</h2><br>';
            }
        }
        ?>
        <a href='index.php'>&lt;&lt; Regresar</a>
    </body>
</html>

<?php

function uploadPhoto($tipo_archivo, $tamano_archivo, $nombre_archivo, $imagen_temp, $ubicacion) {
    if ($tamano_archivo == 0) {
        return '';
    } else {
        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpg") ||
                strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") ) && ($tamano_archivo < 5000000))) {
            return 0;
        } else {
            if ($ubicacion == 0) {
                $ruta = "..\\images\\principal\\" . $nombre_archivo;
                $path = '/images/principal/' . $nombre_archivo;
            } else {
                $ruta = "..\\images\\zoom\\" . $nombre_archivo;
                $path = '/images/zoom/' . $nombre_archivo;
            }
            if (is_uploaded_file($imagen_temp)) {
                move_uploaded_file($imagen_temp, $ruta);
                if (file_exists($ruta)) {
                    return $path;
                } else {
                    return 1;
                }
            } else {
                return 2;
            }
        }
    }
}

function uploadPDF($tipo_archivo, $tamano_archivo, $nombre_archivo, $pdf_temp) {
    if ($tamano_archivo == 0) {
        return '';
    } else {
        if (!((strpos($tipo_archivo, "pdf")) && ($tamano_archivo < 6000000))) {
            return 0;
        } else {
            $ruta = "..\\ficha_tecnica\\" . $nombre_archivo;
            $path = '/ficha_tecnica/' . $nombre_archivo;
            if (is_uploaded_file($pdf_temp)) {
                move_uploaded_file($pdf_temp, $ruta);
                if (file_exists($ruta)) {
                    return $path;
                } else {
                    return 1;
                }
            } else {
                return 2;
            }
        }
    }
}
?>
