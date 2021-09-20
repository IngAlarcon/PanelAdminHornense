<?php
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);

  session_start();// para trabajar con variables de sesion en todo el sistema
  
  $ruta = ControladorRuta::ctrRuta();
  $rutaBackend = ControladorRuta::ctrRutaBackend();

  if(isset($_SESSION["idBackend"])){

  	$admin = ControladorAdministradores::ctrMostrarAdministradores("id", $_SESSION["idBackend"]);

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Backend | Hornense</title>

	<link rel="icon" href="vistas/img/plantilla/icono.png">

	<!--==================================
	=            Vinculos CSS            =
	===================================-->
	<!-- bootstrap css-->
	<link rel="stylesheet" href="vistas/css/plugins/bootstrap/bootstrap.min.css">

	<!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/css/plugins/fontawesome-free/css/all.min.css">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- TAGS INPUT -->
    <link rel="stylesheet" href="vistas/css/plugins/tagsinput.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/css/plugins/adminlte.min.css">

    <!--Estilos del Login -->
    <link rel="stylesheet" href="vistas/css/login.css">

     <link rel="stylesheet" href="vistas/css/paneladmin.css">

    <!--DataTables -->
    <link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap4.min.css">

    <link href="vistas/plugins/summernote/summernote-bs4.min.css" rel="stylesheet">


	<!--====  End of Vinculos CSS  ====-->


	<!--=================================
	=            Vinculos JS            =
	==================================-->

  <!-- jQuery libreria -->
   <script src="vistas/js/plugins/jquery-3.5.1.min.js"></script>
   <script src="vistas/js/plugins/jquery.overlayScrollbars.min.js"></script>


	<!-- Popper JS 
	<script src="vistas/js/plugins/popper.min.js"></script> -->
	 <script src="vistas/plugins/popper/umd/popper.min.js"></script>

	<!-- Bootstrap 4 JS-->
   <script src="vistas/js/plugins/bootstrap/bootstrap.min.js"></script>	

   <!-- TAGS INPUT 
    https://www.jqueryscript.net/form/Bootstrap-4-Tag-Input-Plugin-jQuery.html -->
   <script src="vistas/js/plugins/tagsinput.js"></script>

   <!-- AdminLTE App -->
   <script src="vistas/js/plugins/adminlte.min.js"></script>

    <!--DataTables -->
    <!--https://datatables.net/extensions/responsive/examples/styling/bootstrap4.html
     https://datatables.net/download/ -->
    <script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
    <script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script>  
    <script src="vistas/js/plugins/dataTables.responsive.min.js"></script> 
    <script src="vistas/js/plugins/responsive.bootstrap4.min.js"></script>

    <!--SWEET ALERT 2 -->
    <!--https://sweetalert2github.io -->
    <script src="vistas/js/plugins/sweetalert2.all.js"></script>


    <!-- jQuery-Mask enmascarar un imput
    	https://igorescobar.github.io/jQuery-Mask-Plugin/ -->
    
    <script src="vistas/plugins/jquery-mask/dist/jquery.mask.js"></script>
 
	<script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>


</head>

<!--==== Ejecucion de mi login  ====-->

<?php if(!isset($_SESSION["validarSesionBackend"])): 

	include "paginas/login.php";

?>

<?php else: ?>

<body class="hold-transition sidebar-mini ">

	<!-- wrapper class especial de admlt3-->
	<div class="wrapper">

		<?php

		include "paginas/modulos/header.php";
		
		include "paginas/modulos/menu.php";

		 /*=============================================
		 =            Navegacion de paginas            =
	      =============================================*/

		 if(isset($_GET["pagina"])){

		 	//Mi lista Blanca

		 	if($_GET["pagina"] == "inicio" || 
		 	   $_GET["pagina"] == "administradores" ||
		 	   $_GET["pagina"] == "noticias" ||  
		 	   $_GET["pagina"] == "galerias" ||
		 	   $_GET["pagina"] == "sociales" ||
		 	   $_GET["pagina"] == "publicidad" ||
		 	   $_GET["pagina"] == "clasificados" ||
		 	   $_GET["pagina"] == "newsletter" ||
		 	   $_GET["pagina"] == "salir"){

		 		include "paginas/".$_GET["pagina"].".php";
		 	
		 	}else{

		 		include "paginas/error404.php";
		 	}

		 }else{

	 	    include "paginas/inicio.php";
		 }
		
		 /*=====  End of Navegacion de paginas  ======*/

		include "paginas/modulos/footer.php";

		?>

	</div>

   <!-- Vinculando mis js-->
   <script src="vistas/js/administradores.js"></script>

<!-- --> <script src="vistas/js/noticias.js"></script>  
<!-- --> <script src="vistas/js/sociales.js"></script>
<!-- --> <script src="vistas/js/newsletter.js"></script> 
<!-- --> <script src="vistas/js/galeriaTapas.js"></script>
<!-- --> <script src="vistas/js/galeriaImagenes.js"></script> 
<!-- --> <script src="vistas/js/galeriaVideos.js"></script>
<!-- --> <script src="vistas/js/publicidad.js"></script> 
<!-- --> <script src="vistas/js/clasificados.js"></script>         

</body>

<?php endif ?>

</html>