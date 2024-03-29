<?php 
//Tendremos que añadir el autoload que está en vendor, para tener disponibles los objetos y clases que hay en vendor
require "../vendor/autoload.php";

//Para utilizar la librería, cargamos el namespace. Cada librería está paquetizada, cada una tiene su namespace. 
//***Para cargar la librería ver documentación


$html2pdf = new \Mpdf\Mpdf(); //Nos generará un pdf en base a un html y un css que pongamos 

//Sin importarlo:
//$html="<h1> hOLA MUNDO desde una librería de PHP para hacer PDF'S</h1>";
//$html .= "<p>Master en PHP</p>";

// Para importarlo desde otro lado
// Recoger la vista para imprimir:
ob_start();       //Recoge el html del archivo siguiente
require "pdf_para_generar.php";  //Archivo con el html
$html = ob_get_clean();  //Esto es un cierre de ob_start().


//Podemos ver la documentación para ver sus métodos.

//Escribir en el pdf:
$html2pdf -> writeHTML ($html);
//Para exportar todo ese html a un pdf:
$html2pdf -> Output("pdf_generado.pdf");

/*
8 Feb 2024: Esta librería HTML2PDF da problemas con versiones modernas de PHP
Debido a este problema: 
Eliminar la disponibilidad de uso de llaves{} tanto para poder acceder a elementos de un vector como de un string offset, 
con lo cual solo debe quedar el uso de [] como símbolo de acceso a los elementos.

Para pasar de una sintaxis así**:

$arr = [1, 2, 3];
var_dump($arr{1});
A una que será de ahora en adelante así:

$arr = [1, 2, 3];
var_dump($arr[1]);
*/

?>