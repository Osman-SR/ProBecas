<meta charset="UTF-8">
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");	

	$password= md5($_POST['password']);
	$password_nueva= md5($_POST['password_nueva']);
	$confirmar_password= md5($_POST['confirmar_password']);

	$usuario=$_POST['usuario'];

	

	
	//12345678 87654321
	$sql =mysql_query("select * from login where usuario='$usuario' ");
	
		if ($f = mysql_fetch_array($sql)){
			
			if($password == $f['password']){

			if($password_nueva == $confirmar_password){
					
			mysql_query("update login set password='$password_nueva'   
		where usuario = '$_POST[usuario]' and password='$password'") or die(mysql_error());

			echo '<script> alert("Contraseña Actualizada.");</script>';
			echo '<script> window.location="Password_actual.php"; </script>';

			}else{
			
			echo '<script> alert("Las Contraseñas no Coinciden.");</script>';
			echo '<script> window.location="Password_actual.php"; </script>';

		}

		}else{

			
			echo '<script> alert("Contraseña Actual Incorrecta.");</script>';
			//echo '<script language="Javascript"> mens();</script>';
			
			echo '<script> window.location="Password_actual.php"; </script>';

		}
		}

			

?>	