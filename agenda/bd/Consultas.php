<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once 'conexion/conexion.php';

/**
 * Description of Consultas
 *
 * @author law
 */
class Consultas {
    //put your code here
    var $conexion;
    
    function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "actividades");
    }
    
    
    
    public function existeCurso($id_curso){
        $ret = false;
        
        $c_sql = "SELECT * FROM curso WHERE id_curso = $id_curso";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        if(mysqli_num_rows($resultado)>0){
            $ret = true;
            //echo "Existe el curso";
        }else{
            //echo "No existe el curso";
        }
        
        return $ret;
    }
    
    


    public function darDatosCurso($id_curso){
        $c_sql = "SELECT * FROM curso WHERE id_curso = $id_curso";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        $datos = mysqli_fetch_array($resultado);
        
        return $datos;
    }

    
    
    public function darUnidadesCurso($id_curso){
        $c_sql = "SELECT * FROM unidad WHERE id_curso = $id_curso";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        $datos = mysqli_fetch_array($resultado);
        
        return $datos;
    }
    
    
    public function darActividadesCurso($id_curso){
        $c_sql = "SELECT * FROM actividad WHERE id_curso = $id_curso";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        //$datos = mysqli_fetch_array($resultado);
        
        //$dato = mysqli_fetch_array($resultado);
        //echo "nUMERODE FILAS : " . mysqli_num_rows($resultado);
        return $resultado;
        //return $dato;
    }
    
    
    public function darIdUnidad($nombre, $id_curso){
        $c_sql = "SELECT id FROM unidad WHERE id_curso = $id_curso AND nombre_unidad = '{$nombre}'";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        $dato = mysqli_fetch_array($resultado);
        
        //echo $dato["id"];
        
        return $dato["id"];
    }
    
    public function darNombreUnidad($id_unidad){
        $c_sql = "SELECT nombre_unidad FROM unidad WHERE id = $id_unidad";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "AAAAQUI Algo ha ido mal en la consulta a la base de datos");
        
        $dato = mysqli_fetch_array($resultado);
        
        return $dato["nombre_unidad"];
    }
    
    

    
    
    
    
    public function getRealIP(){

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
    }
    
    
    
    public function adminActivo($nombre){
        $ret = false;
        
        $ip = $this->getRealIP();
        
        $c_sql = "SELECT activo FROM usuario WHERE nombre = '$nombre' AND ip = '". $ip ."'";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        $dato = mysqli_fetch_array($resultado);
        
        return $dato["activo"];
    }
    
    
    public function iniciarSesion($usuario, $pass){
        $ret = false;
        $c_sql = "SELECT * FROM usuario WHERE nombre = '$usuario' AND pass = '$pass'";
        
        $resultado = mysqli_query( $this->conexion, $c_sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        if(mysqli_num_rows($resultado)>0){
            $ret = true;
            // Ahora tomamos la ip y la actualizamos
            $ip = $this->getRealIP();
            $c_sql_2 = "UPDATE usuario SET ip = '{$ip}', activo = 1 WHERE nombre = '$usuario' AND pass = '$pass'";
            
            $resultado_2 = mysqli_query($this->conexion, $c_sql_2) or die ("No pudo cambiar los datos: ". mysqli_error($this->conexion));
        
            if($resultado_2){
                $retorno = true;
            }
        }else{
            //echo "No error al iniciar sesion";
        }
        
        return $ret;
    }
    
    public function cerrarSesion(){
            $retorno = false;
            $ip = $this->getRealIP();
            
            $c_sql_2 = "UPDATE usuario SET activo = 0, ip = '' WHERE ip = '{$ip}'";
            
            $resultado_2 = mysqli_query($this->conexion, $c_sql_2) or die ("No pudo cambiar los datos: ". mysqli_error($this->conexion));
        
            if($resultado_2){
                $retorno = true;
            }
            return $retorno;
    }
    
}

