<?php
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['guardar_contrasena']))
{
        session_start();
        $vara = $_POST['correo'];
        $varb = $_POST['contrasena'];
        $varc = $_POST['new_contrasena'];
        $vard = $_POST['repetir'];
        
        if (isset($_SESSION['force_password_change']) && $_SESSION['force_password_change'] === true && isset($_SESSION['email'])){
                $vara = $_SESSION['email'];
        }

        $consulta = "SELECT * FROM fav_login WHERE fav_log_correo = '$vara'";
        $res_consulta = mysqli_query($conexion, $consulta);
        $correo = mysqli_fetch_array($res_consulta);

        $passwordOk = false;
        if ($correo){
                $storedPassword = $correo['fav_log_contrasenia'];
                $isHash = (strpos($storedPassword, '$2y$') === 0 || strpos($storedPassword, '$argon2') === 0);
                if ($isHash){
                        $passwordOk = password_verify($varb, $storedPassword);
                }
                else{
                        $passwordOk = ($storedPassword === $varb);
                }
        }

        if ($correo && $correo['fav_log_correo'] == $vara && $passwordOk ){
                if ($varc == $vard){
                        $newPasswordHash = password_hash($varc, PASSWORD_DEFAULT);
                        $consulta = "UPDATE fav_login
                        SET fav_log_contrasenia='$newPasswordHash'
                        WHERE fav_log_correo = '$vara'";

                        $resultado = mysqli_query($conexion, $consulta);

                        if (isset($_SESSION['force_password_change'])){
                                $_SESSION['force_password_change'] = false;
                        }

                        header('location:../../exito_contrasena.php');
                        exit();
                }
                else{
                        header('location:../../error_contrasena.php');
                        exit();
                }
        }
        else{

                header('location:../../error_contrasena.php');
                exit();
        }
}
else{  session_start();
        session_destroy();
        header("location:../../login.php");
        exit();
      }
?>
