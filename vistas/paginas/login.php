<body class="hold-transition login-page " id="loginBody">

  <div class="login-box ">

    <div class="login-logo ">

  <a href="inicio" class="brand-link">

    <img src="vistas/img/logoHornense.png" class="   img-fluid" width="100%">
    
  </a>

    </div>

    <!-- /.login-logo -->

    <div class="card p-2"  >

      <div class="card-body login-card-body " id="cabezera" >

        <p class="login-box-msg iniciar">Iniciar Sesión</p>

        <form method="post" class=" p-2 "> 

          <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Usuario" name="ingresoUsuario">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-user"></span>

              </div>

            </div>

          </div>

          <div class="input-group mb-3 pt-2">

            <input type="password" class="form-control" placeholder="Contraseña" name="ingresoPassword">

            <div class="input-group-append ">
 
              <div class="input-group-text">

                <span class="fas fa-lock"></span>
             
              </div>
            
            </div>
          
          </div>

            <!-- /.col -->
        <div class="mb-3 pt-2">

          <button type="submit" class="btn btn-primary btn-block btn-flat ">Ingresar</button>

         </div>    

          <!-- Instanciondo controlador de administrardores -->
          <?php

          $ingreso = new ControladorAdministradores();
          $ingreso -> ctrIngresoAdministradores();


           ?>



        </form>

      </div>

      <!-- /.login-card-body -->
    </div>

  </div>
  <!-- /.login-box -->

</body>