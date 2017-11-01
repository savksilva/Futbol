$(document).ready(function() {

    var jugadores = [];
    var tecnicos = [];
    var formData = new FormData();
    $('#formulario_completo').click(function(){
        formData.append("_token",$("#_token").val());
        formData.append("name_team",$("#name_team").val());
        formData.append("imagen_bandera",$("#imagen_bandera")[0].files[0]);
        formData.append("imagen_escudo",$("#imagen_escudo")[0].files[0]);
        formData.append("jugadores",JSON.stringify(jugadores));
        formData.append("tecnicos",JSON.stringify(tecnicos));
        $.ajax({
            type: 'POST',
            url: $("#formulario").attr('action'),
            data: formData,
            cache : false,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                console.log("succes");
            },
            error: function(err){
                console.log(err)
            }
        })   
    })
     


    $('#jugador_new').click(function(){
        console.log("Entro")
        var jugador = {
            foto_jugador:$("#foto_jugador1")[0].files[0],
            nombre_jugador1:$("#nombre_jugador1").val(),
            apellido_jugador1:$("#apellido_jugador1").val(),
            fecha_nacimiento1:$("#fecha_nacimiento1").val(),
            posicion_jugador1:$("#posicion_jugador1").val(),
            numero_camiseta_jugador1:$("#numero_camiseta_jugador1").val(),
            titular: $("#radioYES_jugador1")[0].checked == true ? ("si"):("no")
        }
        jugadores.push(jugador);
        console.log(jugadores);
       // clearJugador();
        
    });
    function clearJugador(){
        $("#foto_jugador1").val("")
        $("#nombre_jugador1").val("")
        $("#apellido_jugador1").val("")
        $("#fecha_nacimiento1").val("")
        $("#posicion_jugador1").val("")
        $("#numero_camiseta_jugador1").val("")
        $("#radioYES_jugador1")[0].checked =false
        $("#radioNO_jugador1")[0].checked =false
    }

    $('#new_tec').click(function(){
        var tecnicos = {
            nombre_tecnico1:$("#nombre_tecnico1")[0].files[0],
            apellido_tecnico1:$("#apellido_tecnico1").val(),
            fecha_nacimiento_tecnico1:$("#fecha_nacimiento_tecnico1").val(),
            nacionalidad_tecnico:$("#nacionalidad_tecnico").val(),
            rol_tecnico1:$("#rol_tecnico1").val(),
        }
        jugadores.push(tecnico);
        clearTecnico();
    });

    function clearTecnico(){
        $("#nombre_tecnico1").val("")
        $("#apellido_tecnico1").val("")
        $("#fecha_nacimiento_tecnico1").val("")
        $("#nacionalidad_tecnico").val("")
        $("#rol_tecnico1").val("")
    }

    $("#radioYES_jugador1").click(function(){
        $("#radioNO_jugador1")[0].checked = false;
    });
    $("#radioNO_jugador1").click(function(){
        $("#radioYES_jugador1")[0].checked = false;
    });
});