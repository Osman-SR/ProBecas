<meta charset="UTF-8">
<?php

	
generador(5,true,true,true,true);

function generador($longitud,$letras_min,$letras_may,$numeros,$simbolos)
{
	//Evaluamos [$variable?] si queremos letras minúsculas; Si sí agregamos la letras minúsculas
	// Si NO [:'';] , no agregamos nada.
	$variacteres = $letras_min?'abdefghijklmnopqrstuvwxyz':'';
	//Hacemos lo mismo para letras mayúsculas,numeros y simbolos
	$variacteres .= $letras_may?'ABDCEFGHIJKLMNOPQRSTUVWXYZ':'';
	$variacteres .= $numeros?'0123456789':''; 
	$variacteres .= $simbolos?'#$&':'';
	
	//Inicializamos variable $i y $clv
	$i = 0;
	$clv = '';
	
	//repetimos el codigo segun la longitud
	while($i<$longitud)
		{
			//Generamos un numero aleatorio
			$numrad = rand(0,strlen($variacteres)-1);
			//Sacamos el la letra al azar
			//La función -substr()- se compone de substr($variable,posición_inicio,longitud de sub cadena);
			$clv .= substr($variacteres,$numrad,2);
			//Aumentamos a $i en 1 cada que entramos al while
			$i++;
		}
		
		//Mostramos la cadena generada por medio de -echo-
	//echo $clv;


//mail("odsr9307@gmail.com", "Recuperar Contraseña", "NUEVA CONTRASEÑA: $clv ");
//echo "mensaje enviado";


	mysql_connect("localhost","root","");
	mysql_select_db("becas");

	$usuario = $_POST['usuario'];
	$email = $_POST['Email'];
	
if ($usuario=='ADMINISTRADOR') {

	$consulta = "select * from admin where administrador='$usuario' and Email='$email' ";
	$resultado = mysql_query($consulta) or die (mysql_error());
	$fila =mysql_fetch_array($resultado);

	if($usuario == $fila['administrador'] AND $email == $fila['Email'] ){

		//mail("$email", "Recuperar Contraseña", "HOLA ADMNISTRADOR HAS OLVIDADO TU CONTRASEÑA PARA EL SISTEMA DE BECAS DEL TECNOLOGICO DE PUERTO VALLARTA INTRODUCE ESTA CONTRASEÑA PROVICIONAL: $clv DESPUES SE RECOMIENDA CAMBIARLA");

		mysql_query("update admin set password = '$clv' 
			where administrador = '$_POST[usuario]' ") or die(mysql_error());

		echo '<script> alert("ADMINISTRADOR SE TE HA ENVIADO LA NUEVA CONTRASEÑA AL EMAIL REGISTRADO");</script>';
		echo '<script> window.location="../index.html"; </script>';
	}else{

			header ("Location: ../index.html");

	}


	
}else{

	$usuario = $_POST['usuario'];
	$email = $_POST['Email'];
	

	if ($usuario != "" && $email != ""){
		
	$sql =mysql_query("select * from usuarios where usuario='$usuario' ");
	
		if ($f = mysql_fetch_array($sql)){

			$nombre = $f['Nombre'];
			$apellidop = $f['Apellidop'];
			if($usuario == $f['usuario'] and $email == $f['Email']  ){

			//mail("$email", "Recuperar Contraseña", "HOLA $nombre $apellidop  HAS OLVIDADO TU CONTRASEÑA PARA INGRESAR AL SISTEMA DE BECAS DEL ITSPV INTRODUCE ESTA CONTRASEÑA PROVICIONAL: $clv DESPUES SE RECOMIENDA CAMBIARLA");		
			mysql_query("update usuarios set password = '$clv' 
			where usuario = '$_POST[usuario]' ") or die(mysql_error());

				
				echo '<script> alert("SE TE HA ENVIADO LA NUEVA CONTRASEÑA AL EMAIL ASOCIADO A LA CUENTA");</script>';
				echo '<script> window.location="../index.html"; </script>';
			
			
			
			} else {
				
				echo '<script> alert("EL EMAIL NO  COINCIDE CON EL NUMERO DE CONTROL REGISTRADO");</script>';
				echo '<script> window.location="../index.html"; </script>';
			}
		
		
			} else {
				
		
				echo '<script> alert("NUMERO DE CONTROL NO REGISTRADO");</script>';
				echo '<script> window.location="../index.html"; </script>';
	
	}
	
	}else{
		
				

				echo '<script> alert("Datos Incorrectos");</script>';
				echo '<script> window.location="../index.html"; </script>';
	}

	
}


}

?>