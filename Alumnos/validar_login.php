<meta charset="UTF-8">
<img src="">
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$pass =md5($password);
	
if ($usuario=='ADMINISTRADOR') {

	$consulta = "select * from admin where administrador='$usuario' and password='$pass' ";
	$resultado = mysql_query($consulta) or die (mysql_error());
	$fila =mysql_fetch_array($resultado);

	if($pass == $fila['password']){
		session_start();
		
		$_SESSION['administrador'] = $fila['administrador'];
		$_SESSION['password'] = $fila['password'];

		header ("Location: ../Administrador");
	}else{
		header ("Location: ../index.html");

	}


	
}else{ 
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$pass =md5($password);
	
	if ($usuario=="osman9307" && $password=="1017") {
		echo "<b>Sistema Web Creado Por Ing.Osman Daniel Silva Ruiz</b><br>";
		echo "<b>Carrera ISC Generacion XXIII (2011-2016).</b><br>";
		echo "<img src='../img/logo.png'>";
	}
	
			
	if ($usuario != "" && $password != ""){
		
	$sql =mysql_query("select * from login where usuario='$usuario' ");
	
		if ($f1 = mysql_fetch_array($sql)){


			
			if($pass == $f1['password']){
			
			session_start();
			
			$_SESSION['usuario'] = $f1['usuario'];
			$_SESSION['password'] = $f1['password'];

			
			header ("Location: Inicio.php?Usuario=$usuario");
			
			} else {
				
				echo '<script> alert("Contraseña Incorrecta");</script>';
				echo '<script> window.location="../index.html"; </script>';
			}
		
		
			} else {
				
		
				echo '<script> alert("El No.Control no  se encuentra registrado.");</script>';
				echo '<script> window.location="../index.html"; </script>';
	
	}
	
	}else{
		
				

				echo '<script> alert("Datos Incorrectos");</script>';
				echo '<script> window.location="../index.html"; </script>';
	}

	}


?>

