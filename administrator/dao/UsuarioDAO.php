<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'domain/Usuario.php';
include_once 'util/Connection.php';

/**
 * Description of UsuarioDAO
 *
 * @author Cesardl
 */
class UsuarioDAO {

    public function getUsuario($user, $passwd) {
        $conexion = new Connection();
        $query = "SELECT id, usuario FROM usuario WHERE usuario='$user' AND passwd='$passwd' LIMIT 1";
        $result = mysql_query($query, $conexion->getConnection());
        $total_registros = mysql_num_rows($result);
        
        $usuario = new Usuario();
        if ($total_registros > 0) {
            $row = mysql_fetch_assoc($result);

            $usuario->setId($row['id']);
            $usuario->setUser($row['usuario']);
        }
        return $usuario;
    }

}

?>
