<?php 
/*
#Coelgio Universitario de Caracas
#Seccion 1410223
#Profesor: Jonathan Gonzalez
#Estudiantes: Joseph Luis, Deimar Sánchez y Elvis Tovar.
*-Si lo puedes imaginar lo puedes programar-*
*/
#requerir el modelo para conectar a la BD.
require 'model_bd.php';

#Function para agregar datos a la BD.
	function agregar(){
			$bien = new bd;
			#Instanciamos la clase BD y conectamos.
			$conectar = $bien -> conectar();
			#Coloca el query en la var $sql
			$sql = 'INSERT INTO public.eq_tecno (nbien_eq, marca_eq, model_eq, color_eq, tipo_eq, valuni_eq, valtot_eq)
         		 VALUES (\''.$_POST['nbien'].'\', \''.$_POST['marca'].'\', \''.$_POST['model'].'\', \''.$_POST['color'].'\', \''.$_POST['tipoeq'].'\', \''.$_POST['valuni'].'\', \''.$_POST['valtot'].'\')';


              $consulta = $bien->ejecutar($sql);
              #Debugger comentado
              #print_r($consulta);
              #Desconecta.
              $desconectar = $bien -> desconectar();
		}
#Funcion para modificar en la BD
		function modificar(){
			$bien = new bd;
			#Instanciamos la clase BD y conectamos.
			$conectar = $bien -> conectar();
			#Coloca el query en la var $sql
			$sql = 'UPDATE public.eq_tecno
   			SET marca_eq=\''.$_POST['marca'].'\', model_eq=\''.$_POST['model'].'\', color_eq= \''.$_POST['color'].'\', tipo_eq=\''.$_POST['tipoeq'].'\', valuni_eq=\''.$_POST['valuni'].'\', valtot_eq= \''.$_POST['valtot'].'\',
       			actualizado_eq=now()
 				WHERE nbien_eq=\''.$_POST['bien'].'\';';
 				$consulta = $bien->ejecutar($sql);
 				#Debugger comentado
  				//print_r($consulta);
  				#Desconecta.
  			$desconectar = $bien -> desconectar();
		}
#Funcion para ver los bienes guardados.
		function ver($tabla_html){
			$bien = new bd;
			#Instanciamos la clase BD y conectamos.
			$conectar = $bien -> conectar();
			#Coloca el query en la var $sql
			$sql = 'SELECT id_eq, nbien_eq, marca_eq, model_eq, color_eq, tipo_eq, valuni_eq, 
       		valtot_eq, borrado_eq, creado_eq, actualizado_eq
  			FROM public.eq_tecno WHERE borrado_eq=false;';
   			$consulta = $bien->ejecutar($sql);
   			#Guardamos los datos en consulta
   			##Debugger comentado
   			#print_r($consulta);
   			$fila = $bien->nfilas($consulta);
   			#Guarda la cantidad de filas en una var.
   			###Debugger comentado
    		#print_r($fila);
   			$datos = array();
   			$tabla_html = '<table border="1"><th><td>ID</td><td>N°Bien</td><td>Marca</td><td>Modelo</td><td>Color</td><td>Tipo de equipo</td><td>Val uni</td><td>Val tot</td></th>';
   			#Guardamos una el head de una tabla en una var.
   			for ($i=0; $i <$fila; $i++) {
     		$datos_sql = $bien->arreglo_datos($consulta);
     		#guarda los datos en un arreglo
     		####Debugger comentado
     		#print_r($datos_sql);
     		array_push($datos, $datos_sql);
     		#Imprimimos los datos
     		$tabla_html .= '<tr><td>'.$datos_sql['id_eq'].'</td><td>'.$datos_sql['nbien_eq'].'</td><td>'.$datos_sql['marca_eq'].'</td><td>'.$datos_sql['model_eq'].'</td><td>'.$datos_sql['color_eq'].'</td><td>'.$datos_sql['tipo_eq'].'</td><td>'.$datos_sql['valuni_eq'].'</td><td>'.$datos_sql['valtot_eq'].'</td></tr>';
      		#####Debugger comentado
      		#print_r($tabla_html);

   			}
   			#Cierra la tabla
   			$tabla_html .= '</table>';
   			#se retorna la variable pero debe haber un error para mostrar la tabla con el replace.
   			return $tabla_html;
   			#Desconecta.
   			$desconectar = $bien -> desconectar();
		}
		

?>, 