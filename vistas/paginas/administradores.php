<?php

  if($admin["perfil"] != "Administrador"){

    echo '<script>

           window.location = "inicio"

         </script>';
         
       return;  
  }

?>

<div class="content-wrapper" style="min-height: 379px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Administradores</font></font></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></a></li>

              <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Administradores</font></font></li>

            </ol>
          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

            <!-- Default box -->

 <!--==== PRINCIPIO DE MI CARD ===== -->  
            <div class="card card-primary card-outline">
            <!--==== Header de mi card ===== -->  

            
<!--               <div class="card-header">

                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearAdministrador" >Crear nuevo administrador</button>

              </div> -->

              <!--==== Body de mi card ===== -->  
              <!--====TABLA DE LOS ADMINISTRADORES ===== -->    
              <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablaAdministradores" id="tablaAdministradores" width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 
                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Perfil</th>
                      <th style="width: 80px">Estado</th>
                      <th style="width: 10px">Acción</th>

                    </tr>

                  </thead>

                  <tbody>
                    
                  </tbody> 



                </table>



              </div>
              <!-- /.card-body -->

              <!--==== Footer de mi card ===== -->  
              <div class="card-footer">

              </div>

              <!-- /.card-footer-->

            </div>

            <!-- /.card -->

          </div>
        </div>
      </div>

    </section>

    <!-- /.content -->

</div>

<!--===================================================
=            Modal crear Administardores            =
===================================================-->

<div class="modal" id="crearAdministrador">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post">

         <div class="modal-header bg-info">
            
             <h4 clas="model-title">Crear Admistrador</h4>

             <butoon type="button" class="close" data-dismiss="modal">&times;</butoon>

          </div> 
          
          <div class="modal-body">


          <!--Input Nombre-->  
            <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-user"></samp>

              </div>
              
              <input type="text" class="form-control" name="registroNombre" placeholder="Ingresar el nombre" required>

            </div>

            <!--Input Usuario-->  
            <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-user-lock"></samp>

              </div>
              
              <input type="text" class="form-control" name="registroUsuario" placeholder="Ingresar el usuario" required>

            </div>  

             <!--Input Password-->  
            <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-lock"></samp>

              </div>
              
              <input type="password" class="form-control" name="registroPassword" placeholder="Ingresa la contraseña" required>

            </div> 

             <!--Input Select perfil-->  
<!--             <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-key"></samp>

              </div> 

              <select class="form-control" name="registroPerfil" required>
                
                <option value=""> Seleccionar perfil</option>

                <option value="Administrador">Administrador</option>

                <option value="Editor-Aticulos-Sociales-Galerias">Editor-Aticulos-Sociales-Galerias</option>
                <option value="Editor-Clasificados">Editor-Clasificados</option>

              </select> 

            </div>  -->

            <?php

                $registroAdministradores = new ControladorAdministradores();
                
                $registroAdministradores -> ctrRegistroAdministrador(); 



            ?>


          </div>

          <div class="modal-footer d-flex justify-content-between"> 

            <div>
              
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
            

            <div>

              <button type="submit" class="btn btn-primary">Guardar</button>              

            </div>

          </div>



    </form>
     

  </div>
  

</div>

</div>
<!--=====  End of Modal crear Administardores  ======-->


<!--===================================================
=            Modal Editar Administrador            =
===================================================-->

<div class="modal" id="editarAdministrador">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post">

          <div class="modal-header bg-info">
            
             <h4 clas="model-title">Editar Admistrador</h4>

             <butoon type="button" class="close" data-dismiss="modal">&times;</butoon>

          </div>
          
          <div class="modal-body">

            <input type="hidden" name="editarId"> <!--pasando ide oculto para editarlo en l bd--> 


          <!--Input Nombre-->  
            <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-user"></samp>

              </div>
              
              <input type="text" class="form-control" name="editarNombre" value required>

            </div>

            <!--Input Usuario-->  
            <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-user-lock"></samp>

              </div>
              
              <input type="text" class="form-control" name="editarUsuario" value required>

            </div>  

             <!--Input Password-->  
            <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-lock"></samp>

              </div>
              

              <input type="password" class="form-control" name="editarPassword" placeholder="Cambie su contraseña">
               <input type="hidden" name="passwordActual" ><!--pasando el passwor de un aforma oculta--> 

            </div> 

             <!--Input Select perfil-->  

             
<!--             <div class="input-group mb-3">

              <div class="input-group-append input-group-text">
                
                <samp class="fas fa-key"></samp>

              </div> 

              <select class="form-control" name="editarPerfil" required>
                
                <option class="editarPerfilOption"></option>

                <option value=""> Seleccionar perfil</option>

                <option value="Administrador">Administrador</option>

                <option value="Editor">Editor</option>

              </select> 

            </div>  -->

            <?php

                // $registroAdministradores = new ControladorAdministradores();
                // $registroAdministradores -> ctrRegistroAdministrador();

                 $editarAdministradores = new ControladorAdministradores();
                 $editarAdministradores -> ctrEditarAdministrador();

            ?>


          </div>

          <div class="modal-footer d-flex justify-content-between"> 

            <div>
              
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
            

            <div>

              <button type="submit" class="btn btn-primary">Guardar</button>              

            </div>

          </div>



    </form>
     

  </div>
  

</div>

</div>

<!--=====  End of Modal Editar Administrador  ======-->





