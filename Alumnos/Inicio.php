
<?php
session_start();
if(!$_SESSION){

	header("location: ../index.html");
}

?>	
	  

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="icon" type="image/ico" href="../img/tec-logo.png" />
	<link rel="stylesheet" href="../css/estilo-menu.css"> 
	<link rel="stylesheet" href="../css/estilo-inicio.css">
	<link rel="stylesheet" href="../css/fonts.css">
	

</head>
<body>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$usuario= $_SESSION['usuario'];
	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			$nombre = $f['Nombre'];	
			$mensaje =$f['Mensaje'];
			$status= $f['Status'];
			$usuario = $f['Ncontrol'];
			$beca =$f['Beca'];
					
	}

	

	?>
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$sql =mysql_query("select * from admin ");
	if($f2 = mysql_fetch_array($sql)){		
	
			$Aceptado = $f2['Aceptado'];
			$Rechazado = $f2['Rechazado'];	
			
	}
	?>

<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.ui.draggable.js" type="text/javascript"></script>
<script src="jquery.alerts.js" type="text/javascript"></script>
<link href="jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

	
<script language="Javascript"> 
function resultado(){
<?php if ($status=="ACEPTADO"): ?>

//alert("<?php  echo $f2['Aceptado'] ?> ");
jAlert("<h3><?php echo $f2['Aceptado'] ?></h3>", 'RESULTADO');
<?php endif ?>

<?php if ($status=="RECHAZADO"): ?>
jAlert("<h3><?php echo $f2['Rechazado'] ?></h3>", 'RESULTADO');
<?php endif ?>

<?php if ($status==""): ?>
jAlert("<h3> Solicitud en Proceso </h3>",'RESULTADO');
<?php endif ?>

}
</script>

<script language="Javascript">
function solicitud(){
	<?php
if ($beca=="BFE"){
	?>

	window.location="Solicitud_BFE.php";
	<?php
}elseif ($beca=="BFA") {
	?>
	window.location="Solicitud_BFA.php";

	<?php
}else{
	?>
	window.location="Solicitud.php";
	<?php
}
	?>					
  			    				
    				

}
</script>


<script language="Javascript">
function men(){
jAlert("<h3><?php echo $mensaje ?></h3>", 'MENSAJE');

//alert(" <?php echo $mensaje ?>   ");
}
</script>

	
	<?php 
	if ($status=="ACEPTADO") {
		
	 ?>
	 <script> 
	 jAlert("<h3><?php echo $f2['Aceptado'] ?></h3>", 'RESULTADO');
	</script>
	 <?php 
		}
	 ?>


	<center>
	<div class="arriba">
	<div class="logos">
	<section class="extra_extra_header">
		    <div class="container">
		        <div class="row">
		            <div class="extra-header-banner col-md-12">
		            	<table>
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
	<center>
	<table>
	   			<tr>
	   				<td><img src="../img/logo-Tec.jpg"  ></td>
	   				<td><img src="../img/logo.png"height="160" width="250"  ></td>
	   				<td><img src="../img/logo-ITS-header.png"  ></td>
	   				
	   			</tr>
	   		</table>
	</center>
		
	</div>
	</center>
 
	<header>
		
		<div class ="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
	</div>
		<nav>
			<ul>
				
				<li ><a href="Inicio.php?Usuario=<?php echo $usuario ?> "><span class="icon-home"></span>Inicio</a></li>	
				
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Tramite<span class="caret icon-circle-down"></span></a>
					<ul class="children">
						<li><a onclick="return solicitud()">Descargar Solicitud </a></li>
						<li><a href="Archivos.php?Usuario=<?php echo $usuario ?>">Subir Archivos</a></li>
						<li><a onclick="return resultado()" href="#?Resultado">Resultado</a></li>
											
					</ul>
				</li>

				<li class="submenu2">
				<a href="#"><span class="icon-user"></span>Alumno: <?php echo $f['Nombre'] ?><span class="caret icon-circle-down"></span></a>
				<ul class="children">
						<li><a href="Perfil.php?Usuario=<?php echo $usuario ?>">Informacion Personal</a></li>
						<li><a href="Password_actual.php?Usuario=<?php echo $usuario ?>">Modificar Contraseña</a></li>
						<li><a onclick="return men()" href="#?Mensaje">Mensaje</a></li>
						<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>

				</ul>
				</li>
			</ul>
		</nav>
	</header>
	
	<center>
	
	<div class="tex">	
	<section class="texto">
	<center><h1>BIENVENIDO AL SISTEMA CONTROL DE BECAS DE TEC VALLARTA</h1></center>
	<br>
	<p> El Instituto Tecnológico Superior implementa en sus proyectos el otorgamiento de becas de estos programas, buscando con ello dar equidad y calidad en su oferta educativa, evitando la deserción por problemas económicos, gracias a este apoyo El ITS cuenta con 6 tipos de becas.</p>
	<br>
	
	
	<h4>Beca por Servicio Social</h4>
	
		
	<p> La Beca del servicio social en el instituto consiste en realizar el 50% de descuento en el pago de reinscripción, a los estudiantes que se encuentren realizando su servicio social en el Instituto. Esta beca se otorgara en una sola ocasión.</p>
	<br>

	<h4>Beca por Promedio</h4>
	<p>		

