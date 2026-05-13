
<?php   
  require_once("./config/ver.php");
  require_once("./template/head.php");
  require_once("./config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
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
        <p class="normal_linea maximus"><br>SECCION DE CONSULTAS</p>
         <fieldset>
         <legend class="form_title maximus" style="text-align:right;">Lista de Consultas</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Accion</th>
                    <th scope="col">Nombre</th></th>
                    <th scope="col">Id</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th> 
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM fav_consultas ORDER BY fav_con_fecha DESC";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size: small;">
                              <td><a href="./editcon.php?id=<?php echo $row['fav_con_id']?>" class="marca4" onclick="return confirmar('¿Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a><?php if ($_SESSION['user']==0) { ?><a href="./delcon.php?id=<?php echo $row['fav_con_id']?>" style="background:orange"  onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"> <i class="tf-ion-ios-trash"></i> DEL </a> <?php } ?></td>
                              <td class="text-center maximus" ><?php echo $row['fav_con_nombre']?></td>
                              <td class="text-center maximus" ><?php echo $row['fav_con_cedula']?></td>
                              <td class="text-center" ><?php echo $row['fav_con_telefono']?></td>
                              <td class="text-center" ><?php echo $row['fav_con_fecha']?></td>
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
