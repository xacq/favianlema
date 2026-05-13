<?php 
require_once("../config/ver.php");
require_once("./template/head.php");  
date_default_timezone_set('America/Guayaquil');  
?>
      <div class="container"> 
        <form class="normal_form" method="POST" action="./mostrar_codigo.php">
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
          <p class="normal_linea"><br>SECCION CLIENTES</p>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Ingrese el codigo actual del cliente</legend>
            <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-1"></div>
              <div class="col-md-6 col-sm-6 col-xs-10">
                  <label >CODIGO</label> 
                  <input name="codigo" class="normal_input_little maximus" onkeypress="return valideKeys(event);" ></div>
            </div>
          </fieldset>       
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input name="buscar_codigo" type="submit" class="btn btn-main" value="BUSCAR"></div>  
          </form>
      </div>
<?php include("./template/foot.php"); ?>
