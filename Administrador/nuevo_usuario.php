<?php
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}
require ('conexion.php');
	
?>

<html>
<meta charset="UTF-8">
<head>
	<title>Nuevo Usuario</title>
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
						<li><a href="arquitectura.php">BECA ADMINISTRATIVO</a></li>
						<li><a href="igem.php">BECA PROMEDIO</a></li>
						<li><a href="isc.php">BECA ESPECIAL</a></li>
						<li><a href="tics.php">BECA SERVICIO</a></li>
						<li><a href="gastronomia.php">BECA HIJO MILITAR</a></li>
						<li><a href="electr.php">BECA EGRESADO</a></li>
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
	<!-- archivos-->
		

	<!---->


<div class="tex">	
	<section class="texto">

<form name="modificar_usuario" method="post" action="validar_usuario.php">
<center>
<table >
<center><h2>NUEVO REGISTRO</h2></center>
<tr>
										<td> <label>Nombres:</label></td>
										<td colspan = "3"><input type="text"  name="Nombre" placeholder="Nombres"  onkeypress="return sololetras(event);" required ></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td ><label>Apellido Paterno:</label></td>
										<td colspan = "3"><input type="text"  name="Apellidop" placeholder="Apellido Paterno" size = "100" onkeypress="return sololetras(event);" required ></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Apellido Materno:</label></td>
										<td colspan = "3"><input type="text"  name="Apellidom" placeholder="Apellido Materno" size = 90 onkeypress="return sololetras(event);" required></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Semestre:</label></td>
										<td colspan = "3"><select name="Semestre"  required onclick=" return lista(e);">
											<option value="1">1°</option>
											<option value="2">2°</option>
											<option value="3">3°</option>
											<option value="4">4°</option>
											<option value="5">5°</option>
											<option value="6">6°</option>
											<option value="7">7°</option>
											<option value="8">8°</option>
											<option value="9">9°</option>
											<option value="10">10°</option>
											<option value="11">11°</option>
											<option value="12">12°</option>
											<option value="" selected>Semestre
											</select></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Carrera:</label></td>
										<td colspan="3"><select name="Carrera"   required onclick=" return lista(e);">
											<option value="ARQUITECTURA">ARQUITECTURA</option>
											<option value="ELECTROMECANICA">ELECTROMECANICA</option>
											<option value="GASTRONOMIA">GASTRONOMIA</option>
											<option value="IGEM">IGEM</option>
											<option value="ISC">ISC</option>
											<option value="TICS">TICS</option>
											<option value="TURISMO">TURISMO</option>
											<option value="" selected>Carrera 
											</select></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td> <label>Email:</label></td>
										<td colspan = "3"><input type="text"  name="Email" placeholder="Ingresa tu Email" size = 60 required></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Curp:</label></td>
										<td colspan = "3"><input pattern=".{18,}" type="text"  name="Curp" placeholder="Curp" onblur="CURP()" size = 60 required title="Curp no valida" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"   ></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Género:</label></td>
										<td>Masculino <input type="radio" name="Sexo"   value="Masculino"   required> </td> 
										<td>Femenino <input type="radio" name="Sexo"  value="Femenino"  required> </td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Tipo de Beca:</label></td>
										<td colspan="3"><select name="Beca" required onclick=" return lista(e);">
											<option value="BPP">BECA POR PROMEDIO</option>
											<option value="BFA">BECA FAMILIAR ADMINISTRATIVO</option>
											<option value="BE">BECA ESPECIAL</option>
											<option value="BSS">BECA DE SERVICIO SOCIAL</option>
											<option value="BHMA">BECA HIJO DE MILITAR ACTIVO</option>
											<option value="BFE">BECA FAMILIAR EGRESADO</option>
											<option value="" selected>Tipo de Beca
											</select></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>No.Control:</label></td>
										<td colspan="3"><input pattern=".{8,}" type="text"  name="usuario" placeholder="No.Control" size = 60 required title="No.control no valido." maxlength="8" onkeypress="return numeros(event);" ></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Contraseña:</label></td>
										<td colspan="3"><input pattern=".{3,}" type="password"  name="password" placeholder="Contraseña" size = 60 required title="Minimo 8 caracteres."></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><label>Confirmar Contraseña:</label></td>
										<td colspan="3"s><input pattern=".{3,}" type="password"  name="password2" placeholder="Confirmar Contraseña" size = 60 required  title="Minimo 8 caracteres." ></td>
										</tr>
	
</table></center>
	<br><br><center><input type="submit" name= "Guardar"  onmouseenter=" return CURP()" value="Registro"></center>
										</div>
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

