<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  
?>

<?php
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM fav_clientes WHERE fav_cli_id = $id";
    $busqueda = mysqli_query($conexion, $query);
    $row_age = mysqli_fetch_array($busqueda);
?>
      <div class="container ">
        <form class="normal_form" action="./update_codigo.php?id=<?php echo"$id"?>" method="POST">
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
          <p class="normal_linea"><br>SECCION CODIGO</p>
          <legend class="form_title maximus" style="color:black;background-color:orange;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;color:black;background-color:orange;">INGRESE EL nuevo codigo</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >CODIGO ACTUAL</label> <input value="<?php echo $row_age['fav_cli_codigo'] ?>" class="normal_input_little maximus" type="text" disabled> </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <label >CLIENTE</label> <input value="<?php echo $row_age['fav_cli_nombre'] ?>" class="normal_input_little maximus" type="text" disabled> </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <label >NUEVO CODIGO</label> <input name="nuevo_codigo" class="normal_input_little" type="text" required> </div>
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                <input name="actualizar_codigo" type="submit" class="btn" value="Actualizar" onclick="return confirmar('¿Está seguro que desea guardar esta agenda?')"></div>
            </div>
          </fieldset>            
        </form>
      </div>
<?php
}

?>
      <?php include("./template/foot.php"); ?>
