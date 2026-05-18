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
        <p class="normal_linea maximus"><br>Seccion Usuarios</p>
         <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Lista de Usuarios</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Accion</th>
                    <th scope="col" >Fecha</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Oficina</th>
                    <th scope="col">Tipo de Usuario</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                  $query = "SELECT l.*, o.fav_ofi_nombre FROM fav_login l LEFT JOIN fav_oficinas o ON o.fav_ofi_id = l.fav_log_oficina_id WHERE l.fav_log_user <> 0 ORDER BY l.fav_log_fecha desc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                      <td><a href="../edit/edit_usuarios.php?id=<?php echo $row['fav_log_id']?>" class="marca4" onclick="return confirmar('¿Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a><?php if ($_SESSION['user'] == 0) { ?><a href="../del/delete_usuario_ingreso.php?id=<?php echo $row['fav_log_id']?>"style="background:orange" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"> <i class="tf-ion-ios-trash"></i> DEL </a> <?php } ?> </td>
                      <td class="text-center"><?php echo $row['fav_log_fecha']?></td>
                      <td class=" maximus"><?php echo $row['fav_log_nombre']?></td>
                      <td><?php echo $row['fav_log_correo']?></td>
                      <td><?php echo $row['fav_ofi_nombre']?></td>
                      <td><?php
                          if ($row['fav_log_user'] == 0){
                            echo "Administrador";
                          }
                          else if ($row['fav_log_user'] == 1){
                            echo "Auxiliar de Administrador";
                          }
                          else if ($row['fav_log_user'] == 2){
                            echo "Usuario General";
                          }
                          else if ($row['fav_log_user'] == 3){
                            echo "Administrador de Caja";
                          }
                        ?>
                      </td>
                      
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
