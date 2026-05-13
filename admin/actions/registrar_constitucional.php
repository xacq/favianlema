<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_constitucional']))
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
        
        $varl = $_POST['accion'];
        $varm = $_POST['acc_otros'];
        $varma = $_POST['judicatura'];        
        $varn = $_POST['jud_otros'];

        if ($_POST['presentacion'] != "") $varna = $_POST['presentacion']; else $varna = "0000-00-00";
        if ($_POST['audiencia'] != "") $varo = $_POST['audiencia']; else $varo = "0000-00-00";
  
        if ($_POST['sentencia'] != "") $varp = $_POST['sentencia']; else $varp = "0000-00-00";
        if ($_POST['apelacion'] != "") $varq = $_POST['apelacion']; else $varq = "0000-00-00";  
  
        if ($_POST['corte_cons'] != "") $varr = $_POST['corte_cons']; else $varr = "0000-00-00";

        $vars = $_POST['observaciones'];


        $accion = $_POST['accion'];
        $judicatura = $_POST['judicatura'];
        $presentacion = $_POST['presentacion'];
        $audiencia = $_POST['audiencia'];
        $sentencia = $_POST['sentencia'];
        $apelacion = $_POST['apelacion'];
        $corte = $_POST['corte_cons'];
        $observaciones = $_POST['observaciones'];

        $consulta = "INSERT INTO fav_constitucional(fav_con_codigo, fav_con_proceso, fav_con_juez, fav_con_cliente, fav_con_contra, 
        fav_con_con_nombre, fav_con_con_identificacion, fav_con_con_telefono, fav_con_accion, fav_con_acc_otros, fav_con_judicatura, 
        fav_con_jud_otros, fav_con_presentacion, fav_con_audiencia, fav_con_sentencia, fav_con_apelacion, fav_con_corte_cons,
         fav_con_observaciones, fav_con_fecha_creacion)
         VALUES ('$vara','$varb','$varc','$vard','$varh','$vari','$varj','$vark','$varl','$varm','$varma','$varn','$varna','$varo','$varp','$varq','$varr','$vars',current_timestamp())";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta_clientes = "INSERT INTO fav_clientes(fav_cli_codigo, fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, fav_cli_telefono,
         fav_cli_fecha_creacion) VALUES ('$vara','$vare','$varf','constitucional','$varg',current_timestamp())";
        $resultado_cliente = mysqli_query($conexion, $consulta_clientes);
        
        if ($resultado_cliente){
          $numero = $vara + 1;
          $sql4 = "UPDATE fav_codigo SET fav_cod_numero = '$numero' WHERE fav_cod_id = 2";
          $res4 = mysqli_query($conexion, $sql4);

          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Caso Constitucional";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_constitucional.php'); // Si está todo correcto redirigimos a otra página
}
?>