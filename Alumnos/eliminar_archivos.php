<?php
 
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}
	
	$archivonombre=$_GET['archivonombre'];
	mysql_connect("localhost","root","");
	mysql_select_db("beca");

	$usuario= $_SESSION['usuario'];

	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			
			$nombre = $f['Nombre'];	
			$apellidop = $f['Apellidop'];
			$beca= $f['Beca'];
			$usuario = $f['Ncontrol'];
	}

$directorio = '../Archivos/'.$beca.'/'.$nombre. " ".$apellidop." ".$usuario . '/';

	if ($dir = opendir($directorio)){
					while($archivo = readdir($dir)){
						if($archivo !='.'  && $archivo !='..' ){
						
	//$ruta = '../Archivos/'.$beca.'/'.$nombre." ".$apellidop." ".$usuario . '/' .$archivo;
	$ruta = '../Archivos/'.$beca.'/'.$nombre." ".$apellidop." ".$usuario . '/' .$archivonombre;
						}
					}
				
					
	if (unlink($ruta)) {
		echo '<script> alert("ARCHIVO ELIMINADO CORRECTAMENTE ");</script>';
		echo '<script> window.location="Archivos.php"; </script>';
	 	
	 } 
	}

?>
