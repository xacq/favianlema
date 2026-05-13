<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil'); 
  include("../config/db.php");
  mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $codigo = "SELECT fav_cli_codigo FROM fav_clientes WHERE fav_cli_id = $id";
    $code_result = mysqli_query($conexion,$codigo);
    $code_row = mysqli_fetch_array($code_result);
    $code = $code_row[0];
    
    $tipo = "SELECT fav_cli_tipo FROM fav_clientes WHERE fav_cli_id = $id";
    $type_result = mysqli_query($conexion,$tipo);
    $type_row = mysqli_fetch_array($type_result);
    $type = $type_row[0];

    $querycli = "SELECT * FROM fav_clientes WHERE fav_cli_codigo = '$code'";
    $query_cli = mysqli_query($conexion, $querycli);
    $row_cli = mysqli_fetch_array($query_cli);
//---------------------------------------------------SISTEMA DE FAMILIA -------------------------------------------//
    if ($type == "familia"){
        $query = "SELECT * FROM fav_familia WHERE fav_fam_codigo = '$code'";
        $busqueda = mysqli_query($conexion, $query);
        $row_fam = mysqli_fetch_array($busqueda);

        ?>

      <div class="container ">
        <form class="normal_form" action="./update_familia.php?id=<?php echo $row_fam['fav_fam_id']; ?>" method="POST">

            <div class="row" style="background-color:orange;">
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

          <p class="normal_linea"><br>SECCION FAMILIA</p>
          <fieldset>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
              <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Datos del caso</legend>

            <div class="row"><div class="col-md-6 col-sm-6 col-xs-12">
                  <label >CODIGO</label><input  value="<?php echo $row_fam['fav_fam_codigo'];?>" onkeypress="return valideKeys(event);" name="codigo" class="normal_input_little maximus" readonly="readonly"></div></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Nro Proceso</label><input  value="<?php echo $row_fam['fav_fam_proceso'];?>" onkeypress="return valideKeys(event);"  name="proceso" class="normal_input_little maximus"    ></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Juez</label><input  value="<?php echo $row_fam['fav_fam_juez'];?>" name="juez" onkeypress="return valideKeys(event);"  class="normal_input_little maximus"   ></div>
            </div>      

            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca1">Cliente</label> 
                  <select class="normal_input_little"  name="cliente"  disabled > 
                  <option value="<?php echo $row_fam['fav_fam_cliente'];?>" selected="true"><?php echo $row_fam['fav_fam_cliente'];?></option>
                  <option value="Actor">Actor</option>
                  <option value="Demandado">Demandado</option></select>
                </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca1">Nombre</label> 
                <input  value="<?php echo $row_cli['fav_cli_nombre'];?>" class="normal_input_little maximus" onkeypress="return valideKeys(event);"   name="cli_nombre" readonly="readonly"   ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Identificación</label> 
                  <input  value="<?php echo $row_cli['fav_cli_identificacion'];?>" class="normal_input_little"   name="cli_identificacion" onkeypress="return valideKey(event);"  ></div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Teléfono</label> 
                <input  value="<?php echo $row_cli['fav_cli_telefono'];?>" class="normal_input_little"   name="cli_telefono"  onkeypress="return valideKey(event);"  ></div>  
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca3">Contraparte</label> 
                <select class="normal_input_little" name="contra"   > 
                <option value="<?php echo $row_fam['fav_fam_contra'];?>" selected="true"><?php echo $row_fam['fav_fam_contra'];?></option>
                <option value="Actor">Actor</option>
                  <option value="Demandado">Demandado</option></select>
                </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca3">Nombre</label> 
                  <input  value="<?php echo $row_fam['fav_fam_con_nombre'];?>" class="normal_input_little maximus" onkeypress="return valideKeys(event);"  name="con_nombre"   ></div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Identificación</label> 
                <input  value="<?php echo $row_fam['fav_fam_con_identificacion'];?>" class="normal_input_little"  name="con_identificacion"   onkeypress="return valideKey(event);"></div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label >Teléfono</label> 
                <input  value="<?php echo $row_fam['fav_fam_con_telefono'];?>" class="normal_input_little"  name="con_telefono"    onkeypress="return valideKey(event);"></div>  
            </div>    
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Datos del tramite</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Procedimiento</label> 
                    <select  class="normal_input_little" name="procedimiento"   > 
                    <option value="<?php echo $row_fam['fav_fam_procedimiento'];?>" selected="true"><?php echo $row_fam['fav_fam_procedimiento'];?></option>
                    <option value="Ordinario">Ordinario</option>
                      <option value="Sumario">Sumario</option>
                      <option value="Ejecucion">Ejecución</option>
                      <option value="Otros">Otros</option></select>
                </div></div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <label>Acción</label> 
                    <select  class="normal_input_little" name="accion" > 
                      <option value="<?php echo $row_fam['fav_fam_accion'];?>" selected="true"><?php echo $row_fam['fav_fam_accion'];?></option>
                      <option value="Alimentos">Alimentos</option>
                      <option value="Paternidad">Paternidad</option>
                      <option value="Paternidad y Alimentos">Paternidad y Alimentos</option>
                      <option value="Rebaja de Pensiones">Rebaja de Pensiones</option>
                      <option value="Aumento de Pensiones">Aumento de Pensiones</option>
                      <option value="Divorcio por Mutuo">Divorcio por Mutuo</option>
                      <option value="Divorcio Causal">Divorcio Causal</option>
                      <option value="Divorcio Notaria">Divorcio Notaria</option>
                      <option value="Inventario">Inventario</option>
                      <option value="Partición">Partición</option>
                      <option value="Curaduria">Curaduria</option>
                      <option value="Patria Potestad">Patria Potestad</option>
                      <option value="Tenencia">Tenencia</option>
                      <option value="Visitas">Visitas</option>
                      <option value="Otros">Otros</option></select>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otra acción</label> 
                  <input  value="<?php echo $row_fam['fav_fam_acc_otros'];?>" name="acc_otros" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  > </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                <label>Judicatura</label> 
                <select class="normal_input_little" name="judicatura"  >
                  <option value="<?php echo $row_fam['fav_fam_judicatura'];?>" selected="true"><?php echo $row_fam['fav_fam_judicatura'];?></option>
                  <option value="Cuenca">Cuenca</option>
                  <option value="Gualaceo">Gualaceo</option>
                  <option value="Azogues">Azogues</option>
                  <option value="Biblian">Biblian</option>
                  <option value="Cañar">Cañar</option>
                  <option value="El Tambo">El Tambo</option>
                  <option value="La Troncal">La Troncal</option>
                  <option value="Chunchi">Chunchi</option>
                  <option value="Riobamba">Riobamba</option>
                  <option value="Otros">Otros</option></select></div>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otros</label> 
                  <input  value="<?php echo $row_fam['fav_fam_jud_otros'];?>" name="jud_otros" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  > </div>
            </div>  
          </fieldset>

          <fieldset>
          <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Fechas</legend>

            <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
            <label>Fecha Audiencia 1</label> 
            <input  value="<?php echo $row_fam['fav_fam_audiencia1'];?>"  name="audiencia1" class="normal_input_little" type="date" title="Click para escojer una fecha para la primera audiencia.">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <label>Fecha Audiencia 2</label> 
            <input  value="<?php echo $row_fam['fav_fam_audiencia2'];?>" name="audiencia2" class="normal_input_little" type="date" title="Click para escojer una fecha para la primera audiencia.">
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Ingreso</label> 
            <input  value="<?php echo $row_fam['fav_fam_ingreso'];?>" name="ingreso" class="normal_input_little" type="date" title="Click para escojer una fecha de ingreso del caso."> </div> 
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Calificación</label> 
            <input  value="<?php echo $row_fam['fav_fam_calificacion'];?>" name="calificacion" class="normal_input_little" type="date" title="Click para escojer una fecha de calificacion del caso."> </div> 
            </div>

            <div class="row">    
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Contestación</label> 
            <input  value="<?php echo $row_fam['fav_fam_contestacion'];?>" name="contestacion" class="normal_input_little" type="date" title="Click para escojer una fecha de contestación del caso."> </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Reconvensión</label> 
            <input  value="<?php echo $row_fam['fav_fam_reconvencion'];?>" name="reconvencion" class="normal_input_little" type="date" title="Click para escojer una fecha de califireconvensióncacion."> </div> 
            </div>

            <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Inspección Judicial</label> 
            <input  value="<?php echo $row_fam['fav_fam_inspeccion'];?>" name="inspeccion" class="normal_input_little" type="date" title="Click para escojer una fecha de inspeccion judición."> </div> 
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Otros</label> 
            <input  value="<?php echo $row_fam['fav_fam_otros'];?>" name="otros" class="normal_input_little" type="date" title="Click para escojer una fecha otros."> </div> 
            </div>

            <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Resolución</label> 
            <input  value="<?php echo $row_fam['fav_fam_resolucion'];?>" name="resolucion" class="normal_input_little" type="date" title="Click para escojer una fecha para la resolución."> </div> 
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Apelación</label>
            <input  value="<?php echo $row_fam['fav_fam_apelacion'];?>" name="apelacion" class="normal_input_little" type="date" title="Click para escojer una fecha para apelación."> </div> 
            </div>    

            <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
            <label>Casación</label> 
            <input  value="<?php echo $row_fam['fav_fam_casacion'];?>" name="casacion" class="normal_input_little" type="date" title="Click para escojer una fecha para casación."> </div> 
            </div>
          </fieldset>

          <fieldset>
            <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Observaciones</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="observaciones" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row_fam['fav_fam_observaciones'];?></textarea>
              </div>
          </fieldset>
          
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DEL CASO</legend>
            <label for="scales">  Seleccione "si" cuando el caso se ha cerrado, se ha concluido o ya no esta vigente.</label>
              <?php 
                if ($row_cli['fav_cli_estado'] == 'no'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si">
                  <label for="contactChoice2">Si</label>
                <?php 
                } elseif ($row_cli['fav_cli_estado'] == 'si'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no">
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                  <label for="contactChoice2">Si</label>
                <?php
                }?>
            </div></div>

          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input type="submit" name="actualizar_familia" class="btn btn-main" value="Actualizar" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"></div>  
          </form>
        </div>

        <?php

        //---------------------------------------------------SISTEMA DE CIVIL -------------------------------------------//
     }
    elseif ($type == "civil"){
        $query= "SELECT * FROM fav_civil WHERE fav_civ_codigo = '$code'";
        $busqueda = mysqli_query($conexion, $query);
        $row_civ = mysqli_fetch_array($busqueda); 
        ?>
     <div class="container ">
        <form class="normal_form"  action="./update_civil.php?id=<?php echo $row_civ['fav_civ_id']; ?>" method="POST">
            <div class="row" style="background-color:orange;">
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
          <p class="normal_linea"><br>SECCION CIVIL</p>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Datos del caso</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >CODIGO</label> <input value="<?php echo $row_civ['fav_civ_codigo'];?>"  onkeypress="return valideKeys(event);" name="codigo" class="normal_input_little maximus"  readonly="readonly"></div> </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Nro Proceso</label> <input value="<?php echo $row_civ['fav_civ_proceso'];?>" onkeypress="return valideKeys(event);"  class="normal_input_little maximus"   name="proceso">  </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Nombre del Juez</label> 
                  <input value="<?php echo $row_civ['fav_civ_juez'];?>"  class="normal_input_little maximus"  onkeypress="return valideKeys(event);"  name="juez"></div></div>
            <div class="row">  
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca1">Cliente</label> 
                  <select class="normal_input_little"  name="cliente" disabled > 
                    <option value="<?php echo $row_civ['fav_civ_codigo'];?>"><?php echo $row_civ['fav_civ_cliente'];?></option>  
                    <option value="Actor">Actor</option>
                    <option value="Demandado">Demandado</option></select></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca1">Nombre</label>  
                  <input value="<?php echo $row_cli['fav_cli_nombre'];?>" readonly="readonly"   onkeypress="return valideKeys(event);" class="normal_input_little maximus"   name="cli_nombre" > </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Identificación</label>  
                  <input value="<?php echo $row_cli['fav_cli_identificacion'];?>"  class="normal_input_little"   name="cli_identificacion" onkeypress="return valideKey(event);"> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Teléfono</label> 
                  <input value="<?php echo $row_cli['fav_cli_telefono'];?>"  class="normal_input_little"   name="cli_telefono" onkeypress="return valideKey(event);"> </div></div>

            <div class="row">
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <label class="marca3">Contraparte</label> 
                    <select class="normal_input_little"  name="contra" >  
                    <option value="<?php echo $row_civ['fav_civ_contra'];?>"><?php echo $row_civ['fav_civ_contra'];?></option> 
                      <option value="Actor">Actor</option>
                      <option value="Demandado">Demandado</option></select></div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <label class="marca3">Nombre</label> 
                    <input value="<?php echo $row_civ['fav_civ_con_nombre'];?>"  class="normal_input_little maximus"   onkeypress="return valideKeys(event);" name="con_nombre" > </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <label >Identificación</label> 
                    <input value="<?php echo $row_civ['fav_civ_con_identificacion'];?>"  class="normal_input_little"   name="con_identificacion" onkeypress="return valideKey(event);"> </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <label>Teléfono</label> 
                    <input value="<?php echo $row_civ['fav_civ_con_telefono'];?>"  class="normal_input_little"   name="con_telefono" size="15" onkeypress="return valideKey(event);"> </div>
                  </div>

            </fieldset>    
            <fieldset>
              <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Datos del tramite</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label>Trámite</label> 
                  <select class="normal_input_little"  name="tramite" > 
                  <option value="<?php echo $row_civ['fav_civ_tramite'];?>"><?php echo $row_civ['fav_civ_tramite'];?></option> 
                    <option value="Ordinario">Ordinario</option>
                    <option value="Ejecutivo">Ejecutivo</option>
                    <option value="Sumario">Sumario</option>
                    <option value="Ejecución">Ejecución </option>
                    <option value="Monitorio">Monitorio</option>
                    <option value="Otros">Otros</option></select></div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>Acción</label> 
                  <select class="normal_input_little"  name="accion" > 
                  <option value="<?php echo $row_civ['fav_civ_accion'];?>"><?php echo $row_civ['fav_civ_accion'];?></option> 
                    <option value="Letra de Cambio">Letra de Cambio</option>
                    <option value="Pagare">Pagare</option>
                    <option value="Prescripción">Prescripción</option>
                    <option value="Cobro de Dinero">Cobro de Dinero</option>
                    <option value="Reinvindicación">Reinvindicación</option>
                    <option value="Amparo Posesorio">Amparo Posesorio</option>
                    <option value="Nulidad de Contrato">Nulidad de Contrato</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Inquilinato">Inquilinato</option>
                    <option value="Reserva de Dominio">Reserva de Dominio</option>
                    <option value="Mutuo">Mutuo</option>
                    <option value="Otros">Otros</option></select>     
                   </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otra acción</label> 
                  <input value="<?php echo $row_civ['fav_civ_acc_otros'];?>"  name="acc_otros"onkeypress="return valideKeys(event);" class="normal_input_little maximus" > </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>Judicatura</label> 
                  <select class="normal_input_little"  name="judicatura" > 
                  <option value="<?php echo $row_civ['fav_civ_judicatura'];?>"><?php echo $row_civ['fav_civ_judicatura'];?></option> 
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gualaceo">Gualaceo</option>
                    <option value="Azogues">Azogues</option>
                    <option value="Biblian">Biblian</option>
                    <option value="Cañar">Cañar</option>
                    <option value="El Tambo">El Tambo</option>
                    <option value="La Troncal">La Troncal</option>
                    <option value="Chunchi">Chunchi</option>
                    <option value="Riobamba">Riobamba</option>
                    <option value="Otros">Otros</option></select></div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otros</label> 
                  <input value="<?php echo $row_civ['fav_civ_jud_otros'];?>"  name="jud_otros"onkeypress="return valideKeys(event);" class="normal_input_little maximus"   > </div>
            </div>  
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Fechas</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Ingreso</label> 
                  <input value="<?php echo $row_civ['fav_civ_ingreso'];?>"  name="ingreso" class="normal_input_little" type="date" title="Click para escojer una fecha de ingreso del caso."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Calificación</label> 
                  <input value="<?php echo $row_civ['fav_civ_calificacion'];?>"   name="calificacion" class="normal_input_little" type="date" title="Click para escojer una fecha de calificacion del caso."> </div> 
            </div>
            
            <div class="row">    
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Contestación</label> 
                  <input value="<?php echo $row_civ['fav_civ_contestacion'];?>"  name="contestacion" class="normal_input_little" type="date" title="Click para escojer una fecha de contestación del caso."> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Reconvensión</label> 
                  <input value="<?php echo $row_civ['fav_civ_reconvension'];?>"  name="reconvencion" class="normal_input_little" type="date" title="Click para escojer una fecha de califireconvensióncacion."> </div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Inspección Judicial</label> 
                  <input value="<?php echo $row_civ['fav_civ_inspeccion'];?>"  name="inspeccion" class="normal_input_little" type="date" title="Click para escojer una fecha de inspeccion judición."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Otros</label> 
                  <input value="<?php echo $row_civ['fav_civ_otros'];?>"  name="otros" class="normal_input_little" type="date" title="Click para escojer una fecha otros."> </div> 
            </div>
            
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label>Audiencia</label> 
                <input value="<?php echo $row_civ['fav_civ_audiencia'];?>"  name="audiencia" class="normal_input_little" type="date" title="Click para escojer una fecha para la audiencia."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Resolución</label> 
                  <input value="<?php echo $row_civ['fav_civ_resolucion'];?>"  name="resolucion" class="normal_input_little" type="date" title="Click para escojer una fecha para la resolución."> </div> 
            </div>    

            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label>Apelación</label> 
                <input value="<?php echo $row_civ['fav_civ_apelacion'];?>" name="apelacion" class="normal_input_little" type="date" title="Click para escojer una fecha para apelación."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Casación</label> 
                  <input value="<?php echo $row_civ['fav_civ_casacion'];?>" name="casacion" class="normal_input_little" type="date" title="Click para escojer una fecha para casación."> </div> 
            </div>
            </fieldset>

          <fieldset>
            <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Observaciones</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="observaciones" class="normal_textarea normal_input_big maximus"onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row_civ['fav_civ_observaciones'];?> </textarea>
              </div>
          </fieldset>
          
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DEL CASO</legend>
            <label for="scales">  Seleccione "si" cuando el caso se ha cerrado, se ha concluido o ya no esta vigente.</label>
              <?php 
                if ($row_cli['fav_cli_estado'] == 'no'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si">
                  <label for="contactChoice2">Si</label>
                <?php 
                } elseif ($row_cli['fav_cli_estado'] == 'si'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no">
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                  <label for="contactChoice2">Si</label>
                <?php
                }?>
            </div></div>

          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input type="submit" name="actualizar_civil"class="btn btn-main" value="Actualizar" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"></div>  
          </form>
      </div>
    <?php

//---------------------------------------------------SISTEMA DE PENAL -------------------------------------------//
    }elseif ($type == "penal"){
        $query= "SELECT * FROM fav_penal WHERE fav_pen_codigo = '$code'";
        $busqueda = mysqli_query($conexion, $query);
        $row_pen = mysqli_fetch_array($busqueda);

        ?>
          <div class="container ">
        <form class="normal_form" action="./update_penal.php?id=<?php echo $row_pen['fav_pen_id']; ?>" method="POST">
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
          <p class="normal_linea"><br>SECCION PENAL</p>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Datos del caso</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >CODIGO</label> 
                  <input value="<?php echo $row_pen['fav_pen_codigo'];?>" onkeypress="return valideKeys(event);" name="codigo" class="normal_input_little maximus" readonly="readonly"></div>
            </div>
              <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Expediente Fiscal</label> 
                  <input value="<?php echo $row_pen['fav_pen_expediente'];?>" onkeypress="return valideKeys(event);" name="expediente" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label >Nombre del Fiscal</label> 
                  <input value="<?php echo $row_pen['fav_pen_fiscal'];?>" onkeypress="return valideKeys(event);" name="fiscal" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label >Nro Proceso</label> 
                  <input value="<?php echo $row_pen['fav_pen_proceso'];?>" onkeypress="return valideKeys(event);" name="proceso" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label >Nombre del Juez</label> 
                  <input value="<?php echo $row_pen['fav_pen_juez'];?>" onkeypress="return valideKeys(event);" name="juez" class="normal_input_little maximus"  ></div></div>

                  <div class="row">
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="lisclipenal" class="marca1">Cliente</label> 
                    <select name="cliente" class="normal_input_little" disabled  > 
                      <option value="<?php echo $row_pen['fav_pen_cliente'];?>" ><?php echo $row_pen['fav_pen_cliente'];?></option>
                      <option value="P. Victima">P. Victima</option>
                      <option value="P. Victimario">P. Victimario</option></select></div>
                  <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label class="marca1">Nombre</label>  
                  <input value="<?php echo $row_cli['fav_cli_nombre'];?>"  readonly="readonly" onkeypress="return valideKeys(event);"  name="cli_nombre" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">  
                  <label >Identificación</label> 
                  <input value="<?php echo $row_cli['fav_cli_identificacion'];?>"  name="cli_identificacion" class="normal_input_little"    onkeypress="return valideKey(event);"></div>
                  <div class="col-md-6 col-sm-12 col-xs-12">  
                    <label >Teléfono</label> 
                    <input value="<?php echo $row_cli['fav_cli_telefono'];?>"  name="cli_telefono" class="normal_input_little"    onkeypress="return valideKey(event);"></div></div>

                    <div class="row">
                      <div class="col-md-6 col-sm-12 col-xs-12">
                        <label for="lisconpenal" class="marca3">Contraparte</label> 
                        <select name="contra" class="normal_input_little"  > 
                        <option value="<?php echo $row_pen['fav_pen_contra'];?>" ><?php echo $row_pen['fav_pen_contra'];?></option>
                          <option value="P. Victima">P. Victima</option>
                          <option value="P. Victimario">P. Victimario</option></select></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">  
                      <label class="marca3">Nombre</label>  
                      <input value="<?php echo $row_pen['fav_pen_con_nombre'];?>"  name="con_nombre" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  ></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">  
                      <label >Identificación</label> 
                      <input value="<?php echo $row_pen['fav_pen_con_identificacion'];?>"  name="con_identificacion" class="normal_input_little"    onkeypress="return valideKey(event);"></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">  
                        <label >Teléfono</label> 
                        <input value="<?php echo $row_pen['fav_pen_con_telefono'];?>"  name="con_telefono" class="normal_input_little"    onkeypress="return valideKey(event);"></div></div>
              </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Datos del tramite</legend>
            <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                
            <label>Formulación cargos</label> 
            <input class="normal_input_little" value="<?php echo $row_pen['fav_pen_formulacion'];?>"   name="formulacion" type="date" title="Click para escojer fecha de la formulación de cargos." > </div> 
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label>Delito</label> 
                  <select name="delitos" class="normal_input_little" > 
                  <option value="<?php echo $row_pen['fav_pen_delitos'];?>" ><?php echo $row_pen['fav_pen_delitos'];?></option>
                    <option value="Contra la Vida">Contra la Vida</option>
                    <option value="Contra la Integridad Sexual">Contra la Integridad Sexual</option>
                    <option value="Contra Administración Pública">Contra Administración Pública</option>
                    <option value="Tráfico de Migrantes">Tráfico de Migrantes</option>
                    <option value="Extorción">Extorción</option>
                    <option value="Impugnación de Tránsito">Impugnación de Tránsito</option>
                    <option value="Contravensión Penal">Contravensión Penal</option>
                    <option value="Violencia Intrafamiliar">Violencia Intrafamiliar</option>
                    <option value="Robo">Robo</option>
                    <option value="Hurto">Hurto</option>
                    <option value="Lesiones">Lesiones</option>
                    <option value="Injurias">Injurias</option>
                    <option value="Daño Psicológico">Daño Psicológico</option>
                    <option value="Estafa">Estafa</option>
                    <option value="Usura">Usura</option>
                    <option value="Intimidación">Intimidación</option>
                    <option value="Narcotráfico">Narcotráfico</option>
                    <option value="Falsificación">Falsificación</option>
                    <option value="Usurpación">Usurpación</option>
                    <option value="Otros">Otros</option>
                  </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro delito</label> 
                  <input value="<?php echo $row_pen['fav_pen_del_otros'];?>" name="del_otros" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  > </div>

              <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Judicatura</label> 
                  <select name="judicatura" class="normal_input_little"  >
                  <option value="<?php echo $row_pen['fav_pen_judicatura'];?>" ><?php echo $row_pen['fav_pen_judicatura'];?></option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gualaceo">Gualaceo</option>
                    <option value="Azogues">Azogues</option>
                    <option value="Biblian">Biblian</option>
                    <option value="Cañar">Cañar</option>
                    <option value="El Tambo">El Tambo</option>
                    <option value="La Troncal">La Troncal</option>
                    <option value="Chunchi">Chunchi</option>
                    <option value="Riobamba">Riobamba</option>
                    <option value="Otros">Otros</option></select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro</label> 
                  <input value="<?php echo $row_pen['fav_pen_jud_otros'];?>" name="jud_otros" onkeypress="return valideKeys(event);" class="normal_input_little maximus"   > </div>
            </div>  
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Fechas</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Instrucción</label> 
                  <input value="<?php echo $row_pen['fav_pen_instruccion'];?>" name="instruccion" class="normal_input_little" type="date" title="Click para escojer una fecha de la instrucción del caso."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Audiencia Prepara.</label> 
                  <input value="<?php echo $row_pen['fav_pen_preparatoria'];?>" name="preparatoria" class="normal_input_little" type="date" title="Click para escojer una fecha para la audiencia preparatoria."> </div> 
            </div>
            
            <div class="row">    
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Audiencia Tribunal</label> 
                  <input value="<?php echo $row_pen['fav_pen_tribunal'];?>" name="tribunal" class="normal_input_little" type="date" title="Click para escojer una fecha para la audiencia tribunal."> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Sentencia</label> 
                  <input value="<?php echo $row_pen['fav_pen_sentecia'];?>" name="sentencia" class="normal_input_little" type="date" title="Click para escojer una fecha para la sentencia."> </div> 
            </div>
            <div class="row">    
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label>Apelación</label> 
                <input value="<?php echo $row_pen['fav_pen_apelacion'];?>" name="apelacion" class="normal_input_little" type="date" title="Click para escojer una fecha para la audiencia tribunal."> </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label>Casación</label> 
                <input value="<?php echo $row_pen['fav_pen_casacion'];?>" name="casacion" class="normal_input_little" type="date" title="Click para escojer una fecha para la sentencia."> </div> 
          </div>
            </fieldset>

          <fieldset>
            <legend class="form_title maximus" style="text-align: right; background-color: orange; color:black;">Observaciones</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea value="<?php echo $row_pen['fav_pen_jud_otros'];?>" name="observaciones" onkeypress="return valideKeys(event);" class="normal_textarea normal_input_big maximus" rows="40" cols="40"><?php echo $row_pen['fav_pen_observaciones'];?></textarea>
              </div>
          </fieldset>
          
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DEL CASO</legend>
            <label for="scales">  Seleccione "si" cuando el caso se ha cerrado, se ha concluido o ya no esta vigente.</label>
              <?php 
                if ($row_cli['fav_cli_estado'] == 'no'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si">
                  <label for="contactChoice2">Si</label>
                <?php 
                } elseif ($row_cli['fav_cli_estado'] == 'si'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no">
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                  <label for="contactChoice2">Si</label>
                <?php
                }?>
            </div></div>

          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input type="submit" name="actualizar_penal" class="btn btn-main" value="Actualizar"onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"></div>  
          </form>
      </div>
    <?php

//---------------------------------------------------SISTEMA DE CONSTITUCIONAL -------------------------------------------//
    }elseif ($type == "constitucional"){
        $query= "SELECT * FROM fav_constitucional WHERE fav_con_codigo = '$code'";
        $busqueda = mysqli_query($conexion, $query);
        $row_con = mysqli_fetch_array($busqueda);

        ?>
     <div class="container ">
        <form class="normal_form" action="./update_constitucional.php?id=<?php echo $row_con['fav_con_id']; ?>" method="POST">
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
          <p class="normal_linea"><br>SECCION CONSTITUCIONAL</p>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del caso</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >CODIGO</label> 
                  <input value="<?php echo $row_con['fav_con_codigo'];?>"  name="codigo" onkeypress="return valideKeys(event);" class="normal_input_little maximus" readonly="readonly"></div>
            </div>
              <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Nro Proceso</label> 
                  <input value="<?php echo $row_con['fav_con_proceso'];?>"  name="proceso" onkeypress="return valideKeys(event);"  class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Nombre del Juez</label> 
                  <input value="<?php echo $row_con['fav_con_juez'];?>"  name="juez" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  ></div> </div>

                <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca1">Cliente</label> 
                  <select name="cliente" class="normal_input_little" disabled > 
                    <option value="<?php echo $row_con['fav_con_cliente'];?>"><?php echo $row_con['fav_con_cliente'];?></option>
                    <option value="Accionante">Accionante</option>
                    <option value="Accionado">Accionado</option></select></div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca1">Nombre</label> 
                  <input value="<?php echo $row_cli['fav_cli_nombre'];?>"  readonly="readonly" onkeypress="return valideKeys(event);" name="cli_nombre" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Identificación</label> 
                  <input value="<?php echo $row_cli['fav_cli_identificacion'];?>"  name="cli_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>  
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Teléfono</label> 
                  <input value="<?php echo $row_cli['fav_cli_telefono'];?>"  name="cli_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"></div>    
              </div>
              <div class="row">    
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label class="marca3">Contraparte</label> 
                <select name="contra" class="normal_input_little" > 
                  <option value="<?php echo $row_con['fav_con_contra'];?>"><?php echo $row_con['fav_con_contra'];?></option>
                  <option value="Accionante">Accionante</option>
                  <option value="Accionado">Accionado</option></select></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label class="marca3">Nombre</label> 
                  <input value="<?php echo $row_con['fav_con_con_nombre'];?>"  name="con_nombre" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Identificación</label> 
                  <input value="<?php echo $row_con['fav_con_con_identificacion'];?>"  name="con_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>  
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label >Teléfono</label> 
                  <input value="<?php echo $row_con['fav_con_con_telefono'];?>"  name="con_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"></div>      
              </div>   
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del tramite</legend>
              <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Acción</label> 
                    <select name="accion" class="normal_input_little"   > 
                    <option value="<?php echo $row_con['fav_con_accion'];?>"><?php echo $row_con['fav_con_accion'];?></option>
                      <option value="Acción de protección">Acción de protección</option>
                      <option value="Extraordinaria de protección">Extraordinaria de protección</option>
                      <option value="Habeas Corpus">Habeas Corpus</option>
                      <option value="Habeas Data">Habeas Data</option>
                      <option value="Acceso a la información Pública">Acceso a la información Pública</option>
                      <option value="Por Incumplimiento">Por Incumplimiento</option>
                      <option value="De Incumplimiento">De Incumplimiento</option>
                      <option value="Medidas Cautelares">Medidas Cautelares</option>
                      <option value="Otros">Otros</option></select></div>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otra acción</label> 
                  <input value="<?php echo $row_con['fav_con_acc_otros'];?>"  name="acc_otros" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  > </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-12col-xs-12">
                  <label >Judicatura</label> 
                  <select name="judicatura" class="normal_input_little"  > 
                  <option value="<?php echo $row_con['fav_con_judicatura'];?>"><?php echo $row_con['fav_con_judicatura'];?></option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gualaceo">Gualaceo</option>
                    <option value="Azogues">Azogues</option>
                    <option value="Biblian">Biblian</option>
                    <option value="Cañar">Cañar</option>
                    <option value="El Tambo">El Tambo</option>
                    <option value="La Troncal">La Troncal</option>
                    <option value="Chunchi">Chunchi</option>
                    <option value="Riobamba">Riobamba</option>
                    <option value="Otros">Otros</option></select></div>
  
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro</label> 
                  <input value="<?php echo $row_con['fav_con_jud_otros'];?>"  name="jud_otros" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  > </div>
            </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Fechas</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Presentación</label>
                   <input value="<?php echo $row_con['fav_con_presentacion'];?>"  name="presentacion" class="normal_input_little" type="date" title="Click para escojer una fecha de presentacion del caso."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Audiencia</label> 
                  <input value="<?php echo $row_con['fav_con_audiencia'];?>"  name="audiencia" class="normal_input_little" type="date" title="Click para escojer una fecha de audiencia del caso."> </div> 
            </div>
            
            <div class="row">    
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Sentencia</label> 
                  <input value="<?php echo $row_con['fav_con_sentencia'];?>"  name="sentencia" class="normal_input_little" type="date" title="Click para escojer una fecha de sentencia."> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Apelación</label> 
                  <input value="<?php echo $row_con['fav_con_apelacion'];?>"  name="apelacion" class="normal_input_little" type="date" title="Click para escojer una fecha para apelación."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Corte Constitu.</label> 
                  <input value="<?php echo $row_con['fav_con_corte_cons'];?>"  name="corte_cons" class="normal_input_little" type="date" title="Click para escojer una fecha para corte constitucional."> </div>   
            </div>    
            </fieldset>

          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Observaciones</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="observaciones" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row_con['fav_con_observaciones'];?></textarea>
              </div>
          </fieldset>
          
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DEL CASO</legend>
            <label for="scales">  Seleccione "si" cuando el caso se ha cerrado, se ha concluido o ya no esta vigente.</label>
              <?php 
                if ($row_cli['fav_cli_estado'] == 'no'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si">
                  <label for="contactChoice2">Si</label>
                <?php 
                } elseif ($row_cli['fav_cli_estado'] == 'si'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no">
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                  <label for="contactChoice2">Si</label>
                <?php
                }?>
            </div></div>

          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input type="submit" name="actualizar_constitucional" class="btn btn-main" value="Actualizar" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"></div>  
          </form>
      </div>
    <?php

        //---------------------------------------------------SISTEMA DE SENAGUA -------------------------------------------//
    }elseif ($type == "senagua"){
        $query= "SELECT * FROM fav_senagua WHERE fav_sen_codigo = '$code'";
        $busqueda = mysqli_query($conexion, $query);
        $row_sen = mysqli_fetch_array($busqueda);

        ?>
     <div class="container ">
        <form class="normal_form" action="./update_agua.php?id=<?php echo $row_sen['fav_sen_id'];?>" method="POST">
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
          <p class="normal_linea"><br>SECCION SENAGUA</p>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del caso</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >CODIGO</label> 
                  <input value="<?php echo $row_sen['fav_sen_codigo'];?>"  name="codigo" onkeypress="return valideKeys(event);" class="normal_input_little maximus" readonly="readonly"></div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Nro Proceso</label> 
                  <input value="<?php echo $row_sen['fav_sen_proceso'];?>"  name="proceso" onkeypress="return valideKeys(event);" class="normal_input_little maximus"  ></div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="marca1">Cliente</label> 
                  <select class="normal_input_little"   name="cliente" disabled> 
                  <option value="<?php echo $row_sen['fav_sen_cliente'];?>"><?php echo $row_sen['fav_sen_cliente'];?></option>
                    <option value="Solicitante">Solicitante</option>
                    <option value="Opositor">Opositor</option>
                    <option value="Adherente">Adherente</option></select></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label  class="marca1">Nombre</label> 
                  <input value="<?php echo $row_cli['fav_cli_nombre'];?>" readonly="readonly" onkeypress="return valideKeys(event);" class="normal_input_little maximus"   name="cli_nombre" ></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Identificación</label> 
                <input  value="<?php echo $row_cli['fav_cli_identificacion'];?>"  name="cli_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Teléfono</label> 
                <input value="<?php echo $row_cli['fav_cli_telefono'];?>"   name="cli_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"></div>  
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="marca2">Contraparte</label>  
                  <select name="contra" class="normal_input_little"  >
                  <option value="<?php echo $row_sen['fav_sen_contra'];?>"><?php echo $row_sen['fav_sen_contra'];?></option>
                    <option value="Solicitante">Solicitante</option>
                    <option value="Opositor">Opositor</option>
                    <option value="Adherente">Adherente</option></select></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label  class="marca2">Nombre</label> 
                <input value="<?php echo $row_sen['fav_sen_con_nombre'];?>" onkeypress="return valideKeys(event);" name="con_nombre" class="normal_input_little maximus"  ></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Identificación</label> 
                <input  value="<?php echo $row_sen['fav_sen_con_con_identificacion'];?>" name="con_identificacion" class="normal_input_little" onkeypress="return valideKey(event);"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Teléfono</label> 
                <input  value="<?php echo $row_sen['fav_sen_con_telefono'];?>"  name="con_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"></div>  
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="marca3">Terceros</label> 
                  <select name="terceros" class="normal_input_little" >
                  <option value="<?php echo $row_sen['fav_sen_terceros'];?>"><?php echo $row_sen['fav_sen_terceros'];?></option>
                    <option value="Solicitante">Solicitante</option>
                    <option value="Opositor">Opositor</option>
                    <option value="Adherente">Adherente</option></select></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="marca3">Nombre</label> 
                <input  value="<?php echo $row_sen['fav_sen_ter_nombre'];?>" onkeypress="return valideKeys(event);" name="ter_nombre" class="normal_input_little maximus"  ></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Identificación</label> 
                <input value="<?php echo $row_sen['fav_sen_ter_identificacion'];?>"   name="ter_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>  
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Teléfono</label> 
                <input  value="<?php echo $row_sen['fav_sen__ter_telefono'];?>"  name="ter_telefono" class="normal_input_little"  onkeypress="return valideKey(event);" ></div> 
            </div>
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del tramite</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label>Trámite</label> 
                  <select  name="tramite" class="normal_input_little" >
                  <option value="<?php echo $row_sen['fav_sen_tramite'];?>"><?php echo $row_sen['fav_sen_tramite'];?></option> 
                    <option value="Autorización">Autorización</option>
                    <option value="Cancelación">Cancelación</option>
                    <option value="Reversión">Reversión</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Renovación">Renovación</option>
                    <option value="Renov. y Transfer.">Renov. y Transfer.</option>
                    <option value="Sustitución">Sustitución</option>
                    <option value="Aprobación Obras">Aprobación Obras</option>
                    <option value="Otros">Otros</option></select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro trámite</label> 
                  <input value="<?php echo $row_sen['fav_sen_tra_otros'];?>" onkeypress="return valideKeys(event);" name="tra_otros" class="normal_input_little maximus"  > </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <label>Uso</label> 
                  <select  name="uso" class="normal_input_little"  > 
                  <option value="<?php echo $row_sen['fav_sen_tramite'];?>"><?php echo $row_sen['fav_sen_tramite'];?></option> 
                    <option value="Autorización">Consumo Humano</option>
                    <option value="Cancelación">Riego</option>
                    <option value="Reversión">Abrevadero</option>
                    <option value="Transferencia">Cons., Rieg. y Abre.</option>
                    <option value="Renovación">Industrial</option>
                    <option value="Renov. y Transfer.">Comercial</option>
                    <option value="Otros">Otros</option></select>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro uso</label> 
                  <input value="<?php echo $row_sen['fav_sen_uso_otros'];?>" onkeypress="return valideKeys(event);" name="uso_otros" class="normal_input_little maximus"   > </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>Parroquia</label> 
                  <select  name="parroquia" class="normal_input_little" > 
                  <option value="<?php echo $row_sen['fav_sen_parroquia'];?>"><?php echo $row_sen['fav_sen_parroquia'];?></option> 
                    <option value="Ingapirca">Ingapirca</option>
                    <option value="Don Antonio">Don Antonio</option>
                    <option value="Honorato Vasquez">Honorato Vasquez</option>
                    <option value="Juncal">Juncal</option>
                    <option value="La Troncal">La Troncal</option>
                    <option value="Cañar">Cañar</option>
                    <option value="Ventura">Ventura</option>
                    <option value="Chunchi">Chunchi</option>
                    <option value="Suscal">Suscal</option>
                    <option value="El Támbo">El Támbo</option>
                    <option value="Ducur">Ducur</option>
                    <option value="Chorocopte">Chorocopte</option>
                    <option value="General Morales">General Morales</option>
                    <option value="Chontamarca">Chontamarca</option>
                    <option value="Gualleturo">Gualleturo</option>
                    <option value="Otros">Otros</option></select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro</label> 
                  <input value="<?php echo $row_sen['fav_sen_par_otros'];?>" onkeypress="return valideKeys(event);" name="par_otros" class="normal_input_little maximus"  > </div>
            </div>  
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Fechas</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Calificación</label>
                   <input value="<?php echo $row_sen['fav_sen_calificacion'];?>"  name="calificacion" class="normal_input_little" type="date" title="Click para escojer una fecha de calificacion del caso."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Oposición</label> 
                  <input value="<?php echo $row_sen['fav_sen_oposicion'];?>"  name="oposicion" class="normal_input_little" type="date" title="Click para escojer una fecha de oposición del caso."> </div> 
            </div>
            
            <div class="row">    
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Comisiones</label> 
                  <input value="<?php echo $row_sen['fav_sen_comisiones'];?>"  name="comisiones" class="normal_input_little" type="date" title="Click para escojer una fecha de comisiones del caso."> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Publicación</label> 
                  <input value="<?php echo $row_sen['fav_sen_publicacion'];?>"  name="publicacion" class="normal_input_little" type="date" title="Click para escojer una fecha de publicación."> </div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Inspección</label> 
                  <input value="<?php echo $row_sen['fav_sen_inspeccion'];?>"   name="inspeccion" class="normal_input_little" type="date" title="Click para escojer una fecha de inspeccion."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Audiencia</label>
                  <input value="<?php echo $row_sen['fav_sen_audiencia'];?>"  name="audiencia" class="normal_input_little" type="date" title="Click para escojer una fecha audiencia."> </div> 
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Prueba</label> 
                  <input value="<?php echo $row_sen['fav_sen_prueba'];?>"  name="prueba" class="normal_input_little" type="date" title="Click para escojer una fecha para la prueba."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Resolución</label> 
                  <input value="<?php echo $row_sen['fav_sen_resolucion'];?>"  name="resolucion" class="normal_input_little" type="date" title="Click para escojer una fecha para resolucion."> </div> 
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <label>Apelación</label> 
                    <input  value="<?php echo $row_sen['fav_sen_apelacion'];?>"  name="apelacion" class="normal_input_little" type="date" title="Click para escojer una fecha para la apelacion."> </div> 
            </div>    
            </fieldset>

          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Observaciones</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea  name="observaciones" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row_sen['fav_sen_observaciones'];?></textarea>
              </div>
          </fieldset>

          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DEL CASO</legend>
            <label for="scales">  Seleccione "si" cuando el caso se ha cerrado, se ha concluido o ya no esta vigente.</label>
              <?php 
                if ($row_cli['fav_cli_estado'] == 'no'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si">
                  <label for="contactChoice2">Si</label>
                <?php 
                } elseif ($row_cli['fav_cli_estado'] == 'si'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no">
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                  <label for="contactChoice2">Si</label>
                <?php
                }?>
            </div></div>

            <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
              <input type="submit" name="actualizar_agua" class="btn btn-main" value="Actualizar" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"></div>            
          </form>
      </div>
    <?php

//---------------------------------------------------SISTEMA DE SUBTIERRAS -------------------------------------------//
    }elseif ($type == "subtierras"){
        $query= "SELECT * FROM fav_subtierras WHERE fav_sub_codigo = '$code'";
        $busqueda = mysqli_query($conexion, $query);
        $row_sub = mysqli_fetch_array($busqueda);

        ?>
        <div class="container ">
        <form class="normal_form" action="./update_subtierras.php?id=<?php echo $row_sub['fav_sub_id'];?>" method="POST"> 
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
          <p class="normal_linea"><br>SECCION SUBSECRETARIA DE TIERRAS Y GADS MUNICIPALES</p>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del caso</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >CODIGO</label> 
                  <input value="<?php echo $row_sub['fav_sub_codigo'];?>" onkeypress="return valideKeys(event);" name="codigo" class="maximus normal_input_little maximus"  readonly="readonly"  ></div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Nro Proceso</label> 
                  <input value="<?php echo $row_sub['fav_sub_proceso'];?>" onkeypress="return valideKeys(event);" name="proceso" class="normal_input_little maximus"  ></div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="marca">Solicitante</label>  
                <input value="<?php echo $row_cli['fav_cli_nombre'];?>" readonly="readonly" onkeypress="return valideKeys(event);" name="solicitante" class="normal_input_little maximus"   ></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Identificación</label> 
                <input value="<?php echo $row_cli['fav_cli_identificacion'];?>"  name="sol_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">  
                <label >Teléfono</label> 
                <input value="<?php echo $row_cli['fav_cli_telefono'];?>"  name="sol_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"> </div>
              </div>  
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="marca">Opositor</label>  
                  <input value="<?php echo $row_sub['fav_sub_opositor'];?>" onkeypress="return valideKeys(event);" name="opositor" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Identificación</label> 
                  <input value="<?php echo $row_sub['fav_sub_opo_identificacion'];?>"  name="opo_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">  
                  <label >Teléfono</label> 
                  <input value="<?php echo $row_sub['fav_sub_opo_telefono'];?>"  name="opo_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"> </div>
                </div>  
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del tramite</legend>
            <div class="row">
              
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Parroquia</label> 
                  <select name="parroquia" class="normal_input_little" > 
                    <option value="<?php echo $row_sub['fav_sub_parroquia'];?>"><?php echo $row_sub['fav_sub_parroquia'];?></option> 
                    <option value="Ingapirca">Ingapirca</option>
                    <option value="Patria Potestad">Don Antonio</option>
                    <option value="Honorato Vasquez">Honorato Vasquez</option>
                    <option value="Juncal">Juncal</option>
                    <option value="La Troncal">La Troncal</option>
                    <option value="Cañar">Cañar</option>
                    <option value="Ventura">Ventura</option>
                    <option value="Chunchi">Chunchi</option>
                    <option value="Suscal">Suscal</option>
                    <option value="El Támbo">El Támbo</option>
                    <option value="Ducur">Ducur</option>
                    <option value="Chorocopte">Chorocopte</option>
                    <option value="General Morales">General Morales</option>
                    <option value="Chontamarca">Chontamarca</option>
                    <option value="Gualleturo">Gualleturo</option>
                    <option value="Otros">Otros</option></select>  </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro</label> 
                  <input value="<?php echo $row_sub['fav_sub_par_otros'];?>" onkeypress="return valideKeys(event);" name="par_otros" class="normal_input_little maximus"   > </div>
              
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label for="listramtierras">Trámite</label> 
                  <select name="tramite" class="normal_input_little"  >
                    <option value="<?php echo $row_sub['fav_sub_tramite'];?>"><?php echo $row_sub['fav_sub_tramite'];?></option> 
                    <option value="Legalización Rural">Legalización Rural</option>
                    <option value="Legalización">Legalización</option>
                    <option value="Urbano">Urbano</option>
                    <option value="Fraccionamiento">Fraccionamiento</option>
                    <option value="Linea de Fabrica">Linea de Fabrica</option>
                    <option value="Otros">Otros</option></select>  </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro</label> 
                  <input value="<?php echo $row_sub['fav_sub_tra_otros'];?>" onkeypress="return valideKeys(event);" name="tra_otros" class="normal_input_little maximus" > </div></div>

          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Fechas</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Ingreso a Revisión</label> 
                  <input value="<?php echo $row_sub['fav_sub_revision'];?>"  name="revision"class="normal_input_little" type="date" title="Click para escojer una fecha para la revision."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Fecha de Aprobación</label> 
                  <input value="<?php echo $row_sub['fav_sub_aprobacion'];?>"  name="aprobacion" class="normal_input_little" type="date" title="Click para escojer una fecha para la aprobacion."> </div> 
            </div>
            
            <div class="row">    
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Matricula</label> 
                  <input value="<?php echo $row_sub['fav_sub_matricula'];?>"  name="matricula" class="normal_input_little" type="date" title="Click para escojer una fecha la matriculacion."> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Inspección</label>
                  <input value="<?php echo $row_sub['fav_sub_inspeccion'];?>"  name="inspeccion" class="normal_input_little" type="date" title="Click para escojer una fecha para inspeccion."> </div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Primer pago</label> 
                  <input value="<?php echo $row_sub['fav_sub_pago1'];?>"  name="pago1" class="normal_input_little" type="date" title="Click para escojer una fecha para primer pago."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Segundo Pago</label>
                   <input value="<?php echo $row_sub['fav_sub_pago2'];?>"  name="pago2" class="normal_input_little" type="date" title="Click para escojer una fecha para segundo pago."> </div> 
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Adjudicación</label> 
                  <input value="<?php echo $row_sub['fav_sub_adjudicacion'];?>"  name="adjudicacion" class="normal_input_little" type="date" title="Click para escojer una fecha para la adjudicacion."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Registro de propiedad</label> 
                  <input value="<?php echo $row_sub['fav_sub_registro_propiedad'];?>"  name="registro_propiedad" class="normal_input_little" type="date" title="Click para escojer una fecha para registro."> </div> 
            </div>    

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Entrega</label> 
                  <input value="<?php echo $row_sub['fav_sub_entrega'];?>" name="entrega" class="normal_input_little" type="date" title="Click para escojer una fecha para entrega."> </div> 
            </div>
            </fieldset>

          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Observaciones</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="observaciones" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row_sub['fav_sub_observaciones'];?></textarea>
              </div>
          </fieldset>
          
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DEL CASO</legend>
            <label for="scales">  Seleccione "si" cuando el caso se ha cerrado, se ha concluido o ya no esta vigente.</label>
              <?php 
                if ($row_cli['fav_cli_estado'] == 'no'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si">
                  <label for="contactChoice2">Si</label>
                <?php 
                } elseif ($row_cli['fav_cli_estado'] == 'si'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no">
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                  <label for="contactChoice2">Si</label>
                <?php
                }?>
            </div></div>

          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input name="actualizar_subtierras" type="submit" class="btn btn-main" value="Actualizar" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"></div>  
          </form>
      </div>
    <?php

//---------------------------------------------------SISTEMA DE VARIOS -------------------------------------------//
    }elseif ($type == "varios"){
        $query= "SELECT * FROM fav_varios WHERE fav_var_codigo = '$code'";
        $busqueda = mysqli_query($conexion, $query);
        $row_var = mysqli_fetch_array($busqueda);

        ?>
    <div class="container ">
        <form class="normal_form" action="./update_varios.php?id=<?php echo $row_var['fav_var_id'];?>" method="POST"> 
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
          <p class="normal_linea"><br>SECCION VARIOS</p>
          <legend class="form_title maximus" style="background-color: orange; color:black;">ACTUALIZACION</legend>
          <fieldset>
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >CODIGO</label> 
                  <input value="<?php echo $row_var['fav_var_codigo'];?>" onkeypress="return valideKeys(event);" name="codigo" class="normal_input_little maximus"  readonly="readonly" ></div>
            </div>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del caso</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Nro Proceso</label> 
                  <input value="<?php echo $row_var['fav_var_proceso'];?>" onkeypress="return valideKeys(event);" name="proceso" class="normal_input_little maximus"  ></div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="marca">Solicitante</label>  
                <input value="<?php echo $row_cli['fav_cli_nombre'];?>" readonly="readonly" onkeypress="return valideKeys(event);" name="solicitante" class="normal_input_little maximus"   ></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label >Identificación</label> 
                <input value="<?php echo $row_cli['fav_cli_identificacion'];?>"  name="sol_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">  
                <label >Teléfono</label> 
                <input value="<?php echo $row_cli['fav_cli_telefono'];?>"  name="sol_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"> </div>
              </div>  
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="marca">Opositor</label>  
                  <input value="<?php echo $row_var['fav_var_opositor'];?>" onkeypress="return valideKeys(event);" name="opositor" class="normal_input_little maximus"  ></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Identificación</label> 
                  <input value="<?php echo $row_var['fav_var_opo_identificacion'];?>"  name="opo_identificacion" class="normal_input_little"   onkeypress="return valideKey(event);"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">  
                  <label >Teléfono</label> 
                  <input value="<?php echo $row_var['fav_var_opo_telefono'];?>"  name="opo_telefono" class="normal_input_little"   onkeypress="return valideKey(event);"> </div>
                </div>  
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Datos del tramite</legend>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label for="listramtierras">Trámite</label> 
                  <select name="tramite" class="normal_input_little">
                  <option value="<?php echo $row_var['fav_var_tramite'];?>"><?php echo $row_var['fav_var_tramite'];?></option>
                    <option value="Legalización Rural">Legalización Rural</option>
                    <option value="Legalización">Legalización</option>
                    <option value="Urbano">Urbano</option>
                    <option value="Fraccionamiento">Fraccionamiento</option>
                    <option value="Linea de Fabrica">Linea de Fabrica</option>
                    <option value="Otros">Otros</option></select>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro</label> <input value="<?php echo $row_var['fav_var_tra_otros'];?>" onkeypress="return valideKeys(event);" name="tra_otros" class="normal_input_little maximus" > </div>
 
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Judicatura</label> 
                  <select name="parroquia" class="normal_input_little"  > 
                    <option value="<?php echo $row_var['fav_var_parroquia'];?>"><?php echo $row_var['fav_var_parroquia'];?></option>
                    <option value="Ingapirca">Ingapirca</option>
                    <option value="Patria Potestad">Don Antonio</option>
                    <option value="Honorato Vasquez">Honorato Vasquez</option>
                    <option value="Juncal">Juncal</option>
                    <option value="La Troncal">La Troncal</option>
                    <option value="Cañar">Cañar</option>
                    <option value="Ventura">Ventura</option>
                    <option value="Chunchi">Chunchi</option>
                    <option value="Suscal">Suscal</option>
                    <option value="El Támbo">El Támbo</option>
                    <option value="Ducur">Ducur</option>
                    <option value="Chorocopte">Chorocopte</option>
                    <option value="General Morales">General Morales</option>
                    <option value="Chontamarca">Chontamarca</option>
                    <option value="Gualleturo">Gualleturo</option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gualaceo">Gualaceo</option>
                    <option value="Azogues">Azogues</option>
                    <option value="Biblian">Biblian</option>
                    <option value="Cañar">Cañar</option>
                    <option value="El Tambo">El Tambo</option>
                    <option value="La Troncal">La Troncal</option>
                    <option value="Chunchi">Chunchi</option>
                    <option value="Riobamba">Riobamba</option>
                    <option value="Otros">Otros</option></select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label >Otro</label> <input value="<?php echo $row_var['fav_var_par_otros'];?>" onkeypress="return valideKeys(event);" name="par_otros" class="normal_input_little maximus" > </div>
          </fieldset>

            <fieldset>
              <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Fechas</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Ingreso a Revisión</label> 
                  <input value="<?php echo $row_var['fav_var_revision'];?>"  name="revision" class="normal_input_little" type="date" title="Click para escojer una fecha de ingreso del caso."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Fecha de Aprobación</label>
                   <input value="<?php echo $row_var['fav_var_aprobacion'];?>"  name="aprobacion" class="normal_input_little" type="date" title="Click para escojer una fecha de calificacion del caso."> </div> 
            </div>
            
            <div class="row">    
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Matricula</label> 
                  <input value="<?php echo $row_var['fav_var_matricula'];?>"  name="matricula" class="normal_input_little" type="date" title="Click para escojer una fecha de contestación del caso."> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Inspección</label>
                   <input value="<?php echo $row_var['fav_var_inspeccion'];?>"  name="inspeccion" class="normal_input_little" type="date" title="Click para escojer una fecha de califireconvensióncacion."> </div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Primer pago</label>
                   <input value="<?php echo $row_var['fav_var_pago1'];?>"  name="pago1" class="normal_input_little" type="date" title="Click para escojer una fecha de inspeccion judición."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Segundo Pago</label>
                   <input value="<?php echo $row_var['fav_var_pago2'];?>"  name="pago2" class="normal_input_little" type="date" title="Click para escojer una fecha otros."> </div> 
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Adjudicación</label> 
                  <input value="<?php echo $row_var['fav_var_adjudicacion'];?>"  name="adjudicacion" class="normal_input_little" type="date" title="Click para escojer una fecha para la resolución."> </div> 
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Registro de propiedad</label>
                   <input value="<?php echo $row_var['fav_var_registro_propiedad'];?>"  name="registro_propiedad" class="normal_input_little" type="date" title="Click para escojer una fecha para apelación."> </div> 
            </div>    

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <label>Entrega</label>
                   <input value="<?php echo $row_var['fav_var_entrega'];?>"  name="entrega" class="normal_input_little" type="date" title="Click para escojer una fecha para casación."> </div> 
            </div>
            </fieldset>

          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color: orange; color:black;">Observaciones</legend>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea name="observaciones" class="normal_textarea normal_input_big maximus" onkeypress="return valideKeys(event);" rows="40" cols="40"><?php echo $row_var['fav_var_observaciones'];?></textarea>
              </div>
          </fieldset>
          
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"><br/> 
          <legend class="form_title maximus" style="text-align: right; background-color:orangered;">eSTADO DEL CASO</legend>
            <label for="scales">  Seleccione "si" cuando el caso se ha cerrado, se ha concluido o ya no esta vigente.</label>
              <?php 
                if ($row_cli['fav_cli_estado'] == 'no'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no" checked>
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si">
                  <label for="contactChoice2">Si</label>
                <?php 
                } elseif ($row_cli['fav_cli_estado'] == 'si'){?>
                  <input type="radio" id="contactChoice1" name="cerrado" value="no">
                  <label for="contactChoice1">No</label>
                  <input type="radio" id="contactChoice2" name="cerrado" value="si" checked>
                  <label for="contactChoice2">Si</label>
                <?php
                }?>
            </div></div>

          <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
            <input name="actualizar_varios" type="submit" class="btn btn-main" value="Actualizar" onclick="return confirmar('¿Está seguro que desea actualizar el registro?')"></div>  
          </form>
      </div>
    <?php
    }
}
?>
<?php include("./template/foot.php"); ?>

