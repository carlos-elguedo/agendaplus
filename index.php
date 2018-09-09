<?php

require './agenda/bd/Consultas.php';

$consultas = new Consultas();

//$da = explode("-", "2018-2-3");
//echo $da[0];

    //=  $_GET["id_curso"];
$url_valida = false;





if(!isset($_GET["id_curso"])){
    //echo "Ha ingresado sin id del curso";
?>
<!--
Author: Carlos Elguedo - Jorge Hernandez - TableCloth
-->
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agenda del curso</title>


    <link href="agenda/css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
<style>

body{
	margin:0;
	padding:0;
	background:#f1f1f1;
	font:70% Arial, Helvetica, sans-serif; 
	color:#555;
	line-height:150%;
	text-align:left;
}
a{
	text-decoration:none;
	color:#057fac;
}
a:hover{
	text-decoration:none;
	color:#999;
}
h1{
	font-size:140%;
	margin:0 20px;
	line-height:80px;	
}
h2{
	font-size:120%;
}
#container{
	margin:0 auto;
	width:95%;
        background:#fff;
        padding-bottom:20px;
        border: 1px solid green;
        margin-top: 10px;
        margin-left: auto;
        margin-right: auto;
	background:#fff;
	padding-bottom:20px;
}
#content{margin:0 20px;}
p.sig{	
	margin:0 auto;
	width:680px;
	padding:1em 0;
}
form{
	margin:1em 0;
	padding:.2em 20px;
	background:#eee;
}
.boton{
  background: #b1b1b1;
      border-radius: 4px;
      margin-left: 20px;
      border:0;
      color: black;
      cursor: pointer;
      display: inline-block;
      font-size: 14px;
      padding: 15px;
      -webkit-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease; }
      
.boton:hover {
        background: #93c01c;
        color: #fff;
}
.boton2{
  background: lightsteelblue;
      border-radius: 2px;
      border:0;
      color: black;
      cursor: pointer;
      display: inline-block;
      font-size: 12px;
      padding: 5px;
      -webkit-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease; }
      
.boton2:hover {
        background: lawngreen;
        color: #fff;
}
.respuestas_servidor{
    color: green;
    font-size: 16px;
}
</style>

</head>
    <body>
        <div id="container">
            <center>
                <br>
                <label class="respuestas_servidor">Por favor ingresa desde un curso para ver su agenda</label>
            </center>
        </div>
    </body>


