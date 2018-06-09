<?php session_start(); ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
        <title>Motos Buffalo</title>
    </head>
    <body>
        <form action="bienvenido.php" method="POST">
            <table width="600" align="center" cellpadding="15" cellspacing="0">
                <?php
                if (isset($_REQUEST['error'])) {
                    if ($_REQUEST['error'] == 1) {
                        echo '<tr><td>Error al ingresar usuario o contraseña.</td></tr>';
                    } else if ($_REQUEST['error'] == 2) {
                        echo '<tr><td>Usted no tiene permisos para acceder a esta página.<br>
                            Por favor registrese.
                            </td></tr>';
                    }
                }
                if (isset($_SESSION['user']) & isset($_REQUEST['param'])) {
                    $_SESSION['user'] = null;
                    echo '<tr><td>Gracias por utilizar el administrador.</td></tr>';
                }
                ?>
                <tr>
                    <td>
                        <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>Usuario</td>
                                <td><input type="text" id="user" name="user"/></td>
                            </tr>
                            <tr>
                                <td>Contrase&ntilde;a</td>
                                <td><input type="password" id="passwd" name="passwd"/></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;" colspan="2">
                                    <input type="submit"  id="btn_ingresar"  value="Aceptar"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
