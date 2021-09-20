<?php

if(isset($_POST['src'])){
	 

	 $src = $_POST['src']; 

       $resultado = substr($src, 40);

       //src=" http://localhost:8080/PanelAdminHornense/vistas/img/temp/noticias/ec8956637a99787bd197eacd77acce5e.jpg ---->40


     //src=" http://localhost:8080/hornense/login/vistas/img/temp/noticias/ec8956637a99787bd197eacd77acce5e.jpg
      //borrar caracteres de http hasta antes de la / de vistas


     // $resultado = substr($src, 31);//solo descomentar esta linea 
      
     //src=" http://localhost/hornense/login/vistas/img/temp/noticias/ec8956637a99787bd197eacd77acce5e.jpg
      //borrar caracteres de http hasta antes de la / de vistas

        unlink("../".$resultado); 


}



