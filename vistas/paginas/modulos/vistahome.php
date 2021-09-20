<?php

$totalNoticias = ControladorNoticias::ctrMostrarNoticias(null, null);


$totalNewsletter = ControladorNewsletter::ctrMostrarNewsletter(null, null);

$totalPublicidad = ControladorPublicidad::ctrMostrarPublicidad(null, null);


?>






<!--=====================================
Total de Publicaciones de noticias
======================================-->

<div class="col-12 col-sm-12 col-lg-4">

  <div class="small-box bg-info">

    <div class="inner">

      <h3><?php echo count($totalNoticias); ?></h3>

      <p class="text-uppercase">Noticias Publicadas</p>

    </div>

    <div class="icon">

      <i class="far fa-newspaper"></i>

    </div>

    <a href="noticias" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<!--=====================================
Total de Subscriptores de Newsletter
======================================-->

<div class="col-12 col-sm-6 col-lg-4">

  <div class="small-box bg-primary">

    <div class="inner">

      <h3><?php echo count($totalNewsletter); ?></h3>

      <p class="text-uppercase">Suscriptores al Newsletter</p>

    </div>

    <div class="icon">

      <i class="fas fa-users"></i>

    </div>

    <a href="newsletter" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<!--=====================================
Total De Publicidad
======================================-->

<div class="col-12 col-sm-6 col-lg-4">

  <div class="small-box bg-secondary">

    <div class="inner">

      <h3><?php echo count($totalPublicidad); ?></h3>

      <p class="text-uppercase">Publicidad en línea</p>

    </div>

    <div class="icon">

      <i class="fas fa-bullhorn"></i>

    </div>

    <a href="publicidad" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div> 