Consiste en el apoyo del 50% de descuento en el pago de reinscripción, al estudiante del Instituto que en el semestre inmediato anterior obtuvieron un promedio aritmético mayor o igual a 95 en el desempeño académico.</p>

	<br>

	<h4>Beca para familia de Egresado</h4>
	
		
<p> La Beca de apoyo a familiares directos de egresados, consiste en otorgar el 30% de descuento en el pago de inscripción para estudios de licenciatura a familiares en línea directa de egresado del Instituto.</p>

	
	<br>
<h4>Beca para Hijo de Militar Activo</h4>
	
<p>		
La beca de apoyo a hijo de militar activo, consiste en aplicar un descuento del 100% en el pago de la Re-Inscripción para los alumnos que sean familiares directos de Militar Activo .
 </p>

	<br>

	<h4>Beca para familia directo y/o o colaborador del Instituto</h4>
<p>	
		
La Beca por ser trabajador o familiar de trabajador del Instituto, consiste en realizar el 100% de descuento en el pago de inscripción o reinscripción para estudios de licenciatura y del 50 % en las mensualidades de pago en estudios de posgrado, a los trabajadores o familiares directos del trabajador del instituto.</p>

	<br>
	<h4>Beca Especial</h4>
	
	<p>La Beca especial se otorga únicamente a alumnos en situaciones económicas especiales, que no puedan cubrir la cuota del semestre, previa revisión del Comité de Becas y con autorización de la Dirección General.</p>

	</p>
		
	<br><br><br><br>


	</section>
	<div class="espacio"><p>&nbsp;</p></div>
	</div>
	</center>
	
<footer>
	<p align="center">
	<a href="#">Transparencia &nbsp;&nbsp; | </a> &nbsp;<a href="http://www.tecvallarta.edu.mx/acerca-del-tec/">&nbsp;&nbsp;Acerca del Tec &nbsp;&nbsp;| </a> <a href="http://www.tecvallarta.edu.mx/admision/">&nbsp;&nbsp;Admisión &nbsp;&nbsp; |</a> <a href="http://www.tecvallarta.edu.mx/comunidad-tec/">&nbsp;&nbsp;Comunidad Tec &nbsp;&nbsp; |</a><a href="http://www.tecvallarta.edu.mx/tramites-y-servicios/">&nbsp;&nbsp;Trámites y Servicios &nbsp;&nbsp;|</a></a><a href="#">&nbsp;&nbsp;Academia &nbsp;&nbsp;</a>  
	</p>
<p align="center"><a href="http://www.tecvallarta.edu.mx/aviso-privacidad">Todos los Derechos Reservados ITS de Puerto Vallarta 2012 | Tel. (322) 226 5600 | informes@tecvallarta.edu.mx</a> </p>
	</footer>

		

<script src="https://code.jquery.com/jquery-latest.js" ></script>
<script src="../css/main.js" ></script>		
</body>
</html>