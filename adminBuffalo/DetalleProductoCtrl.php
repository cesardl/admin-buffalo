<?php

include 'menu.html';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'domain/DetalleProducto.php';
include_once 'bussinessLogic/DetalleProductoBL.php';

/*
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];

$nombre_archivo = $_FILES['imagen']['name'];
$tipo_archivo = $_FILES['imagen']['type'];
$tamano_archivo = $_FILES['imagen']['size'];
$imagen_temp = $_FILES['imagen']['tmp_name'];

if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") ) && ($tamano_archivo < 3000000))) {
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos (.gif,.jpeg,.png)<br><li>se permiten archivos de 300 Kb máximo.</td></tr></table><br>";
    echo "<a href='index.php'>Regresar</a>";
} else {
    $foto_principal = '../imagenes/' . $nombre_archivo;
    if (is_uploaded_file($imagen_temp)) {
        move_uploaded_file($imagen_temp, $foto_principal);
        if (file_exists($foto_principal)) {
            echo "OK en la ruta $foto_principal con titulo $titulo y detalle $detalle<br>en " . DIRECTORY_IMG;
            echo "<img src=\"$foto_principal\" alt=\"$nombre_archivo\" style=\"width:50%\" />";
        } else {
            echo 'Error subiendo foto a ../imagenes/';
        }
    } else {
        echo ' - tranferencia de ' . $nombre_archivo . ' falló :(';
    }

    $detalleProducto = new DetalleProducto();
    $detalleProducto->setModelo($modelo);
    $detalleProducto->setDescripcion($descripcion);
    $detalleProducto->setFoto_principal($foto_principal);

    $dao = new DetalleProductoBL();
    $dao->insert($detalleProducto);

    echo '<h2>Inserción exitosa</h2><br>';
}*/
echo 'lalala'
?>
