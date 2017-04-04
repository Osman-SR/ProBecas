<?php
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}
		require ('conexion.php');
		 mysql_connect("localhost","root","");
		 mysql_select_db("beca");

		$sql =mysql_query("select * from admin ");
		if($f = mysql_fetch_array($sql)){		
	
			
			$Activar = $f['Activar'];	
			
		}

		

		$query="UPDATE admin set  Activar='Desactivado'";
		$resultado=$mysql->query($query);
		rename ("../index.html", "pagina2");
		rename ("ind2","../index.html");

		echo '<script> alert("Formulario de Registro Desactivado");</script>';
		echo '<script> window.location="cuenta.php"; </script>';
	?>	