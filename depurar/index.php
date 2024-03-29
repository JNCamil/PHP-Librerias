<?php 
/*Nota: Para que funcione, necesitamos instalar un plugin en el navegador
FirePHP4Chrome
*/
require_once "../vendor/autoload.php";

$frutas= array(
    "manzanas", 
    "naranjas",
    "sandias",
    4,
    "pera" => array("maluca", "buena"),
);


//Es una clase estática  - FIRE BUG (Es como un inspector de elemento que hay en los navegadores)
\FB::log($frutas);//Me mostrará por consola lo que yo quiera


echo "Hola mundo " . $frutas['pera'][0];


\FB::log("Muestrame en consola");

//La consola aparece en FirePHP, adjunta la imagen en la carpeta
?>