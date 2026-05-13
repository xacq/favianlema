<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_penal']))
{
        $va = $_POST['codigo'];
        $va = strtoupper($va);
        $var = $_POST['expediente'];
        $vara = $_POST['fiscal'];
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
        
        $varl = $_POST['delitos'];
        $varla = $_POST['del_otros'];
        $varm = $_POST['judicatura'];
        $varma = $_POST['jud_otros'];
        
        if ($_POST['formulacion'] != "") $varn = $_POST['formulacion']; else $varn = "0000-00-00";

        if ($_POST['instruccion'] != "") $varna = $_POST['instruccion']; else $varna = "0000-00-00";
        if ($_POST['preparatoria'] != "") $varo = $_POST['preparatoria']; else $varo = "0000-00-00";
  
        if ($_POST['tribunal'] != "") $varp = $_POST['tribunal']; else $varp = "0000-00-00";  
        if ($_POST['sentencia'] != "") $varq = $_POST['sentencia']; else $varq = "0000-00-00";
  
        if ($_POST['apelacion'] != "") $varr = $_POST['apelacion']; else $varr = "0000-00-00";
        if ($_POST['casacion'] != "") $vars = $_POST['casacion']; else $vars = "0000-00-00";

        $vart = $_POST['observaciones'];

        
        $consulta = "INSERT INTO fav_penal(fav_pen_codigo, fav_pen_expediente, fav_pen_fiscal, fav_pen_proceso, fav_pen_juez, 
        fav_pen_cliente, fav_pen_contra, fav_pen_con_nombre, fav_pen_con_identificacion, fav_pen_con_telefono, fav_pen_delitos, 
        fav_pen_del_otros, fav_pen_judicatura, fav_pen_jud_otros, fav_pen_formulacion, fav_pen_instruccion, fav_pen_preparatoria, 
        fav_pen_tribunal, fav_pen_sentecia, fav_pen_apelacion, fav_pen_casacion, fav_pen_observaciones, fav_pen_fecha_creacion) 
           VALUES ('$va','$var','$vara','$varb','$varc','$vard','$varh','$vari','$varj','$vark','$varl','$varla','$varm','$varma','$varn',
           '$varna','$varo','$varp','$varq','$varr','$vars','$vart',current_timestamp())";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta_clientes = "INSERT INTO fav_clientes(fav_cli_codigo, fav_cli_nombre, fav_cli_identificacion, fav_cli_tipo, fav_cli_telefono,
         fav_cli_fecha_creacion) VALUES ('$va','$vare','$varf','penal','$varg',current_timestamp())";
        $resultado_cliente = mysqli_query($conexion, $consulta_clientes);

        if ($resultado_cliente){
          $numero = $va + 1;
          $sql4 = "UPDATE fav_codigo SET fav_cod_numero = '$numero' WHERE fav_cod_id = 4";
          $res4 = mysqli_query($conexion, $sql4);

          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Creación de Caso Penal";
          $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('$name','$user',current_timestamp(),'$act', '$va')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_penal.php'); // Si está todo correcto redirigimos a otra página
}

?>