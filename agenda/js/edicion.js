/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function(){
    
var CONTADOR_GUARDAR = 2;

    $("#boton_editar_datos_agenda").click(function (eve){
        eve.preventDefault();
        
        
        
        if((CONTADOR_GUARDAR%2) == 0){
            //sI ENTRA AQUI QUIERE DECIR QUE SE VA A EDITAR
            $('#boton_editar_datos_agenda').attr("disabled", true);
            CONTADOR_GUARDAR++;
            $("#pantalla_agenda").fadeOut(1000, function (){
                $("#pantalla_edicion").fadeIn(500, function (){
                    $('#boton_editar_datos_agenda').attr("disabled", false);
                });
                //Codigo para guardar los cambios
                $("#boton_editar_datos_agenda").html("Cerrar edición");
                
            });
        }else{
            //sI ENTRA AQUI QUIERE DECIR QUE SE VA A GUARDAR
            $('#boton_editar_datos_agenda').attr("disabled", true);
            CONTADOR_GUARDAR++;
            $("#pantalla_edicion").fadeOut(1000, function (){
                $("#pantalla_agenda").fadeIn(500, function (){
                    $('#boton_editar_datos_agenda').attr("disabled", false);
                });
                $("#boton_editar_datos_agenda").html("Editar datos de la agenda");
                location.href = RUTA_SERVIDOR + "index.php?id_curso=" + ID_CURSO;
            });
        }
        
    });
    
    
    
    
    $("#boton_guardar_datos").click(function (eve){
        eve.preventDefault();
        //console.log("ID:" + ID_CURSO);
        
        var d1 = $("#d_nomb_curso").val();
        var d2 = $("#d_prof_curso").val();
        var d3 = $("#d_peri_curso").val();
        //console.log(RUTA_SERVIDOR);
        $.ajax({
            url: RUTA_SERVIDOR + "guardarCambios.php",//url del servidor
            data: {tipo:1, id:ID_CURSO, dato1:d1, dato2:d2, dato3:d3},
            type: "post"
        }).done(function(res){//cuando ya este listo
            //alert("Envio el " + cd_mes_new);
            $("#res_serv").html("");
            $("#res_serv").html(res);//ponemos la respuesta del servidor en el documeto
            desaparecerRespuestaServidor();
            //console.log("Envio datos, recibio: " + res)
        });//fin del done
        
        
    });
    

    
    
    
    
    $("#boton_guardar_unidad_1").click(function (eve){
        eve.preventDefault();
        
        console.log("Dio click");
        
        if(EXISTEN_UNIDADES == true){
            var d1 = $("#d_unidad_2").val();
            var d2 = $("#d_actividad_2").val();
            var d3 = $("#d_fecha_2").val();
            var d4 = $("#d_fechafinal_2").val();
            var d5 = $("#d_puntaje_2").val();
            
            if(d1 != "" && d2 != "" && d3 != "" && d4 != "" && d5 != "" ){
                $('#boton_guardar_unidad_2').attr("disabled", true);
                //console.log("Puede seguir");
                $.ajax({
                    url: RUTA_SERVIDOR + "guardarCambios.php",//url del servidor
                    data: {tipo:3, id:ID_CURSO, dato1:d1, dato2:d2, dato3:d3, dato4:d4, dato5:d5},
                    type: "post"
                }).done(function(res){//cuando ya este listo
                    //alert("Envio el " + cd_mes_new);
                    $("#res_serv").html("");
                    $("#res_serv").html(res);//ponemos la respuesta del servidor en el documeto
                    
                    $('#boton_guardar_unidad_2').attr("disabled", false);
                    desaparecerRespuestaServidorYActualizar();
                    console.log("Envio actividad primera, recibio: " + res)
                });//fin del done
                
                
            }else{
                $("#res_serv").html("Por favor completa todos los datos de la nueva actividad");
                desaparecerRespuestaServidor();
            }
            
            
        }else{
            var d1 = $("#d_unidad_1").val();
            var d2 = $("#d_actividad_1").val();
            var d3 = $("#d_fecha_1").val();
            var d4 = $("#d_fechafinal_1").val();
            var d5 = $("#d_puntaje_1").val();
            
            if(d1 != "" && d2 != "" && d3 != "" && d4 != "" && d5 != "" ){
                $('#boton_guardar_unidad_1').attr("disabled", true);
                //console.log("Puede seguir");
                $.ajax({
                    url: RUTA_SERVIDOR + "guardarCambios.php",//url del servidor
                    data: {tipo:2, id:ID_CURSO, dato1:d1, dato2:d2, dato3:d3, dato4:d4, dato5:d5},
                    type: "post"
                }).done(function(res){//cuando ya este listo
                    //alert("Envio el " + cd_mes_new);
                    $("#res_serv").html("");
                    $("#res_serv").html(res);//ponemos la respuesta del servidor en el documeto
                    
                    $('#boton_guardar_unidad_1').attr("disabled", false);
                    desaparecerRespuestaServidorYActualizar();
                    console.log("Envio actividad primera, recibio: " + res)
                });//fin del done
                
                
            }else{
                $("#res_serv").html("Por favor completa todos los datos de la actividad");
                desaparecerRespuestaServidor();
            }
            
            
        }//Fin del else para el guardado de la primera actividad
        
        
        
        
        
        
    });












$("#boton_iniciar_sesion").click(function (eve){
    eve.preventDefault();
    //alert("dio click");
    
    var d1 = $("#d_nomb_usuario_admi").val();
    var d2 = $("#d_pass_usuario_admi").val();
    
    if(d1 != "" && d2 != "" ){
        $.ajax({
            url: RUTA_SERVIDOR + "guardarCambios.php",//url del servidor
            data: {tipo:4, id:ID_CURSO, dato1:d1, dato2:d2},
                    type: "post"
            }).done(function(res){//cuando ya este listo
                //alert("Envio el " + cd_mes_new);
                
                $("#res_serv").html("");
                $("#res_serv").html(res);//ponemos la respuesta del servidor en el documeto
            });//fin del done
    }else{
        alert("Por favor llena los campos");
    }
    
});



$("#cerrar_sesion").click(function (eve){
    eve.preventDefault();
    //alert("dio click salir");
            $.ajax({
            url: RUTA_SERVIDOR + "guardarCambios.php",//url del servidor
            data: {tipo:5},
                    type: "post"
            }).done(function(res){//cuando ya este listo
                //alert("Envio el " + cd_mes_new);
                console.log(res);
                $("#res_serv_2").html("");
                $("#res_serv_2").html(res);//ponemos la respuesta del servidor en el documeto
            });//fin del done
});




    function desaparecerRespuestaServidor(){
        setTimeout(function (){
            $("#res_serv").fadeOut(1000, function (){
                $("#res_serv").html("");
                $("#res_serv").show();
            });
        }, 5000);
    }
function desaparecerRespuestaServidorYActualizar(){
        setTimeout(function (){
            $("#res_serv").fadeOut(1000, function (){
                $("#res_serv").html("");
                $("#res_serv").show();
                location.href = RUTA_SERVIDOR + "index.php?id_curso=" + ID_CURSO;
            });
        }, 5000);
    }


}());
