<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_penal']))
{       
        $id = $_GET['id'];
        
        $va = $_POST['codigo'];

        $varx = $_POST['expediente'];
        $vara = $_POST['fiscal'];
        $varb = $_POST['proceso'];
        $varc = $_POST['juez'];

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

        if ($_POST['instruccion'] != "") $varq = $_POST['instruccion']; else $varq = "0000-00-00";
        if ($_POST['preparatoria'] != "") $varr = $_POST['preparatoria']; else $varr = "0000-00-00";
  
        if ($_POST['tribunal'] != "") $vars = $_POST['tribunal']; else $vars = "0000-00-00";  
        if ($_POST['sentencia'] != "") $vart = $_POST['sentencia']; else $vart = "0000-00-00";
  
        if ($_POST['apelacion'] != "") $varu = $_POST['apelacion']; else $varu = "0000-00-00";
        if ($_POST['casacion'] != "") $varv = $_POST['casacion']; else $varv = "0000-00-00";
  
        $varw = $_POST['observaciones'];

        $consulta = "UPDATE fav_penal
                        SET 
                        fav_pen_expediente = '$varx',
                        fav_pen_fiscal = '$vara',
                        fav_pen_proceso = '$varb',
                        fav_pen_juez = '$varc',
                        fav_pen_contra = '$varh',
                        fav_pen_con_nombre = '$vari',
                        fav_pen_con_identificacion = '$varj',
                        fav_pen_con_telefono = '$vark',
                        fav_pen_delitos = '$varl',
                        fav_pen_del_otros = '$varla',
                        fav_pen_judicatura = '$varm',
                        fav_pen_jud_otros = '$varma',
                        fav_pen_formulacion = '$varn',
                        fav_pen_instruccion='$varq',
                        fav_pen_preparatoria='$varr',
                        fav_pen_tribunal='$vars',
                        fav_pen_sentecia='$vart',
                        fav_pen_apelacion='$varu',
                        fav_pen_casacion='$varv',
                        fav_pen_observaciones='$varw'
                        WHERE fav_pen_id = '$id'";

        $estado = $_POST['cerrado'];

        $consulta_cliente = "UPDATE fav_clientes
                        SET 
                        fav_cli_identificacion = '$varf',
                        fav_cli_telefono = '$varg',
                        fav_cli_estado = '$estado'
                        WHERE fav_cli_codigo = '$va'";

        $res = mysqli_query($conexion, $consulta)or die(mysqli_error($conexion));
        $res_cliente = mysqli_query($conexion, $consulta_cliente)or die(mysqli_error($conexion)); 
        
        if ($res_cliente){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Actualización de Penal";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$va')";
          $resact = mysqli_query($conexion, $act);        
        }

		header('location:../lists/lists_penal.php'); // Si está todo correcto redirigimos a otra página
}

?>
