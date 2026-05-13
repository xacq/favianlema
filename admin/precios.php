<?php
  require_once("./config/ver.php");
  require_once("./template/head.php");  
  date_default_timezone_set('America/Guayaquil');  
?>
      <div class="container">

        <form class="normal_form" action="./actions/calculo_honorarios.php" method="POST">
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
          <p class="normal_linea"><br>SECCION HONORARIOS</p>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Ingrese el codigo del cliente</legend>
            <div class="row">
              <div class="col-md-3 col-sm-1 col-xs-1"></div>
              <div class="col-md-6 col-sm-10 col-xs-10">
                  <label >CODIGO</label> 
                  <input name="codigo" class="normal_input_little maximus" onkeypress="return valideKeys(event);" required></div>
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
              <input name="buscar_honorarios" type="submit" class="btn btn-main" value="Buscar"></div>  
            </div>  
          </fieldset>            
          </form>
          </div>
 
<?php include("./template/foot.php"); ?>
