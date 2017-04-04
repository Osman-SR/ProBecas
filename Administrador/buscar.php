<html>
<head>
    <title></title>
<link rel="stylesheet" href="../css/estilo-admin.css">
<link rel="stylesheet" href="../css/estilo-menu-admin.css">
</head>
<body>
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
</body>
</html>
<?php
require_once('conexion2.php');
 
 
if(!empty($_POST)){
 
 
    $pattern = $_POST['pattern'];
 
    $db = new conexion();
    $conex = $db->getConexion();
 
  $sql = "SELECT * FROM becados WHERE Nombre LIKE '".$pattern."%' or Carrera LIKE '".$pattern."%' or Beca LIKE '".$pattern."%' or Ncontrol LIKE '".$pattern."%';";
 
    if($result = $conex->query($sql)){
 
        $numrows = $result->num_rows;
        
        if($numrows > 0){
          
            $registros = "<center><table width='50%'  border='2'>
                        <tr bgcolor= '#8B0000' >
                            <th><font color=#fff>Id</th >
                            <th><font color=#fff>No.Control</th >
                            <th><font color=#fff>Nombres</th >
                            <th><font color=#fff>Apellidio Paterno</th >
                            <th><font color=#fff>Apellido Materno</th >
                            <th><font color=#fff>Semestre</th >
                            <th><font color=#fff>Carrera</th >
                            <th><font color=#fff>Email</th >
                            <th><font color=#fff>Curp</th >
                            <th><font color=#fff>Sexo</th >
                            <th><font color=#fff>Beca</th >
                            <th><font color=#fff>Status</th >
                            <th><font color=#fff>Porcentaje</th >
                            <th colspan='2'><font color=#fff>Operaciones</th >
                            


                        </tr>";
                      
 
            while($row = $result->fetch_assoc()){
 
                $registros = $registros.
                    "<tr>".
                    "<td>".$row['id_becados']."</td >".
                    "<td>".$row['Ncontrol']."</td >".
                    "<td>".$row['Nombre']."</td >".
                    "<td>".$row['Apellidop']."</td >".
                    "<td>".$row['Apellidom']."</td >".
                    "<td>".$row['Semestre']."</td >".
                    "<td>".$row['Carrera']."</td >".
                    "<td>".$row['Email']."</td >".
                    "<td>".$row['Curp']."</td >".
                    "<td>".$row['Sexo']."</td >".
                    "<td>".$row['Beca']."</td >".
                    "<td>".$row['Status']."</td >".
                    "<td>".$row['Porcentaje']."</td >".
                    "<td>"."<a href=modificar.php?usuario=".$row['Ncontrol'].">Modificar</a>"."</td >".
                    "<td>"."<a onclick='return eli()' href=eliminar.php?usuario=".$row['Ncontrol'].">Eliminar</a>"."</td >".
                    "</tr>";
            }

            $registros = $registros."</center></table >";
           
 
            print $registros;
 
        }else{
            print "No se Encontraron Coincidencias.";
        }
    }else{
        print $conex->error;
    }
}  
 
?>