<?php

date_default_timezone_set('America/Guayaquil');

if (isset($_POST['enviar']))
{
    $tocorreo="favian.lema@hotmail.com";
    $today = date('Y-m-d',time());
    
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $message = $_POST['mensaje'];
  
    $mensaje = "El Sr.(a) ".$nombre.", se ha comunicado con el servicio de CONSULTA EN LINEA de su pagina web.\r\n";
    $mensaje .= "Los siguientes datos pertenecen al cliente con su requerimiento:\r\n";
    $mensaje .= "Correo: ".$correo."\r\n";
    $mensaje .= "Telefono: ".$telefono."\r\n";
    $mensaje .= "Requerimiento: ".$message."\r\n";
    $mensaje .= "Fecha de la Consulta: ".$today."\r\n\n";
    $mensaje .= "Comuniquese con el cliente lo mas pronto posible.\r\n";
    
    mail($tocorreo, "FAVIAN & LEMA FIRMA DE ABOGADOS.", $mensaje);
    echo '<script>alert("FELICIDADES...! \nHEMOS RECIBIDO SU MENSAJE.\nNOS COMUNICAREMOS LO ANTES POSIBLE. \nFAVIAN & LEMA.\nFIRMA DE ABOGADOS.")</script>';
    echo '<script>window.location="./index.php"</script>';
}
else{
    echo '<script>alert("OOPS...! \nHAY UN ERROR AL ENVIAR LA INFORMACION.")</script>';
}
?>
