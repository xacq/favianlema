<?php   
  require_once("../config/ver.php");
  date_default_timezone_set('America/Guayaquil');  
  include("./template/head.php"); 
  ?>

<div class="container ">
        <form class="normal_form" action="./subir.php" method="POST" enctype="multipart/form-data">
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
          <p class="normal_linea"><br>SECCION ARCHIVOS</p>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Seleccionar documento</legend>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">   
                <label>Seleccione un archivo</label>      
                  <input type="file" name="archivo" class="normal_input_little maximus" required> </div></div>
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">OBSERVACIONES PARA ENVIAR ARCHIVOS</legend>
            <label>  NOTA: Si al cargar un archivo, vuelve a esta seccion, la carga tuvo problemas con: el <mark>tamaño</mark> del archivo (max: 4MB.), 
                el <mark>tipo</mark> de archivo (solo word, excel, pdf, png, jpg o txt) o hubo algun <mark>problema con el servidor</mark>.</label>
            </div></div>

            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
                  <legend class="form_title maximus" style="text-align: right; background-color:orange;">eSTADO DEL ARCHIVO</legend>
                    <label for="scales">  Seleccione "SI" cuando carge el archivo corregido o revisado.</label>
                          <input type="radio" id="contactChoice1" name="revisado" value="no" checked>
                          <label for="contactChoice1">No</label>
                          <input type="radio" id="contactChoice2" name="revisado" value="si">
                          <label for="contactChoice2">Si</label></div></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                <input name="cargar" type="submit" class="btn" value="Cargar" onclick="return confirmar('¿Está seguro que desea cargar este archivo?')"></div>
                </div>
          </fieldset>    
        
        </form>
      </div>
<?php include("./template/foot.php"); ?>