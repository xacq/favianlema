<?php include("./template/head.php"); ?>

<section class="call-to-action">
  <div class="container col-md-6 col-sm-8 col-xs-12">
    <div class="row text-center">
        <form class="normal_form" method="POST" action="./admin/config/login_registrar.php"><br>
          <fieldset>
            <legend name="f1" class="form_title maximus" style="text-align: right;">actualice su contraseña</legend>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <label class="form_log_title">Ingrese su correo</label></div>
              <div class="col-md-12 col-sm-12 col-xs-12">    
                  <input name="correo" type="email" class="form_input" required placeholder="Ingrese su correo"> </div>
              <div class="col-md-12 col-sm-12 col-xs-12">  
                  <label class="form_log_title">Ingrese su ACTUAL contraseña</label></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <input name="contrasena"  type="password" class="form_input" required placeholder="Ingrese su actual contraseña"> </div>
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                  <label class="form_log_title">Ingrese su NUEVA contraseña</label></div>
              <div class="col-md-12 col-sm-12 col-xs-12">    
                  <input name="new_contrasena" type="password" class="form_input" required placeholder="Ingrese su nueva contraseña"> </div>
              <div class="col-md-12 col-sm-12 col-xs-12">  
                  <label class="form_log_title">Ingrese otra vez su NUEVA contraseña</label></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <input name="repetir"  type="password" class="form_input" required placeholder="Ingrese otra vez su nueva contraseña"> </div>
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                <input name="guardar_contrasena" type="submit" class="btn" value="Guardar"></div>
            </div>
          </fieldset>            
        </form>

      </div>  
</section>


<?php include("./template/foot.php"); ?>