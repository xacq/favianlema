<?php
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

$mensaje = "Archivo Borrado exitosamente...!";
if (isset($_GET['id'])){
  session_start();
  if ($_SESSION['login']== true){

    $id = $_GET['id'];    
    $res="SELECT * FROM fav_archivos WHERE fav_arc_id = $id";
    $result = mysqli_query($conexion, $res);
    $row = mysqli_fetch_array($result);
    $path = $row['fav_arc_ruta'];
    $borrar = unlink($path);         

        
    $query = "DELETE FROM fav_archivos WHERE fav_arc_id = $id";
    $result = mysqli_query($conexion, $query);

    echo "<script>alert('".$mensaje."');</script>";

    header ("Location:./lists_archivos.php");
      }
}    
?>