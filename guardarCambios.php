<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './agenda/bd/Consultas.php';
require './agenda/bd/Insertador.php';
require './agenda/bd/Actualizador.php';

$cambio_a_realizar = $_POST["tipo"];
$consultas = new Consultas();
$cambiador = new Actualizador();
$insertador = new Insertador();


switch ($cambio_a_realizar){
    case 1:
        //Para guardar los datos del curso
        //echo "---------- 1";
        $id = addslashes($_POST["id"]);
        $d_nc = addslashes($_POST["dato1"]);
        $d_pc = addslashes($_POST["dato2"]);
        $d_ac = addslashes($_POST["dato3"]);
        
        //echo $d_nombre_curso . " - " . $d_profes_curso . " - " . $d_period_curso;
        if(strcmp($d_nc, "") == 0 || strcmp($d_pc, "") == 0 || strcmp($d_ac, "") == 0){
            echo "Por favor completa todos los 3 campos de datos del curso";
        }else{
            //Comprabamos si son iguales
            
            if($consultas->existeCurso($id)){
                $datos_curso = $consultas->darDatosCurso($id);
                //$unidades = $consultas->darUnidadesCurso($id);
                
                if(strcmp($datos_curso["nombre"], $d_nc) != 0 || strcmp($datos_curso["profesor"], $d_pc) != 0 || strcmp($datos_curso["periodo"], $d_ac) != 0){
                    if($cambiador->actualizarDatosCurso($id, $d_nc, $d_pc, $d_ac)){
                        echo "Cambio de datos realizado correctamente: " . $id;
                    }
                    
                }else{
                    //Los datos son iguales
                    echo "Los datos son iguales";
                }
                
            }//fIN DEL IF EL CURSO SI EXISTE
            
            
        }//Fin del else, los datos no estan vacios
        
        
        break;
    
        
    case 2:
        //Para añadir una primera actividad
        $id = addslashes($_POST["id"]);
        $d_nombre_unidad    = addslashes($_POST["dato1"]);
        $d_actividad        = addslashes($_POST["dato2"]);
        $d_fecha_inicio     = addslashes($_POST["dato3"]);
        $d_fecha_fin        = addslashes($_POST["dato4"]);
        $d_puntaje          = addslashes($_POST["dato5"]);
        
        
        if($insertador->insertarUnidad($id, $d_nombre_unidad)){
            $id_unidad = $consultas->darIdUnidad($d_nombre_unidad, $id);
            
            if($insertador->insertarActividad($id, $id_unidad, $d_actividad, $d_fecha_inicio, $d_fecha_fin, $d_puntaje)){
                echo "Se añadio la actividad correctamente, la pagina se actualizará";
            }else{
                echo "No se pudo añadir la nueva actividad";
            }
            
        }else{
            echo "No se pudo añadir la nueva unidad";
        }
        
        
        break;
    
    
    
    case 3:
        $id = addslashes($_POST["id"]);
        $d_nombre_unidad    = addslashes($_POST["dato1"]);
        $d_actividad        = addslashes($_POST["dato2"]);
        $d_fecha_inicio     = addslashes($_POST["dato3"]);
        $d_fecha_fin        = addslashes($_POST["dato4"]);
        $d_puntaje          = addslashes($_POST["dato5"]);
        
        
        if(($consultas->darIdUnidad($d_nombre_unidad, $id)) == null){
            //No existe la unidad nueva
            if($insertador->insertarUnidad($id, $d_nombre_unidad)){
                $id_unidad = $consultas->darIdUnidad($d_nombre_unidad, $id);

                if($insertador->insertarActividad($id, $id_unidad, $d_actividad, $d_fecha_inicio, $d_fecha_fin, $d_puntaje)){
                    echo "Se añadio la actividad correctamente, la pagina se actualizará";
                }else{
                    echo "No se pudo añadir la nueva actividad";
                }

            }else{
                echo "No se pudo añadir la nueva unidad";
            }
        }else{
            //Ya existe la unidad nueva
            $id_unidad = $consultas->darIdUnidad($d_nombre_unidad, $id);
            if($insertador->insertarActividad($id, $id_unidad, $d_actividad, $d_fecha_inicio, $d_fecha_fin, $d_puntaje)){
                echo "Se añadio la actividad correctamente, la pagina se actualizará";
            }else{
                echo "No se pudo añadir la nueva actividad";
            }
        }//Fin del else de la unidad a añadir ya existe
        
        
        break;
    
    
    case 4:
        $id = addslashes($_POST["id"]);
        $d_n = addslashes($_POST["dato1"]);
        $d_p = addslashes($_POST["dato2"]);
        
        //echo " - " . $d_n . " - " . $d_p;
        
        if($consultas->iniciarSesion($d_n, $d_p)){
            echo "Usuario correcto";
            echo "<script>";
            echo "location.href = RUTA_SERVIDOR + 'index.php?id_curso=' + $id;";
            echo "</script>";
            
        }else{
            echo "<label class='respuestas_servidor'>Usuario incorrecto</label>";
        }
        
        
        break;
    
    case 5:
        if($consultas->cerrarSesion()){
            echo "<script>";
            echo "alert('Para mayor seguridad, por favor cierre esta pestaña del navegador');";
            echo "location.href = RUTA_SERVIDOR + 'index.php';";
            echo "</script>";
        }else{
            echo "<script>";
            echo "<label class='respuestas_servidor'>No ha podido iniciar sesión</label>";
            echo "</script>";
        }
        break;
    
    
    
    
    
    
    
    default :
        break;
}
