<?php
    session_start();
    if ($_SESSION['login'] != true){
        echo '<script>alert("OOPS...!  \nUSUARIO NO REGISTRADO")</script>';
        unset($_POST);
        session_destroy();
        echo '<script>window.location="../../error.php";</script>';
        exit();
    }

    if (isset($_SESSION['force_password_change']) && $_SESSION['force_password_change'] === true){
        header('location:../../registro.php?force=1');
        exit();
    }
?>