<?php
    //Llego sin id del curso
}else{
    //echo "hay algo";
    $id_curso = $_GET["id_curso"];
    if($consultas->existeCurso($id_curso)){
        
        
        //Ahora comprobamos si el usuario ha iniciado session
        if(!$consultas->adminActivo("admin") == 1){
            //Es usuario actual, en el computador actual si ha iniciado sesion
            //echo "no esta activo";
?>
<!--
Author: Carlos Elguedo - Jorge Hernandez - TableCloth
-->
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agenda del curso</title>


    <link href="agenda/css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="agenda/js/codigo.js"></script>
    <script type="text/javascript" src="agenda/js/jquery.js"></script>
<style>

body{
	margin:0;
	padding:0;
	background:#f1f1f1;
	font:70% Arial, Helvetica, sans-serif; 
	color:#555;
	line-height:150%;
	text-align:left;
}
a{
	text-decoration:none;
	color:#057fac;
}
a:hover{
	text-decoration:none;
	color:#999;
}
h1{
	font-size:140%;
	margin:0 20px;
	line-height:80px;	
}
h2{
	font-size:120%;
}
#container{
	margin:0 auto;
	width:95%;
        background:#fff;
        padding-bottom:20px;
        border: 1px solid green;
        margin-top: 10px;
        margin-left: auto;
        margin-right: auto;
	background:#fff;
	padding-bottom:20px;
}
#content{margin:0 20px;}
p.sig{	
	margin:0 auto;
	width:680px;
	padding:1em 0;
}
form{
	margin:1em 0;
	padding:.2em 20px;
	background:#eee;
}
.boton{
  background: #b1b1b1;
      border-radius: 4px;
      margin-left: 20px;
      border:0;
      color: black;
      cursor: pointer;
      display: inline-block;
      font-size: 14px;
      padding: 15px;
      -webkit-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease; }
      
.boton:hover {
        background: #93c01c;
        color: #fff;
}
.boton2{
  background: lightsteelblue;
      border-radius: 2px;
      border:0;
      color: black;
      cursor: pointer;
      display: inline-block;
      font-size: 12px;
      padding: 5px;
      -webkit-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease; }
      
.boton2:hover {
        background: lawngreen;
        color: #fff;
}
.respuestas_servidor{
    color: green;
    font-size: 16px;
}
</style>

</head>
    <body>
        <div id="container">
            <center>
                <br>
                <label class="respuestas_servidor">No has iniciado sesión</label>
                <br>
                    <table style="width: 50%">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Inicio de sesión
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label class="label_de_form">Nombre de usuario: </label>
                            </td>
                            <td>
                                <input id="d_nomb_usuario_admi" class="campo_texto" type="text"/>
                            </td>
                        </tr>
                            
                        <tr>
                            <td>
                                <label class="label_de_form">Contraseña de usuario: </label>
                            </td>
                            <td>
                                <input id="d_pass_usuario_admi" class="campo_texto" type="password"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <button id="boton_iniciar_sesion" class="boton2">Ingresar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="res_serv">
                    
                </div>
            </center>
        </div>
<?php
        echo '<script type="text/javascript">';
                        $t = 'var ID_CURSO = "'.$id_curso.'";';
                        echo $t;
                        echo '</script>';
        
?>
        <script type="text/javascript" src="agenda/js/edicion.js"></script>
    </body>
</html>


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php
        }else{
            echo "esta activo";


        
        
        
        
        $datos_curso    = $consultas->darDatosCurso($id_curso);
        $unidades       = $consultas->darUnidadesCurso($id_curso);
        
        
        /*if(($consultas->darIdUnidad("Introduccion", 12)) == null){
            echo "Esta vacio";
        }else{
            echo "Hay algo";
        }
        */
        
        //echo " - :" . $consultas->darIdUnidad("Unidad 1", 2);
        
        $actividades    = $consultas->darActividadesCurso($id_curso);
        //echo mysqli_num_rows($actividades);
        //$datos = mysqli_fetch_array($actividades);
        //echo ":->" . $actividades["actividad"];
        
        $url_valida     = true;
        
    







?>
<!--
Author: Carlos Elguedo - Jorge Hernandez - TableCloth
-->
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agenda del curso</title>


    <link href="agenda/css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="agenda/js/codigo.js"></script>
    <script type="text/javascript" src="agenda/js/jquery.js"></script>
    

<style>

body{
	margin:0;
	padding:0;
	background:#f1f1f1;
	font:70% Arial, Helvetica, sans-serif; 
	color:#555;
	line-height:150%;
	text-align:left;
}
a{
	text-decoration:none;
	color:#057fac;
}
a:hover{
	text-decoration:none;
	color:#999;
}
h1{
	font-size:140%;
	margin:0 20px;
	line-height:80px;	
}
h2{
	font-size:120%;
}
#container{
	margin:0 auto;
	width:95%;
        background:#fff;
        padding-bottom:20px;
        border: 1px solid green;
        margin-top: 10px;
        margin-left: auto;
        margin-right: auto;
	background:#fff;
	padding-bottom:20px;
}
#content{margin:0 20px;}
p.sig{	
	margin:0 auto;
	width:680px;
	padding:1em 0;
}
form{
	margin:1em 0;
	padding:.2em 20px;
	background:#eee;
}
.boton{
  background: #b1b1b1;
      border-radius: 4px;
      margin-left: 20px;
      border:0;
      color: black;
      cursor: pointer;
      display: inline-block;
      font-size: 14px;
      padding: 15px;
      -webkit-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease; }
      
.boton:hover {
        background: #93c01c;
        color: #fff;
}
.boton2{
  background: lightsteelblue;
      border-radius: 2px;
      border:0;
      color: black;
      cursor: pointer;
      display: inline-block;
      font-size: 12px;
      padding: 5px;
      -webkit-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease; }
      
.boton2:hover {
        background: lawngreen;
        color: #fff;
}
.respuestas_servidor{
    color: green;
    font-size: 16px;
}
</style>

</head>

<body onload = "setInterval('calcularFecha()',1000);">

<div id="container">
    <div>
        <div style="width:420px;float:right;" align="center">
            <h1>AGENDA DEL CURSO</h1>
            <h2>
                <?php
                    if(isset($datos_curso["nombre"]) && $url_valida == true){
                        echo $datos_curso["nombre"];
                        echo '<script type="text/javascript">';
                        $t = 'var ID_CURSO = "'.$id_curso.'";';
                        echo $t;
                        echo '</script>';
                    }else{
                        echo "Nombre del curso";
                        echo '<script type="text/javascript">';
                        echo 'var ID_CURSO = 0;';
                        echo '</script>';
                    }
                    echo "<br/>";
                    
                    if(isset($datos_curso["profesor"]) && $url_valida == true){
                        echo $datos_curso["profesor"];
                    }else{
                        echo "Profesor";
                    }
                    echo "<br/>";
                    
                    if(isset($datos_curso["periodo"]) && $url_valida == true){
                        echo $datos_curso["periodo"];
                    }else{
                        echo "Periodo del curso";
                    }
                    
                    
                ?>
                
                
                
                <br/>
                
            </h2>
            <h2>Fecha actual: <span id="fechaActual"></span></h2>
        </div>
	<div style="width:500px;" align="center">
            <img src="agenda/img/logo1.png" alt="Nombre de la institucion">
        </div>
        
    </div>
    <div style="clear: both;"></div>
	
	<div id="content">
            <div>
                <label id="res_serv" class="respuestas_servidor"></label>
            </div>
            <div id="pantalla_agenda">

	<!-- all you need with Tablecloth is a regular, well formed table. No need for id's, class names... --> 
	
	
	<table id ="TABLA" cellspacing="0" cellpadding="0">
            <tr>
                <th colspan="8">
                    <center>
                        <b>Descripción general porcentajes</b>
                    </center>
                </th>
            </tr>
            <tr><b>
		<th>Nombre de la unidad</th>
		<!--<th>Descripción</th>-->
		<th>Actividad académica</th>
		<th>Inicio</th>
                <th>Final</th>
                <th>Peso educativo (en puntajes)</th>
                <th>Fecha de entraga de retroalimentación</th>
                <th>Finaliza en</th>
                </b>
            </tr>
<?php
if($url_valida==true){
        //echo "------------". sizeof($actividades);
        if(mysqli_num_rows($actividades) == 0){
?>
            <tr>
		<td  colspan="8">Aun no hay actividades en el curso</td>
		
            </tr>
            <tr>
		<td>Data</td>
		<!--<td>Data</td>-->
		<td>Data</td>
		<td>Data</td>
                <td id="ffinal_1">Data</td>
		<td>Data</td>
		<td>Data</td>
		<td id="limite_1">Data</td>
            </tr>
	</table>
    <script type="text/javascript">
        actividades = 1;
        fechaInicial = new Array();
        fechaFin = new Array();

        fechaInicial[1] = new Date(2018,2,5,0,0,0);
        
        fechaFin[1] = new Date(2018,2,15,23,55,0);

        
    </script>

    <!--<script type="text/javascript">
        actividades = 3;
        fechaInicial = new Array();
        fechaFin = new Array();

        //fechaInicial[1] = new Date(año, mes-1, dia, hora, minuto, segundo);
        fechaInicial[1] = new Date(2018,2,5,0,0,0);
        fechaInicial[2] = new Date(2018,3,5,0,0,0);
        fechaInicial[3] = new Date(2018,3,12,0,0,0);
        
        
        fechaFin[1] = new Date(2018,2,15,23,55,0);
        fechaFin[2] = new Date(2018,3,15,23,55,0);
        fechaFin[3] = new Date(2018,3,30,23,55,0);
        
        //setInterval(cuentaAtras(actividades, fechaInicial, fechaFin),1000);
        //setInterval(calcularFecha(),1000);
        
    </script>-->
<?php
}else{
    echo "<script type='text/javascript'>";
    echo "actividades = " . mysqli_num_rows($actividades) . ";";
    echo "fechaInicial = new Array();";
    echo "fechaFin = new Array();";
    echo "</script>";
    
    $contador_de_id = 1;
    $contador_de_array = 0;
    
    while ($actividad = mysqli_fetch_array($actividades)){
        //echo "entro: " . sizeof($actividad);
        //echo "<tr><td>hay</td><td>hay</td></tr>";
        //ECHO " ****************** " . $actividad["id_unidad"];
        $uni = $consultas->darNombreUnidad($actividad["id_unidad"]);
        echo "<tr>";
        echo "<td> {$uni} </td>";
        echo "<td> {$actividad["actividad"]}</td>";
        echo "<td> {$actividad["fecha_inicio"]} 00:00</td>";
        echo "<td id = 'ffinal_". $contador_de_id ."'> {$actividad["fecha_fin"]} 23:59</td>";
        echo "<td> {$actividad["puntaje"]} </td>";
        echo "<td> " . date ( 'Y-m-j' , strtotime ( '+1 day' , strtotime ( $actividad["fecha_fin"] ) ) ). " </td>";
        echo "<td id = 'limite_". $contador_de_id ."'> Data </td>";
        echo "</tr>";
        
        //Añadimos los datos de los contadores
        $fi = explode("-", $actividad["fecha_inicio"]);
        $ff = explode("-", $actividad["fecha_fin"]);
        
        
        
        echo "<script type='text/javascript'>";
        echo "fechaInicial[" . $contador_de_array ."] = new Date(" . $fi[0]. ",". ($fi[1] - 1). ",". $fi[2]. ",0,0,0);";
        
        //echo "console.log('--> . " . $ff[1] ."');";
        
        echo "fechaFin[" . $contador_de_array ."] = new Date(" . $ff[0]. ",". ($ff[1] -1) .",". $ff[2]. ",0,0,0);";
        
        echo "</script>";
        
        $contador_de_array++;
        $contador_de_id++;
    }//Fin del while              
    echo "<script type='text/javascript'>";
    echo "console.log('-->'+ fechaInicial[0]);";
    echo "console.log('-->'+ fechaInicial[1]);";
    echo "</script>";
    
    echo "</table>";
}
}
?>
		
	</div>
            <div id="pantalla_edicion" style="display:none">
                
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Edición de datos
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="label_de_form">Nombre del curso: </label>
                                </td>
                                <td>
                                    <input id="d_nomb_curso" class="campo_texto" type="text" value="<?php if($url_valida==true) echo $datos_curso["nombre"] ?>"/>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label class="label_de_form">Profesor: </label>
                                </td>
                                <td>
                                    <input id="d_prof_curso" class="campo_texto" type="text" value="<?php if($url_valida==true) echo $datos_curso["profesor"] ?>"/>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label class="label_de_form">Periodo: </label>
                                </td>
                                <td>
                                    <input id="d_peri_curso" class="campo_texto" type="text" value="<?php if($url_valida==true) echo $datos_curso["periodo"] ?>"/>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <?php if($url_valida==true){?><button id="boton_guardar_datos" class="boton2">Guardar datos</button><?php
                                    }else{ ?> <label class="label_de_form">Por favor accede correctamente </label><?php }?>
                                </td>
                            </tr>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
<?php
//echo "---" .  sizeof($unidades);
    if($url_valida==true){
        //echo "------------". sizeof($actividades);
        if(mysqli_num_rows($actividades) == 0){
            //No hay unidades
            echo '<script type="text/javascript">';
            echo 'var EXISTEN_UNIDADES = false;';
            echo '</script>';
?>                                    
                            <!-- CAMPO PARA NOMBRE DE LA UNIDAD -->
                            <tr>
                                <th colspan="2">
                                    Actividades del curso
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <label class="label_de_form">Nombre de la unidad: </label>
                                </td>
                                <td>
                                    <input id="d_unidad_1" class="campo_texto" type="text"/>
                                </td>
                            </tr>

                            <!-- CAMPO PARA LA ACTIVIDAD ACADEMICA-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Actividad academica: </label>
                                </td>
                                <td>
                                    <input id="d_actividad_1" class="campo_texto" type="text"/>
                                </td>
                            </tr>
                            
                            
                            
                            
                            <!-- CAMPO PARA EL INICIO DE LA ACTIVIDAD-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Fecha de inicio: </label>
                                </td>
                                <td>
                                    <input id="d_fecha_1" class="campo_texto" type="date" min="<?php echo date("Y"); ?>-01-01" max="<?php echo date("Y"); ?>-12-31"/>
                                </td>
                            </tr>
                            
                            
                            
                            
                            <!-- CAMPO PARA LA FINALIZACION DE LA ACTIVIDAD-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Fecha de finalización: </label>
                                </td>
                                <td>
                                    <input id="d_fechafinal_1" class="campo_texto" type="date" min="<?php echo date("Y"); ?>-01-01" max="<?php echo date("Y"); ?>-12-31"/>
                                </td>
                            </tr>
                            
                            
                            
                            <!-- CAMPO PARA EL PESO EN PUNTAJES DE LA ACTIVIDAD-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Peso en puntajes de la actividad: </label>
                                </td>
                                <td>
                                    <input id="d_puntaje_1" class="campo_texto" type="number"/>
                                </td>
                            </tr>
                            
                            
                            
                            <!--botn guardar actividad -->                            
                            <tr>
                                <td colspan="2">
                                    <button id="boton_guardar_unidad_1" class="boton2">Guardar Actividad</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
<?php
        }else{
            //Si hay unidades
            echo '<script type="text/javascript">';
            echo 'var EXISTEN_UNIDADES = true;';
            echo '</script>';
?>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="7">
                                    Actividades existentes
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><b>
                                <th>Nombre de la unidad</th>
                                <!--<th>Descripción</th>-->
                                <th>Actividad académica</th>
                                <th>Inicio</th>
                                <th>Final</th>
                                <th>Peso educativo (en puntajes)</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                                </b>
                            </tr>
<?php

            
    //echo "Contador : " . mysqli_num_rows($actividades);
$cont = 0;
//echo "Va a entrar " . mysqli_num_rows($consultas->darActividadesCurso($id_curso));
$band = $consultas->darActividadesCurso($id_curso);
    while ($actividad = mysqli_fetch_array($band)){
        //echo "entro: " . sizeof($actividad);
        //echo "<tr><td>hay</td><td>hay</td></tr>";
        //ECHO " ****************** " . $actividad["id_unidad"];
        $uni = $consultas->darNombreUnidad($actividad["id_unidad"]);
        echo "<tr>";
        echo "<td> {$uni} </td>";
        echo "<td> {$actividad["actividad"]} </td>";
        echo "<td> {$actividad["fecha_inicio"]} </td>";
        echo "<td> {$actividad["fecha_fin"]} </td>";
        echo "<td> {$actividad["puntaje"]} </td>";
        echo "<td> editar </td>";
        echo "<td> eliminar </td>";
        echo "</tr>";
    }//Fin del while            
            
            //Añadimos una nueva tabla para crear una nueva actividad
?>
                        </tbody>
                    </table>

                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Añadir actividad
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <label class="label_de_form">Nombre de la unidad: </label>
                                </td>
                                <td>
                                    <input id="d_unidad_2" class="campo_texto" type="text"/>
                                </td>
                            </tr>

                            <!-- CAMPO PARA LA ACTIVIDAD ACADEMICA-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Actividad academica: </label>
                                </td>
                                <td>
                                    <input id="d_actividad_2" class="campo_texto" type="text"/>
                                </td>
                            </tr>
                            
                            
                            
                            
                            <!-- CAMPO PARA EL INICIO DE LA ACTIVIDAD-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Fecha de inicio: </label>
                                </td>
                                <td>
                                    <input id="d_fecha_2" class="campo_texto" type="date" min="<?php echo date("Y"); ?>-01-01" max="<?php echo date("Y"); ?>-12-31"/>
                                </td>
                            </tr>
                            
                            
                            
                            
                            <!-- CAMPO PARA LA FINALIZACION DE LA ACTIVIDAD-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Fecha de finalización: </label>
                                </td>
                                <td>
                                    <input id="d_fechafinal_2" class="campo_texto" type="date" min="<?php echo date("Y"); ?>-01-01" max="<?php echo date("Y"); ?>-12-31"/>
                                </td>
                            </tr>
                            
                            
                            
                            <!-- CAMPO PARA EL PESO EN PUNTAJES DE LA ACTIVIDAD-->
                            <tr>
                                <td>
                                    <label class="label_de_form">Peso en puntajes de la actividad: </label>
                                </td>
                                <td>
                                    <input id="d_puntaje_2" class="campo_texto" type="number"/>
                                </td>
                            </tr>
                            
                            
                            
                            <!--botn guardar actividad -->                            
                            <tr>
                                <td colspan="2">
                                    <button id="boton_guardar_unidad_1" class="boton2">Guardar Nueva Actividad</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            
            
<?php
        }//Fin del if de si hay actividades
    }//Fin del if de la url valida
?>
                    
                
            </div>
	</div>
    <div>
        <button id="boton_editar_datos_agenda" class="boton">Editar datos de la agenda</button>
    </div>
    <hr/>
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td rowspan="3">Indicaciones:</td>
            <td style="color:#ffffff; background-Color:#ff0000;">Indica que la actividad cerrar&aacute; en menos de tres (3) d&iacute;as</td>
            <td rowspan="3" align="center">
                <font color="969696">
                    Fundación Fundapar - Colombia
                </font>
            </td>
        </tr>
        <tr>
            <td style="background-Color:#ffff00">Indica que la actividad cerrar&aacute; en menos de siete (7) d&iacute;as</td>
        </tr>
        <tr>
            <td style="background-Color:#00ff00">Indica que la actividad se encuentra habilitada</td>
        </tr>
    </table>
</div>
    <div id="res_serv_2"></div>
    <p class="sig">Tablecloth is brought to you by <a href="http://www.cssglobe.com">Css Globe</a></p>
    <button class="boton2" id="cerrar_sesion">Cerrar sesión: Pulse squí para salir</button>>    
    <script type="text/javascript" src="agenda/js/edicion.js"></script>



	
	
</body>
    
</html>
<?php



        }//Admin activo
        }//Fin del usuario ha inicado sesion correctamente

    }//Para cuando accede sin un id
?>