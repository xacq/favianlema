<?php   
  require_once("../config/ver.php");
  require_once("./template/head.php");
  date_default_timezone_set('America/Guayaquil');  
?>

<?php

include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");

if (isset($_POST['buscar_nombre']))
{
    $nombre= $_POST['nombre'];
    
    $consulta="SELECT * FROM fav_clientes WHERE fav_cli_nombre LIKE '%$nombre%'";
    $resultado = mysqli_query($conexion, $consulta);
  
    if (mysqli_num_rows($resultado) >= 1){
?>

      <div class="container ">
        <form class="normal_form">
        <label  style="text-align:right;background-color:orange;"><?php echo "Usuario:  ".$_SESSION['email'];?></label>
          <label  style="text-align:right;background-color:orange;"><?php echo $_SESSION["role"].":  ".$_SESSION['name'];?></label>
        <p class="normal_linea maximus"><br>Clientes</p>
         <fieldset>
         <legend class="form_title maximus" style="text-align:right;">lista de clientes</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Acción</th>
                    <th scope="col" >Fecha</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">tipo</th>
                    <th scope="col">cliente</th>
                    <th scope="col">Id</th>
                    <th scope="col">Telefono</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                      <td><a href="../edit/edit.php?id=<?php echo $row['fav_cli_id']?>" class="marca4" onclick="return confirmar('Está seguro que desea editar el registro?')">  <i class="tf-ion-ios-compose-outline"></i> EDIT </a> <?php if ($_SESSION['user']==0) { ?> <a href="../del/delete.php?id=<?php echo $row['fav_cli_id']?>" style="background:orange" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">  <i class="tf-ion-ios-trash"></i> DEL  </a> <?php } ?>  </td>
                      <td class="text-center" style="font-size: 12px;"><?php echo $row['fav_cli_fecha_creacion']?></td>
                      <td class="text-center maximus" ><?php echo $row['fav_cli_codigo']?></td>
                      <td class="text-center maximus"><?php echo $row['fav_cli_tipo']?></td>
                      <td class="text-center maximus" ><?php echo $row['fav_cli_nombre']?></td>
                      <td class="text-center" ><?php echo $row['fav_cli_identificacion']?></td>
                      <td class="text-center" ><?php echo $row['fav_cli_telefono']?></td>
                      
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

<?php

    }  
else{
  
  echo "<script>alert('No existe el archivo')</script>";
}
}
else{
  session_start();
  session_destroy();
header("location:../../login.php");
}
?>
      
<?php include("./template/foot.php"); ?>