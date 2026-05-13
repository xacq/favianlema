<?php 
require_once("./config/ver.php");
include("./config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['consulta']))
{
    $vara = $_POST['nombre'];
    $varb = $_POST['cedula'];
    $varc = $_POST['telefono'];
    $vard = $_POST['descripcion'];
    $vare = $_POST['propuestas'];
    $sql = "INSERT INTO fav_consultas(fav_con_nombre, fav_con_cedula, fav_con_telefono, fav_con_observaciones, fav_con_alternativas, fav_con_fecha) 
    VALUES ('$vara','$varb','$varc','$vard','$vare',current_timestamp())";
    $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $name = $_SESSION['name'];
            $user = $_SESSION['user'];
            $act = "Creación de Consulta";
            $act = "INSERT INTO fav_actividad(fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
                    VALUES ('$name','$user',current_timestamp(),'$act', '$vara')";
            $resact = mysqli_query($conexion, $act);        
            echo '<script>alert("FELICIDADES...! \nCONSULTA GUARDADA CORRECTAMENTE.")</script>';
            unset($_POST['consulta']);
            echo '<script>window.location="./listcon.php"</script>';
        }
        else{
            echo '<script>alert("OOPS...! \nERROR AL CREAR LA CONSULTA.")</script>';
            unset($_POST['consulta']);
            echo '<script>window.location="./listcon.php"</script>';
        }
}

else{

  require_once("./template/head.php");  
  date_default_timezone_set('America/Guayaquil');  

?>

<body id="bodysystem">
    
    <div class="container ">
    <form class="normal_form" method="POST" action="./consulta.php">
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
        <p class="normal_linea"><br>SECCION CONSULTAS</p>
        <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Datos de la Consulta</legend>
            <div class="row">  
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label class="marca1">Nombre</label>                    <input class="normal_input_big maximus"  onkeypress="return valideKeys(event);"  name="nombre"  required> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Identificación</label>                    <input class="normal_input_little"   name="cedula"  onkeypress="return valideKey(event);"> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Teléfono</label>                   <input class="normal_input_little"   name="telefono"  onkeypress="return valideKey(event);"> </div>
            </div>
        </fieldset>    

          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Descripcion del caso consultado</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="descripcion" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"></textarea>
              </div>
          </fieldset>
            <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Alternativas / Soluciones propuestas</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="propuestas" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"></textarea>
              </div>
          </fieldset>
          
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input type="submit" name="consulta"class="btn btn-main" value="Guardar Consulta" onclick="return confirmar('¿Está seguro que desea guardar esta consulta?')"></div>  
          </form>
      </div>

<?php include("./template/foot.php"); }?>
