<?php
/*
#Coelgio Universitario de Caracas
#Seccion 1410223
#Profesor: Jonathan Gonzalez
#Estudiantes: Joseph Luis, Deimar Sánchez y Elvis Tovar.
*-Si lo puedes imaginar lo puedes programar-*
*/
#Utilizamos ini_set para ver errores.
#ini_set('display_errors', 'On');
#Se requieren los modelos siguientes
  require '../modelo/model_vista.php';
  require '../modelo/model_fun.php';
#inicializamos variables.
  $inicio= '';
  $x= 0;

#Verifica si existe x en el array de post.
  if (array_key_exists('x', $_POST)) {
    $x= $_POST['x'];
    $user = $_POST['user'];
    $password = $_POST['password'];
#Validacion del usuario por ahora luego sera con BD.
        if ($user == "usuario" AND $password == "dejoel") {
            $x=2;
        }else {
            $x=1;
          $inicio = "Usuario o Clave Incorrecta";
        }
  }
#Verifica si existe x en el array de get.
  else if (array_key_exists('x', $_GET)){
  	 	 $x = $_GET['x'];
  	}
#Verifica si existe action en el array de post.    
  else if(array_key_exists('action', $_POST)) {    
#Valida ek valor de x para cada vista y llama funciones			
      if($_POST['action']=='Agregar') {
          agregar();
  				$x=5;
      	}
      else if($_POST['action']=='atrás') {
      		$x=2;
    		}
      else if($_POST['action']=='Buscar') {
     			$x=7;
    		}
      else if($_POST['action']=='Modificar'){
          modificar();
      		$x=6;
    		}
      else if($_POST['action']=='Volver') {
      		$x=6;
    		}
      else if($_POST['action']=='Eliminar') {
      		$x=8;
    		}
      else if($_POST['action']=='Imprimir') {
      		$x=11;
    		}
      else if($_POST['action']=='Continuar'){
      		$x=12;
    		}
      else if($_POST['action']=='Guardar'){
      		$x=9;
      	}
  }else{
		$x = 1;
	}
#valida que por el metodo get x sea igual a 4  
 if ($_GET['x']==4) {
   ver($tabla_html);
 }
#condicional para el cambio de las vistas.
  switch ($x) {
    case 1:
    Vista::html('v1','',$inicio);
    break;
    case 2:
    Vista::html('v2','','');
    break;
    case 3:
    Vista::html('v3','','');
    break;
    case 4:
    Vista::html('v4',$tabla_html,'');
    break;
    case 5:
    Vista::html('v5','','');
    break;
    case 6:
    Vista::html('v6','','');
    break;
    case 7:
    Vista::html('v7',$_POST['bien'],'');
    break;
    case 8:
    Vista::html('v8','','');
    break;
    case 9:
    Vista::html('v9','','');
    break;
    case 10:
    Vista::html('v10','','');
    break;
    case 11:
    Vista::html('v11','','');
    break;
    case 12:
    Vista::html('v12','','');
    break;

    default:
    Vista::html('v1','','');
    break;
  }
  //print_r($_POST);
 ?>
