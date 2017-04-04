<?php
		require ('conexion.php');
		 mysql_connect("localhost","root","");
		 mysql_select_db("beca");

		$sql =mysql_query("select * from admin ");
		if($f = mysql_fetch_array($sql)){		
	
			
			$Activar = $f['Activar'];	
			
		}

		

		$query="UPDATE admin set  Activar='Activado'";
		$resultado=$mysql->query($query);

		rename ("../index.html","ind2");
		rename ("pagina2", "../index.html");
 
		echo '<script> alert("Formulario de Registro Activado");</script>';
		echo '<script> window.location="cuenta.php"; </script>';
	?>	