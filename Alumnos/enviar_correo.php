<?php

	if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
		isset($_POST["apellido"]) && !empty($_POST["apellido"]) &&
		isset($_POST["mail"]) && !empty($_POST["mail"]) &&
		isset($_POST["mensaje"]) && !empty($_POST["mensaje"])) {
			
			$nombre = $_POST["nombre"] . " " . $_POST["apellido"];
			$mail = $_POST["mail"];
			$mensaje = $_POST["mensaje"];
			$comentario = "
						Nombre:$_POST[nombre]
						Email:$_POST[mail]
						Mensaje:$_POST[mensaje]
						";
			
			$header = 'From: '.$mail."\r\n".
						'Reply-To:'.$mail."\r\n".
						'X-Mailer: PHP/'.phpversion();
			
			if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
		
			mail($mail,$mensaje,$comentario,$header);
			
		
			echo '<script> alert("Enviado");</script>';
			echo '<script> window.location="correo.php"; </script>';
			}else{
				
				echo '<script> alert("Direccion de email no valida");</script>';
				echo '<script> window.location="correo.php"; </script>';
			}
		}
	
	
	
	
	?>