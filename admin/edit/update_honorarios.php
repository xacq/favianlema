<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_honorarios']))
{
        $id = $_GET['id'];

        $varc = $_POST['abono1'];
        $vard = $_POST['fecha_abono1'];

        $vare = $_POST['abono2'];
        $varf = $_POST['fecha_abono2'];

        $varg = $_POST['abono3'];        
        $varh = $_POST['fecha_abono3'];

        $vari = $_POST['abono4'];
        $varj = $_POST['fecha_abono4'];
      
     
        $consulta = "UPDATE fav_honorarios 
                        SET fav_hon_abo_1 ='$varc',
                        fav_hon_fecha_1 ='$vard',
                        fav_hon_abo_2 ='$vare',
                        fav_hon_fecha_2 ='$varf',
                        fav_hon_abo_3 = '$varg',
                        fav_hon_fecha_3 ='$varh',
                        fav_hon_abo_4 ='$vari',
                        fav_hon_fecha_4 ='$varj'
                        WHERE fav_hon_id = '$id'";

        $resultado = mysqli_query($conexion,$consulta);

        if ($resultado){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Actualización de Honorarios";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$id')";
          $resact = mysqli_query($conexion, $act);        
        }


        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
}

?>