<?php session_start(); ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Motos Buffalo</title>
</head>
<body>
<div class="container pt-4">
    <form class="form-horizontal" action="bienvenido.php" method="POST">
        <?php
        if (isset($_REQUEST['error'])) {
            if ($_REQUEST['error'] == 1) { ?>
                <div class="alert alert-warning">Error al ingresar usuario o contraseña.</div>
                <?php
            } else if ($_REQUEST['error'] == 2) { ?>
                <div class="alert alert-danger">Usted no tiene permisos para acceder a esta página.<br>
                    Por favor registrese.
                </div>
                <?php
            }
        }
        if (isset($_SESSION['user']) & isset($_REQUEST['param'])) {
            $_SESSION['user'] = null;
            echo '<div class="alert alert-info">Gracias por utilizar el administrador.</div>';
        }
        ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="user">Usuario</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese el usuario"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="passwd">Contrase&ntilde;a</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Ingrese el password"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" id="btn_ingresar" value="Aceptar" class="btn btn-primary"/>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
</body>
</html>
