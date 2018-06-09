<?php
include_once 'bussinessLogic/DetalleProductoBL.php';
include_once 'domain/DetalleProducto.php';

session_start();

if (!isset($_SESSION['user'])) {
    header("location: index.php?error=2");
} else {
    $id_producto = $_GET['id_producto'];

    $bl = new DetalleProductoBL();
    $detallesProducto = new DetalleProducto();
    $detallesProducto = $bl->getDetallesProductos($id_producto);
    for ($i = 0; $i < 6; $i++) {
        if (is_null($detallesProducto[$i]))
            $detallesProducto[$i] = new DetalleProducto ();
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
            <title>Formulario de detalles</title>
        </head>
        <body>
            <form method="POST" action="actionDetalleProductoCtrl.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><h3>Detalles del Vehiculo <?php echo $_GET['mod_prod'] ?></h3></td>
                        <td style="text-align: right;"><a href="bienvenido.php">&lt;&lt; Volver</a></td>
                    <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto ?>" />
                    </tr>
                    <?php
                    for ($i = 0; $i < count($detallesProducto); $i++) {
                        $detalleProducto = $detallesProducto[$i];
                        if (!($i % 2))
                            echo '<tr>';
                        ?>
                        <td>  
                            <fieldset>
                                <input type="hidden" name="id_det_prod<?php echo $i ?>" value="<?php echo $detalleProducto->getId_detalle_producto() ?>" />
                                <table>
                                    <tr>
                                        <td class="tdLabel"><label for="titulo<?php echo $i ?>">T&iacute;tulo</label></td>
                                        <td><input type="text" id="titulo<?php echo $i ?>" name="titulo<?php echo $i ?>" 
                                                   style="width: 330px;"
                                                   value="<?php echo $detalleProducto->getTitulo() ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td class="tdLabel"><label for="descripcion<?php echo $i ?>">Descripci&oacute;n</label></td>
                                        <td><textarea id="descripcion<?php echo $i ?>" name="descripcion<?php echo $i ?>" 
                                                      style="height: 80px; width: 330px;"><?php echo $detalleProducto->getDescripcion() ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdLabel">Imagen</td>
                                        <td>
                                            <input type="hidden" name="v_imagen<?php echo $i ?>" value="<?php echo $detalleProducto->getFoto_detalle() ?>" />
                                            <input type="file" id="imagen<?php echo $i ?>" name="imagen<?php echo $i ?>" />
                                            <?php
                                            $fprin = $detalleProducto->getFoto_detalle();
                                            if (!empty($fprin)) {
                                                echo "<img src=\"../$fprin\" alt=\"Foto principal\" style=\"width: 5%;\" />";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdLabel"><label for="delete<?php echo $i ?>">Eliminar</label></td>
                                        <td><input type="checkbox" id="delete<?php echo $i ?>" name="delete<?php echo $i ?>[]" /></td>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
                        <?php
                        if (($i % 2))
                            echo '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Aceptar" name="aceptar" />
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </html>
    <?php
}?>