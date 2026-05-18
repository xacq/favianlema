<?php

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
date_default_timezone_set('America/Guayaquil');  
if (isset($_POST['login_ingresar']))
    {
    $u = $_POST['loguser'];
    $c = $_POST['logpassword'];
    if($u == "" || $c == "")
        { // Validamos que ningún campo quede vacío
            header('location:../../error.php'); 
            exit();
        }
    else{
        // 4. Cadena de SQL
        $sql = "SELECT * FROM fav_login WHERE fav_log_correo = '$u'";
        // 5. Ejecuto cadena query()
        if(!$consulta = $conexion->query($sql))
            {
                header('location:../../error.php'); 
                exit();
            }
        else{
            // 6. Cuento registros obtenidos del select. 
            // Como el nombre de usuario en la clave primaria no debería de haber mas de un registro con el mismo nombre.
            $filas = mysqli_num_rows($consulta);
            // 7. Comparo cantidad de registros encontrados
            if($filas == 0)
                {
                    header('location:../../error.php'); 
                    exit();
                }
            else
                {
	              		$datetime = date('Y-m-d H:i:s');  
	                    $row_user = mysqli_fetch_array($consulta);

                        $storedPassword = $row_user['fav_log_contrasenia'];
                        $isHash = (strpos($storedPassword, '$2y$') === 0 || strpos($storedPassword, '$argon2') === 0);
                        $passwordIsValid = false;

                        if ($isHash) {
                            $passwordIsValid = password_verify($c, $storedPassword);
                        } else {
                            $passwordIsValid = ($storedPassword === $c);
                        }

                        if (!$passwordIsValid) {
                            header('location:../../error.php');
                            exit();
                        }

	                    $registro_user="INSERT INTO fav_reg_ingreso(fav_reg_user, fav_reg_fecha_creacion) 
	                    VALUES ('$u','$datetime')";
                    $resultado = mysqli_query($conexion, $registro_user);

	                    $defaultPassword = '987654321';
	                    $requiresPasswordChange = false;
	                    if ($isHash) {
	                        $requiresPasswordChange = password_verify($defaultPassword, $storedPassword);
	                    } else {
	                        $requiresPasswordChange = ($storedPassword === $defaultPassword);
	                    }

	                    if (!$isHash) {
	                        $upgradedHash = password_hash($c, PASSWORD_DEFAULT);
	                        $logId = (int)$row_user['fav_log_id'];
	                        mysqli_query($conexion, "UPDATE fav_login SET fav_log_contrasenia='$upgradedHash' WHERE fav_log_id = $logId");
	                    }

	                    if ($row_user['fav_log_user'] == 0){
	                        session_start();
	                        $_SESSION['login'] = true;
                        $_SESSION['user'] = 0;
	                        $_SESSION['role'] = "Administrador";
	                        $_SESSION['email'] = $row_user['fav_log_correo'];
	                        $_SESSION['name'] = $row_user['fav_log_nombre'];
	                        $_SESSION['oficina_id'] = (int)$row_user['fav_log_oficina_id'];
	                        $_SESSION['force_password_change'] = $requiresPasswordChange;
	                        $_SESSION['user_id'] = (int)$row_user['fav_log_id'];
	                        if ($requiresPasswordChange) {
	                            header('location:../../registro.php?force=1');
	                            exit();
	                        }
	                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
	                        exit();
	                    }   
                    else if ($row_user['fav_log_user'] == 1){
                        session_start();
                        $_SESSION['login']=true;
                        $_SESSION['user'] = 1;
	                        $_SESSION['role'] = "Administrador Auxiliar";
	                        $_SESSION['email'] = $row_user['fav_log_correo'];
	                        $_SESSION['name'] = $row_user['fav_log_nombre'];
	                        $_SESSION['oficina_id'] = (int)$row_user['fav_log_oficina_id'];
	                        $_SESSION['force_password_change'] = $requiresPasswordChange;
	                        $_SESSION['user_id'] = (int)$row_user['fav_log_id'];
	                        if ($requiresPasswordChange) {
	                            header('location:../../registro.php?force=1');
	                            exit();
	                        }
	                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
	                        exit();
	                    }
                    else if ($row_user['fav_log_user'] == 2){
                        session_start();
                        $_SESSION['login']=true;
                        $_SESSION['user'] = 2;
	                        $_SESSION['role'] = "Usuario General";
	                        $_SESSION['email'] = $row_user['fav_log_correo'];
	                        $_SESSION['name'] = $row_user['fav_log_nombre'];
	                        $_SESSION['oficina_id'] = (int)$row_user['fav_log_oficina_id'];
	                        $_SESSION['force_password_change'] = $requiresPasswordChange;
	                        $_SESSION['user_id'] = (int)$row_user['fav_log_id'];
	                        if ($requiresPasswordChange) {
	                            header('location:../../registro.php?force=1');
	                            exit();
	                        }
	                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
	                        exit();
	                    }
                    else if ($row_user['fav_log_user'] == 3){
                        session_start();
                        $_SESSION['login']=true;
                        $_SESSION['user'] = 3;
	                        $_SESSION['role'] = "Administrador de Caja";
	                        $_SESSION['email'] = $row_user['fav_log_correo'];
	                        $_SESSION['name'] = $row_user['fav_log_nombre'];
	                        $_SESSION['oficina_id'] = (int)$row_user['fav_log_oficina_id'];
	                        $_SESSION['force_password_change'] = $requiresPasswordChange;
	                        $_SESSION['user_id'] = (int)$row_user['fav_log_id'];
	                        if ($requiresPasswordChange) {
	                            header('location:../../registro.php?force=1');
	                            exit();
	                        }
	                        header('location:../sistema.php'); // Si está todo correcto redirigimos a otra página
	                        exit();
	                    }
                }

            }
        }
    }  
?>
