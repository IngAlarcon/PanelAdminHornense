<?php

  if($admin["perfil"] == "Editor-Publicidad" || $admin["perfil"] == "Editor-Noticias-Sociales-Galerias" || $admin["perfil"] == "Editor-Clasificados"){

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

            <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Newsletter</font></font></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></a></li>

              <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Newsletter</font></font></li>

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


            <div class="card card-primary card-outline">

              <div class="card-header">

                <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suscriptores</font></font></h3>

                <div class="card-tools">


                </div>
              </div>
              <div class="card-body">

               <table class="table table-bordered table-striped dt-responsive tablaNewsletter" width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 

                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>

                      <th >Email</th>                     

                      <th>Fecha</th>                      
                 

                    </tr>

                  </thead>

                  <tbody>
                    


                  </tbody> 


                </table>



            </div>



            </div>

            <!-- /.card -->

          </div>
        </div>
      </div>

    </section>

    <!-- /.content -->

</div>