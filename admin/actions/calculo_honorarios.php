<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  
?>
<?php

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['buscar_honorarios']))
{
    $code= $_POST['codigo'];
    //echo"este es el codigo $code";
    $consulta = "SELECT * FROM fav_clientes WHERE fav_cli_codigo = '$code'";
    $honorario = "SELECT * FROM fav_honorarios WHERE fav_hon_codigo = '$code'";
    
    $resultado_honorarios = mysqli_query($conexion, $honorario);
    $resultado_cliente = mysqli_query($conexion, $consulta);
    
    if (mysqli_num_rows($resultado_honorarios) == 1){
    $row = mysqli_fetch_array($resultado_cliente);
    $row_honorarios = mysqli_fetch_array($resultado_honorarios);
?>
    <div class="container">
      <form class="normal_form" action="../edit/update_honorarios.php?id=<?php echo $row_honorarios['fav_hon_id']; ?>"" method="POST">
      <label  style="text-align:right;background-color:orange;"><?php echo "Usuario:  ".$_SESSION['email'];?></label>
          <label  style="text-align:right;background-color:orange;"><?php echo $_SESSION["role"].":  ".$_SESSION['name'];?></label>
      <p class="normal_linea"><br>SECCION HONORARIOS</p>
      <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Informacion del cliente</legend>
              <div class="row">    
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >CODIGO</label> 
                <input name="codigo" value="<?php echo $row_honorarios['fav_hon_codigo'] ?>" class="normal_input_little" disabled required></div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Cliente</label> <input value="<?php echo $row['fav_cli_nombre'] ?>" class="normal_input_little" disabled required></div> 
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Telefono</label> <input value="<?php echo $row['fav_cli_telefono'] ?>" class="normal_input_little" disabled></div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Fecha ingreso</label> <input value="<?php echo $row['fav_cli_fecha_creacion'] ?>" class="normal_input_little" disabled></div> </div>

              <div class="row">    
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>RAZON DEL COBRO</label> 
                  <input  class="normal_input_little" name="razon" value="<?php echo $row_honorarios['fav_hon_razon'] ?>" readonly></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>OTROS</label>
                    <input name="otros" value="<?php echo $row_honorarios['fav_hon_otros'] ?>"class="normal_input_little maximus" readonly></div></div>      

              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Informacion Contable</legend>
                <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                <label>VALOR TOTAL</label> 
                <input value="<?php echo $row_honorarios['fav_hon_total'] ?>"name="total" style="font-size:20px;" class="normal_input_little" placeholder="0.00" id="total" onkeypress="return valideKey(event);" disabled></div></div>
              
                <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca1">ABONO 1</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_1'] ?>" name="abono1" style="font-size:16px;" class="cl marca1 normal_input_little" placeholder="0.00" id="total" onkeypress="return valideKey(event);" ></div>  
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca1">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_1'] ?>"name="fecha_abono1" class=" marca1 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca2">ABONO 2</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_2'] ?>" name="abono2" style="font-size:16px;" class="cl marca2 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);" ></div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca2">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_2'] ?>" name="fecha_abono2" class="marca2 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca3">ABONO 3</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_3'] ?>" name="abono3" style="font-size:16px;" class="cl marca3 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca3">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_3'] ?>" name="fecha_abono3" class="marca3 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca4">ABONO 4</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_4'] ?>" name="abono4" style="font-size:16px;" class="cl marca4 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca4">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_3'] ?>" name="fecha_abono4" class="marca4 normal_input_little" type="date"></div>  
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label class="marca">CANCELADO     </label>
                    <input value="<?php echo $row_honorarios['fav_hon_cancelado'] ?>" name="cancelado" id="sumAll" style="font-size:20px; background-color:orange"  class="normal_input_little" placeholder="0.00" disabled></div> 
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
              <input name="actualizar_honorarios" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"type="submit" class="btn btn-main" value="Actualizar"></div>  
            </div>
          </fieldset>            
          </form>
      </div>
    </div>
