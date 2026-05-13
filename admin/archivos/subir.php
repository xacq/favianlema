<?php
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
$datetime = date('Y-m-d H:i:s');  
$nombre = $_FILES['archivo']['name'];
$tamanio = $_FILES['archivo']['size'];
$revisado = $_POST['revisado'];
$dir = "./documents/";
$tamano = 4000; //kb
$permitidos = array('doc','docx','pdf','xlsx','xls','png','jpg', 'jpeg', 'txt');
$ruta_carga= $dir.$_FILES['archivo']['name'];
$arregloArchivo = explode(".",$_FILES['archivo']['name']);
$extension = strtolower(end($arregloArchivo)); //extensiones

if (!file_exists($dir)){
    mkdir($dir,0777);
}
$mensaje="El archivo no se cargo a la base de datos en la base de datos";
$mensaje5="El archivo ya existe en la base de datos";

$res = "SELECT fav_arc_nombre FROM fav_archivos WHERE fav_arc_nombre = '$nombre'";
$resultado = mysqli_query($conexion,$res);
$row = mysqli_fetch_array($resultado);
$igual = $row[0];

if (isset($_POST['cargar']))
{   
    if ($igual == $nombre){
        echo "<script> alert('".$mensaje5."');</script>";
        include("./template/head.php"); 
        include("./template/foot.php");
    }
    else if (in_array($extension,$permitidos)){
        if ($_FILES['archivo']['size'] < ($tamano*1024)){
            if (move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta_carga))
            {
                $consulta = "INSERT INTO fav_archivos(fav_arc_nombre, fav_arc_ruta, fav_arc_size, fav_arc_estado, fav_arc_fecha_creacion) 
                VALUES ('$nombre','$ruta_carga','$tamanio','$revisado','$datetime')";
                $resultado = mysqli_query($conexion, $consulta);    

                if ($resultado){
                    $name = $_SESSION['name'];
                    $user = $_SESSION['user'];
                    $act = "Subida de Archivos";
                    $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
                    VALUES ('$name','$user','$datetime','$act', '$nombre')";
                    $resact = mysqli_query($conexion, $act);        
                  }

                header('location:./lists_archivos.php');  
            }else{
                echo "<script> alert('".$mensaje."');</script>";
                header('location:./cargar.php');
            }
        }else{
            echo "<script> alert('".$mensaje."');</script>";
            header('location:./cargar.php');
        }  
    } else{
        echo "<script> alert('".$mensaje."');</script>";
        header('location:./cargar.php');
    }

}
?>

