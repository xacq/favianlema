<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  
include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $codigo = "SELECT * FROM fav_login WHERE fav_log_id = $id";
    $code_result = mysqli_query($conexion,$codigo);
    $row = mysqli_fetch_array($code_result);

?>
      <div class="container ">
        <form class="normal_form" action="./update_usuarios.php?id=<?php echo $row['fav_log_id'];?>" method="POST">
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
            <legend class="form_title maximus" style="text-align: right; background-color:orange;">Creacion de usuarios</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label>Tareas</label> 
                  <select name="usuario" class="normal_input_little" required> 
                    <option value="<?php echo $row['fav_log_user'];?>" selected="true"><?php echo $row['fav_log_user'];?></option>
					<option value="">Seleccione una opción</option>
                    <option value="0">Administrador</option>
                    <option value="1">Auxiliar de Administrador</option> 
                    <option value="2">Usuario general</option>
                    <option value="3">Administrador de Caja</option></select></div>             
                 <div class="col-md-6 col-sm-12 col-xs-12">  
                <label >Nombre</label> 
                  <input name="nombre" value="<?php echo $row['fav_log_nombre'];?>" class="normal_input_little maximus"  onkeypress="return valideKeys(event);" required> </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">  
                <label >Correo Electronico</label> 
                  <input type="email" value="<?php echo $row['fav_log_correo'];?>" name="correo" class="normal_input_little" required> </div>                            
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                <input name="actualizar_usuario" type="submit" class="btn" value="Actualizar" onclick="return confirmar('¿Está seguro que desea actualizar este usuario?')"></div>
            </div>

          </fieldset>   
          
          
        </form>
      </div>
<?php } ?>
      <?php include("./template/foot.php"); ?>
