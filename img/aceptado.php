<?php
header('Content-type: application/vnd.ms-excel;charset=UTF-8');
header("Content-Disposition: attachment; filename=Beca-Aceptados.xls");
header("Pragma: no-cache");
header("Expires: 0");


echo "<center><h2><font color='#8B0000'>Alumnos Aceptados</h2></font></center>";

echo "<table border=1> ";
echo "<tr bgcolor='#8B0000'>";
echo "<th><font color=white>Id</th>";
echo "<th><font color=white>No.Control</th>";
echo "<th><font color=white>Nombre</th>";
echo "<th><font color=white>Apellido Paterno</th>";
echo "<th><font color=white>Apellido Materno</th>";
echo "<th><font color=white>Semestre</th>";
echo "<th><font color=white>Carrera</th>";
echo "<th><font color=white>Email</th>";
echo "<th><font color=white>Curp</th>";
echo "<th><font color=white>Genero</th>";
echo "<th><font color=white>Beca</th>";
echo "<th><font color=white>Status</th>";
echo "<th><font color=white>Porcentaje</font></th>";
echo "</tr>";
echo "</table> ";
require ('../conexion.php');
require_once '../PHPExcel/Classes/PHPExcel.php'; 

$sql =mysqli_query($conexion,"select * from usuarios Where Status = 'ACEPTADO'");
	while($f = mysqli_fetch_assoc($sql)){	

	
		$id = $f['id'];	
		$nombre = $f['Nombre'];
		$apellidop = $f['Apellidop'];
		$apellidom = $f['Apellidom'];
		$semestre = $f['Semestre'];
		$carrera = $f['Carrera'];
		$email = $f['Email'];
		$curp = $f['Curp'];
		$sexo = $f['Sexo'];
		$beca= $f['Beca'];
		$status = $f['Status'];
		$porcentaje= $f['Porcentaje'];
		$usuario = $f['usuario'];	
	
	


echo "<table border=1> ";

echo "<tr> ";
echo "<td>".$f['id']."</td>";
echo "<td>".$f['usuario']."</td>";
echo "<td>".$f['Nombre']."</td>";
echo "<td>".$f['Apellidop']."</td>";
echo "<td>".$f['Apellidom']."</td>";
echo "<td>".$f['Semestre']."</td>";
echo "<td>".$f['Carrera']."</td>";
echo "<td>".$f['Email']."</td>";
echo "<td>".$f['Curp']."</td>";
echo "<td>".$f['Sexo']."</td>";
echo "<td>".$f['Beca']."</td>";
echo "<td>".$f['Status']."</td>";
echo "<td>".$f['Porcentaje']."</td>";
echo "</tr> ";
echo "</table> ";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
