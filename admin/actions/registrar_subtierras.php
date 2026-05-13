<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_subtierras']))
{
        $vara = $_POST['codigo'];
        $vara = strtoupper($vara);
        $varb = $_POST['proceso'];

        $vare = $_POST['solicitante'];
        $varf = $_POST['sol_identificacion'];
        $varg = $_POST['sol_telefono'];
        
        $vari = $_POST['opositor'];
        $varj = $_POST['opo_identificacion'];
        $vark = $_POST['opo_telefono'];
        
        $varm = $_POST['tramite'];
        $varma = $_POST['tra_otros'];
        
        $varn = $_POST['parroquia'];
        $varna = $_POST['par_otros'];
        
        if ($_POST['revision'] != "") $varo = $_POST['revision']; else $varo = "0000-00-00";
        if ($_POST['aprobacion'] != "") $varp = $_POST['aprobacion']; else $varp = "0000-00-00";
  
        if ($_POST['matricula'] != "") $varq = $_POST['matricula']; else $varq = "0000-00-00";
        if ($_POST['inspeccion'] != "") $varr = $_POST['inspeccion']; else $varr = "0000-00-00";
  
        if ($_POST['pago1'] != "") $vars = $_POST['pago1']; else $vars = "0000-00-00";
        if ($_POST['pago2'] != "") $vart = $_POST['pago2']; else $vart = "0000-00-00";  

        if ($_POST['adjudicacion'] != "") $varu = $_POST['adjudicacion']; else $varu = "0000-00-00";
        if ($_POST['registro_propiedad'] != "") $varv = $_POST['registro_propiedad']; else $varv = "0000-00-00";  
  
        if ($_POST['entrega'] != "") $varw = $_POST['apelacion']; else $varw = "0000-00-00";
  
        $varx = $_POST['observaciones'];

        $consulta = "INSERT INTO fav_subtierras(fav_sub_codigo, fav_sub_proceso, fav_sub_opositor, fav_sub_opo_identificacion, fav_sub_opo_telefono, 
        fav_sub_tramite, fav_sub_tra_otros, fav_sub_parroquia, fav_sub_par_otros, fav_sub_revision, fav_sub_aprobacion, fav_sub_matricula, fav_sub_inspeccion, 
        fav_sub_pago1, fav_sub_pago2, fav_sub_adjudicacion, fav_sub_registro_propiedad, fav_sub_entrega, fav_sub_observaciones, fav_sub_fecha_creacion) 
        VALUES ('$vara','$varb','$vari','$varj','$vark','$varm','$varma','$varn','$varna','$varo','$varp','$varq','$varr','$vars','$vart','$varu','$varv','$varw','$varx',current_timestamp())";         
        $resultado = mysqli_query($conexion, $consulta);

        $consulta_clientes = "INSERT INTO fav_clientes(fav_cli_codigo, fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, fav_cli_telefono,
         fav_cli_fecha_creacion) VALUES ('$vara','$vare','$varf','subtierras','$varg',current_timestamp())";
        $resultado_cliente = mysqli_query($conexion, $consulta_clientes);

        if ($resultado_cliente){
          $numero = $vara + 1;
          $sql4 = "UPDATE fav_codigo SET fav_cod_numero = '$numero' WHERE fav_cod_id = 6";
          $res4 = mysqli_query($conexion, $sql4);

          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Caso Subtierras";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_subtierras.php'); // Si está todo correcto redirigimos a otra página
}

?>