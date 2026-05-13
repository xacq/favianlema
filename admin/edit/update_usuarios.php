<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_usuario']))
{
        $id = $_GET['id'];

        $vara = $_POST['nombre'];
        $varb = $_POST['usuario'];
        $varc = $_POST['correo']; 
     


        $consulta = "UPDATE fav_login 
                        SET fav_log_nombre ='$vara',
                        fav_log_user ='$varb',
                        fav_log_correo ='$varc'
                        WHERE fav_log_id = '$id'";

        $resultado = mysqli_query($conexion,$consulta);
        
        if ($res_cliente){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Actualización de Usuarios";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_usuarios.php');
}

?>