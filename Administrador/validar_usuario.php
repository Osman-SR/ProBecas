<meta charset="UTF-8">
<?php

	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$nombre =  ucwords($_POST['Nombre']);
	$apellidop = $_POST['Apellidop'];
	$apellidom = $_POST['Apellidom'];
	$semestre = $_POST['Semestre'];
	$carrera = $_POST['Carrera'];
	$email = $_POST['Email'];
	$curp = $_POST['Curp'];
	$sexo = $_POST['Sexo'];
	$beca = $_POST['Beca'];
	$usuario = $_POST['usuario'];
	$password = md5($_POST['password']);
	$password2 = md5($_POST['password2']);	
	$folio;
	$por;
	//$idd;

	
			
	
	if ($usuario != "" && $password != ""){
		
		$checkusuario = mysql_query("Select usuario from login where usuario='$usuario'");
		$check_usuario = mysql_num_rows($checkusuario);
		
		if ($check_usuario >0 ){
			
			
				echo '<script> alert("El No.Control ya esta registrado");</script>';
				echo '<script> history.back() </script>';

				
	 }else{

							//confirmar contraseña
			if ($password==$password2) {

					if ($beca=="BHMA") {
					//$folio='BHMA';
					$por = '100%';
					$query= mysql_query("SELECT MAX(Folio) AS id_becados FROM becados WHERE Beca='BHMA' ");
 					if ($row = mysql_fetch_row($query)) 
 					{
   						$id_becados = trim($row[0]);
 					}			
 					$folio=$id_becados++;
 					if($folio == 0)
 					{
 						$folio=1;	
 					}else{
 						$folio=$id_becados++;
 					}
 					
					}

					if ($beca=="BSS") {
					//$folio='BSS';
					$por = '50%';
					$query= mysql_query("SELECT MAX(Folio) AS id_becados FROM becados WHERE Beca='BSS' ");
 					if ($row = mysql_fetch_row($query)) 
 					{
   						$id_becados = trim($row[0]);
 					}			
 					$folio=$id_becados++;
 					if($folio == 0)
 					{
 						$folio=1;	
 					}else{
 						$folio=$id_becados++;
 					}
					}

					if ($beca=="BFA") {
					//$folio='BSS';
					$por = '100%';
					$query= mysql_query("SELECT MAX(Folio) AS id_becados FROM becados WHERE Beca='BFA' ");
 					if ($row = mysql_fetch_row($query)) 
 					{
   						$id_becados = trim($row[0]);
 					}			
 					$folio=$id_becados++;
 					if($folio == 0)
 					{
 						$folio=1;	
 					}else{
 						$folio=$id_becados++;
 					}
					}

					if ($beca=="BPP") {
					//$folio='BSS';
					$por = '50%';
					$query= mysql_query("SELECT MAX(Folio) AS id_becados FROM becados WHERE Beca='BPP' ");
 					if ($row = mysql_fetch_row($query)) 
 					{
   						$id_becados = trim($row[0]);
 					}			
 					$folio=$id_becados++;
 					if($folio == 0)
 					{
 						$folio=1;	
 					}else{
 						$folio=$id_becados++;
 					}
					}

					if ($beca=="BFE") {
					//$folio='BSS';
					$por = '30%';
					$query= mysql_query("SELECT MAX(Folio) AS id_becados FROM becados WHERE Beca='BFE' ");
 					if ($row = mysql_fetch_row($query)) 
 					{
   						$id_becados = trim($row[0]);
 					}			
 					$folio=$id_becados++;
 					if($folio == 0)
 					{
 						$folio=1;	
 					}else{
 						$folio=$id_becados++;
 					}
					}

					if ($beca=="BE") {
					//$folio='BSS';
					$por = '0%';
					$query= mysql_query("SELECT MAX(Folio) AS id_becados FROM becados WHERE Beca='BE' ");
 					if ($row = mysql_fetch_row($query)) 
 					{
   						$id_becados = trim($row[0]);
 					}			
 					$folio=$id_becados++;
 					if($folio == 0)
 					{
 						$folio=1;	
 					}else{
 						$folio=$id_becados++;
 					}
					}

					
					
				//
							
				mysql_query("INSERT INTO login(usuario,password) values('$usuario','$password') ")or die (mysql_error());
				
				mysql_query("INSERT INTO becados(Ncontrol,Nombre,Apellidop,Apellidom,Semestre,Carrera,Email,Curp,Sexo,Beca,Folio,Porcentaje,Mensaje) values('$usuario','$nombre','$apellidop','$apellidom','$semestre','$carrera','$email','$curp','$sexo','$beca','$folio','$por','No tienes mensajes.') ")or die (mysql_error());
				
				mkdir('../Archivos/'.$beca.'/'.$nombre.' '.$apellidop.' '.$usuario .'', 755);

		
				echo '<script> alert("Registrado Correctamente");</script>';
				echo '<script> window.location="index.php"; </script>';

				
					}else{
					echo '<script> alert("Las Contraseñas no coinciden.");</script>';
					echo '<script> history.back() </script>';
				}
				
				

		}

	
	}else{
				echo '<script> alert("Campos vacios");</script>';
				echo '<script> history.back() </script>';
	}
	

?>

											