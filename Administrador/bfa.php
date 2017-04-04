<?php

session_start();
if(!$_SESSION){
	header("location: ../index.html");
}

 require ('conexion.php');


 $query="Select * From becados Where Beca='BFA' ";

 $resultado=$mysql->query($query);
 
?>

<html lang="en">
<head>
<title>Administrador</title>
	<meta charset="UTF-8">
	<title>Becas Tec Vallarta</title>
	<link rel="icon" type="image/ico" href="../img/tec-logo.png" />
	<link rel="stylesheet" href="../css/estilo-menu-admin.css">
	<link rel="stylesheet" href="../css/estilo-admin.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<script src="../js/main.js"></script>
	<script src="../js/main2.js"></script>

	
</head>
<body>
<header>
	<center>
	<div class="arriba">
	<div class="logos">
	<section class="extra_extra_header">
		    <div class="container">
		        <div class="row">
		            <div class="extra-header-banner col-md-12">
		            	<table class="logotipos">
		            <tr>
		              <td>  <img src="../img/logo-instituciones-sep.png" alt="Secretaría de Educación Pública"> </td>
		                 <td><p><font color="#000">TECNOLÓGICO NACIONAL DE MÉXICO</font></p> </td>
		                <td> <img src="../img/logo-instituciones-jalisco.png"  alt="Jalisco, Gobierno del Estado"> </td>
		                <td> <img src="../img/logo-instituciones-ITS-PTOVALLARTA.png" alt="Tec Vallarta - Instituto Tecnológico Superior"> </td>
		                </tr>
		                </table>
		             </div>
		        </div>
		    </div>
		</section>
	</div>
	<table class="logb">
		<tr>
			<td><img src="../img/logo.PNG" height="160" width="250" ></td>
			<td><img src="../img/logo-Tec.jpg"  ></td>
					
		</tr>
	</table>
		
	</div>
	
	  </center>
	 
		<script language="Javascript">
function restaurar(){
 
{
var agree=confirm("ESTAS SEGURO QUE QUIERES RESTAURAR LA BASE DE DATOS.");
if (agree)
  return true ;
else
   return false ;
alert("RESTAURACION CANCELADA");
}

}
</script>
		<script language="Javascript">
function restaurararchivos(){
 
{
var agree=confirm("ESTAS SEGURO QUE QUIERES RESTAURAR LOS ARCHIVOS.");
if (agree)
  return true ;
else
   return false ;
alert("RESTAURACION CANCELADA");
}

}


</script>

<script language="Javascript">
function eli(){
 
{
var agree=confirm("ESTAS SEGURO QUE QUIERES ELIMINAR AL ALUMNO.");
if (agree)
  return true ;
else
   return false ;
alert("ELIMINACION CANCELADA");
}

}

</script>

<script language="Javascript">
function desactivar(){
{
var agree=confirm("ESTAS SEGURO QUE QUIERES DESACTIVAR LA PAGINA.");
if (agree)
  return true ;
else
   return false ;
alert("DESACTIVACION CANCELADA");
}

}
</script>

<script language="Javascript">
function activar(){
{
var agree=confirm("ESTAS SEGURO QUE QUIERES ACTIVAR LA PAGINA.");
if (agree)
  return true ;
else
   return false ;
alert("ACTIVACION CANCELADA");
}

}
</script>



	<div class ="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
	</div>
		<nav>
			<ul>
				
				<li><a href="index.php"><span class="icon-home"></span>Inicio</a></li>
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Carreras<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="arquitectura.php">ARQUITECTURA</a></li>
						<li><a href="igem.php">IGEM</a></li>
						<li><a href="isc.php">ISC</a></li>
						<li><a href="tics.php">TICS</a></li>
						<li><a href="gastronomia.php">GASTRONOMIA</a></li>
						<li><a href="electro.php">ELECTROMECANICA</a></li>
						<li><a href="turismo.php">TURISMO</a></li>
					</ul>	
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Becas<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="bfa.php">BECA ADMINISTRATIVO</a></li>
						<li><a href="bp.php">BECA PROMEDIO</a></li>
						<li><a href="be.php">BECA ESPECIAL</a></li>
						<li><a href="bss.php">BECA SERVICIO</a></li>
						<li><a href="bhma.php">BECA HIJO MILITAR</a></li>
						<li><a href="bfe.php">BECA EGRESADO</a></li>
					</ul>	
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Status<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="aceptado.php">ACEPTADOS</a></li>
						<li><a href="rechazado.php">RECHAZADOS</a></li>
					</ul>	
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-cog"></span>Graficas<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="gbecas.php">BECAS</a></li>
						<li><a href="gcarreras.php">CARRERAS</a></li>
						<li><a href="gsexo.php">SEXO</a></li>

					</ul>	
				</li>

					<li class="submenu">
					<a href="#"><span class="icon-cog"></span>Configuracion<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="./Excel/principal.php" >DESCARGAR EXCEL</a></li>
						<li><a href="descargar_archivos.php?id=Archivos.zip" >DESCARGAR ARCHIVOS</a></li>
						<li><a onclick="return restaurar()" href="restaurar.php" >RESTAURAR BASE DE DATOS</a></li>
						<li><a onclick="return restaurararchivos()" href="restaurar_archivos.php" >RESTAURAR ARCHIVOS</a></li>
					</ul>	
				</li>

				<li class="submenu">
					<a href="#"><span class="icon-user"></span>Administrador<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="../img/MANUAL-A.pdf">MANUAL</a></li>
						<li><a href="cuenta.php">CUENTA</a></li>
						<li><a href="Password_actual.php">ACTUALIZAR CONTRASEÑA</a></li>
						<li><a href="cerrar_sesion.php" >CERRAR SESSIÓN</a></li>
					</ul>	
				</li>



			</ul>
		
		</nav>
	
	</header>

