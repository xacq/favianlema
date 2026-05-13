<?php
    session_start();
    if ($_SESSION['login'] != true){
        echo '<script>alert("OOPS...!  \nUSUARIO NO REGISTRADO")</script>';
        unset($_POST);
        session_destroy();
        echo '<script>window.location="../../error.php";</script>';
        exit();
    }
?>