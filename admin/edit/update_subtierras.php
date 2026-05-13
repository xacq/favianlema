<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_subtierras']))
{       
        $id = $_GET['id'];

        $vara = $_POST['codigo'];
        $varb = $_POST['proceso'];

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
        
        $consulta = "UPDATE fav_subtierras
                        SET                      
                        fav_sub_proceso = '$varb',
                        fav_sub_opositor = '$vari',
                        fav_sub_opo_identificacion = '$varj',
                        fav_sub_opo_telefono = '$vark',
                        fav_sub_tramite = '$varm',
                        fav_sub_tra_otros = '$varma',
                        fav_sub_parroquia = '$varn',
                        fav_sub_par_otros = '$varna',
                        fav_sub_revision='$varo',
                        fav_sub_aprobacion='$varp',
                        fav_sub_matricula='$varq',
                        fav_sub_inspeccion='$varr',
                        fav_sub_pago1='$vars',
                        fav_sub_pago2='$vart',
                        fav_sub_adjudicacion='$varu',
                        fav_sub_registro_propiedad='$varv',
                        fav_sub_entrega='$varw',
                        fav_sub_observaciones='$varx'
                        WHERE fav_sub_id = $id";
        
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
          $act = "Actualización de Subtierras";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }
        header('location:../lists/lists_subtierras.php'); // Si está todo correcto redirigimos a otra página
}
?>