<?php
    }  
    else{
      echo "<script>alert('No existe el archivo')</script>";
    }
}
else if  (isset($_GET['id'])){

    $code = $_GET['id'];
    $consulta = "SELECT * FROM fav_clientes WHERE fav_cli_codigo = '$code'";
    $honorario = "SELECT * FROM fav_honorarios WHERE fav_hon_codigo = '$code'";
    
    $resultado_honorarios = mysqli_query($conexion, $honorario);
    $resultado_cliente = mysqli_query($conexion, $consulta);
    
    if (mysqli_num_rows($resultado_honorarios) == 1){
    $row = mysqli_fetch_array($resultado_cliente);
    $row_honorarios = mysqli_fetch_array($resultado_honorarios);
?>
<div class="container">
      <form class="normal_form" action="../edit/update_honorarios.php?id=<?php echo $row_honorarios['fav_hon_id']; ?>" method="POST">
      <p class="normal_linea"><br>SECCION HONORARIOS</p>
      <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Informacion del cliente</legend>
              <div class="row">    
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >CODIGO</label> 
                <input name="codigo" value="<?php echo $row_honorarios['fav_hon_codigo'] ?>" class="normal_input_little" disabled ></div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Cliente</label> <input value="<?php echo $row['fav_cli_nombre'] ?>" class="normal_input_little" disabled ></div> 
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Telefono</label> <input value="<?php echo $row['fav_cli_telefono'] ?>" class="normal_input_little" disabled></div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Fecha ingreso</label> <input value="<?php echo $row['fav_cli_fecha_creacion'] ?>" class="normal_input_little" disabled></div> </div>
              
              <div class="row">    
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>RAZON DEL COBRO</label> 
                  <input  class="normal_input_little" disabled></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>OTROS</label>
                    <input name="otros" class="normal_input_little maximus"></div></div>      

              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Informacion Contable</legend>
                <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                <label>VALOR TOTAL</label> 
                <input value="<?php echo $row_honorarios['fav_hon_total'] ?>"name="total" style="font-size:20px;" class="normal_input_little" placeholder="0.00" id="total" onkeypress="return valideKey(event);" disabled></div></div>
              
                <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca1">ABONO 1</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_1'] ?>" name="abono1" style="font-size:16px;" class="cl marca1 normal_input_little" placeholder="0.00" id="total" onkeypress="return valideKey(event);" ></div>  
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca1">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_1'] ?>"name="fecha_abono1" class=" marca1 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca2">ABONO 2</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_2'] ?>" name="abono2" style="font-size:16px;" class="cl marca2 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);" ></div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca2">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_2'] ?>" name="fecha_abono2" class="marca2 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca3">ABONO 3</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_3'] ?>" name="abono3" style="font-size:16px;" class="cl marca3 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca3">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_3'] ?>" name="fecha_abono3" class="marca3 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca4">ABONO 4</label> 
                <input onChange="suma();" value="<?php echo $row_honorarios['fav_hon_abo_4'] ?>" name="abono4" style="font-size:16px;" class="cl marca4 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca4">Fecha</label> 
                  <input value="<?php echo $row_honorarios['fav_hon_fecha_3'] ?>" name="fecha_abono4" class="marca4 normal_input_little" type="date"></div>  
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label class="marca">CANCELADO     </label>
                    <input id="sumAll"style="font-size:20px; background-color:orange"  class="normal_input_little" placeholder="0.00" disabled></div> 
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
              <input name="actualizar_honorarios" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"type="submit" class="btn btn-main" value="Actualizar"></div>  
            </div>
          </fieldset>            
          </form>
      </div>
    </div>
<?php
    }  
  }
else{
    session_start();
    session_destroy();
    header("location:../../login.php");
}
?>
<?php include("./template/foot.php"); ?>
