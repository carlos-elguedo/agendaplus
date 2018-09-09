<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actualizador
 *
 * @author law
 */
class Actualizador {
    //put your code here
    var $conexion;
    
    function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "actividades");
    }
    
    
    public function actualizarDatosCurso($id_curso, $nom, $pro, $per){
        $retorno = false;
        //echo $nom;
        $c_sql = "UPDATE curso SET nombre = '{$nom}', profesor = '{$pro}', periodo = '{$per}'  WHERE id_curso = $id_curso";
        
        $resultado = mysqli_query($this->conexion, $c_sql) or die ("No pudo cambiar los datos: ". mysqli_error($this->conexion));
        
        if($resultado){
            $retorno = true;
        }
        
        return $retorno;
    }
}
