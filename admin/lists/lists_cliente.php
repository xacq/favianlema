<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
  date_default_timezone_set('America/Guayaquil');  
?>

      <div class="container">
        <form class="normal_form">
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
        <p class="normal_linea maximus"><br>Seccion Clientes</p>
         <fieldset>
         <legend class="form_title maximus" style="text-align:right;">lista de clientes</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Acción</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">Cliente / Proceso / Demandado</th>
                    <th scope="col">Cerrado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM fav_clientes ORDER BY fav_cli_estado asc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                            <?php if ($row['fav_cli_estado']== 'si'){?>
                              <td><a href="../edit/edit.php?id=<?php echo $row['fav_cli_id']?>" class="marca4" onclick="return confirmar('¿Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a></td>
                              <td class="text-center maximus" style="background-color:orange;" ><?php echo $row['fav_cli_codigo']?></td>
                      		  <td class="text-center maximus"><?php echo $row['fav_cli_tipo']?></td>
                              <td class="text-center maximus " style="background-color:orange;"  ><?php echo $row['fav_cli_nombre']?></td>
                              <td class="text-center maximus" style="background-color:orange;"><?php echo $row['fav_cli_estado']?></td>
                            <?php }   
                                  else { ?>
                              <td><a href="../edit/edit.php?id=<?php echo $row['fav_cli_id']?>" class="marca4" onclick="return confirmar('¿Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a></td>
                                <?php 
                                    if ($row['fav_cli_tipo']=="familia"){
                                    $buscar= "SELECT * FROM fav_familia";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_fam_codigo'] == $row['fav_cli_codigo']) { 
                                          	 $proceso = $rowa['fav_fam_proceso'];    	
                                          	$demandado = $rowa['fav_fam_con_nombre'];    	
                                        	}
                                    	}
                                    }
                                    if ($row['fav_cli_tipo']=="civil"){
                                    $buscar= "SELECT * FROM fav_civil";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_civ_codigo'] == $row['fav_cli_codigo']) {  $proceso =  $rowa['fav_civ_proceso'];    	
                                          $demandado = $rowa['fav_civ_con_nombre'];
                                        	}    	
                                    	}
                                    }
                                    if ($row['fav_cli_tipo']=="penal"){
                                    $buscar= "SELECT * FROM fav_penal";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_pen_codigo'] == $row['fav_cli_codigo']) {  $proceso = $rowa['fav_pen_proceso'];    	
                                          $demandado = $rowa['fav_pen_con_nombre'];
                                        	}
                                    	}
                                    }
                                    if ($row['fav_cli_tipo']=="senagua"){
                                    $buscar= "SELECT * FROM fav_senagua";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_sen_codigo'] == $row['fav_cli_codigo']) {  $proceso =  $rowa['fav_sen_proceso'];    	
                                          $demandado = $rowa['fav_sen_con_nombre']; 	
                                        	}
                                    	}
                                    }
                                    if ($row['fav_cli_tipo']=="varios"){
                                    $buscar= "SELECT * FROM fav_varios";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_var_codigo'] == $row['fav_cli_codigo']) {  $proceso = $rowa['fav_var_proceso'];    	
                                          $demandado = $rowa['fav_var_con_nombre']; 	
                                        	}
                                    	}
                                    } 
                                    if ($row['fav_cli_tipo']=="subtierras"){
                                    $buscar= "SELECT * FROM fav_subtierras";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_sub_codigo'] == $row['fav_cli_codigo']) {  $proceso = $rowa['fav_sub_proceso'];    	
                                          $demandado = $rowa['fav_sub_con_nombre']; 	 
                                        	}
                                    	}
                                    }        
                                    if ($row['fav_cli_tipo']=="constitucional"){
                                    $buscar= "SELECT * FROM fav_constitucional";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_con_codigo'] == $row['fav_cli_codigo']) { $proceso = $rowa['fav_con_proceso'];    	
                                          $demandado = $rowa['fav_con_con_nombre']; 	
                                        	}
                                    	}
                                    } 
                                ?>
                              <td class="text-center maximus" ><?php echo $row['fav_cli_codigo'];?></td>
                      		  <td class="text-center maximus" ><?php echo $row['fav_cli_nombre']." / ".$proceso." / ".$demandado;?></td>
                              <td class="text-center maximus" ><?php echo $row['fav_cli_estado'];?></td>
                              
                            <?php } ?>
                      
                    </tr>
                  <?php   
                  }
                  ?>
                </tbody>
              </table>
            </div> 
          </fieldset>            
        </form>
      </div>

      <?php include("./template/foot.php"); ?>
