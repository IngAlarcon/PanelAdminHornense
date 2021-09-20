<?php

  if($admin["perfil"] == "Editor-Publicidad" || $admin["perfil"] == "Editor-Sociales-Newsletter" || $admin["perfil"] == "Editor-Clasificados"){

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

          <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Galerías</font></font></h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></a></li>

            <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Galerías</font></font></li>

          </ol>

        </div>

      </div>

    </div>

  </section>


   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tapas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <div class="card-body">

               <?php 

              include "modulos/galeriaTapas.php";

              ?>


              </div>

            </div>

        </div>

         </div>

      </div>

    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- AREA CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Imágenes</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <div class="card-body">

               <?php 

              include "modulos/galeriaImagenes.php";

              ?>

              </div>

            </div>

        </div>


      </div>
    
    </div>

  </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Videos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <div class="card-body">

               <?php 

              include "modulos/galeriaVideos.php";

              ?>

              </div>

            </div>

        </div>
      </div>

      </div>

    </section>

</div>

