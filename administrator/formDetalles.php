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
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
        <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <title>Formulario de detalles</title>
    </head>
    <body>
    <div class="container pt-4">
        <div class="row">
            <div class="col"><h3>Detalles del Vehiculo <?php echo $_GET['mod_prod'] ?></div>
            <div class="col-2 tdLabel">
                <a href="bienvenido.php">&lt;&lt; Volver</a>
            </div>
        </div>
        <form method="POST" action="actionDetalleProductoCtrl.php" enctype="multipart/form-data">
            <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto ?>"/>
            <?php
            for ($i = 0; $i < count($detallesProducto); $i++) {
                $detalleProducto = $detallesProducto[$i];
                if (!($i % 2))
                    echo '<div class="row my-2">';
                ?>
                <div class="col">
                    <input type="hidden" name="id_det_prod<?php echo $i ?>"
                           value="<?php echo $detalleProducto->getId_detalle_producto() ?>"/>
                    <div class="form-row my-2">
                        <div class="col-2 tdLabel"><label for="titulo<?php echo $i ?>">T&iacute;tulo</label></div>
                        <div class="col"><input type="text" id="titulo<?php echo $i ?>" name="titulo<?php echo $i ?>"
                                                class="form-control"
                                                value="<?php echo $detalleProducto->getTitulo() ?>"/>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-2 tdLabel"><label
                                    for="descripcion<?php echo $i ?>">Descripci&oacute;n</label>
                        </div>
                        <div class="col"><textarea id="descripcion<?php echo $i ?>" name="descripcion<?php echo $i ?>"
                                                   class="form-control"
                                                   rows="3"><?php echo $detalleProducto->getDescripcion() ?></textarea>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-2 tdLabel">Im&aacute;gen</div>
                        <div class="col">
                            <input type="hidden" name="v_imagen<?php echo $i ?>"
                                   value="<?php echo $detalleProducto->getFoto_detalle() ?>"/>
                            <input type="file" id="imagen<?php echo $i ?>" name="imagen<?php echo $i ?>"/>
                            <?php
                            $fprin = $detalleProducto->getFoto_detalle();
                            if (!empty($fprin)) {
                                echo "<img src=\"../$fprin\" alt=\"Foto principal\" style=\"width: 5%;\" />";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-2 tdLabel"><label for="delete<?php echo $i ?>">Eliminar</label></div>
                        <div class="col">
                            <input type="checkbox" id="delete<?php echo $i ?>" name="delete<?php echo $i ?>[]"/>
                        </div>
                    </div>
                </div>
                <?php
                if ($i % 2)
                    echo '</div>';
            }
            ?>
            <div class="row my-2">
                <div class="col">
                    <input type="submit" value="Aceptar" name="aceptar" class="btn btn-primary"/>
                </div>
            </div>
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
    <?php
} ?>
