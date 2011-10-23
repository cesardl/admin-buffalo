/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#vehiculo").change(function(){
        $.post("VehiculoSelect.php",{
            veh_id:$(this).val()
        },function(data){
            $("#master").html(data);
        })
    });
                                                                                
    $('#btn_acept').click(function(){
        var master = $('#master');
        var modelo = $('#modelo');
        var imagen = $('#imagen');
        var descripcion = $('#descripcion');

        if(master.val() == 0) {
            alert('Debe seleccionar un vehiculo y su clase');
            return;
        } else {
            if(jQuery.trim(modelo.val()) == 0) {
                alert('Debe ingresar un modelo de vehiculo');
                return;
            } else {
                if(jQuery.trim(imagen.val()) == 0) {
                    alert('Debe seleccionar una imagen');
                    return;
                } else {
                    if(jQuery.trim(descripcion.val()) == 0) {
                        alert('Debe ingresar un descripcion del vehiculo');
                        return;
                    } else {
                        $('#formProducto').submit();
                    }   
                }
            }
        }
    });
});

