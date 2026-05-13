<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_civil']))
{       
        $id = $_GET['id'];

        $vara = $_POST['codigo'];
        $varb = $_POST['proceso'];
        $varc = $_POST['juez'];

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

        if ($_POST['ingreso'] != "") $varq = $_POST['ingreso']; else $varq = "0000-00-00";
        if ($_POST['calificacion'] != "") $varr = $_POST['calificacion']; else $varr = "0000-00-00";

        if ($_POST['contestacion'] != "") $vars = $_POST['contestacion']; else $vars = "0000-00-00";
        if ($_POST['reconvencion'] != "") $vart = $_POST['reconvencion']; else $vart = "0000-00-00";
  
        if ($_POST['inspeccion'] != "") $varu = $_POST['inspeccion']; else $varu = "0000-00-00";
        if ($_POST['otros'] != "") $varv = $_POST['otros']; else $varv = "0000-00-00";
  
        if ($_POST['audiencia'] != "") $varw = $_POST['audiencia']; else $varw = "0000-00-00";  
        if ($_POST['resolucion'] != "") $varx = $_POST['resolucion']; else $varx = "0000-00-00";
  
        if ($_POST['apelacion'] != "") $vary = $_POST['apelacion']; else $vary = "0000-00-00";
        if ($_POST['casacion'] != "") $varz = $_POST['casacion']; else $varz = "0000-00-00";

        $varza = $_POST['observaciones'];
        
        $consulta = "UPDATE fav_civil
                        SET 
                        fav_civ_proceso='$varb',
                        fav_civ_juez='$varc',
                        fav_civ_contra='$varh',
                        fav_civ_con_nombre='$vari',
                        fav_civ_con_identificacion='$varj',
                        fav_civ_con_telefono='$vark',
                        fav_civ_tramite='$varl',
                        fav_civ_accion='$varm',
                        fav_civ_acc_otros='$varma',
                        fav_civ_judicatura='$varn',
                        fav_civ_jud_otros='$varna',
                        fav_civ_ingreso='$varq',
                        fav_civ_calificacion='$varr',
                        fav_civ_contestacion='$vars',
                        fav_civ_reconvension='$vart',
                        fav_civ_inspeccion='$varu',
                        fav_civ_otros='$varv',
                        fav_civ_audiencia='$varw',
                        fav_civ_resolucion='$varx',
                        fav_civ_apelacion='$vary',
                        fav_civ_casacion='$varz',
                        fav_civ_observaciones='$varza'
                        WHERE fav_civ_id = $id";
        
        
        $estado = $_POST['cerrado'];

        $consulta_cliente = "UPDATE fav_clientes
                        SET 
                        fav_cli_identificacion = '$varf',
                        fav_cli_telefono = '$varg',
                        fav_cli_estado = '$estado'
                        WHERE fav_cli_codigo = '$vara'";


        $res = mysqli_query($conexion, $consulta)or die(mysqli_error($conexion));
        $res_cliente = mysqli_query($conexion, $consulta_cliente)or die(mysqli_error($conexion));

        if ($res_cliente){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Actualización de Caso Civil";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }

		header('location:../lists/lists_civil.php'); // Si está todo correcto redirigimos a otra página
}

?>
