<?php

require ('conexion.php');
mysql_connect("localhost","root","");
mysql_select_db("beca");
		
$usuario=$_GET['usuario'];

$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			
			$nombre= $f['Nombre'];	
			$apellidop = $f['Apellidop'];
			$beca= $f['Beca'];
			
	}

	
	if ($usuario==$usuario) {
	$query="DELETE  From becados Where Ncontrol='$usuario'";
	$query1="DELETE  From login Where usuario='$usuario'";
	
//eliminar carpeta
$directorio = '../Archivos/'.$beca.'/'.$nombre. " ".$apellidop." ".$usuario . '/';
foreach(glob($directorio."/*.*") as $archivos_carpeta)  
	{  
 	unlink($archivos_carpeta);     
	}  
	rmdir($directorio);	        

	}

$resultado=$mysql->query($query);
$resultado=$mysql->query($query1);


		echo '<script> alert("Alumno Eliminado");</script>';
		echo '<script> window.location="index.php"; </script>';

?>
