<?php
$mysql=new mysqli("localhost","root","","beca");

	if (mysqli_connect_errno()) {
		echo 'Conexion fallida:',mysqli_connect_error() ;
		exit();

	}
?>