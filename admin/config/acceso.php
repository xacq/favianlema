<?php

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
date_default_timezone_set('America/Guayaquil');  
if (isset($_POST['login_ingresar']))
    {
    $u = $_POST['loguser'];
    $c = $_POST['logpassword'];
  	echo("estoy aqui");
  	echo $u." - ".$c;
    if($u == "" || $c == "")
        { // Validamos que ningún campo quede vacío
      		echo("estoy aqui0");
            header('location:../../error.php'); 
        }
    else{
        // 4. Cadena de SQL
        $sql = "SELECT * FROM fav_login WHERE fav_log_correo = '$u' AND fav_log_contrasenia = '$c'";
        // 5. Ejecuto cadena query()
        if(!$consulta = $conexion->query($sql))
            {
                        		echo("estoy aqui1");
                header('location:../../error.php'); 
            }
        else{
            // 6. Cuento registros obtenidos del select. 
            // Como el nombre de usuario en la clave primaria no debería de haber mas de un registro con el mismo nombre.
            $filas = mysqli_num_rows($consulta);
            // 7. Comparo cantidad de registros encontrados
            if($filas == 0)
                {
                            		echo("estoy aqui2");
                    header('location:../../error.php'); 
                }
            else
                {
              		$datetime = date('Y-m-d H:i:s');  
                    $registro_user="INSERT INTO fav_reg_ingreso(fav_reg_user, fav_reg_fecha_creacion) 
                    VALUES ('$u','$datetime')";
              		echo("estoy aqui3");
                    $resultado = mysqli_query($conexion, $registro_user);
                    $row_user = mysqli_fetch_array($consulta);
                    if ($row_user['fav_log_user'] == 0){
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = 0;
                        $_SESSION['role'] = "Administrador";
                        $_SESSION['email'] = $row_user['fav_log_correo'];
                        $_SESSION['name'] = $row_user['fav_log_nombre'];
                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
                    }   
                    else if ($row_user['fav_log_user'] == 1){
                        session_start();
                        $_SESSION['login']=true;
                        $_SESSION['user'] = 1;
                        $_SESSION['role'] = "Administrador Auxiliar";
                        $_SESSION['email'] = $row_user['fav_log_correo'];
                        $_SESSION['name'] = $row_user['fav_log_nombre'];
                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
                    }
                    else if ($row_user['fav_log_user'] == 2){
                        session_start();
                        $_SESSION['login']=true;
                        $_SESSION['user'] = 2;
                        $_SESSION['role'] = "Usuario General";
                        $_SESSION['email'] = $row_user['fav_log_correo'];
                        $_SESSION['name'] = $row_user['fav_log_nombre'];
                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
                    }
                    else if ($row_user['fav_log_user'] == 3){
                        session_start();
                        $_SESSION['login']=true;
                        $_SESSION['user'] = 3;
                        $_SESSION['role'] = "Administrador de Caja";
                        $_SESSION['email'] = $row_user['fav_log_correo'];
                        $_SESSION['name'] = $row_user['fav_log_nombre'];
                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
                    }
                }

            }
        }
    }  
?>