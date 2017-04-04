<?php
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}
 	require ('conexion.php');
	
	rename ("../index.html","ind2");
	rename ("pagina2", "../index.html");
 
	echo '<script> alert("Pagina activada);</script>';
	echo '<script> history.back() </script>';
	 	

?>