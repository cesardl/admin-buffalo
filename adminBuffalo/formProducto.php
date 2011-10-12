<?php
include_once 'bussinessLogic/ProductoBL.php';
include_once 'bussinessLogic/VehiculoBL.php';
include_once 'domain/Producto.php';
include_once 'domain/Master.php';

$id_master = $_GET['id_master'];
$id_producto = $_GET['id_producto'];
$accion = $_GET['accion'];

$productoBL = new ProductoBL();

if ($accion == 'E') {
    $producto = $productoBL->getProductoById($id_producto);
    $title = 'Editar producto';
} else {
    $producto = new Producto();
    $title = 'Registrar producto';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="scritps/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#vehiculo").change(function(){
                    $.post("VehiculoSelect.php",{
                        veh_id:$(this).val()
                    },function(data){
                        $("#master").html(data);
                    })
                });
            });
        </script>
        <title>Formulario de producto</title>
    </head>
    <body>
        <form method="POST" action="bussinessLogic/ProductoBL.php" enctype="multipart/form-data" name="formProducto">
            <table>
                <tr>
                    <td colspan="2"><h3><?php echo $title ?></h3></td>
                    <td><a href="index.php">&lt;&lt; Volver</a></td>
                </tr>
                <tr>
                    <td>Tipo vehiculo</td>
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
                    <td>Modelo</td>
                    <td>
                        <input type="text" id="modelo" name="modelo" 
                               style="width: 180px;"
                               value="<?php echo $producto->getModelo() ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Foto principal</td>
                    <td><input type="file" id="imagen" name="imagen" /></td>
                </tr>
                <tr>
                    <td>Foto Zoom 1</td>
                    <td><input type="file" id="zoom1" name="zoom1" /></td>
                </tr>
                <tr>
                    <td>Foto Zoom 2</td>
                    <td><input type="file" id="zoom2" name="zoom2" /></td>
                </tr>
                <tr>
                    <td>Foto Zoom 3</td>
                    <td><input type="file" id="zoom3" name="zoom3" /></td>
                </tr>
                <tr>
                    <td>Foto Zoom 4</td>
                    <td><input type="file" id="zoom4" name="zoom4" /></td>
                </tr>
                <tr>
                    <td>Descripci&oacute;n</td>
                    <td>
                        <textarea id="descripcion" name="descripcion"  style="height: 80px; width: 360px;"><?php echo utf8_encode($producto->getDescripcion()) ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="name"value="Aceptar" />                        
                    </td>
                </tr>
            </table>            
        </form>
    </body>
</html>
