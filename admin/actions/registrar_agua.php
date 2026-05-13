<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_agua']))
{
        $varb = $_POST['codigo'];
        $varb = strtoupper($varb);
        $varc = $_POST['proceso'];

        $vard = $_POST['cliente'];
        $vare = $_POST['cli_nombre'];
        $varf = $_POST['cli_identificacion'];
        $varg = $_POST['cli_telefono'];
        
        $varh = $_POST['contra'];
        $vari = $_POST['con_nombre'];
        $varj = $_POST['con_identificacion'];
        $vark = $_POST['con_telefono'];

        $varl = $_POST['terceros'];
        $varm = $_POST['ter_nombre'];
        $varma = $_POST['ter_identificacion'];
        $varn = $_POST['ter_telefono'];
        
        $varna = $_POST['tramite'];
        $varo = $_POST['tra_otros'];

        $varp = $_POST['uso'];
        $varq = $_POST['uso_otros'];
        
        $varr = $_POST['parroquia'];
        $vars = $_POST['par_otros'];

        if ($_POST['calificacion'] != "") $vart = $_POST['calificacion']; else $vart = "0000-00-00";
        if ($_POST['oposicion'] != "") $varu = $_POST['oposicion']; else $varu = "0000-00-00";
  
        if ($_POST['comisiones'] != "") $varv = $_POST['comisiones']; else $varv = "0000-00-00";
        if ($_POST['publicacion'] != "") $varw = $_POST['publicacion']; else $varw = "0000-00-00";
  
        if ($_POST['inspeccion'] != "") $varx = $_POST['inspeccion']; else $varx = "0000-00-00";
        if ($_POST['audiencia'] != "") $vary = $_POST['audiencia']; else $vary = "0000-00-00";  

        if ($_POST['prueba'] != "") $varz = $_POST['prueba']; else $varz = "0000-00-00";
        if ($_POST['resolucion'] != "") $varza = $_POST['resolucion']; else $varza = "0000-00-00";  
  
        if ($_POST['apelacion'] != "") $varzb = $_POST['apelacion']; else $varzb = "0000-00-00";

        $varzc = $_POST['observaciones'];

        $consulta = "INSERT INTO  fav_senagua(fav_sen_codigo, fav_sen_proceso, fav_sen_cliente, fav_sen_contra, fav_sen_con_nombre, 
        fav_sen_con_con_identificacion, fav_sen_con_telefono, fav_sen_terceros, fav_sen_ter_nombre, fav_sen_ter_identificacion, fav_sen_ter_telefono, 
        fav_sen_tramite, fav_sen_tra_otros, fav_sen_uso, fav_sen_uso_otros, fav_sen_parroquia, fav_sen_par_otros, fav_sen_calificacion, 
        fav_sen_oposicion, fav_sen_comisiones, fav_sen_publicacion, fav_sen_inspeccion, fav_sen_audiencia, fav_sen_prueba, fav_sen_resolucion,
         fav_sen_apelacion, fav_sen_observaciones, fav_sen_fecha_creacion) 
         VALUES ('$varb','$varc','$vard','$varh','$vari','$varj','$vark','$varl','$varm','$varma','$varn','$varna','$varo','$varp','$varq','$varr','$vars',
          '$vart','$varu','$varv','$varw','$varx','$vary','$varz','$varza','$varzb','$varzc',current_timestamp())";

        $consulta_clientes = "INSERT INTO fav_clientes(fav_cli_codigo, fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, fav_cli_telefono,
         fav_cli_fecha_creacion) VALUES ('$varb','$vare','$varf','senagua','$varg',current_timestamp())";
  
        $resultado_cliente = mysqli_query($conexion, $consulta_clientes)or die(mysqli_error($conexion));
  		
  		if ($resultado_cliente){
          $resultado = mysqli_query($conexion, $consulta)or die(mysqli_error($conexion));
          $numero = $varb + 1;
          $sql4 = "UPDATE fav_codigo SET fav_cod_numero = '$numero' WHERE fav_cod_id = 5";
          $res4 = mysqli_query($conexion, $sql4);

          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Caso Senagua";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
                  VALUES ('$name','$user',current_timestamp(),'$act', '$varb')";
          $resact = mysqli_query($conexion, $act);        
        }  
        header('location:../lists/lists_agua.php'); // Si está todo correcto redirigimos a otra página
}
?>