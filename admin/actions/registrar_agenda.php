<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_agenda']))
{
        $fecha = $_POST['fav_age_fecha'];
        $tarea = $_POST['fav_age_tareas'];
        $descripcion = $_POST['fav_age_descripcion'];
        $consulta = "INSERT INTO fav_agenda(fav_age_fecha,fav_age_tareas,fav_age_descripcion) 
        VALUES ('$fecha','$tarea','$descripcion')";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Agenda";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$tarea')";
          $resact = mysqli_query($conexion, $act);        
        }

        header('location:../lists/lists_agenda.php'); // Si está todo correcto redirigimos a otra página
}

?>