<?php
  require ('phpQuery/phpQuery.php');
   
  $connect = file_get_contents('http://reklab.ru/gallery/'); // получение данных с сайта
  
  $doc = phpQuery::newDocument($connect); // парсим код html страницы и присваиваем переменной  
  
  $qwerty = $doc->find('#<div[^>]+?id\s*?=\s*?["\']photogal["\'][^>]*?>(.+?)</div>#su'); // поиск блока галереи 
  
  foreach ($qwerty as $img) {
	  
    preg_match_all('#<img>(.+?)</img>#su', $qwerty, $img); // вытаскиваем изображение
	
  }
  */
  echo $connect; // вывод изображений. Пока еще нет
  
?>