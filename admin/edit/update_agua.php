<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_agua']))
{       
        $id = $_GET['id'];

        $vara = $_POST['codigo'];   
        $varc = $_POST['proceso'];

        $varf = $_POST['cli_identificacion'];
        $varg = $_POST['cli_telefono'];
        
        $varh = $_POST['contra'];
        $vari = $_POST['con_nombre'];
        $varj = $_POST['con_identificacion'];
        $vark = $_POST['con_telefono'];

        $varl = $_POST['terceros'];
        $varm = $_POST['ter_nombre'];
        $varma = $_POST['ter_identificacion'];
        $varn = $_POST['ter_telefono'];
        
        $varna = $_POST['tramite'];
        $varo = $_POST['tra_otros'];

        $varp = $_POST['uso'];
        $varq = $_POST['uso_otros'];
        
        $varr = $_POST['parroquia'];
        $vars = $_POST['par_otros'];

        if ($_POST['calificacion'] != "") $vart = $_POST['calificacion']; else $vart = "0000-00-00";
        if ($_POST['oposicion'] != "") $varu = $_POST['oposicion']; else $varu = "0000-00-00";
  
        if ($_POST['comisiones'] != "") $varv = $_POST['comisiones']; else $varv = "0000-00-00";
        if ($_POST['publicacion'] != "") $varw = $_POST['publicacion']; else $varw = "0000-00-00";
  
        if ($_POST['inspeccion'] != "") $varx = $_POST['inspeccion']; else $varx = "0000-00-00";
        if ($_POST['audiencia'] != "") $vary = $_POST['audiencia']; else $vary = "0000-00-00";  

        if ($_POST['prueba'] != "") $varz = $_POST['prueba']; else $varz = "0000-00-00";
        if ($_POST['resolucion'] != "") $varza = $_POST['resolucion']; else $varza = "0000-00-00";  
  
        if ($_POST['apelacion'] != "") $varze = $_POST['apelacion']; else $varze = "0000-00-00";

        $varzi = $_POST['observaciones'];

        
        $consulta = "UPDATE fav_senagua SET 
                        fav_sen_proceso='$varc',
                        fav_sen_contra='$varh',
                        fav_sen_con_nombre='$vari',
                        fav_sen_con_con_identificacion='$varj',
                        fav_sen_con_telefono='$vark',
                        fav_sen_terceros='$varl',
                        fav_sen_ter_nombre='$varm',
                        fav_sen_ter_identificacion='$varma',
                        fav_sen_ter_telefono='$varn',
                        fav_sen_tramite='$varna',
                        fav_sen_tra_otros='$varo',
                        fav_sen_uso='$varp',
                        fav_sen_uso_otros='$varq',
                        fav_sen_parroquia='$varr',
                        fav_sen_par_otros='$vars',
                        fav_sen_calificacion='$vart',
                        fav_sen_oposicion='$varu',
                        fav_sen_comisiones='$varv',
                        fav_sen_publicacion='$varw',
                        fav_sen_inspeccion='$varx',
                        fav_sen_audiencia='$vary',
                        fav_sen_prueba='$varz',
                        fav_sen_resolucion='$varza',
                        fav_sen_apelacion='$varze',
                        fav_sen_observaciones='$varzi'
                        WHERE fav_sen_id = '$id'";
        
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
          $act = "Actualización de Caso Agua";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$vara')";
          $resact = mysqli_query($conexion, $act);        
        }

  header('location:../lists/lists_agua.php'); // Si está todo correcto redirigimos a otra página
}

?>
