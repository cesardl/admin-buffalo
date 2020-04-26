<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'bussinessLogic/UsuarioBL.php';
session_start();

if (!isset($_POST['user'])) {
    if (!isset($_SESSION['user'])) {
        header("location: index.php?error=2");
    } else {
        $band = 1;
    }
} else {
    if (is_null($_SESSION['user'])) {
        $user = $_POST['user'];
        $passwd = $_POST['passwd'];

        $bl = new UsuarioBL();

        $usuario = $bl->getUsuario($user, $passwd);

        if ($usuario->getId() == 0) {
            header("location: index.php?error=1");
        } else {
            $_SESSION['user'] = $usuario->getUser();
            $_SESSION['id_usuario'] = $usuario->getId();

            $band = 1;
        }
    } else {
        $band = 1;
    }
}

if ($band == 1) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <title>Bienvenido</title>
    </head>
    <body>
    <div class="container pt-4">
        <table style="text-align: right; width: 100%;">
            <tr>
                <td style="text-align: left">
                    <h3>Mantenimiento de veh&iacute;culos</h3>
                </td>
                <td style="font-weight: bold;">
                    <a href="index.php?param=1">Cerrar sesi&oacute;n</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr/>
                </td>
            </tr>
            <tr>
                <td colspan="2"><a href="formProducto.php?action=N">Nuevo producto</a></td>
            </tr>
        </table>
        <div id="result"></div>
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
            <tr>
                <th>Clase</th>
                <th>Modelo</th>
                <th>Descripci&oacute;n</th>
                <th colspan="4" style="text-align: center;">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include_once 'bussinessLogic/ProductoBL.php';

            $productoBL = new ProductoBL();

            $productos = $productoBL->getProductos();
            for ($i = 0; $i < count($productos); $i++) {
                $master = $productos[$i]->getMaster();
                ?>
                <tr id="fila-<?php echo $productos[$i]->getId_producto() ?>">
                    <?php
                    echo "<td>{$master->getClase()}</td>";
                    echo "<td>{$productos[$i]->getModelo()}</td>";
                    echo '<td>' . $productos[$i]->getDescripcion() . '</td>';
                    echo "<td><a href='formProducto.php?accion=E&id_producto={$productos[$i]->getId_producto()}&id_master={$master->getId_master()}&mod_prod={$productos[$i]->getModelo()}'>Editar</a></td>";
                    echo "<td><a href='formDetalles.php?id_producto={$productos[$i]->getId_producto()}&mod_prod={$productos[$i]->getModelo()}'>Detalles</a></td>";
                    echo "<td><a href='formColores.php?id_producto={$productos[$i]->getId_producto()}&mod_prod={$productos[$i]->getModelo()}'>Colores</a></td>";
                    echo "<td><a href='#{$productos[$i]->getId_producto()}' class='a_delete'>Eliminar</a></td>";
                    ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.a_delete').click(function () {
                if (confirm('Seguro que desea eliminar este vehiculo?')) {
                    var href = $(this).attr('href');
                    var id_product = href.substr(1);
                    $.post("VehiculoDelete.php", {
                        id_producto: id_product
                    }, function (data) {
                        $("#result").html(data);
                        $("#fila-" + id_product).remove();
                    })
                }
            });

            $('#result').click(function () {
                $(this).hide();
            });
        });
    </script>
    </body>
    </html>
<?php } ?>
