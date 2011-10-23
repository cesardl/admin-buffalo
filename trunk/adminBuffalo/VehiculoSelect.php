<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'bussinessLogic/VehiculoBL.php';

$id_producto = $_POST['veh_id'];

if ($id_producto == 0) {
    echo '<option value="0">[Seleccione]</option>';
} else {
    echo 'entro!!';
    $vehiculoBL = new VehiculoBL();
    $masters = $vehiculoBL->getMastersByVehiculo($id_producto);
    for ($i = 0; $i < count($masters); $i++) {
        echo "<option value=\"{$masters[$i]->getId_master()}\">{$masters[$i]->getClase()}</option>";
    }
}
?>
