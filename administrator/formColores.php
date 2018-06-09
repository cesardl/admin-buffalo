<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: index.php?error=2");
} else {
    include_once 'bussinessLogic/ColorBL.php';
    include_once 'domain/Color.php';
    include_once 'domain/ColorProducto.php';

    $bl = new ColorBL();

    $id_producto = $_GET['id_producto'];

    $coloresProducto = $bl->getColoresProductoByIdProducto($id_producto);
    for ($i = 0; $i < 4; $i++) {
        if (is_null($coloresProducto[$i]))
            $coloresProducto[$i] = new ColorProducto();
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
            <title>Formulario de colores</title>
        </head>
        <body>
            <form id="formColores" method="POST" action="actionColor.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td colspan="2"><h3>Seleccione las combinaciones de colores del <?php echo $_GET['mod_prod'] ?></h3></td>
                        <td style="text-align: right;"><a href="bienvenido.php">&lt;&lt; Volver</a></td>
                    <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto ?>" />
                    </tr>
                    <?php
                    for ($i = 0; $i < count($coloresProducto); $i++) {
                        $cp_colorProducto = $coloresProducto[$i];
                        ?>
                        <tr>
                            <td class="tdLabel">
                                Color <?php echo $i + 1 ?>
                                <input type="hidden" name="id<?php echo $i ?>" value="<?php echo $cp_colorProducto->getId() ?>" />
                            </td>
                            <td>
                                <select name="color_1_<?php echo $i ?>">
                                    <option value="0">[Seleccione]</option>
                                    <?php echo $bl->getColores($cp_colorProducto->getColor_1()->getId_color()) ?>
                                </select>
                            </td>
                            <td>
                                <select name="color_2_<?php echo $i ?>">
                                    <option value="0">[Seleccione si es necesario]</option>
                                    <?php echo $bl->getColores($cp_colorProducto->getColor_2()->getId_color()) ?>
                                </select>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            <input id="btn_acept" type="submit" name="name"value="Aceptar" /> 
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </html>
    <?php
}?>