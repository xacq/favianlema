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
        <p class="normal_linea"><br>SECCION AGENDA</p>
        
                  <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color:orangered;">Agenda pasada</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Accion</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Descripcion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                  $query = "SELECT * FROM fav_agenda where fav_age_fecha<CURDATE() ORDER BY fav_age_fecha desc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                        <td class="text-center"><a href="../edit/edit_agenda.php?id=<?php echo $row['fav_age_id']?>" class="marca4"  onclick="return confirmar('¿Está seguro que desea editar el registro?')"> <i class="tf-ion-ios-compose-outline"></i> EDIT </a><?php if($_SESSION['role'] = "Administrador"){?><a href="../del/delete_agenda.php?id=<?php echo $row['fav_age_id']?>" style="background:orange" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><i class="tf-ion-ios-trash"></i> DEL </a><?php } ?></td>
                        <?php if ($row['fav_age_estado']=='no'){?>
                            <td class=" maximus text-center" style="color:red;"><?php echo $row['fav_age_estado']?></td>
                        <?php }                     
                        else {?>
                            <td class=" maximus text-center" style="color:green"><?php echo $row['fav_age_estado']?></td>
                        <?php
                        }
                        ?>
                        <td class="text-center"><?php echo $row['fav_age_fecha']?></td>
                      <td
                        <?php if($row['fav_age_tareas']=="Audiencia")        print('class="text-center maximus" style="background:orange;"');
                              elseif ($row['fav_age_tareas']=="Inspección")  print('class="text-center maximus" style="background:orangered; color:white;"');
                              elseif ($row['fav_age_tareas']=="Versiones")   print('class="text-center maximus" style="background:yellowgreen;"');
                              elseif ($row['fav_age_tareas']=="Diligencias Urgentes")   print('class="text-center maximus" style="background:yellow;"');
                              else print('class="text-center maximus"');?>><?php echo $row['fav_age_tareas'] ?> </td>
                      <td class=" maximus"><?php echo $row['fav_age_descripcion']?></td>
                    
                      </tr>
                  <?php  
                  }
                  ?>
                </tbody>
              </table>
            </div> 
          </fieldset> 
        
        
          <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color:green;">Agenda de hoy</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Accion</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col" >Fecha</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Descripcion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");
                  $query = "SELECT * FROM fav_agenda where fav_age_fecha=CURDATE() AND fav_age_estado = 'no'";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr  style="font-size:small;">
                        <td class="text-center"><a href="../edit/edit_agenda.php?id=<?php echo $row['fav_age_id']?>" class="marca4"  onclick="return confirmar('¿Está seguro que desea editar el registro?')"><i class="tf-ion-ios-compose-outline"></i> EDIT </a><?php if($_SESSION['role'] = "Administrador"){?><a href="../del/delete_agenda.php?id=<?php echo $row['fav_age_id']?>" style="background:orange" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><i class="tf-ion-ios-trash"></i> DEL </a><?php } ?></td>
                        <?php if ($row['fav_age_estado']=='no'){?>
                            <td class=" maximus text-center" style="color:red;"><?php echo $row['fav_age_estado']?></td>
                        <?php }                     
                        else {?>
                            <td class=" maximus text-center" style="color:green"><?php echo $row['fav_age_estado']?></td>
                        <?php
                        }
                        ?>
                        <td class="text-center"><?php echo $row['fav_age_fecha']?></td>
                      <td
                      <?php if($row['fav_age_tareas']=="Audiencia")        print('class="text-center maximus" style="background:orange;"');
                              elseif ($row['fav_age_tareas']=="Inspección")  print('class="text-center maximus" style="background:orangered; color:white;"');
                              elseif ($row['fav_age_tareas']=="Versiones")   print('class="text-center maximus" style="background:yellowgreen;"');
                              elseif ($row['fav_age_tareas']=="Diligencias Urgentes")   print('class="text-center maximus" style="background:yellow;"');
                              else print('class="text-center maximus"');?>><?php echo $row['fav_age_tareas'] ?> </td>
                      <td class=" maximus"><?php echo $row['fav_age_descripcion']?></td>
                      </tr>
                  <?php  
                  }
                  ?>
                </tbody>
              </table>
            </div> 
          </fieldset> 
          
 <fieldset>
            <legend class="form_title maximus" style="text-align: right;">Agenda Futura</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Accion</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col" >Fecha</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Descripcion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");mysqli_query($conexion, "SET time_zone = 'America/Guayaquil'");
                  $query = "SELECT * FROM fav_agenda where fav_age_fecha>CURDATE() ORDER BY fav_age_fecha asc";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                        <td class="text-center"><a href="../edit/edit_agenda.php?id=<?php echo $row['fav_age_id']?>" class="marca4"  onclick="return confirmar('¿Está seguro que desea editar el registro?')"> <i class="tf-ion-ios-compose-outline"></i> EDIT </a><?php if($_SESSION['role'] = "Administrador"){?><a href="../del/delete_agenda.php?id=<?php echo $row['fav_age_id']?>" style="background:orange" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><i class="tf-ion-ios-trash"></i> DEL </a><?php } ?></td>
                        <?php if ($row['fav_age_estado']=='no'){?>
                            <td class=" maximus text-center" style="color:red;"><?php echo $row['fav_age_estado']?></td>
                        <?php }                     
                        else {?>
                            <td class=" maximus text-center" style="color:green"><?php echo $row['fav_age_estado']?></td>
                        <?php
                        }
                        ?>
                        <td class="text-center"><?php echo $row['fav_age_fecha']?></td>
                      <td
                      <?php if($row['fav_age_tareas']=="Audiencia")        
                            print('class="text-center maximus" style="background:orange;"');
                              elseif ($row['fav_age_tareas']=="Inspección")  
                              print('class="text-center maximus" style="background:orangered; color:white;"');
                              elseif ($row['fav_age_tareas']=="Versiones")   
                              print('class="text-center maximus" style="background:yellowgreen;"');
                              elseif ($row['fav_age_tareas']=="Diligencias Urgentes")   
                              print('class="text-center maximus" style="background:yellow;"');
                              else print('class="text-center maximus"');?>><?php echo $row['fav_age_tareas'] ?> </td>
                      <td class=" maximus"><?php echo $row['fav_age_descripcion']?></td>
                      </tr>
                  <?php  
                  }
                  ?>
                </tbody>
              </table>
            </div> 
          </fieldset>         

                  <fieldset>
            <legend class="form_title maximus" style="text-align: right;background-color:brown;">Agenda realizada</legend>
              <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-center maximus">
                  <tr>
                    <th scope="col" class="marca">Accion</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Descripcion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../config/db.php");
                  $query = "SELECT * FROM fav_agenda where fav_age_estado = 'si'";
                  $resultado = mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)){?>
                    <tr style="font-size:small;">
                        <td class="text-center"> DONE </td>
                        <?php if ($row['fav_age_estado']=='no'){?>
                            <td class=" maximus text-center" style="color:red;"><?php echo $row['fav_age_estado']?></td>
                        <?php }                     
                        else {?>
                            <td class=" maximus text-center" style="color:green"><?php echo $row['fav_age_estado']?></td>
                        <?php
                        }
                        ?>
                        <td class="text-center"><?php echo $row['fav_age_fecha']?></td>
                      <td
                        <?php if($row['fav_age_tareas']=="Audiencia")        print('class="text-center maximus" style="background:orange;"');
                              elseif ($row['fav_age_tareas']=="Inspección")  print('class="text-center maximus" style="background:orangered; color:white;"');
                              elseif ($row['fav_age_tareas']=="Versiones")   print('class="text-center maximus" style="background:yellowgreen;"');
                              elseif ($row['fav_age_tareas']=="Diligencias Urgentes")   print('class="text-center maximus" style="background:yellow;"');
                              else print('class="text-center maximus"');?>><?php echo $row['fav_age_tareas'] ?> </td>
                      <td class=" maximus"><?php echo $row['fav_age_descripcion']?></td>
                    
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
