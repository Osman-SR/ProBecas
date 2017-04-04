<?php
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}
 	require ('conexion.php');
 	
	rename ("../index.html", "pagina2");
	rename ("ind2","../index.html");

	echo '<script> alert("Pagina desactivada);</script>';
	echo '<script> history.back() </script>';
							
?>