<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'bussinessLogic/VehiculoBL.php';

$id_vehiculo = $_POST['veh_id'];

if ($id_vehiculo == 0) {
    echo '<option value="0">[Seleccione]</option>';
} else {
    $vehiculoBL = new VehiculoBL();
    $masters = $vehiculoBL->getMastersByVehiculo($id_vehiculo);
    for ($i = 0; $i < count($masters); $i++) {
        echo "<option value=\"{$masters[$i]->getId_master()}\">{$masters[$i]->getClase()}</option>";
    }
}
?>
