<?php
  require_once("./config/ver.php");
  require_once("./template/head.php");  
  date_default_timezone_set('America/Guayaquil');  
?>

      <div class="container ">

        <form class="normal_form" action="./actions/registrar_usuario.php" method="POST">
          <!-- CABECERA -->
          <div class="row text-center" style="text-align:right;background-color:orange;">
            <div class="col-sm-4">
              <label> <?php echo "Usuario:  ".$_SESSION['email'];?></label>
            </div>
            <div class="col-sm-4">
              <label> <?php echo $_SESSION["role"].":  ".$_SESSION['name'];?></label>
            </div>
           <div class="col-sm-4">
            <label>  <?php echo "Fecha/Hora: ".date("j/n/Y, h:i A"); ?></label>
            </div>
          </div>
          <p class="normal_linea"><br>SECCION USUARIOS</p>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Creacion de usuarios</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label>Tareas</label> 
                  <select name="usuario" class="normal_input_little" required> 
                    <option value="">Seleccione una opción</option>
                    <option value="0">Administrador</option>
                    <option value="1">Auxiliar de Administrador</option> 
                    <option value="2">Usuario general</option>
                    <option value="3">Administrador de Caja</option></select></div>              
                <div class="col-md-6 col-sm-12 col-xs-12">  
                <label >Nombre</label> 
                  <input name="nombre" class="normal_input_little maximus"  onkeypress="return valideKeys(event);" required> </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">  
                <label >Correo Electronico</label> 
                  <input type="email" name="correo" class="normal_input_little" required> </div>                            
                <legend class="form_title maximus" style="text-align: right;">Observaciones</legend>
                  <label><mark style="background-color:darkblue; color:whitesmoke;">NOTA:</mark> Se indica al Administrador que todo usuario creado tendra por defecto una contraseña que debera
                   cambiar dicho usuario despues de haber sido creado.  La contraseña por defecto es: <mark>987654321</mark>.</label> 
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                <input name="guardar_usuario" type="submit" class="btn" value="Guardar" onclick="return confirmar('¿Está seguro que desea guardar este usuario?')"></div>
            </div>

          </fieldset>   
          
          
        </form>
      </div>

      <?php include("./template/foot.php"); ?>
