<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar_codigo']))
{
        $id = $_GET['id'];
        $busca = "SELECT * FROM fav_clientes WHERE fav_cli_id = $id";
        $res = mysqli_query($conexion,$busca);
        $row = mysqli_fetch_array($res);
        $viejo = $row['fav_cli_codigo'];
        $caso = $row['fav_cli_tipo'];
        $viejo = strtoupper($viejo);

        $nuevo = $_POST['nuevo_codigo'];
        $consulta = "UPDATE fav_clientes 
                        SET fav_cli_codigo ='$nuevo'
                        WHERE fav_CLI_id = '$id'";
        $resultado = mysqli_query($conexion,$consulta);

        if ($caso == "penal") {
          $busca_caso = "SELECT * FROM fav_penal WHERE fav_pen_codigo = '$viejo'";
          $res_caso = mysqli_query($conexion,$busca_caso);
          $row = mysqli_fetch_array($res_caso);
          $id_caso = $row['fav_pen_id'];
          $con = "UPDATE fav_penal
                  SET fav_pen_codigo ='$nuevo'
                  WHERE fav_pen_id = '$id_caso'";
          $res = mysqli_query($conexion,$con); 
        }
        else if ($caso == "familia"){
          $busca_caso = "SELECT * FROM fav_familia WHERE fav_fam_codigo = '$viejo'";
          $res_caso = mysqli_query($conexion,$busca_caso);
          $row = mysqli_fetch_array($res_caso);
          $id_caso = $row['fav_fam_id'];
          $con = "UPDATE fav_familia
                  SET fav_fam_codigo ='$nuevo'
                  WHERE fav_fam_id = '$id_caso'";
          $res = mysqli_query($conexion,$con); 
        } 
        else if ($caso == "civil"){
          $busca_caso = "SELECT * FROM fav_civil WHERE fav_civ_codigo = '$viejo'";
          $res_caso = mysqli_query($conexion,$busca_caso);
          $row = mysqli_fetch_array($res_caso);
          $id_caso = $row['fav_civ_id'];
          $con = "UPDATE fav_civil
                  SET fav_civ_codigo ='$nuevo'
                  WHERE fav_civ_id = '$id_caso'";
          $res = mysqli_query($conexion,$con); 
        }  
        else if ($caso == "constitucional") {
          $busca_caso = "SELECT * FROM fav_constitucional WHERE fav_con_codigo = '$viejo'";
          $res_caso = mysqli_query($conexion,$busca_caso);
          $row = mysqli_fetch_array($res_caso);
          $id_caso = $row['fav_con_id'];
          $con = "UPDATE fav_constitucional
                  SET fav_con_codigo ='$nuevo'
                  WHERE fav_con_id = '$id_caso'";
          $res = mysqli_query($conexion,$con); 
        }  
        else if ($caso == "senagua") {
          $busca_caso = "SELECT * FROM fav_senagua WHERE fav_sen_codigo = '$viejo'";
          $res_caso = mysqli_query($conexion,$busca_caso);
          $row = mysqli_fetch_array($res_caso);
          $id_caso = $row['fav_sen_id'];
          $con = "UPDATE fav_senagua
                  SET fav_sen_codigo ='$nuevo'
                  WHERE fav_sen_id = '$id_caso'";
          $res = mysqli_query($conexion,$con); 
        }  
        else if ($caso == "subtierras") {
          $busca_caso = "SELECT * FROM fav_subtierras WHERE fav_sub_codigo = '$viejo'";
          $res_caso = mysqli_query($conexion,$busca_caso);
          $row = mysqli_fetch_array($res_caso);
          $id_caso = $row['fav_sub_id'];
          $con = "UPDATE fav_subtierras
                  SET fav_sub_codigo ='$nuevo'
                  WHERE fav_sub_id = '$id_caso'";
          $res = mysqli_query($conexion,$con); 
        }  
        else if ($caso == "varios") {
          $busca_caso = "SELECT * FROM fav_varios WHERE fav_var_codigo = '$viejo'";
          $res_caso = mysqli_query($conexion,$busca_caso);
          $row = mysqli_fetch_array($res_caso);
          $id_caso = $row['fav_var_id'];
          $con = "UPDATE fav_varios
                  SET fav_var_codigo ='$nuevo'
                  WHERE fav_var_id = '$id_caso'";
          $res = mysqli_query($conexion,$con); 
        }          

        if ($res){
          $name = $_SESSION['name'];
          $user = $_SESSION['user'];
          $act = "Actualización de Codigo";
          $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
          VALUES ('','$name','$user',current_timestamp(),'$act', '$nuevo')";
          $resact = mysqli_query($conexion, $act);        
        }

        header('location:../lists/lists_cliente.php'); // Si está todo correcto redirigimos a otra página
}

?>