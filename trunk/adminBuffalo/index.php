<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                    <th>Id</th>
                    <th>Modelo</th>
                    <th>Descripcion</th>
                    <th>Master</th>
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
                    echo '<tr>';
                    echo "<td>{$productos[$i]->getId_producto()}</td>";
                    echo "<td>{$productos[$i]->getModelo()}</td>";
                    echo '<td>' . utf8_encode($productos[$i]->getDescripcion()) . '</td>';
                    echo "<td>{$master->getClase()}</td>";
                    echo "<td><a href='formDetalles.php?id_producto={$productos[$i]->getId_producto()}'>Detalles</a></td>";
                    echo "<td><a href='formProducto.php?accion=E&id_producto={$productos[$i]->getId_producto()}&id_master={$master->getId_master()}'>Editar</a></td>";
                    echo '<td>Eliminar</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
