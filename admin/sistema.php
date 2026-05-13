<?php   
  require_once("./config/ver.php");
  require_once("./template/menu.php");
  date_default_timezone_set('America/Guayaquil');  
?>

<!--------------------------------------------- AGENDA DE HOY ----------------------------------------->

<div class="container "><br>
        <form class="normal_form">
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
 
          <p class="normal_linea maximus"><br>Agenda para hoy</p>
          <legend class="form_title" style="text-align: right;">Fecha: <?php echo date("j/n/Y"); ?> </legend>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                  <th scope="col">Tarea</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Detalle</th>
                  
                  </tr>
                </thead>
              <tbody>
                <?php
                include("./config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                $query = "SELECT * FROM fav_agenda WHERE fav_age_fecha = CURDATE() AND fav_age_estado = 'no'";
                $resultado = mysqli_query($conexion, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                  <tr style="font-size: small;">
                    <td
                     <?php if($row['fav_age_tareas']=="Audiencia")        print('class="text-center maximus" style="background:orange;"');
                              elseif ($row['fav_age_tareas']=="Inspección")  print('class="text-center maximus" style="background:orangered; color:white;"');
                              elseif ($row['fav_age_tareas']=="Versiones")   print('class="text-center maximus" style="background:yellowgreen;"');
                              elseif ($row['fav_age_tareas']=="Diligencias Urgentes")   print('class="text-center maximus" style="background:yellow;"');
                              else print('class="text-center maximus"');?>><?php echo $row['fav_age_tareas'] ?> </td>                                         
                                        
                                                              
                    <?php if ($row['fav_age_estado']=='no'){?>
                        <td class=" maximus text-center" style="color:red;"><?php echo $row['fav_age_estado']?></td>
                      <?php }                     
                        else {?> 
                          <td class=" maximus text-center" style="color:green"><?php echo $row['fav_age_estado']?></td>
                        <?php
                        }
                      ?>
                    <td class="maximus"><?php echo $row['fav_age_descripcion']?></td>

                  </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>     
<!--------------------------------------------- AGENDA ATRASADA ----------------------------------------->
          <p class="normal_linea maximus"><br>Agenda ATRASADA</p>
          <legend class="form_title" style="text-align: right; background-color:orangered">Fechas antes al: <?php echo date("j/n/Y"); ?> </legend>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                  <th scope="col">fecha</th>
                  <th scope="col">Tarea</th>
                  <th scope="col">Detalle</th>
                  </tr>
                </thead>
              <tbody>
                <?php
                include("./config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                $query = "SELECT * FROM fav_agenda WHERE fav_age_fecha < CURDATE() && fav_age_estado = 'no' ORDER BY fav_age_fecha desc";
                $resultado = mysqli_query($conexion, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                  <tr style="font-size: small;">
                  <td class="maximus text-center"style="color:red; text-weight:1500;"><?php echo $row['fav_age_fecha']?></td> 
                    <td
                     <?php if($row['fav_age_tareas']=="Audiencia")        print('class="text-center maximus" style="background:orange;"');
                              elseif ($row['fav_age_tareas']=="Inspección")  print('class="text-center maximus" style="background:orangered; color:white;"');
                              elseif ($row['fav_age_tareas']=="Versiones")   print('class="text-center maximus" style="background:yellowgreen;"');
                              elseif ($row['fav_age_tareas']=="Diligencias Urgentes")   print('class="text-center maximus" style="background:yellow;"');
                              else print('class="text-center maximus"');?>><?php echo $row['fav_age_tareas'] ?>       
                    </td>  
                    <td class="maximus" style="color:red; text-weight:1500;"><?php echo $row['fav_age_descripcion']?></td>
                  </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>     
        </form>
      </div>

      <?php include("./template/foot.php"); ?>
