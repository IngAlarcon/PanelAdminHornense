<?php
//Mis controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/noticias.controlador.php";
require_once "controladores/sociales.controlador.php";
require_once "controladores/newsletter.controlador.php";
require_once "controladores/galeriaTapas.controlador.php";
require_once "controladores/galeriaImagenes.controlador.php";
require_once "controladores/galeriaVideos.controlador.php";
require_once "controladores/publicidad.controlador.php";
require_once "controladores/clasificados.controlador.php";

//Mis modelos
require_once "modelos/categorias.modelo.php";
require_once "modelos/administradores.modelo.php";
require_once "modelos/noticias.modelo.php";
require_once "modelos/sociales.modelo.php";
require_once "modelos/newsletter.modelo.php";
require_once "modelos/galeriaTapas.modelo.php";
require_once "modelos/galeriaImagenes.modelo.php";
require_once "modelos/galeriaVideos.modelo.php";
require_once "modelos/publicidad.modelo.php";
require_once "modelos/clasificados.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();