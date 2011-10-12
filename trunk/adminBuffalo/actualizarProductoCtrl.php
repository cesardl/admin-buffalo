<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'domain/Producto.php';
include_once 'bussinessLogic/ProductoBL.php';

$title = $_POST['title'];
$id_producto = $_POST['id_producto'];
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];

$nombre_archivo = $_FILES['imagen']['name'];
$tipo_archivo = $_FILES['imagen']['type'];
$tamano_archivo = $_FILES['imagen']['size'];
$imagen_temp = $_FILES['imagen']['tmp_name'];
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
        if (validatePhotoForUpload($tipo_archivo, $tamano_archivo)) {
            $bandera = uploadPhoto($nombre_archivo, $imagen_temp);

            if ($bandera) {
                $foto_principal = '/images/principal/' . $nombre_archivo;

                $producto = new Producto();
                $producto->setId_producto($id_producto);
                $producto->setModelo($modelo);
                $producto->setDescripcion(utf8_decode($descripcion));
                $producto->setFoto_principal($foto_principal);

                $dao = new ProductoBL();
                $dao->updateProducto($producto);

                echo '<h2>Inserción exitosa</h2><br>';
            }
        } else {
            echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos (.gif,.jpeg,.png)<br><li>se permiten archivos de 300 Kb máximo.</td></tr></table><br>";
            echo "<a href='index.php'>Regresar</a>";
        }
        ?>
    </body>
</html>

<?php

function validatePhotoForUpload($tipo_archivo, $tamano_archivo) {
    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpg") ||
            strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") ) && ($tamano_archivo < 3000000))) {
        return false;
    } else {
        return true;
    }
}

function uploadPhoto($nombre_archivo, $imagen_temp) {
    $ruta = "..\\images\\principal\\" . $nombre_archivo;
    if (is_uploaded_file($imagen_temp)) {
        move_uploaded_file($imagen_temp, $ruta);
        if (file_exists($ruta)) {
            echo "OK en la ruta $ruta<br>";
            echo "<img src=\"$ruta\" alt=\"$nombre_archivo\" style=\"width:50%\" />";
            return true;
        } else {
            echo 'ya existe es un archivo con ese nombre';
            return false;
        }
    } else {
        echo ' - tranferencia de ' . $nombre_archivo . ' falló :(';
        return false;
    }
}
?>
