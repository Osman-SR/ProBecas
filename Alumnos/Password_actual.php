<!doctype html>
<?php
session_start();
if(!$_SESSION){

	header("location: ../Index.html");
}

?>	

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Contraseña</title>
	<link rel="icon" type="image/ico" href="../img/tec-logo.png" />
	<link rel="stylesheet" href="../css/estilo-menu.css">
	<link rel="stylesheet" href="../css/estilo-perfil.css">
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
//alert(" <?php echo $f2['Aceptado'] ?>  ","titulo");
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
	<table class="logb">
	
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
				
				<li ><a href="Inicio.php"><span class="icon-home"></span>Inicio</a></li>	
				
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Tramite<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a onclick="return solicitud()">Descargar Solicitud </a></li>
						<li><a href="Archivos.php">Subir Archivos</a></li>
						<li><a onclick="return resultado()" href="#">Resultado</a></li>
											
					</ul>
					
				</li>	
					
				<li class="submenu2">
				<a href="#"><span class="icon-user"></span>Alumno: <?php echo $f['Nombre'] ?><span class="caret icon-circle-down"></a>
				<ul class="children">
						<li><a href="Perfil.php">Informacion Personal</a></li>
						<li><a href="Password_actual.php">Modificar Contraseña</a></li>
						<li><a onclick="return men()" href="#">Mensaje</a></li>
						<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
				</ul>
				
				</li>
				
				
			</ul>
		
		</nav>
	
	</header>
	

			
	<div class="tex">	
		<section class="texto">
	<form action="validar_clave.php"  method="post">
	
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("becas");
	$usuario= $_SESSION['usuario'];
	$sql =mysql_query("select * from usuarios where usuario='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			
			$usuario = $f['usuario'];
			$password = $f['password'];
			
	}
	?>	
				
										<h2>ACTUALIZAR CONTRASEÑA</h2>

										<table border = 0>
										
										<tr>
										<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
										<td><b>Contraseña actual:</b></td>
										<td colspan= 3><input type="password" name="password"  id="password" placeholder="Contraseña actual" required=""  size = 50></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Nueva Contraseña:</b></td>
										<td colspan= 3><input pattern=".{3,}" type="password"  name="password_nueva" id="password_nueva" placeholder="Nueva contraseña" required title="Minimo 8 caracteres."></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Confirmar Contraseña:</b></td>
										<td colspan= 4><input pattern=".{3,}" type="password"  name="confirmar_password" id="confirmar_password" placeholder="Confirmar nueva contraseña" required title="Minimo 8 caracteres."></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td colspan= 5><center><input type="submit" name="Guardar" value="Actualizar" /></center></td>
										</tr>
										</table>
										
<br>										
</form>
<br><br><br>
</section>
<div class="esp"><p>&nbsp;</p></div>
</div>

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