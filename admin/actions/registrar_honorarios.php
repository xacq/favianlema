<?php   
  require_once("../config/ver.php");


	include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_honorarios']))
{		
        $id = $_GET['id'];

  		if ($_POST['total'] == "") $varb = 0; else $varb = floatval($_POST['total']);
  		if ($_POST['abono1'] == "") $varc = 0; else $varc = floatval($_POST['abono1']);
  		if ($_POST['abono2'] == "") $vare = 0; else $vare = floatval($_POST['abono2']);
  		if ($_POST['abono3'] == "") $varg = 0; else $varg = floatval($_POST['abono3']);
  		if ($_POST['abono4'] == "") $vari = 0; else $vari = floatval($_POST['abono4']);

  		if ($_POST['fecha_abono1'] == "") $vard = "0000-00-00"; else $vard = ($_POST['fecha_abono1']);		
  		if ($_POST['fecha_abono2'] == "") $varf = "0000-00-00"; else $varf = ($_POST['fecha_abono2']);
  		if ($_POST['fecha_abono3'] == "") $varh = "0000-00-00"; else $varh = ($_POST['fecha_abono3']);
  		if ($_POST['fecha_abono4'] == "") $varj = "0000-00-00"; else $varj = ($_POST['fecha_abono4']); 
  
        $razon = $_POST['razon'];
        $otros = $_POST['otros'];
    	if ($_POST['cancelado'] == "") $cancel = 0; else $cancel = floatval($_POST['cancelado']);

        $consulta = "INSERT INTO fav_honorarios(fav_hon_codigo, fav_hon_razon, fav_hon_otros, fav_hon_total, fav_hon_abo_1, fav_hon_fecha_1, fav_hon_abo_2, fav_hon_fecha_2, fav_hon_abo_3, fav_hon_fecha_3, fav_hon_abo_4, fav_hon_fecha_4, cancelado, fav_hon_fecha_creacion) 
        VALUES ('$id','$razon','$otros','$varb','$varc','$vard','$vare','$varf','$varg','$varh','$vari','$varj','$cancel',current_timestamp())";

        $resultado = mysqli_query($conexion,$consulta);
        $error_message = mysqli_error($conexion);
		if($error_message == ""){
                echo "No error related to SQL query.";
            }else{
                echo "Query Failed: ".$error_message;
            }
        if ($resultado){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Honorarios";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$id')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_honorarios.php'); // Si está todo correcto redirigimos a otra página
}

?>