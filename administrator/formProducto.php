<?php
include_once 'bussinessLogic/ProductoBL.php';
include_once 'bussinessLogic/VehiculoBL.php';
include_once 'domain/Producto.php';
include_once 'domain/Master.php';

session_start();

if (!isset($_SESSION['user'])) {
    header("location: index.php?error=2");
} else {
    $id_master = $_GET['id_master'];
    $id_producto = $_GET['id_producto'];
    $accion = $_GET['accion'];
    $mod_prod = $_GET['mod_prod'];

    $productoBL = new ProductoBL();

    if ($accion == 'E') {
        $producto = $productoBL->getProductoById($id_producto);
        $title = 'Editar producto ' . $mod_prod;
    } else {
        $producto = new Producto();
        $title = 'Registrar producto ' . $mod_prod;
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
            <script type="text/javascript" src="scritps/jquery.js"></script>
            <script type="text/javascript" src="scritps/funciones_producto.js"></script>
            <title>Formulario de producto</title>
        </head>
        <body>
            <form id="formProducto" method="POST" action="actionProductoCtrl.php" enctype="multipart/form-data">
                <table style="width: 75%;">
                    <tr>
                        <td style="width: 150px;"><h3><?php echo $title ?></h3></td>
                        <td style="text-align: right;"><a href="bienvenido.php">&lt;&lt; Volver</a></td>
                    <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $producto->getId_producto() ?>" />
                    </tr>
                    <tr>
                        <td class="tdLabel">Tipo vehiculo</td>
                        <td>
                            <select id="vehiculo" name="vehiculo" style="width: 120px;">
                                <option value="0">[Seleccione]</option>
                                <?php
                                $vehiculoBL = new VehiculoBL();
                                $vehiculos = $vehiculoBL->getVehiculos();

                                $master = new Master();
                                $master = $vehiculoBL->getMasterById($id_master);

                                for ($i = 0; $i < count($vehiculos); $i++) {
                                    if ($vehiculos[$i]->getId_vehiculo() == $master->getId_vehiculo()) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    echo "<option $selected value=\"{$vehiculos[$i]->getId_vehiculo()}\">{$vehiculos[$i]->getNombre()}</option>";
                                }
                                ?>
                            </select>
                            <select id="master" name="master">
                                <option value="0">[Seleccione]</option>
                                <?php
                                $masters = $vehiculoBL->getMastersByVehiculo($master->getId_vehiculo());
                                for ($i = 0; $i < count($masters); $i++) {
                                    if ($masters[$i]->getId_master() == $id_master) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    echo "<option $selected value=\"{$masters[$i]->getId_master()}\">{$masters[$i]->getClase()}</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Modelo</td>
                        <td>
                            <input type="text" id="modelo" name="modelo" 
                                   style="width: 180px;"
                                   value="<?php echo $producto->getModelo() ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Foto principal</td>
                        <td>
                            <input type="hidden" id="v_imagen" name="v_imagen" value="<?php echo $producto->getFoto_principal() ?>"/>
                            <input type="file" id="imagen" name="imagen" />
                            <?php
                            $fprin = $producto->getFoto_principal();
                            if (!empty($fprin)) {
                                echo "<img src=\"../$fprin\" alt=\"Foto principal\" style=\"width: 5%;\" />";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Foto Zoom 1</td>
                        <td>
                            <input type="hidden" id="v_zoom1" name="v_zoom1" value="<?php echo $producto->getFoto_zoom_1() ?>" />
                            <input type="file" id="zoom1" name="zoom1" />
                            <?php
                            $zoom1 = $producto->getFoto_zoom_1();
                            if (!empty($zoom1)) {
                                echo "<img src=\"../$zoom1\" alt=\"Zoom 1\" style=\"width: 5%;\" />";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Foto Zoom 2</td>
                        <td>
                            <input type="hidden" id="v_zoom2" name="v_zoom2" value="<?php echo $producto->getFoto_zoom_2() ?>" />
                            <input type="file" id="zoom2" name="zoom2" />
                            <?php
                            $zoom2 = $producto->getFoto_zoom_2();
                            if (!empty($zoom2)) {
                                echo "<img src=\"../$zoom2\" alt=\"Zoom 2\" style=\"width: 5%;\" />";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Foto Zoom 3</td>
                        <td>
                            <input type="hidden" id="v_zoom3" name="v_zoom3" value="<?php echo $producto->getFoto_zoom_3() ?>" />
                            <input type="file" id="zoom3" name="zoom3" />
                            <?php
                            $zoom3 = $producto->getFoto_zoom_3();
                            if (!empty($zoom3)) {
                                echo "<img src=\"../$zoom3\" alt=\"Zoom 3\" style=\"width: 5%;\" />";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Foto Zoom 4</td>
                        <td>
                            <input type="hidden" id="v_zoom4" name="v_zoom4" value="<?php echo $producto->getFoto_zoom_4() ?>" />
                            <input type="file" id="zoom4" name="zoom4" />
                            <?php
                            $zoom4 = $producto->getFoto_zoom_4();
                            if (!empty($zoom4)) {
                                echo "<img src=\"../$zoom4\" alt=\"Zoom 4\" style=\"width: 5%;\" />";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Ficha t&eacute;cnica</td>
                        <td>
                            <input type="hidden" name="v_fichtec" value="<?php echo $producto->getFicha_tecnica() ?>" />
                            <input type="file" id="fichtec" name="fichtec" />
                            <?php
                            $ficha = $producto->getFicha_tecnica();
                            if (!empty($ficha)) {
                                echo "<img src=\"images/pdf.png\" alt=\"Ficha tecnica\" style=\"width: 10%;\" />";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel">Descripci&oacute;n</td>
                        <td>
                            <textarea id="descripcion" name="descripcion"  style="height: 80px; width: 360px;"><?php echo utf8_encode($producto->getDescripcion()) ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input id="btn_acept" type="button" name="name"value="Aceptar" />                        
                        </td>
                    </tr>
                </table>            
            </form>
        </body>
    </html>
    <?php
}?>