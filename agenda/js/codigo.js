/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var CONTADOR_UNIDADES = 0;
var RUTA_SERVIDOR = "http://localhost/agenda/"

MESES = new Array();
MESES[1] = 'Enero';
MESES[2] = 'Feb.';
MESES[3] = 'Marzo';
MESES[4] = 'Abril';
MESES[5] = 'Mayo';
MESES[6] = 'Junio';
MESES[7] = 'Julio';
MESES[8] = 'Agosto';
MESES[9] = 'Sep.';
MESES[10] = 'Oct.';
MESES[11] = 'Nov.';
MESES[12] = 'Dic.';

function cuentaAtras(){
    console.log("Llego: " + actividades + "<->")
    
    //FECHA_ACTUAL = new Date();
    
    for(fila=1;fila<actividades+1;fila++){
        //console.log("------------------" + fechaFin[0]);
        //if(fechaInicial[fila].getTime()<=FECHA_ACTUAL.getTime())
        if(fechaInicial[fila-1] != undefined){
            //console.log("------------------ ENTRO");
            if(fechaFin[fila-1]!=null){
                a = document.getElementById('limite_'+fila);
                b = document.getElementById('ffinal_'+fila);
                diferencia = Math.floor((fechaFin[fila-1].getTime()-FECHA_ACTUAL.getTime())/1000);
                //console.log("DIFERENCIA: " + diferencia)
                    if(diferencia>0){
                        dias=Math.floor(diferencia/86400);
                        hors=Math.floor((diferencia-(dias*86400))/3600);
                        mins=Math.floor((diferencia-(dias*86400)-(hors*3600))/60);
                        segs=diferencia-(dias*86400)-(hors*3600)-(mins*60);
                        txt='';
                        if(dias==1){
                            txt+=dias+' d\xeda ';
                        }
                        if(dias>1){
                            txt+=dias+' d\xedas ';
                        }
                        if(hors<10){
                            txt+='0';
                        }
                        txt+=hors+':';
                        
                        if(mins<10){
                            txt+='0';
                        }
                        txt+=mins+':';
                        
                        if(segs<10){
                            txt+='0';
                        }
                        
                        txt+=segs;
                        
                        a.innerHTML=txt;
                        
                        if(dias>1){
                            a.style.color="#000000";
                            a.style.backgroundColor="#00ff00";
                        }
                        if(dias<7){
                            a.style.color="#000000";
                            a.style.backgroundColor="#ffff00";
                        }
                        if(dias<3){
                            a.style.color="#ffffff";
                            a.style.backgroundColor="#ff0000";
                        }
                        b.style.color=a.style.color;
                        b.style.backgroundColor=a.style.backgroundColor;
                    }else{
                        a.innerHTML="&oslash;";
                        a.style.color="#000000";
                        a.style.backgroundColor="#ffcccc";
                        b.style.color=a.style.color;
                        b.style.backgroundColor=a.style.backgroundColor;
                    }
                }else{
                    console.log("OTRO");
                }
            }
        }
    }


function calcularFecha(){
    //alert("Listo");
    FECHA_ACTUAL = new Date();
    
    
    dia     = FECHA_ACTUAL.getDate();
    mes     = FECHA_ACTUAL.getMonth()+1;
    anio    = FECHA_ACTUAL.getFullYear();
    hora    = FECHA_ACTUAL.getHours();
    minutos = FECHA_ACTUAL.getMinutes();
    segundos = FECHA_ACTUAL.getSeconds();

    //if(dia<10)  dd='0'+dd;
    if(hora<10) hora='0'+hora;
    //if(minutos<10)mi='0'+mi;
    //if(segundos<10)ss='0'+ss;

    document.getElementById('fechaActual').innerHTML=dia+'/'+MESES[mes]+'/'+anio+' '+hora+':'+minutos+':'+segundos;
    
    cuentaAtras();
}
