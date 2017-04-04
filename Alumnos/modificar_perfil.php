<?php
	require ('conexion.php');
	
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
		
	
	

	$nombre = $_POST['Nombre'];
	$apellidop = $_POST['Apellidop'];
	$apellidom = $_POST['Apellidom'];
	$carrera = $_POST['Carrera'];
	$semestre = $_POST['Semestre'];
	$email = $_POST['Email'];
	$curp = $_POST['Curp'];
	$sexo = $_POST['Sexo'];
	$beca = $_POST['Beca'];
	
	$usuario=$_POST['usuario'];
	$folio;
	$por;
	


	
mysql_connect("localhost","root","");
mysql_select_db("beca");

	
	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			
			$nombre1 = $f['Nombre'];	
			$apellidop1 = $f['Apellidop'];
			$beca1= $f['Beca'];
			$usuario1 = $f['Ncontrol'];
	}

 
 $directorio = '../Archivos/'.$beca1.'/'.$nombre1. " ".$apellidop1." ".$usuario1 . '/';


	
if ($usuario==$usuario) {

	$sql1 =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f2 = mysql_fetch_array($sql1)){		
				
			$beca= $f2['Beca'];
			
			if ($beca!=$_POST['Beca']) {

			 			
						$query= mysql_query("SELECT MAX(Folio) AS id_becados FROM becados WHERE Beca='$_POST[Beca]' ");
 						if ($row = mysql_fetch_row($query)) 
 						{
   						$id_becados = trim($row[0]);
 						}			
 						$folio=$id_becados++;
 						if($folio == '')
 						{
 						$folio=1;	
 						}else{
 						$folio=$id_becados++;
 						}

 						if ($_POST['Beca']=="BHMA") {
						$por = '100%';
						}
						if ($_POST['Beca']=="BPP") {
						$por = '50%';
						}
						if ($_POST['Beca']=="BFA") {
						$por = '100%';
						}
						if ($_POST['Beca']=="BFE") {
						$por = '30%';
						}
						if ($_POST['Beca']=="BSS") {
						$por = '50%';
						}
						if ($_POST['Beca']=="BE") {
						$por = '0%';
						}

					mysql_query("update becados set nombre='$_POST[Nombre]', apellidop='$_POST[Apellidop]',apellidom='$_POST[Apellidom]', curp='$_POST[Curp]', sexo='$_POST[Sexo]', semestre='$_POST[Semestre]', carrera='$_POST[Carrera]', beca='$_POST[Beca]', folio='$folio', porcentaje='$por'   
					where Ncontrol='$_POST[usuario]'") or die(mysql_error());
					
					mkdir('../Archivos/'.$_POST['Beca'].'/'.$nombre.' '.$apellidop.' '.$usuario .'', 755);
					$directorio2='../Archivos/'.$beca.'/'.$_POST["Nombre"]. " ".$_POST["Apellidop"]." ".$usuario .'/';
					rename($directorio, $directorio2);

					foreach(glob($directorio."/*.*") as $archivos_carpeta)  
					{  
 						unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
					}  
					rmdir($directorio);	        // Eliminamos la carpeta vacia  


					}else

					{	

					mysql_query("update becados set nombre='$_POST[Nombre]', apellidop='$_POST[Apellidop]',apellidom='$_POST[Apellidom]', curp='$_POST[Curp]', sexo='$_POST[Sexo]', semestre='$_POST[Semestre]', carrera='$_POST[Carrera]'   
					where Ncontrol='$_POST[usuario]'") or die(mysql_error());

					}

				}

			}


	if(filter_var($email, FILTER_VALIDATE_EMAIL)){	
	mysql_query("update becados set email='$_POST[Email]' where Ncontrol='$_POST[usuario]'") or die(mysql_error());


			echo '<script> alert("Datos Actualizados");</script>';
			echo '<script> window.location="Perfil.php"; </script>';
			

				//validar email
				
	}else{	
			echo '<script> alert("Direccion de email no valida");</script>';
			echo '<script> window.location="Perfil.php"; </script>';
		}
		




?>	