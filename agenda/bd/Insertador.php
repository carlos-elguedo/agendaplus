<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Insertador
 *
 * @author law
 */
class Insertador {
    //put your code here
    var $conexion;
    
    function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "actividades");
    }
    
    
    
    public function insertarUnidad($id_curso, $nombre){
        $retorno = false;
        $c_sql = "INSERT INTO unidad (id_curso, nombre_unidad) VALUES ($id_curso, '{$nombre}')";
        
        $resultado = mysqli_query($this->conexion, $c_sql) or die ("No pudo insertar la unidad: ". mysqli_error($this->conexion));
        
        if($resultado){
            $retorno = true;
        }
        return $retorno;
    }




    
    public function insertarActividad($id_curso, $id_unidad, $actividad, $fecha_ini, $fecha_fin, $puntaje){
        $retorno = false;
        $c_sql = "INSERT INTO actividad (id_curso, id_unidad, actividad, fecha_inicio, fecha_fin, puntaje) VALUES ($id_curso, $id_unidad, '{$actividad}', '{$fecha_ini}', '{$fecha_fin}', $puntaje)";
        
        $resultado = mysqli_query($this->conexion, $c_sql) or die ("No pudo insertar los datos de la actividad: ". mysqli_error($this->conexion));
        
        if($resultado){
            $retorno = true;
        }
        return $retorno;
    }
    
    
    
}
