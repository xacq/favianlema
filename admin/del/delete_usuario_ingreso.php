<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM fav_login WHERE fav_log_id = $id";        
        $result = mysqli_query($conexion, $query);
    
    header ("Location:../sistema.php");
} 

?>