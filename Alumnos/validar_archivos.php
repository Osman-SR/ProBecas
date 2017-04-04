<meta charset="UTF-8">
<?php
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}

	

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

 

if ($_FILES["archivo"]["error"] > 0){
	echo '<script> alert("SELECCIONE ALGUN ARCHIVO");</script>';
	echo '<script> window.location="Archivos.php"; </script>';
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array('.pdf');
	$limite_kb = 5000;
	$directorio = '../Archivos/'.$beca.'/'.$nombre. " ".$apellidop." ".$usuario . '/';
	$nom =$_FILES['archivo']['name'];
	$ext = substr($nom, strrpos($nom, '.'));
	if (in_array($ext, $permitidos) && $_FILES['archivo']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = '../Archivos/'.$beca.'/'.$nombre. " ".$apellidop." ".$usuario . '/' . $_FILES['archivo']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
			if ($resultado){

				echo '<script> alert("EL ARCHIVO SE SUBIO CORRECTAMENTE");</script>';
				echo '<script> window.location="Archivos.php"; </script>';
			} else {
				echo '<script> alert("ARCHIVO NO SOPORTADO");</script>';
				echo '<script> window.location="Archivos.php"; </script>';
			}
		} else {
			
			echo '<script> alert("El ARCHIVO YA EXISTE");</script>';				
			echo '<script> window.location="Archivos.php"; </script>';
			
		}
	} else {
		echo '<script> alert("FORMATO NO PERMITIDO O EXCEDE EL TAMAÑO ");</script>';
		echo '<script> window.location="Archivos.php"; </script>';
		
	}
}

	
?>