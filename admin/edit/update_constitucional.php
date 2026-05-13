<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
  
if (isset($_POST['actualizar_constitucional']))
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
        
        $varl = $_POST['accion'];
        $varm = $_POST['acc_otros'];
        $varma = $_POST['judicatura'];        
        $varn = $_POST['jud_otros'];

        if ($_POST['presentacion'] != "") $varo = $_POST['presentacion']; else $varo = "0000-00-00";
        if ($_POST['audiencia'] != "") $varp = $_POST['audiencia']; else $varp = "0000-00-00";
  
        if ($_POST['sentencia'] != "") $varq = $_POST['sentencia']; else $varq = "0000-00-00";
        if ($_POST['apelacion'] != "") $varr = $_POST['apelacion']; else $varr = "0000-00-00";  
  
        if ($_POST['corte_cons'] != "") $vars = $_POST['corte_cons']; else $vars = "0000-00-00";
        $vart = $_POST['observaciones'];
        
        $consulta = "UPDATE fav_constitucional
                        SET 
                        fav_con_proceso = '$varb',
                        fav_con_juez = '$varc',
                        fav_con_contra = '$varh',
                        fav_con_con_nombre = '$vari',
                        fav_con_con_identificacion = '$varj',
                        fav_con_con_telefono = '$vark',
                        fav_con_accion = '$varl',
                        fav_con_acc_otros = '$varm',
                        fav_con_judicatura = '$varma',
                        fav_con_jud_otros = '$varn',
                        fav_con_presentacion='$varo',
                        fav_con_audiencia='$varp',
                        fav_con_sentencia='$varq',
                        fav_con_apelacion='$varr',
                        fav_con_corte_cons='$vars',
                        fav_con_observaciones='$vart'
                        WHERE fav_con_id = '$id'";
        
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
          $act = "Actualización de Caso Constitucional";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }

	header('location:../lists/lists_constitucional.php'); // Si está todo correcto redirigimos a otra página
}
?>
