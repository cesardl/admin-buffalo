<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $cadena = '';
        if (empty($cadena)) {
        echo 'vacio';
        } else {
        echo 'no vacio';
        }
        echo '<hr>';
        $i = 0;
        if (!($i % 2)) {
        echo "This number is not even.";
        } else {
            echo "This number is even.";
        }
        echo '<hr>';
        $vector = array('hola','chau','como esats');
        echo $vector[0].'-'.$vector[1].'-'.$vector[2];
        ?>
    </body>
</html>
