<?php
  require_once("../config/ver.php");
  require_once("./template/head.php");
  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
  date_default_timezone_set('America/Guayaquil');
?>

<div class="container ">
  <form class="normal_form">
    <div class="row text-center" style="text-align:right;background-color:orange;">
      <div class="col-sm-4"><label><?php echo "Usuario:  ".$_SESSION['email'];?></label></div>
      <div class="col-sm-4"><label><?php echo $_SESSION["role"].":  ".$_SESSION['name'];?></label></div>
      <div class="col-sm-4"><label><?php echo "Fecha/Hora: ".date("j/n/Y, h:i A"); ?></label></div>
    </div>
    <p class="normal_linea maximus"><br>Seccion Oficinas</p>
    <fieldset>
      <legend class="form_title maximus" style="text-align: right;">Lista de Oficinas</legend>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="text-center maximus">
            <tr>
              <th scope="col">Fecha</th>
              <th scope="col">Oficina</th>
              <th scope="col">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = "SELECT * FROM fav_oficinas ORDER BY fav_ofi_fecha_creacion desc";
              $resultado = mysqli_query($conexion, $query);
              while ($row = mysqli_fetch_array($resultado)){?>
              <tr style="font-size:small;">
                <td class="text-center"><?php echo $row['fav_ofi_fecha_creacion']?></td>
                <td><?php echo $row['fav_ofi_nombre']?></td>
                <td class="text-center"><?php echo $row['fav_ofi_estado']?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </fieldset>
  </form>
</div>

<?php include("./template/foot.php"); ?>
