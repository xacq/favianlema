<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  
?>


<div class="container ">
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
        <p class="normal_linea maximus"><br>Seccion Civil</p>
         <fieldset>
         <legend class="form_title maximus" style="text-align:right;">lista de clientes ACTIVOS</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Acción</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">cliente / Proceso / Demandado</th>
                    <th scope="col">Cerrado</th> 

                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                  $query = "SELECT * FROM fav_clientes WHERE fav_cli_tipo = 'civil' AND fav_cli_estado = 'no' ORDER BY fav_cli_codigo DESC";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                              <td><a href="../edit/edit.php?id=<?php echo $row['fav_cli_id']?>" class="marca4" onclick="return confirmar('¿Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a></td>
                              <td class="text-center maximus" ><?php echo $row['fav_cli_codigo']?></td>
								 <?php
                    				$buscar= "SELECT * FROM fav_civil";
                                    $res_buscar = mysqli_query($conexion, $buscar);
                                    while ($rowa = mysqli_fetch_array($res_buscar)){
                                      	if ($rowa['fav_civ_codigo'] == $row['fav_cli_codigo']) {  $proceso =  $rowa['fav_civ_proceso'];    	
                                          $demandado = $rowa['fav_civ_con_nombre'];
                                        	}    	
                                    	}
                                  ?>                              
                              <td class="text-center maximus" ><?php echo $row['fav_cli_nombre']." / ".$proceso." / ".$demandado?></td>
                              <td class="text-center maximus" ><?php echo $row['fav_cli_estado']?></td>
                              

                          </tr>
                  <?php   
                  }
                  ?>
                </tbody>
              </table>
            </div> 
          </fieldset> 
          
          <fieldset>
         <legend class="form_title maximus" style="text-align:right; background-color:orange;color:black;">lista de clientes INACTIVOS</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Acción</th>
                    <th scope="col">CODIGO</th>

                    <th scope="col">cliente</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Cerrado</th> 

                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");
                  $query = "SELECT * FROM fav_clientes WHERE fav_cli_tipo = 'civil' AND fav_cli_estado = 'si' ORDER BY fav_cli_codigo";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr>
                              <td><a href="../edit/edit.php?id=<?php echo $row['fav_cli_id']?>" class="marca4" onclick="return confirmar('¿Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a></td>
                              
                              <td class="text-center maximus" style="background-color:orange;" ><?php echo $row['fav_cli_codigo']?></td>
                              
                              <td class="text-center maximus " style="background-color:orange;"  ><?php echo $row['fav_cli_nombre']?></td>
                              <td class="text-center" style="background-color:orange;" ><?php echo $row['fav_cli_identificacion']?></td>
                              <td class="text-center" style="background-color:orange;" ><?php echo $row['fav_cli_telefono']?></td>
                              <td class="text-center maximus" style="background-color:orange;"><?php echo $row['fav_cli_estado']?></td>
                             

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