<script type="text/javascript">
function excel() {
window.location = "./Excel/bfa.php";
}
</script>
<script type="text/javascript">
function archivo() {
window.location = "Descargar_Archivos/bfa.php?id=Archivos.zip";
}
</script>

<script language="Javascript">
function tbecas(){
	<?php
if ($beca=="BHMA"){
	?>
	window.location="bhma.php";

	<?php
}elseif ($beca=="BFA") {
	?>
	window.location="bfa.php";

	<?php
}else{
	?>
	window.location="index.php";
	<?php
}
	?>					
}
</script>


	<div class="tex" >	

	<section  class="texto">
		
	<h1>BFA</h1><center>
    <input type="search" placeholder="Buscar" id="buscar" class="buscar">
    <select name="Beca"  class="becas"  onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="GO">
    	<option value="index.php" >PRINCIPAL
		<option value="bp.php">BECA POR PROMEDIO</option>
		<option value="bfa.php" selected>BECA FAMILIAR ADMINISTRATIVO</option>
		<option value="be.php">BECA ESPECIAL</option>
		<option value="bss.php">BECA DE SERVICIO SOCIAL</option>
		<option value="bhma.php">BECA HIJO DE MILITAR ACTIVO</option>
		<option value="bfe.php">BECA FAMILIAR EGRESADO</option>

	</select>
    <input type="button" class="dexcel" onClick="excel()" value="DESCARGAR EXCEL">
    <input type="button" class="dexcel" onClick="archivo()" value="DESCARGAR ARCHIVOS">
     </center>
    <br>
    <div id="datos">
    
	<center>
	<table id="example" border="2" width="50%" >
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
		
		<td colspan="2"><font color="#fff">Operaciones</font></td>
	</tr>
		<tbody>
		<?php 
		while ($row=$resultado->fetch_assoc()){
			?>
		<tr>
			<td><?php echo $row['id_becados']; ?></td>
			<td><?php echo $row['Ncontrol']; ?></td>
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
			
			
			<td><a class="btn" href="modificar.php?usuario=<?php echo $row['Ncontrol'];?>">Modificar</a></td>
			<td><a class="btn" onclick="return eli()" href="eliminar.php?usuario=<?php echo $row['Ncontrol'];?>">Eliminar</a></td>
		</tr>
		<?php }?>
	</tbody>
		
	</table></center>
	
	</section>
	<div class="esp"><p>&nbsp;</p></div>
	</div>
	</div>
	
	<center>
	<footer>
	<p align="center">
	<a href="#">Transparencia &nbsp;&nbsp; | </a> &nbsp;<a href="http://www.tecvallarta.edu.mx/acerca-del-tec/">&nbsp;&nbsp;Acerca del Tec &nbsp;&nbsp;| </a> <a href="http://www.tecvallarta.edu.mx/admision/">&nbsp;&nbsp;Admisión &nbsp;&nbsp; |</a> <a href="http://www.tecvallarta.edu.mx/comunidad-tec/">&nbsp;&nbsp;Comunidad Tec &nbsp;&nbsp; |</a><a href="http://www.tecvallarta.edu.mx/tramites-y-servicios/">&nbsp;&nbsp;Trámites y Servicios &nbsp;&nbsp;|</a></a><a href="#">&nbsp;&nbsp;Academia &nbsp;&nbsp;</a>  
	</p>
<p align="center"><a href="http://www.tecvallarta.edu.mx/aviso-privacidad">Todos los Derechos Reservados ITS de Puerto Vallarta 2012 | Tel. (322) 226 5600 | informes@tecvallarta.edu.mx</a> </p>
	</footer>
	</center>

</body>
</html>