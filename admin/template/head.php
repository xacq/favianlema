
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAVIAN & LEMA | Sistema Informático</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.png" />
 
    <!-- Themefisher Icon font --> <link rel="stylesheet" href="./plugins/themefisher-font/style.css">
    <!-- bootstrap.min css --> <link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox.min css --> <link rel="stylesheet" href="./plugins/lightbox2/dist/css/lightbox.min.css">
    <!-- animation css --> <link rel="stylesheet" href="./plugins/animate/animate.css">
    <!-- Slick Carousel --> <link rel="stylesheet" href="./plugins/slick/slick.css">
</head>

<body id="bodysystem">

      <header class="navigation fixed-top">
        <div class="container">
          <!-- main nav -->
          <nav class="navbar navbar-expand-lg navbar-light">
            <!-- logo -->
            <a class="navbar-brand logo" href="#footer">
              <img class="logo-default" src="./images/logo_new.jpg" alt="logo" width="200px"/>
              <img class="logo-white" src="./images/logo_new.jpg" alt="logo" width="200px"/></a>
            <!-- /logo -->
            <!--boton-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
              aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!--/boton-->
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav ml-auto text-center">

              <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" >NUEVO</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="./agenda.php">Agenda</a>
                    <a class="dropdown-item"  href="./consulta.php">Consulta</a>
                    <a class="dropdown-item"  href="./archivos/cargar.php">Archivo</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item"  href="./familia.php">Caso Familia</a>
                    <a class="dropdown-item" href="./civil.php">Caso Civil</a>
                    <a class="dropdown-item" href="./penal.php">Caso Penal</a>
                    <a class="dropdown-item" href="./constitucional.php">Caso Constitucional</a>
                    <a class="dropdown-item" href="./agua.php">Caso Senagua</a>
                    <a class="dropdown-item" href="./subtierras.php">Caso Subtierras</a>
                    <a class="dropdown-item" href="./varios.php">Caso Varios</a>
                  </div>
                </li>       

                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" >LISTAS</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./lists/lists_agenda.php">Agendas</a>
                  <a class="dropdown-item" href="./lists/lists_cliente.php">Clientes</a>
                  <a class="dropdown-item"  href="./listcon.php">Consultas</a>
                  <a class="dropdown-item"  href="./archivos/lists_archivos.php">Archivos</a>
                  <hr class="dropdown-divider">
                    <a class="dropdown-item"  href="./lists/lists_familia.php">Casos Familia</a>
                    <a class="dropdown-item" href="./lists/lists_civil.php">Casos Civil</a>
                    <a class="dropdown-item" href="./lists/lists_penal.php">Casos Penal</a>
                    <a class="dropdown-item" href="./lists/lists_constitucional.php">Casos Constitucional</a>
                    <a class="dropdown-item" href="./lists/lists_agua.php">Casos Senagua</a>
                    <a class="dropdown-item" href="./lists/lists_subtierras.php">Casos Subtierras</a>
                    <a class="dropdown-item" href="./lists/lists_varios.php">Casos Varios</a>          
                  </div>
                </li> 

                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" >REPORTES</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="./reportes/agenda_actual.php">Reporte Agenda Actual</a>
                    <a class="dropdown-item" href="./reportes/agenda_pendiente.php">Reporte Agenda Pendiente</a>
                    <a class="dropdown-item" href="./reportes/agenda_futura.php">Reporte Agenda a Realizar</a>   
                  <hr class="dropdown-divider">
                  	<a class="dropdown-item" href="./reportes/cliente_activo_fam.php">Reporte Familia</a>
                    <a class="dropdown-item" href="./reportes/cliente_activo_civ.php">Reporte Civil</a>
                    <a class="dropdown-item" href="./reportes/cliente_activo_pen.php">Reporte Penal</a>
                    <a class="dropdown-item" href="./reportes/cliente_activo_con.php">Reporte Constitucional</a>
                    <a class="dropdown-item" href="./reportes/cliente_activo_sen.php">Reporte Senagua</a>
                    <a class="dropdown-item" href="./reportes/cliente_activo_sub.php">Reporte Subtierras</a>
                    <a class="dropdown-item" href="./reportes/cliente_activo_var.php">Reporte Varios</a>
                                      <hr class="dropdown-divider">
                    <a class="dropdown-item" href="./reportes/cliente_inactivo.php">Reporte Clientes Inactivos</a>
                    
                  </div>
                </li>    
   
 
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" >ACCIONES</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item "  href="./codigo.php">Buscar Codigo</a>  
                  <a class="dropdown-item "  href="./clientes.php">Buscar Nombre</a>    
                  <a class="dropdown-item "  href="./expediente.php">Buscar Expediente F.</a>    
                  <a class="dropdown-item "  href="./proceso.php">Buscar N. Proceso</a>    
                <?php if($_SESSION['user']== 0){?> 
                    <hr class="dropdown-divider">
                    <a class="dropdown-item"  href="./lists/lists_agenda.php">Eliminar Agenda</a>
                    <a class="dropdown-item"  href="./clientes_eliminar.php">Eliminar Clientes</a>
                    <a class="dropdown-item"  href="./listcon.php">Eliminar Consultas</a>
                    <a class="dropdown-item"  href="./archivos/lists_archivos.php">Eliminar Archivos</a>
                  </div>
                </li>
                <?php } ?>  

                <?php if($_SESSION['user']== 0 or $_SESSION['user']==3){?>
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" href="#" >Honorarios</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item active" href="./honorarios_nuevo.php">Nueva Cuenta</a>
                    <a class="dropdown-item" href="./precios.php">Buscar Cuenta</a>
                    <a class="dropdown-item" href="./lists/lists_honorarios.php">Lista de Cuentas</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="./reportes/honorarios.php">Reporte Honorarios</a>
                  </div>
                  <?php } ?>  
                
                  <?php if($_SESSION['user']== 0){?>  
                  <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" href="#" >Usuarios</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item active"  href="./usuarios.php">Nuevo Usuario</a>
                    <a class="dropdown-item"  href="./lists/lists_usuarios.php">Lista de Usuarios</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item"  href="./oficinas.php">Nueva Oficina</a>
                    <a class="dropdown-item"  href="./lists/lists_oficinas.php">Lista de Oficinas</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item"  href="./actions/buscar_codigo.php">Editar Código</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item"  href="./lists/lists_ingresos_today.php">Registro Diario</a>
                    <a class="dropdown-item"  href="./lists/lists_ingresos.php">Registro General</a>
                    <a class="dropdown-item"  href="./lists/lists_act.php">Registro Actividades</a>
                    </div>
                  </li>
                  <?php } ?>      
                <li class="nav-item "><a class="nav-link" href="./config/exit.php">Salir</a></li>
              </ul>
            </div>
          </nav>
          <!-- /main nav -->
        </div>     
      </header>


 

