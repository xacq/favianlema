<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");


if (isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM fav_clientes WHERE fav_cli_id = $id";

        $codigo = "SELECT fav_cli_codigo FROM fav_clientes WHERE fav_cli_id = $id";
        $code_result = mysqli_query($conexion,$codigo);
        $code_row = mysqli_fetch_array($code_result);
        $code = $code_row[0];

        $tipo = "SELECT fav_cli_tipo FROM fav_clientes WHERE fav_cli_id = $id";
        $type_result = mysqli_query($conexion,$tipo);
        $type_row = mysqli_fetch_array($type_result);
        $type = $type_row[0];


        if ($type == "familia"){
            $query_extra = "DELETE FROM fav_familia WHERE fav_fam_codigo = '$code'";
        }
        elseif ($type == "civil"){
            $query_extra = "DELETE FROM fav_civil WHERE fav_civ_codigo = '$code'";
        }elseif ($type == "penal"){
            $query_extra = "DELETE FROM fav_penal WHERE fav_pen_codigo = '$code'";
        }elseif ($type == "constitucional"){
            $query_extra = "DELETE FROM fav_constitucional WHERE fav_con_codigo = '$code'";
        }elseif ($type == "senagua"){
            $query_extra = "DELETE FROM fav_senagua WHERE fav_sen_codigo = '$code'";
        }elseif ($type == "subtierras"){
            $query_extra = "DELETE FROM fav_subtierras WHERE fav_sub_codigo = '$code'";
        }elseif ($type == "varios"){
            $query_extra = "DELETE FROM fav_varios WHERE fav_var_codigo = '$code'";
        }
          
        $result = mysqli_query($conexion, $query);
        $result_extra = mysqli_query($conexion, $query_extra); 

        $prueba_honorarios="SELECT * FROM fav_honorarios WHERE fav_hon_codigo = '$code'";
        $resultado_honorarios = mysqli_query($conexion,$prueba_honorarios);
        if (mysqli_num_rows($resultado_honorarios) == 1){
            $honorario = "DELETE FROM fav_honorarios WHERE fav_hon_codigo = '$code'";
            $hon_res = mysqli_query($conexion,$honorario);
        }

        header ("Location:../sistema.php");
    }

?>