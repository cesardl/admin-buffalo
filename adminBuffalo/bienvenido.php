<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'bussinessLogic/UsuarioBL.php';
session_start();

if (!isset($_POST['user'])) {
    if (!isset($_SESSION['user'])) {
        header("location: index.php?error=2");
    } else {
        if (!isset($_POST['error'])) {
            header("location: index.php?error=1");
        } else {
            $band = 1;
        }
    }
} else {
    if (is_null($_SESSION['user'])) {
        $user = $_POST['user'];
        $passwd = $_POST['passwd'];

        $bl = new UsuarioBL();

        $usuario = $bl->getUsuario($user, $passwd);

        if ($usuario->getId() == 0) {
            header("location: index.php?error=1");
        } else {
            $_SESSION['user'] = $usuario->getUser();
            $_SESSION['id_usuario'] = $usuario->getId();

            $band = 1;
        }
    } else {
        $band = 1;
    }
}

if ($band == 1) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link type="text/css" href="style/style.css" rel="stylesheet" media="screen"/>
            <script type="text/javascript" src="scritps/jquery.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.a_delete').click(function(){
                        if(confirm('Seguro que desea eliminar este vehiculo?')) {
                            var href = $(this).attr('href');
                            var id_product = href.substr(1);
                            $.post("VehiculoDelete.php",{
                                id_producto: id_product
                            },function(data){
                                $("#result").html(data);
                                $("#fila-"+id_product).remove();
                            })
                        }
                    });
                                                                                                                                                                                        
                    $('#result').click(function() {
                        $(this).hide();
                    });
                });
            </script>
            <title>Bienvenido</title>
        </head>
        <body>
            <table style="text-align: right; width: 100%;">
                <tr>
                    <td colspan="2"><a href="index.php?param=1">Cerrar sesi&oacute;n</a></td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <td style="font-weight: bold; font-size: 14px; text-align: left;">
                        Mantenimiento de vehiculos
                    </td>
                    <td><a href="formProducto.php?action=N">Nuevo producto</a></td>
                </tr>
            </table>
            <div id="result"></div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Clase</th>
                        <th>Modelo</th>
                        <th>Descripci&oacute;n</th>
                        <th colspan="4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'bussinessLogic/ProductoBL.php';

                    $productoBL = new ProductoBL();

                    $productos = $productoBL->getProductos();
                    for ($i = 0; $i < count($productos); $i++) {
                        $master = $productos[$i]->getMaster();
                        ?>
                        <tr id="fila-<?php echo $productos[$i]->getId_producto() ?>" 
                            onmouseover="this.style.backgroundColor='#E0E0E0'" 
                            onmouseout="this.style.backgroundColor='#FFFFFF'">
                                <?php
                                echo "<td>{$master->getClase()}</td>";
                                echo "<td>{$productos[$i]->getModelo()}</td>";
                                echo '<td class="tdDescripcion">' . htmlspecialchars($productos[$i]->getDescripcion()) . '</td>';
                                echo "<td class='tdAccion'><a href='formProducto.php?accion=E&id_producto={$productos[$i]->getId_producto()}&id_master={$master->getId_master()}'>Editar</a></td>";
                                echo "<td class='tdAccion'><a href='formDetalles.php?id_producto={$productos[$i]->getId_producto()}'>Detalles</a></td>";
                                echo "<td class='tdAccion'><a href='formColores.php?id_producto={$productos[$i]->getId_producto()}'>Colores</a></td>";
                                echo "<td class='tdAccion'><a href='#{$productos[$i]->getId_producto()}' class='a_delete'>Eliminar</a></td>";
                                ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </body>
    </html>
<?php }
?>