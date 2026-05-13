<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_agenda']))
{
        $id = $_GET['id'];

        $vara = $_POST['fav_age_fecha'];
        $varb = $_POST['fav_age_tareas'];
        $varc = $_POST['fav_age_descripcion']; 
        $estado = $_POST['cerrado'];
     
        $consulta = "UPDATE fav_agenda 
                        SET fav_age_fecha ='$vara',
                        fav_age_tareas ='$varb',
                        fav_age_descripcion ='$varc',
                        fav_age_estado = '$estado'
                        WHERE fav_age_id = '$id'";

        $resultado = mysqli_query($conexion,$consulta);

        if ($resultado){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Actualización de Agenda";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$varb')";
          $resact = mysqli_query($conexion, $act);        
        }

        header('location:../lists/lists_agenda.php'); // Si está todo correcto redirigimos a otra página
}

?>