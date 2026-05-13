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
        <p class="normal_linea maximus"><br>SECCION HONORARIOS</p>
         <fieldset>
         <legend class="form_title maximus" style="text-align:right;">lista de honorarios por codigo de cliente</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Fecha</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">Abono1</th>
                    <th scope="col">Abono2</th>
                    <th scope="col">Abono3</th>
                    <th scope="col">abono4</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                  $query = "SELECT * FROM fav_honorarios ORDER BY fav_hon_fecha_creacion desc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                      <td class="text-center" style="font-size: 12px;"><?php echo $row['fav_hon_fecha_creacion']?></td>
                      <td class="text-center maximus" ><?php echo $row['fav_hon_codigo']?></td>
                      <td class="text-center marca"><?php echo $row['fav_hon_total']?></td>
                      <td class="text-center" ><?php echo $row['fav_hon_abo_1']?></td>
                      <td class="text-center" ><?php echo $row['fav_hon_abo_2']?></td>
                      <td class="text-center" ><?php echo $row['fav_hon_abo_3']?></td>
                      <td class="text-center" ><?php echo $row['fav_hon_abo_4']?></td>
                      <td class="text-center"><a href="../actions/calculo_honorarios.php?id=<?php echo $row['fav_hon_codigo']?>" class="marca4" onclick="return confirmar('¿Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a><a href="../del/delete_honorario.php?id=<?php echo $row['fav_hon_id']?>"style="background:orange"  onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">  <i class="tf-ion-ios-trash"></i> DELETE </a></td>
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
