<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_varios']))
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

        $consulta = "INSERT INTO fav_varios(fav_var_codigo, fav_var_proceso, fav_var_opositor, fav_var_opo_identificacion, fav_var_opo_telefono, 
        fav_var_tramite, fav_var_tra_otros, fav_var_parroquia, fav_var_par_otros, fav_var_revision, fav_var_aprobacion, fav_var_matricula, fav_var_inspeccion, 
        fav_var_pago1, fav_var_pago2, fav_var_adjudicacion, fav_var_registro_propiedad, fav_var_entrega, fav_var_observaciones, fav_var_fecha_creacion) 
        VALUES ('$vara','$varb','$vari','$varj','$vark','$varm','$varma','$varn','$varna','$varo','$varp','$varq','$varr','$vars','$vart','$varu','$varv',
        '$varw','$varx',current_timestamp())";         
        $resultado = mysqli_query($conexion, $consulta);

        $consulta_clientes = "INSERT INTO fav_clientes(fav_cli_codigo, fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, fav_cli_telefono,
         fav_cli_fecha_creacion) VALUES ('$vara','$vare','$varf','varios','$varg',current_timestamp())";
        $resultado_cliente = mysqli_query($conexion, $consulta_clientes);

        if ($resultado_cliente){
          $numero = $vara + 1;
          $sql4 = "UPDATE fav_codigo SET fav_cod_numero = '$numero' WHERE fav_cod_id = 7";
          $res4 = mysqli_query($conexion, $sql4);

          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Caso Varios";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);   
        }
        header('location:../lists/lists_varios.php'); // Si está todo correcto redirigimos a otra página
}
?>