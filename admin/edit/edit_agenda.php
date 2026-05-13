<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM fav_agenda WHERE fav_age_id = $id";

    $busqueda = mysqli_query($conexion, $query);
    $row_age = mysqli_fetch_array($busqueda);
?>
      <div class="container ">
        <form class="normal_form" action="./update_agenda.php?id=<?php echo"$id"?>" method="POST">
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
          <p class="normal_linea"><br>SECCION AGENDA</p>
          <legend class="form_title maximus" style="color:black;background-color:orange;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;color:black;background-color:orange;">INGRESE UNA fecha a recordar</legend>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Fecha</label> 
                  <input value="<?php echo $row_age['fav_age_fecha'];?>" id="date" name="fav_age_fecha" class="normal_input_little" type="date" required> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label for="agenda">Tareas</label> 
                  <select name="fav_age_tareas" class="normal_input_little" required> 
                    <option value="<?php echo $row_age['fav_age_tareas'];?>" selected="true"><?php echo $row_age['fav_age_tareas'];?></option>
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
                  <!--input value="<?php echo $row_age['fav_age_descripcion'];?>" onkeypress="return valideKeys(event);" name="fav_age_descripcion" class="normal_input_big maximus"required> </div-->              
					<textarea name="fav_age_descripcion" class=" normal_input_big maximus" onkeypress="return valideKeys(event)" rows="10" cols="10" required><?php echo $row_age['fav_age_descripcion'];?></textarea> </div>

                  <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
                  <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DE LA AGENDA</legend>
                    <label for="scales">  Seleccione "si" cuando la agenda se ha realizado con exito.</label>
                      <?php 
                        if ($row_age['fav_age_estado'] == 'no'){?>
                          <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                          <label for="contactChoice1">No</label>
                          <input type="radio" id="contactChoice2" name="cerrado" value="si">
                          <label for="contactChoice2">Si</label>
                        <?php 
                        } elseif ($row_age['fav_age_estado'] == 'si'){?>
                          <input type="radio" id="contactChoice1" name="cerrado" value="no">
                          <label for="contactChoice1">No</label>
                          <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                          <label for="contactChoice2">Si</label>
                        <?php
                        }?>
            </div>  

              <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                <input name="actualizar_agenda" type="submit" class="btn" value="Actualizar" onclick="return confirmar('¿Está seguro que desea guardar esta agenda?')"></div>
            </div>
          </fieldset>            
        </form>
      </div>
<?php
}

?>
      <?php include("./template/foot.php"); ?>
