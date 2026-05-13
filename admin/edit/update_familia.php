<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_familia']))
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
        
        $consulta = "UPDATE fav_familia 
                        SET 
                        fav_fam_proceso = '$varb',
                        fav_fam_juez= '$varc',
                        fav_fam_contra = '$varh',
                        fav_fam_con_nombre= '$vari',
                        fav_fam_con_identificacion = '$varj',
                        fav_fam_con_telefono= '$vark',
                        fav_fam_procedimiento= '$varl',
                        fav_fam_accion= '$varm',
                        fav_fam_acc_otros= '$varma',
                        fav_fam_judicatura= '$varn',
                        fav_fam_jud_otros= '$varna',
                        fav_fam_audiencia1='$varo',
                        fav_fam_audiencia2='$varp',
                        fav_fam_ingreso='$varq',
                        fav_fam_calificacion='$varr',
                        fav_fam_contestacion='$vars',
                        fav_fam_reconvencion='$vart',
                        fav_fam_inspeccion='$varu',
                        fav_fam_otros='$varv',
                        fav_fam_resolucion='$varw',
                        fav_fam_apelacion='$varx',
                        fav_fam_casacion='$vary',
                        fav_fam_observaciones='$varz'
                        WHERE fav_fam_id = '$id'";
        
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
          $act = "Actualización de Caso familia";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }


        header('location:../lists/lists_familia.php'); // Si está todo correcto redirigimos a otra página
}
?>
