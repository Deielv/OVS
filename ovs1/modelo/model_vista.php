<?php
/*
#Coelgio Universitario de Caracas
#Seccion 1410223
#Profesor: Jonathan Gonzalez
#Estudiantes: Joseph Luis, Deimar Sánchez y Elvis Tovar.
*-Si lo puedes imaginar lo puedes programar-*
*/

#Clase que maneja la logica de la vista
  abstract class Vista {
#Funcion que maneja la logica de la vista y reemplaza datos,
      public function html($templates, $plantilla,$plantilla2){
        $html = file_get_contents('../vistas/'.$templates.'.html');
        if ($plantilla) {
            $html = str_replace('{bien}',$plantilla,$html);
          }
        if ($plantilla2) {
            $html = str_replace('{inicio}',$plantilla2,$html);
        }else if ($plantilla2=!'') {
            $html = str_replace('{inicio}',' ',$html);
        }
#Imprime
        echo $html ;

      }
    }
 ?>
