<?php
  require_once("./config/ver.php");
  require_once("./template/head.php");
  include("./config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
  date_default_timezone_set('America/Guayaquil');
?>

<div class="container ">
  <form class="normal_form" action="./actions/registrar_oficina.php" method="POST">
    <div class="row text-center" style="text-align:right;background-color:orange;">
      <div class="col-sm-4"><label><?php echo "Usuario:  ".$_SESSION['email'];?></label></div>
      <div class="col-sm-4"><label><?php echo $_SESSION["role"].":  ".$_SESSION['name'];?></label></div>
      <div class="col-sm-4"><label><?php echo "Fecha/Hora: ".date("j/n/Y, h:i A"); ?></label></div>
    </div>
    <p class="normal_linea"><br>SECCION OFICINAS</p>
    <fieldset>
      <legend class="form_title maximus" style="text-align: right;">Creacion de oficinas</legend>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <label>Nombre de Oficina</label>
          <input name="oficina_nombre" class="normal_input_little maximus" required>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
          <input name="guardar_oficina" type="submit" class="btn" value="Guardar" onclick="return confirmar('¿Está seguro que desea guardar esta oficina?')">
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php include("./template/foot.php"); ?>
