<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'dao/VehiculoDAO.php';

/**
 * Description of VehiculoBL
 *
 * @author Cesardl
 */
class VehiculoBL
{

    private $vDao;

    public function __construct()
    {
        $this->vDao = new VehiculoDAO;
    }

    public function getVehiculos()
    {
        return $this->vDao->getVehiculos();
    }

    public function getMasterById($id_master)
    {
        return $this->vDao->getMasterById($id_master);
    }

    public function getMastersByVehiculo($id_vehiculo)
    {
        return $this->vDao->getMastersByVehiculo($id_vehiculo);
    }

}
