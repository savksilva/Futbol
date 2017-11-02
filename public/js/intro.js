
var countJugadores = 0;
var countTecnicos = 0;
$(document).ready(function() {


    var today = new Date(new Date().setFullYear(1999));
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 
    
    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("fecha_nacimiento1").setAttribute("max", today);
    document.getElementById("fecha_nacimiento_tecnico1").setAttribute("max", today);

    var jugadores = [];
    var tecnicos = [];
    var formData = new FormData();
    $('#formulario_completo').click(function(){
            if($('#formulario').isValid()){
                var reader = new FileReader();
                var reader2 = new FileReader();
                reader.readAsDataURL($("#imagen_bandera")[0].files[0]);
                reader2.readAsDataURL($("#imagen_escudo")[0].files[0]);
                reader.onload = function(){
                    reader2.onload = function(){
                        formData.append("_token",$("#_token").val());
                        formData.append("name_team",$("#name_team").val());
                        formData.append("imagen_bandera",reader.result);
                        formData.append("imagen_escudo",reader2.result);
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
                                new PNotify({
                                    title: 'Alerta',
                                    text: 'Equipo creado exitosamente!'
                                  });
                            },
                            error: function(err){
                                console.log(err)
                            }
                        }) 
                    }
                     
                }
            }
    })
     


    $('#jugador_new').click(function(){
        console.log("Entro");
        if($('#jugador').isValid()){
        var reader = new FileReader();
        reader.readAsDataURL($("#foto_jugador1")[0].files[0]);
        var image = null;
        reader.onload = function(){
            image = reader.result;
            var jugador = {
                foto_jugador:image,
                nombre_jugador1:$("#nombre_jugador1").val(),
                apellido_jugador1:$("#apellido_jugador1").val(),
                fecha_nacimiento1:$("#fecha_nacimiento1").val(),
                posicion_jugador1:$("#posicion_jugador1").val(),
                numero_camiseta_jugador1:$("#numero_camiseta_jugador1").val(),
                titular: $("#radioYES_jugador1")[0].checked == true ? (1):(0)
            }
            jugadores.push(jugador);
            console.log(jugadores);
            countJugadores++;
            $("#tbody").append(`
            <tr id="jugador`+countJugadores+`">
                <th scope="row">`+countJugadores+`</th>
                <td>`+$("#nombre_jugador1").val()+`</td>
                <td>`+$("#apellido_jugador1").val()+`</td>
                <td><input type="button"  class="btn btn-danger" onClick="removerJugador('jugador`+countJugadores+`')" value="-" /></td>
            </tr>
            `);
          };
       // clearJugador();
        }

        
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
        if($('#tecnico').isValid()){
        var tecnico = {
            nombre_tecnico1:$("#nombre_tecnico1").val(),
            apellido_tecnico1:$("#apellido_tecnico1").val(),
            fecha_nacimiento_tecnico1:$("#fecha_nacimiento_tecnico1").val(),
            nacionalidad_tecnico:$("#nacionalidad_tecnico").val(),
            rol_tecnico1:$("#rol_tecnico1").val(),
        }
        tecnicos.push(tecnico);
        countTecnicos++;
        $("#tbodyTecnico").append(`
        <tr id="tecnico`+countTecnicos+`">
            <th scope="row">`+countJugadores+`</th>
            <td>`+$("#nombre_tecnico1").val()+`</td>
            <td>`+$("#apellido_tecnico1").val()+`</td>
            <td><input type="button"  class="btn btn-danger" onClick="removerTecnico('tecnico`+countTecnicos+`')" value="-" /></td>
        </tr>
        `);
        console.log(tecnicos);
        //clearTecnico();
    }
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
function removerJugador(data){
    countJugadores--;
    $("#"+data).remove();
}

function removerTecnico(data){
    countTecnicos--;
    $("#"+data).remove();
}