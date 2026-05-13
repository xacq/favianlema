<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
	include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_GET['id'])){
    $id = $_GET['id'];

  	$sql = "SELECT * FROM fav_agenda WHERE fav_age_id = $id";
    $resultado = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
  	$row = mysqli_fetch_array($resultado) or die(mysqli_error($conexion));
  	$tarea = $row['fav_age_tareas'];
  	echo $tarea;

    $query = "DELETE FROM fav_agenda WHERE fav_age_id = $id";
    $result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    if ($result){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Eliminar Agenda";
          $actividad = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$tarea')";
          $resact = mysqli_query($conexion, $actividad) or die(mysqli_error($conexion));     
        }
  
	header ("Location:../lists/lists_agenda.php");
}
?>