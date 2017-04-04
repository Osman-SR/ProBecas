
<?php


///////////////
 require ('conexion.php');

 
 $query="truncate becados";



 $resultado=$mysql->query($query);

//

//$igem = "../Archivos"; cambiar a esta linea

$archivos2 = "../Archivos/";
function eliminar2($archivos2)
{
    
    foreach(glob($archivos2."/*") as $elemento)
    {
     
        if (is_dir($elemento))
        {
            eliminar($elemento);
        }
        else
        {
            unlink($elemento);
        }
    }
 
    rmdir($archivos2);
} 


    if (is_dir($archivos2)) {
        eliminar2($archivos2);
    }



$archivos = "../Descarga/";
function eliminar($archivos)
{
	
    foreach(glob($archivos."/*") as $elemento)
    {
     
        if (is_dir($elemento))
        {
            eliminar($elemento);
        }
        else
        {
            unlink($elemento);
        }
    }
 
    rmdir($archivos);
} 


    if (is_dir($archivos)) {
        eliminar($archivos);
        echo '<script> alert("BASE DE DATOS RESTAURADA");</script>';
        
    }else{
        echo '<script> alert("ERROR AL RESTAURAR");</script>';
        
    }

 echo '<script> window.location="index.php"; </script>';


?>

