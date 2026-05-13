<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_clientes']))
{
        $cli_nombre = $_POST['fav_cli_nombre'];
        $cli_identificacion= $_POST['fav_cli_identificacion'];
        $cli_domicilio = $_POST['fav_cli_domicilio'];
        $cli_telefono = $_POST['fav_cli_telefono'];
 
        $consulta = "INSERT INTO fav_clientes(fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, 
        fav_cli_telefono, fav_cli_fecha_creacion) VALUES ('$cli_nombre','$cli_identificacion','','$cli_telefono',
        current_timestamp())";
        
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Actualización de Contraseña";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$cli_nombre')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists_clientes.php'); // Si está todo correcto redirigimos a otra página
}
?>