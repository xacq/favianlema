<?php 
require_once("./config/ver.php");
require_once("./template/head.php");  
date_default_timezone_set('America/Guayaquil');  
?>

      <div class="container ">
        <form class="normal_form" action="./actions/registrar_agenda.php" method="POST">
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
          <p class="normal_linea"><br>AGENDA</p>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">fecha a recordar</legend>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Fecha</label> 
                  <input id="date" name="fav_age_fecha" class="normal_input_little" type="date" required> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label for="agenda">Tareas</label> 
                  <select name="fav_age_tareas" class="normal_input_little" required> 
                    <option value="">Seleccione una opción</option>
                    <option value="Gestión de despacho">Gestión de despacho</option>
                    <option value="Tareas">Tareas</option>
                    <option value="Recordar Diligencias">Recordar Diligencias</option>
                    <option value="Citaciones">Citaciones</option>
                    <option value="Carteles">Carteles</option>
                    <option value="Extractos">Extractos</option>
                    <option value="Solicitar Audiencia">Solicitar Audiencia</option>
                    <option value="Solicitar Inspección">Solicitar Inspección</option>
                    <option value="Audiencia" style="background:orange">Audiencia</option>
                    <option value="Inspección" style="background:orangered">Inspección</option>
                    <option value="Apelación">Apelación</option>
                    <option value="Casación">Casación</option>
                    <option value="Versiones" style="background:yellowgreen">Versiones</option>
                    <option value="Diligencias Urgentes" style="background:yellow">Diligencias Urgentes</option>
                    <option value="Otros" >Otros</option></select></div>              
                <div class="col-md-12 col-sm-12 col-xs-12">  
                <label >Detalle</label> 
                  	<!--input name="fav_age_descripcion" class="normal_input_big maximus"  onkeypress="return valideKeys(event);" required> </div-->
              		<textarea name="fav_age_descripcion" class=" normal_input_big maximus" onkeypress="return valideKeys(event)" rows="10" cols="10" required></textarea> </div>
              	<div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                <input name="guardar_agenda" type="submit" class="btn" value="Guardar" onclick="return confirmar('¿Está seguro que desea guardar esta agenda?')"></div>
            </div>
          </fieldset>            
        </form>
      </div>

      <?php include("./template/foot.php"); ?>


