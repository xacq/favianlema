<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_usuario']))
{
        $vara = $_POST['usuario'];
        $varb = $_POST['nombre'];
        $varc = $_POST['correo'];
        
        //echo "$vara, $varb, $varc";
        $consulta = "INSERT INTO fav_login (fav_log_nombre,fav_log_user,fav_log_correo,fav_log_contrasenia,fav_log_fecha) 
        VALUES ('$varb','$vara','$varc','987654321',current_timestamp())";

        $resultado = mysqli_query($conexion, $consulta);
        //echo "$resultado";
        if ($resultado){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Usuario";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$varb')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_usuarios.php'); // Si está todo correcto redirigimos a otra página
}

?> 