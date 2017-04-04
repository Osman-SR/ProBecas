
<?php
function agregar_zip($dir, $zip){
//verificamos si $dir es un directorio
   if (is_dir($dir)) {
   //abrimos el directorio y lo asignamos a $da
      if ($da = opendir($dir)) {          
      //leemos del directorio hasta que termine
         while (($archivo = readdir($da))!== false) {  
        //Si dentro del directorio hallamos otro directorio 
        //llamamos recursivamente esta función
        //para que verifique dentro del nuevo directorio
           if (is_dir($dir . $archivo) && $archivo!="." && $archivo!=".."){
               agregar_zip($dir.$archivo . "/", $zip);  
    
           }elseif(is_file($dir.$archivo) && $archivo!="." && $archivo!=".."){
               //echo "Agregando archivo: $dir $archivo";                                    
               $zip->addFile($dir.$archivo, $dir.$archivo);                    
           }            
        }
      //cerramos el directorio abierto en el momento
      closedir($da);
     }
  }      
}

//creamos una instancia de ZipArchive      
$zip = new ZipArchive();
     
//directorio a comprimir
//la barra inclinada al final es importante
//la ruta debe ser relativa no absoluta  

$dir = '../../Archivos/BHMA/';
     
//ruta donde guardar los archivos zip, ya debe existir
$rutaFinal="../../Descarga/";
     
$archivoZip = "Archivo_bhma.zip";  
     
if($zip->open($archivoZip,ZIPARCHIVE::CREATE)===true) {  
  agregar_zip($dir, $zip);
  $zip->close();
     
  //Muevo el archivo a la ruta definida
  @rename($archivoZip, "$rutaFinal$archivoZip");
     
  //Hasta aqui el archivo zip ya esta creado
     
                    
}

  //Verificar si el archivo ha sido creado
  if (file_exists($rutaFinal.$archivoZip)){
     echo "Proceso Finalizado!! 


     Descargar: $archivoZip";  
     echo '<script> window.location="../../Descarga/Archivo_bhma.zip"; </script>';
  }else{
     echo "Error, archivo zip no ha sido creado!!";
  }
  
?>
