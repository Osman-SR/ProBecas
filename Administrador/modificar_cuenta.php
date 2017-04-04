<?php

require ('conexion.php');
	
	
		
		
	$administrador = $_GET['administrador'];
	$Email = $_POST['Email'];
	$Aceptado = $_POST['Aceptado'];
	$Rechazado = $_POST['Rechazado'];
	$Periodo = $_POST['Periodo'];
	

	
	



	
	if(filter_var($Email, FILTER_VALIDATE_EMAIL)){	

	if ($administrador==$administrador) {

			
	$query="UPDATE admin set  Email='$_POST[Email]',Aceptado='$_POST[Aceptado]', Rechazado='$_POST[Rechazado]', Periodo='$_POST[Periodo]'";
	

 			}


 	$resultado=$mysql->query($query);
 	


 		echo '<script> alert("Datos Actualizados");</script>';
		echo '<script> window.location="cuenta.php"; </script>';
	}else{	
				echo '<script> alert("Direccion de email no valida");</script>';
				echo '<script> window.location="cuenta.php"; </script>';
							}

	
	if ($activar=="desactivado") {
	echo " <script type='text/javascript' src='../js/activar.js'>
	</script>";	
}
	

?>

