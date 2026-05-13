<?php
  require_once("./config/ver.php");
  require_once("./template/head.php");  
  date_default_timezone_set('America/Guayaquil');  
?>

<?php   
  if (isset($_GET['id'])){
    $id = $_GET['id'];
?>
     
      <div class="container">
      <form class="normal_form" action="./actions/registrar_honorarios.php?id=<?php echo "$id"?>" method="POST">
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
      <p class="normal_linea"><br>SECCION HONORARIOS</p>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Informacion del cliente</legend>
              <div class="row">    
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label style="font-size:20px;"  >CODIGO</label> 
                <input style="font-size:20px;"  value="<?php echo "$id"?>" name="codigo" class="normal_input_little maximus"  disabled></div></div>
              
              <div class="row">    
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label style="font-size:20px;" >RAZON</label> 
                    <select style="font-size:20px;" class="normal_input_little" name="razon"  onchange="carga(this);" required> 
                    	<option value="">Seleccione una opción</option>
                        <option value="consultas">Consultas</option>
                        <option value="contratos">Contratos</option>
                        <option value="actas">Actas</option>
                        <option value="certificados">Certificados</option>
                        <option value="declaraciones">Declaraciones</option>
                        <option value="minutas">Minutas</option>
                        <oficio value="oficio">Oficio</option>
                        <option value="boleta">Boleta</option>
                        <option value="llamadas">Llamadas</option>
                        <option value="Otros">Otros</option></select></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label style="font-size:20px;" >OTROS</label>
                    <input style="font-size:20px;" name="otros" class="normal_input_little maximus"></div></div>      

              <legend class="form_title maximus" style="text-align: right;">Informacion Contable</legend>
                <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                <label style="font-size:25px;" >VALOR</label> 
                <input name="total" style="font-size:25px;" class="normal_input_little" placeholder="0.00" id="total" onkeypress="return valideKey(event);" required></div></div><br>
              
                <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label style="font-size:25px;" class="marca1">ABONO 1</label> 
                <input  style="font-size:20px;"  onChange="suma();" name="abono1" style="font-size:16px;" class="cl marca4 normal_input_little" placeholder="0.00" id="total" onkeypress="return valideKey(event);" ></div>  
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label style="font-size:20px;" class="marca1">Fecha 1</label> 
                  <input style="font-size:20px;" name="fecha_abono1" class=" marca4 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label style="font-size:25px;" class="marca1">ABONO 2</label> 
                <input  style="font-size:20px;" onChange="suma();" name="abono2" style="font-size:16px;" class="cl marca4 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);" ></div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label style="font-size:20px;" class="marca1">Fecha 2</label> 
                  <input style="font-size:20px;" name="fecha_abono2" class="marca4 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label style="font-size:25px;" class="marca1">ABONO 3</label> 
                <input style="font-size:20px;"  onChange="suma();" name="abono3" style="font-size:16px;" class="cl marca4 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label style="font-size:20px;" class="marca1">Fecha 3</label> 
                  <input style="font-size:20px;" name="fecha_abono3" class="marca4 normal_input_little" type="date"></div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                <label style="font-size:25px;" class="marca1">ABONO 4</label> 
                <input style="font-size:20px;"  onChange="suma();" name="abono4" style="font-size:16px;" class="cl marca4 normal_input_little" placeholder="0.00" onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label style="font-size:20px;" class="marca1">Fecha 4</label> 
                  <input style="font-size:20px;" name="fecha_abono4" class="marca4 normal_input_little" type="date"></div>  
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label style="font-size:22px;">CANCELADO</label>
                    <input  style="font-size:20px;" id="sumAll" style="font-size:20px; background-color:orange"  class="normal_input_little" placeholder="CLICK PARA CALCULAR" name="cancelado"></div> 
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
              <input name="guardar_honorarios" onclick="return confirmar('¿Está seguro que desea guardar el registro?')"type="submit" class="btn btn-main" value="Guardar"></div>  
            </div>
          </fieldset>            
          </form>
      </div>
    </div>
<?php
}

?>

      <?php include("./template/foot.php"); ?>