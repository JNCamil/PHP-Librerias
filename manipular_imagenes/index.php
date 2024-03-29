<?php 

require_once "../vendor/autoload.php";


$foto_original="Cortisol.png";
$guardar_en="fotomodificada.jpg";

$thumb = new PHPThumb\GD($foto_original); //GD(IMAGEN ORIGINAL)

//Redimensionar
$thumb->resize(250, 250);


//Recortar
//$thumb->crop(50, 50, 120, 120);//A partir del pixel50X, pixel50Y, tamañoX, tamañoY



//Recortar a partir del centro
$thumb->cropFromCenter(220);//ancho // ancho y alto: dos parámetros


$thumb->show(); //Mostrar

$thumb->save($guardar_en, 'jpg'); //Guardar: PUEDO CAMBIAR EL FORMATO CON EL SEGUNDO PARÁMETRO, ADEMÁS TENDRÍA QUE MODIFICAR LA VARIABLE CON LA EXTENSIÓN




?>