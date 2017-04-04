<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<?php

	require ('../conexion.php');
   	require_once '../PHPExcel/Classes/PHPExcel.php'; 
 
  header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=BECA-IGEM.xls");
 $query="Select * From igem";
$tipo="ALUMNOS DE LA CARRERA DE IGEM";
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