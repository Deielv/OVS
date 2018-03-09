<?php
/*
#Coelgio Universitario de Caracas
#Seccion 1410223
#Profesor: Jonathan Gonzalez
#Estudiantes: Joseph Luis, Deimar Sánchez y Elvis Tovar.
*-Si lo puedes imaginar lo puedes programar-*
*/
#Clase que maneja la bd.
   class bd {
#Se declaran var publicas
    public $conex;
    #Prueba not pass
    #public $host='localhost';
    #public $dbname='bienes';
    #public $user='postgres';
    #public $password='1';
    #public $port='5432';

#se crea una funcion publica para conectar con la BD.
      public function conectar(){
        if (!isset($this->conex)) {
          #Prueba not pass
          // $this->conex = pg_connect('host=\''.$host.'\' dbname=\''.$dbname.'\' user='\'.$user.'\' password=\''.$password.'\' port=\''.$port.'\' ') or die("No se ha podido conectar: ".pg_last_error());
          #conectar con la BD
          $this->conex = pg_connect("host=localhost dbname=bienes user=postgres password='1'")or die("No se ha podido conectar: ".pg_last_error());
          #debugger para ver si conecto
          #echo "CONECTO";
          #print_r($this->conex);
        }
        return true;
        }
#Funcion para ejecutar los SQL.
      public function ejecutar($sql){
  		  $result = pg_query($this->conex,$sql);
  		  if(!$result){
  			 echo 'PGSQL Error: ' . pg_last_error();
  			 exit;
  		  }
        #debugger
        #print_r($result);
    		return $result;
  	    }
#Funcion que cuenta las filas de la BD.
       function nfilas($resulta){
  		     if(!is_resource($resulta)) return false;
  		       return pg_num_rows($resulta);
  	   }
#Funcion que arregla los datos en un array();
       function arreglo_datos($resulta){
  		     if(!is_resource($resulta)) return false;
  			      return pg_fetch_assoc($resulta);
  	   }
#Funcion para desconectar
      public function desconectar(){
        pg_close($this->conex);
      }

    }
 ?>
