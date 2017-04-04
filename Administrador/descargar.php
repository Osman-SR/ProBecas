<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<?php

	 
 
  header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=Beca-General.xls");
   	require ('conexion.php');
   	require_once 'PHPExcel/Classes/PHPExcel.php';

if ($_POST[Principal]) {
 header("Content-Disposition: attachment; filename=Beca-General.xls");
 $query="Select * From usuarios";
  $tipo="LISTA GENREAL DE ALUMNOS";
}
if ($_POST[Isc]) {
	 header("Content-Disposition: attachment; filename=Beca-ISC.xls");

 $query="Select * From isc";
  $tipo="ALUMNOS DE LA CARRERA DE ISC";
}

if ($_POST[Igem]) {
	 header("Content-Disposition: attachment; filename=Beca-IGEM.xls");

 $query="Select * From igem";
 $tipo="ALUMNOS DE LA CARRERA DE IGEM";
}

if ($_POST[Arq]) {
	 header("Content-Disposition: attachment; filename=Beca-ARQUI.xls");

 $query="Select * From arq";
 $tipo="ALUMNOS DE LA CARRERA DE ARQUITECTURA";
}

if ($_POST[Tics]) {
	 header("Content-Disposition: attachment; filename=Beca-TICS.xls");

 $query="Select * From tics";
 $tipo="ALUMNOS DE LA CARRERA DE TICS";
}

if ($_POST[Electro]) {
	 header("Content-Disposition: attachment; filename=Beca-ELECTRO.xls");

 $query="Select * From electro";
 $tipo="ALUMNOS DE LA CARRERA DE ELECTROMECANICA";
}
if ($_POST[Gastro]) {
	 header("Content-Disposition: attachment; filename=Beca-GASTRO.xls");

 $query="Select * From gastro";
 $tipo="ALUMNOS DE LA CARRERA DE GASTRONOMIA";
}
if ($_POST[Tur]) {
	 header("Content-Disposition: attachment; filename=Beca-TUR.xls");

 $query="Select * From tur";
 $tipo="ALUMNOS DE LA CARRERA DE TURISMO";
}
if ($_POST[bfa]) {
	 header("Content-Disposition: attachment; filename=Beca-BFA.xls");

 $query="Select * From administrativo";
 $tipo="BECA FAMILIAR ADMINISTRATIVO";
 
}
if ($_POST[bp]) {
	 header("Content-Disposition: attachment; filename=Beca-BP.xls");

 $query="Select * From promedio";
 $tipo="BECA POR PROMEDIO";
 
}
if ($_POST[be]) {
	 header("Content-Disposition: attachment; filename=Beca-BE.xls");

 $query="Select * From especial";
 $tipo="BECA ESPECIAL";
 
}
if ($_POST[bss]) {
	 header("Content-Disposition: attachment; filename=Beca-BSS.xls");

 $query="Select * From servicio";
 $tipo="BECA DE SERVICIO SOCIAL";
 
}
if ($_POST[bhma]) {
	 header("Content-Disposition: attachment; filename=Beca-BHMA.xls");

 $query="Select * From militar";
 $tipo="BECA HIJO DE MILITAR ACTIVO";
 
}
if ($_POST[bfe]) {
	 header("Content-Disposition: attachment; filename=Beca-BFE.xls");

 $query="Select * From egresado";
 $tipo="BECA FAMILIAR EGRESADO";
 
}




 $resultado=$mysql->query($query);

?>

<html lang="en">
<head>
<title>Administrador</title>
	<meta charset="UTF-8">
	<title>Becas Tec Vallarta</title>
	
	
	
</head>
<body>
<header>
</header>
	
	<center>
	<h2><?php echo $tipo ?></h2>
		<form method="post" action="index.php">
		
	<center>
	<table border="2" width="50%">
	<tr bgcolor="#8B0000" >
		<td><font color="#fff">Id</td>
		<td><font color="#fff">No.Control</td>
		<td><font color="#fff">Nombres</td>		
		<td><font color="#fff">Apellido Paterno</td>
		<td><font color="#fff">Apellido Materno</td>
		<td><font color="#fff">Semestre</td>
		<td> <font color="#fff">Carrera</td>
		<td><font color="#fff">Email</td>
		<td><font color="#fff">Curp</td>
		<td><font color="#fff">Sexo</td>
		<td><font color="#fff">Beca</td>
		<td><font color="#fff">Status</td>
		<td><font color="#fff">Porcentaje</td>
		
		
	</tr>
		<tbody>
		<?php 
		while ($row=$resultado->fetch_assoc()){
			?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['usuario']; ?></td>
			<td><?php echo $row['Nombre']; ?></td>
			<td><?php echo $row['Apellidop']; ?></td>
			<td><?php echo $row['Apellidom']; ?></td>
			<td><?php echo $row['Semestre']; ?></td>
			<td><?php echo $row['Carrera']; ?></td>
			<td><?php echo $row['Email']; ?></td>
			<td><?php echo $row['Curp']; ?></td>
			<td><?php echo $row['Sexo']; ?></td>
			<td><?php echo $row['Beca']; ?></td>
			<td><?php echo $row['Status']; ?></td>
			<td><?php echo $row['Porcentaje']; ?></td>
			
			
		
		</tr>
		<?php }?>
	</tbody>

		
	</table></center>
	<br><br><br>
	
	

</body>
</html>