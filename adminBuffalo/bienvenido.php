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
        $band = 1;
    }
} else {
    if (!isset($_SESSION['user'])) {
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
            <?php include 'menu.html'; ?>

            <div style="text-align: right; height: 40px;">
                <a href="formProducto.php?action=N">Nuevo producto</a>
            </div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Descripci&oacute;n</th>
                        <th>Clase</th>
                        <th colspan="3">Acciones</th>
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
                                echo "<td>{$productos[$i]->getModelo()}</td>";
                                echo '<td>' . utf8_encode($productos[$i]->getDescripcion()) . '</td>';
                                echo "<td>{$master->getClase()}</td>";
                                echo "<td><a href='formDetalles.php?id_producto={$productos[$i]->getId_producto()}'>Detalles</a></td>";
                                echo "<td><a href='formProducto.php?accion=E&id_producto={$productos[$i]->getId_producto()}&id_master={$master->getId_master()}'>Editar</a></td>";
                                echo "<td><a href='#{$productos[$i]->getId_producto()}' class='a_delete'>Eliminar</a></td>";
                                ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="result"></div>
        </body>
    </html>
<?php }
?>