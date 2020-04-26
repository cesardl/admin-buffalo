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
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
        <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <title>Formulario de producto</title>
    </head>
    <body>
    <div class="container pt-4">
        <div class="row">
            <div class="col"><h3><?php echo $title ?></h3></div>
            <div class="col-2 tdLabel">
                <a href="bienvenido.php">&lt;&lt; Volver</a>
            </div>
        </div>
        <form id="formProducto" method="POST" action="actionProductoCtrl.php" enctype="multipart/form-data">
            <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $producto->getId_producto() ?>"/>
            <div class="form-row my-2">
                <div class="col-2"><label for="vehiculo">Tipo veh&iacute;culo</label></div>
                <div class="col">
                    <select id="vehiculo" name="vehiculo" class="custom-select">
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
                </div>
                <div class="col">
                    <select id="master" name="master" class="custom-select">
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
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2"><label for="modelo">Modelo</label></div>
                <div class="col">
                    <input type="text" id="modelo" name="modelo"
                           class="form-control"
                           value="<?php echo $producto->getModelo() ?>"/>
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2">Foto principal</div>
                <div class="col">
                    <input type="hidden" id="v_imagen" name="v_imagen"
                           value="<?php echo $producto->getFoto_principal() ?>"/>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen" name="imagen">
                        <label class="custom-file-label" for="imagen">Choose file</label>
                    </div>
                </div>
                <div class="col-1">
                    <?php
                    $fprin = $producto->getFoto_principal();
                    if (!empty($fprin)) {
                        echo "<img src=\"../$fprin\" class=\"img-thumbnail\" alt=\"Foto principal\"/>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2">Foto Zoom 1</div>
                <div class="col">
                    <input type="hidden" id="v_zoom1" name="v_zoom1"
                           value="<?php echo $producto->getFoto_zoom_1() ?>"/>
                    <input type="file" id="zoom1" name="zoom1"/>
                </div>
                <div class="col-1">
                    <?php
                    $zoom1 = $producto->getFoto_zoom_1();
                    if (!empty($zoom1)) {
                        echo "<img src=\"../$zoom1\" class=\"img-thumbnail\" alt=\"Zoom 1\"/>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2">Foto Zoom 2</div>
                <div class="col">
                    <input type="hidden" id="v_zoom2" name="v_zoom2"
                           value="<?php echo $producto->getFoto_zoom_2() ?>"/>
                    <input type="file" id="zoom2" name="zoom2"/>
                </div>
                <div class="col-1">
                    <?php
                    $zoom2 = $producto->getFoto_zoom_2();
                    if (!empty($zoom2)) {
                        echo "<img src=\"../$zoom2\" class=\"img-thumbnail\" alt=\"Zoom 2\"/>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2">Foto Zoom 3</div>
                <div class="col">
                    <input type="hidden" id="v_zoom3" name="v_zoom3"
                           value="<?php echo $producto->getFoto_zoom_3() ?>"/>
                    <input type="file" id="zoom3" name="zoom3"/>
                </div>
                <div class="col-1">
                    <?php
                    $zoom3 = $producto->getFoto_zoom_3();
                    if (!empty($zoom3)) {
                        echo "<img src=\"../$zoom3\" class=\"img-thumbnail\" alt=\"Zoom 3\"/>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2">Foto Zoom 4</div>
                <div class="col">
                    <input type="hidden" id="v_zoom4" name="v_zoom4"
                           value="<?php echo $producto->getFoto_zoom_4() ?>"/>
                    <input type="file" id="zoom4" name="zoom4"/>
                </div>
                <div class="col-1">
                    <?php
                    $zoom4 = $producto->getFoto_zoom_4();
                    if (!empty($zoom4)) {
                        echo "<img src=\"../$zoom4\" class=\"img-thumbnail\" alt=\"Zoom 4\"/>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2">Ficha t&eacute;cnica</div>
                <div class="col">
                    <input type="hidden" name="v_fichtec" value="<?php echo $producto->getFicha_tecnica() ?>"/>
                    <input type="file" id="fichtec" name="fichtec"/>
                </div>
                <div class="col-1">
                    <?php
                    $ficha = $producto->getFicha_tecnica();
                    if (!empty($ficha)) {
                        echo "<img src=\"images/pdf.png\" alt=\"Ficha tecnica\"/>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2"><label for="descripcion">Descripci&oacute;n</label></div>
                <div class="col">
                    <textarea id="descripcion" name="descripcion" rows="5"
                              class="form-control"><?php echo $producto->getDescripcion() ?></textarea>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <input id="btn_acept" type="button" name="name" value="Aceptar" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="scritps/funciones_producto.js"></script>
    </body>
    </html>
<?php } ?>
