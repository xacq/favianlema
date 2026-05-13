<?php
require_once("./config/ver.php");
include("./config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
if (isset($_GET['id'])){
        $id = $_GET['id'];
  
        $res="DELETE FROM fav_consultas WHERE fav_con_id = $id";
        $result = mysqli_query($conexion, $res);

        if($result){
            echo '<script>alert("CONSULTA ELIMINADA CORRECTAMENTE")</script>';
            echo '<script>window.location="./listcon.php"</script>';
        }
        else{
            echo '<script>alert("OOPS...! HUBO UN ERROR AL ELIMINAR LA CONSULTA.")</script>';
            echo '<script>window.location="./listcon.php"</script>';
        }
}
?>