

 <?php

 //crea y comprime carpeta de archivos
$ruta = '../../Archivos';
$filename = '../../Descarga/Archivos.zip';
if(comprimir($ruta, $filename)){


}

else{
  echo '<script> alert("ERROR AL DESCARGAR");</script>';
}

function comprimir($ruta, $zip_salida, $handle = false, $recursivo = false){

 /* Declara el handle del objeto */
 if(!$handle){
  $handle = new ZipArchive;
  if ($handle->open($zip_salida, ZipArchive::CREATE) === false){
   return false; /* Imposible crear el archivo ZIP */
  }
 }

 /* Procesa directorio */
 if(is_dir($ruta)){
  /* Aseguramos que sea un directorio sin carácteres corruptos */
  $ruta = dirname($ruta.'/arch.ext'); 
  $handle->addEmptyDir($ruta); /* Agrega el directorio comprimido */
  foreach(glob($ruta.'/*') as $url){ /* Procesa cada directorio o archivo dentro de el */
   comprimir($url, $zip_salida, $handle, true); /* Comprime el subdirectorio o archivo */
  }

 /* Procesa archivo */
 }else{
  $handle->addFile($ruta);

 }

 /* Finaliza el ZIP si no se está ejecutando una acción recursiva en progreso */
 if(!$recursivo){
  $handle->close();

 }

 return true; /* Retorno satisfactorio */

}



?>

<?php

//convertir en .zip
header("Content-disposition: attachment; filename=Archivos.zip");
header("Content-type: MIME");
readfile("../../Descarga/Archivos.zip");



?>