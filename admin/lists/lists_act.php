<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  
?>

      <div class="container ">
        <form class="normal_form" action="./lists_agenda.php" method="POST">
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
        <p class="normal_linea"><br>SECCION ACTIVIDADES</p>
         <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Registro de Actividades Diarias</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Fecha</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Caso / Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                  $query = "SELECT * FROM fav_actividad WHERE DATE(fav_act_fecha)=CURDATE() ORDER BY fav_act_fecha desc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                      <td><?php echo $row['fav_act_fecha']?></td>
                      <td><?php echo $row['fav_act_name']?></td>
                      <td><?php echo $row['fav_act_descripcion']?></td>
                      <td><?php echo $row['fav_act_caso']?></td>
                    </tr>
                  <?php  
                  }
                  ?>
                </tbody>
              </table>
            </div> 
          </fieldset>    
          
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Registro de Actividades Pasadas</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Fecha</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Caso / Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");
                  $query = "SELECT * FROM fav_actividad WHERE DATE(fav_act_fecha)<CURDATE() ORDER BY fav_act_fecha desc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                      <td><?php echo $row['fav_act_fecha']?></td>
                      <td><?php echo $row['fav_act_name']?></td>
                      <td><?php echo $row['fav_act_descripcion']?></td>
                      <td><?php echo $row['fav_act_caso']?></td>
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
