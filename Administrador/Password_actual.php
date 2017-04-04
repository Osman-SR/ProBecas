
<?php
session_start();
if(!$_SESSION){

	header("location: ../index.html");
}

?>	

<html lang="en">
<head>
<title>Administrador</title>
	<meta charset="UTF-8">
	<title>Becas Tec Vallarta</title>
	<link rel="icon" type="image/ico" href="../img/tec-logo.png" />
	<link rel="stylesheet" href="../css/estilo-admin.css">
	<link rel="stylesheet" href="../css/estilo-menu-admin.css">
	<link rel="stylesheet" href="../css/fonts.css">
	
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
						
						<li><a  href="descargar_archivos.php?id=Archivos.zip" >DESCARGAR ARCHIVOS</a></li>
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
	

	<div class="tex">	
	<section class="texto">
	<form action="modificar_clave.php"  method="post">
	
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$usuario= $_SESSION['administrador'];
	$sql =mysql_query("select * from admin where administrador='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			$administrador = $f['administrador'];	
			$Email= $f['Email'];
			$password= $f['password'];
			$Aceptado = $f['Aceptado'];
			$Rechazado = $f['Rechazado'];
			
	}
	?>	
										
				
										<h2>ACTUALIZAR CONTRASEÑA</h2>

										<table class="cuenta" border = 0>
										<tr>
										<td><b>Contraseña Actual:</b></td>
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
										<td colspan="4"><center><input type="submit" name="Guardar" value="Actualizar" /></center></td>
										</tr>
										</table>
										
</form>
</section>
<div class="esp"><p>&nbsp;</p></div>
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