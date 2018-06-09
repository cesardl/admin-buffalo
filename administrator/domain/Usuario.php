<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Cesardl
 */
class Usuario {

    private $id;
    private $user;
    private $passwd;

    public function __construct() {
        $this->id = 0;
        $this->user = '';
        $this->passwd = '';
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getPasswd() {
        return $this->passwd;
    }

    public function setPasswd($passwd) {
        $this->passwd = $passwd;
    }

}

?>
