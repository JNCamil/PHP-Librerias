<?php 
//Cargamos el autoload
require_once  '../vendor/autoload.php';

$db= new PDO('mysql:dbname=notas_master;host=localhost', "root", "");
$preparada=$db->prepare("SELECT COUNT(*) as total FROM Notas");
$preparada->execute();
$filas=$preparada->fetchObject()->total;  //Contar elementos totales
//SIN COUNT() EN LA CONSULTA: $filas=preparada->rowCount();
//var_dump($filas);die();

$numeroElementosPorPagina=2;

//Creamos instancia
$pagination = new Zebra_Pagination();




//Número total elementos a paginar
$pagination->records($filas);  //número total de elementos que devuelve la consulta


//Número elementos por página
$pagination->records_per_page($numeroElementosPorPagina);

//Sacar la página actual
$page = $pagination->get_page();


//Acotar cada página

$empieza_aqui=(($page - 1)*$numeroElementosPorPagina);//Es decir si empieza en 0, me muestra 2 // si empieza en 2, me muestra otros 2 a partir e ahí
$notas = $db->prepare("SELECT * FROM Notas LIMIT $empieza_aqui, $numeroElementosPorPagina"); 
//Página actual - 1 por número elementos por página (página actual), hasta número elementos por página
$notas->execute();


//Cargamos los estilos de la paginación
echo '<link rel="stylesheet" href="..\vendor\stefangabos\zebra_pagination\public\css\zebra_pagination.css">';
foreach($notas as $nota){
    echo "<h1>{$nota['titulo']}</h1>";
    echo "<p>{$nota['descripcion']}</p>";
}

//MÉTODO PARA LINKS DE LAS PÁGINAS
$pagination->render();
?>