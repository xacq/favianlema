<?php
require_once("../config/ver.php");
date_default_timezone_set('America/Guayaquil');
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_oficina'])){
    $nombre = trim($_POST['oficina_nombre']);

    if ($nombre == ''){
        header('location:../oficinas.php');
        exit();
    }

    $consulta = "INSERT INTO fav_oficinas(fav_ofi_nombre, fav_ofi_estado, fav_ofi_fecha_creacion) VALUES ('$nombre','activa',current_timestamp())";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado){
      $name = $_SESSION['name'];
      $user = $_SESSION['user'];
      $act = "Creación de Oficina";
      $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso)
      VALUES ('$name','$user',current_timestamp(),'$act', '$nombre')";
      mysqli_query($conexion, $act);
    }

    header('location:../lists/lists_oficinas.php');
    exit();
}
?>
