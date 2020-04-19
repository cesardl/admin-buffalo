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
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
        <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <title>Formulario de colores</title>
    </head>
    <body>
    <div class="container pt-4">
        <div class="row">
            <div class="col"><h3>Seleccione las combinaciones de colores del <?php echo $_GET['mod_prod'] ?></h3></div>
            <div class="col-2"><a href="bienvenido.php">&lt;&lt; Volver</a></div>
        </div>
        <form id="formColores" method="POST" action="actionColor.php" enctype="multipart/form-data">
            <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto ?>"/>
            <table>
                <?php for ($i = 0; $i < count($coloresProducto); $i++) {
                    $cp_colorProducto = $coloresProducto[$i]; ?>
                    <tr>
                        <td class="tdLabel">
                            Color <?php echo $i + 1 ?>
                            <input type="hidden" name="id<?php echo $i ?>"
                                   value="<?php echo $cp_colorProducto->getId() ?>"/>
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
                        <input id="btn_acept" type="submit" name="name" value="Aceptar" class="btn btn-primary"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    </body>
    </html>
<?php } ?>
