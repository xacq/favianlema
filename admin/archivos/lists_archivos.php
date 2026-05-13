
<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  
?>



    <div class="container center-text">
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
        <p class="normal_linea"><br>SECCION ARCHIVOS</p>
         <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Lista de Archivos</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Accion</th>   
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">REVISADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                  $query = "SELECT * FROM fav_archivos ORDER BY fav_arc_fecha_creacion desc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size: small;">
                      <td class="text-center"><a href="<?php echo $row['fav_arc_ruta']?>" download="<?php echo $row['fav_arc_nombre']?>"class="marca4"  onclick="return confirmar('¿Está seguro que desea descargar este archivo?')">  <i class="tf-ion-ios-download"></i> DOW </a><?php if ($_SESSION['user']==0) { ?><a href="./delete_archivo.php?id=<?php echo $row['fav_arc_id']?>" style="background:orange"  onclick="return confirmar('¿Está seguro que desea eliminar el archivo?')">  <i class="tf-ion-ios-trash"></i>  DEL   </a> <?php } ?></td>
                      <td class="text-center"><?php echo $row['fav_arc_fecha_creacion']?></td>
                      <td class="text-center"><?php echo $row['fav_arc_nombre']?></td>
                      <td class="text-center"><?php echo $row['fav_arc_size']?></td>
                        <?php if ($row['fav_arc_estado'] == 'no'){?>
                            <td class="text-center maximus" style="color:red;"><?php echo $row['fav_arc_estado']?></td>
                        <?php }
                        else if ($row['fav_arc_estado'] == 'si'){?>     
                            <td class="text-center maximus" style="color:green;"><?php echo $row['fav_arc_estado']?></td>
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
      <?php include("./template/foot.php");
    ?>
