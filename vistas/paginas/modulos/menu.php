<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!--==========================
  =            LOGO            =
  ===========================-->
  <a href="inicio" class="brand-link">

    <img src="vistas/img/plantilla/logoHornense_fondoBlanco.png" class="mx-auto d-block img-fluid">
    
  </a>

  <!--====  End of LOGO  ====-->

  <!--==========================
  =            MENU            =
  ===========================-->

  <div class="sidebar">

    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


    <?php if($admin["perfil"] =="Administrador"): ?>
 

        <!--====  Boton pagina inicio====-->
        <li class="nav-item">

          <a href="inicio" class="nav-link active" >

          <i class="nav-icon fas fa-home"></i>

          <p>Inicio</p>
          
          </a>

        </li>

    <?php endif ?>

    
    <?php if($admin["perfil"] =="Administrador"): ?>


        <!--====  Boton Administradores====-->
        <li class="nav-item">

          <a href="administradores" class="nav-link"  >

          <i class="nav-icon fas fa-users-cog"></i>

          <p>Administradores</p>
          
          </a>

        </li>  

    <?php endif ?>

     <?php if($admin["perfil"] =="Administrador" || $admin["perfil"] =="Editor-Noticias-Sociales-Galerias" ): ?>

     <!--====  Boton Noticias====-->
        <li class="nav-item">

          <a href="noticias" class="nav-link"  >

          <i class="nav-icon far fa-newspaper"></i>

          <p>Noticias</p>
          
          </a>

        </li>

     <?php endif ?>   
        

      <?php if($admin["perfil"] =="Administrador" || $admin["perfil"] =="Editor-Noticias-Sociales-Galerias" || $admin["perfil"] =="Editor-Sociales-Newsletter" ): ?>

          <!--====  Boton Sociales====-->
        <li class="nav-item">

          <a href="sociales" class="nav-link"  >

          <i class="nav-icon fas fa-camera"></i>

          <p>Sociales</p>

          </a>

        </li>

        <?php endif ?>


        <?php if($admin["perfil"] =="Administrador" || $admin["perfil"] =="Editor-Noticias-Sociales-Galerias" ): ?>


        <!--====  Boton Gestor Galerias====-->
        <li class="nav-item">

          <a href="galerias" class="nav-link"  >

          <i class="nav-icon fa fa-photo-video"></i>

          <p>Galerías</p>
       
          </a>

        </li>
      <?php endif ?>

      <?php if($admin["perfil"] =="Administrador" || $admin["perfil"] =="Editor-Publicidad"): ?>
 
         <!--====  Boton Publicidad====-->
        <li class="nav-item">

          <a href="publicidad" class="nav-link"  >

          <i class="nav-icon fas fa-bullhorn"></i>
        
          <p>Publicidad</p>
          
          </a>

        </li>

      <?php endif ?>


      <?php if($admin["perfil"] =="Administrador" || $admin["perfil"] =="Editor-Clasificados"): ?>
 
         <!--====  Boton Gestor clasificadoss====-->
        <li class="nav-item">

          <a href="clasificados" class="nav-link"  >

          <i class="nav-icon far fa-clipboard"></i>

          <p>Clasificados</p>

          </a>

        </li>

     <?php endif ?>


     <?php if($admin["perfil"] =="Administrador" || $admin["perfil"] =="Editor-Sociales-Newsletter"): ?>


        <!--====  Boton Newsletter===-->
        <li class="nav-item">

          <a href="newsletter" class="nav-link"  >

          <i class="nav-icon far fa fa-users"></i>
        
          <p>Newsletter</p>
          
          </a>

        </li> 
      <?php endif ?>

      <?php if($admin["perfil"] =="Administrador"): ?>
 

        <!--====  Boton Ir Google Analytics====-->
        <li class="nav-item">

          <a href="https://analytics.google.com/" class="nav-link" target="_blank">

          <i class="nav-icon fas fa-chart-line"></i>

          <p>Ir a Google Analytics</p>
          
          </a>

        </li> 

     <?php endif ?>
      

        <!--====  Boton ver sitio====-->
        <li class="nav-item">

          <a href="<?php echo $ruta; ?>" class="nav-link" target="_blank">

          <i class="nav-icon fas fa-globe"></i>

          <p>Ver sitio</p>
          
          </a>

        </li>
        
      </ul>
      

    </nav>


  </div>
  
  
  
  <!--====  End of MENU  ====-->
  
  


 

</aside>