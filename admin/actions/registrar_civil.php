<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_civil']))
{
        $vara = $_POST['codigo'];
        $vara = strtoupper($vara);
        $varb = $_POST['proceso'];
        $varc = $_POST['juez'];

        $vard = $_POST['cliente'];

        $vare = $_POST['cli_nombre'];
        $varf = $_POST['cli_identificacion'];
        $varg = $_POST['cli_telefono'];
        
        $varh = $_POST['contra'];
        $vari = $_POST['con_nombre'];
        $varj = $_POST['con_identificacion'];
        $vark = $_POST['con_telefono'];
        
        $varl = $_POST['tramite'];
        $varm = $_POST['accion'];
        $varma = $_POST['acc_otros'];
        
        $varn = $_POST['judicatura'];
        $varna = $_POST['jud_otros'];
        
         if ($_POST['ingreso'] != "") $varo = $_POST['ingreso']; else $varo = "0000-00-00";
        if ($_POST['calificacion'] != "") $varp = $_POST['calificacion']; else $varp = "0000-00-00";

        if ($_POST['contestacion'] != "") $varq = $_POST['contestacion']; else $varq = "0000-00-00";
        if ($_POST['reconvencion'] != "") $varr = $_POST['reconvencion']; else $varr = "0000-00-00";
  
        if ($_POST['inspeccion'] != "") $vars = $_POST['inspeccion']; else $vars = "0000-00-00";
        if ($_POST['otros'] != "") $vart = $_POST['otros']; else $vart = "0000-00-00";
  
        if ($_POST['audiencia'] != "") $varu = $_POST['audiencia']; else $varu = "0000-00-00";  
        if ($_POST['resolucion'] != "") $varv = $_POST['resolucion']; else $varv = "0000-00-00";
  
        if ($_POST['apelacion'] != "") $varw = $_POST['apelacion']; else $varw = "0000-00-00";
        if ($_POST['casacion'] != "") $varx = $_POST['casacion']; else $varx = "0000-00-00";

        $vary = $_POST['observaciones'];

        $consulta = "INSERT INTO fav_civil(fav_civ_codigo, fav_civ_proceso, fav_civ_juez, fav_civ_cliente, fav_civ_contra, fav_civ_con_nombre,
         fav_civ_con_identificacion, fav_civ_con_telefono, fav_civ_tramite, fav_civ_accion, fav_civ_acc_otros, fav_civ_judicatura, fav_civ_jud_otros, fav_civ_ingreso, 
         fav_civ_calificacion, fav_civ_contestacion, fav_civ_reconvension, fav_civ_inspeccion, fav_civ_otros, fav_civ_audiencia, fav_civ_resolucion,
          fav_civ_apelacion, fav_civ_casacion, fav_civ_observaciones, fav_civ_fecha_creacion)
           VALUES ('$vara','$varb','$varc','$vard','$varh','$vari','$varj','$vark','$varl','$varm','$varma','$varn','$varna','$varo','$varp','$varq','$varr',
           '$vars','$vart','$varu','$varv','$varw','$varx','$vary',current_timestamp())";
        
        $consulta_clientes = "INSERT INTO fav_clientes(fav_cli_codigo, fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, fav_cli_telefono,
         fav_cli_fecha_creacion) VALUES ('$vara','$vare','$varf','civil','$varg',current_timestamp())";
        $resultado_cliente = mysqli_query($conexion, $consulta_clientes);

        if ($resultado_cliente){
        	$resultado = mysqli_query($conexion, $consulta);
            $numero = $vara + 1;
            $sql4 = "UPDATE fav_codigo SET fav_cod_numero = '$numero' WHERE fav_cod_id = 1";
            $res4 = mysqli_query($conexion, $sql4);

            $name = $_SESSION['name'];
            $user = $_SESSION['user'];
            $act = "Creación de Caso Civil";
            $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
            VALUES ('$name','$user',current_timestamp(),'$act', '$vara')";
            $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_civil.php'); // Si está todo correcto redirigimos a otra página
}
?>