<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_familia']))
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
        
        $varl = $_POST['procedimiento'];
        $varm = $_POST['accion'];
        $varma = $_POST['acc_otros'];
        
        $varn = $_POST['judicatura'];
        $varna = $_POST['jud_otros'];
        
        if ($_POST['audiencia1'] != "") $varo = $_POST['audiencia1']; else $varo = "0000-00-00";
        if ($_POST['audiencia2'] != "") $varp = $_POST['audiencia1']; else $varp = "0000-00-00";

        if ($_POST['ingreso'] != "") $varq = $_POST['ingreso']; else $varq = "0000-00-00";
        if ($_POST['calificacion'] != "") $varr = $_POST['calificacion']; else $varr = "0000-00-00";

        if ($_POST['contestacion'] != "") $vars = $_POST['contestacion']; else $vars = "0000-00-00";
        if ($_POST['reconvencion'] != "") $vart = $_POST['reconvencion']; else $vart = "0000-00-00";
  
        if ($_POST['inspeccion'] != "") $varu = $_POST['inspeccion']; else $varu = "0000-00-00";
        if ($_POST['otros'] != "") $varv = $_POST['otros']; else $varv = "0000-00-00";
  
        if ($_POST['resolucion'] != "") $varw = $_POST['resolucion']; else $varw = "0000-00-00";
        if ($_POST['apelacion'] != "") $varx = $_POST['apelacion']; else $varx = "0000-00-00";

        if ($_POST['casacion'] != "") $vary = $_POST['casacion']; else $vary = "0000-00-00";

        $varz = $_POST['observaciones'];
        
        $consulta = "INSERT INTO fav_familia(fav_fam_codigo, fav_fam_proceso, fav_fam_juez, fav_fam_cliente, fav_fam_contra, fav_fam_con_nombre, 
        fav_fam_con_identificacion, fav_fam_con_telefono, fav_fam_procedimiento, fav_fam_accion, fav_fam_acc_otros, fav_fam_judicatura, fav_fam_jud_otros, 
        fav_fam_audiencia1, fav_fam_audiencia2, fav_fam_ingreso, fav_fam_calificacion, fav_fam_contestacion, fav_fam_reconvencion, fav_fam_inspeccion, 
        fav_fam_otros, fav_fam_resolucion, fav_fam_apelacion, fav_fam_casacion, fav_fam_observaciones, fav_fam_fecha_creacion) 
        VALUES ('$vara','$varb','$varc','$vard','$varh','$vari','$varj','$vark','$varl','$varm','$varma','$varn','$varna','$varo','$varp','$varq','$varr',
        '$vars','$vart','$varu','$varv','$varw','$varx','$vary','$vaz',current_timestamp())";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta_clientes = "INSERT INTO fav_clientes(fav_cli_codigo, fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, fav_cli_telefono,
         fav_cli_fecha_creacion) VALUES ('$vara','$vare','$varf','familia','$varg',current_timestamp())";
        $resultado_cliente = mysqli_query($conexion, $consulta_clientes);

        if ($resultado_cliente){
          $numero = $vara + 1;
          $sql4 = "UPDATE fav_codigo SET fav_cod_numero = '$numero' WHERE fav_cod_id = 3";
          $res4 = mysqli_query($conexion, $sql4);

          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Caso Familia";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_familia.php'); // Si está todo correcto redirigimos a otra página
}

?>