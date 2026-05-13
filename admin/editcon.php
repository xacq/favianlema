<?php 
    
    require_once("./config/ver.php");
  include("./config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['actualizar']))
{
       $id = $_GET['id'];
        
    $vara = $_POST['nombre'];
    $varb = $_POST['cedula'];
    $varc = $_POST['telefono'];
    $vard = $_POST['descripcion'];
    $vare = $_POST['propuestas'];
    
    $sql = "UPDATE fav_consultas SET
                    fav_con_nombre = '$vara',
                    fav_con_cedula = '$varb',
                    fav_con_telefono = '$varc',
                    fav_con_observaciones = '$vard',
                    fav_con_alternativas = '$vare'
                    WHERE fav_con_id = '$id'";

    $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $name = $_SESSION['name'];
            $user = $_SESSION['user'];
            $act = "Actualización de Consulta";
            $act = "INSERT INTO fav_actividad(fav_act_id,fav_act_name,fav_act_user,fav_act_fecha,fav_act_descripcion, fav_act_caso) 
                    VALUES ('','$name','$user',current_timestamp(),'$act', '$vara')";
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
elseif (isset($_GET['id']))
{
    $id = $_GET['id'];
    $codigo = "SELECT * FROM fav_consultas WHERE fav_con_id = $id";
    $code_result = mysqli_query($conexion,$codigo);
    $row = mysqli_fetch_array($code_result);

    require_once("./template/head.php");  
    date_default_timezone_set('America/Guayaquil');  

?>

<body id="bodysystem">
    
    <div class="container ">
    <form class="normal_form" method="POST" action="./editcon.php?id=<?php echo $row['fav_con_id'];?>">
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
                  <label class="marca1">Nombre</label>                    
                        <input class="normal_input_big maximus" value="<?php echo $row['fav_con_nombre'];?>" onkeypress="return valideKeys(event);"  name="nombre"  required> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Identificación</label>                    
                        <input class="normal_input_little" value="<?php echo $row['fav_con_cedula'];?>"  name="cedula"  onkeypress="return valideKey(event);"> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Teléfono</label>                   
                        <input class="normal_input_little"  value="<?php echo $row['fav_con_telefono'];?>" name="telefono"  onkeypress="return valideKey(event);"> </div>
            </div>
        </fieldset>    

          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Descripcion del caso consultado</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="descripcion" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row['fav_con_observaciones'];?></textarea>
              </div>
          </fieldset>
            <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Alternativas / Soluciones propuestas</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="propuestas" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row['fav_con_alternativas'];?></textarea>
              </div>
          </fieldset>
          
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input type="submit" name="actualizar"class="btn btn-main" value="Actualizar Consulta" onclick="return confirmar('¿Está seguro que desea guardar esta consulta?')"></div>  
          </form>
      </div>

<?php include("./template/foot.php"); }?>
