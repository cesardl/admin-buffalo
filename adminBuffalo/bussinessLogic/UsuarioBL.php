<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'dao/UsuarioDAO.php';

/**
 * Description of UsuarioBL
 *
 * @author Cesardl
 */
class UsuarioBL {

    private $uDao;

    public function __construct() {
        $this->uDao = new UsuarioDAO();
    }

    public function getUsuario($user, $passwd) {
        return $this->uDao->getUsuario($user, $passwd);
    }

}

?>
