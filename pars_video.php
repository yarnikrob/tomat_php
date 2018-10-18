<?php require ('phpQuery/phpQuery/phpQuery.php');
  
  $model_page_url_par = file_get_contents('http://reklab.ru/gallery/');  //Получаем всю страницу
  
  $model_page_par = phpQuery::newDocument($model_page_url_par); //Создаём объект страницы библиотекой
  
  // изображения
  
  $prodlist = $model_page_par->find('.prodlist'); // поиск блока галереи 
  
  $prodlist_vid = $prodlist->find('.gal_vid');
  
  $prodlist_vid_a = $prodlist_vid->find('a');
  
  foreach ($prodlist_vid_a as $vi_link) {
		
    $vid_link[] = pq($vi_link)->attr('href'); //В цикле помещаем ссылку на картинку в массив
	
	}
/*	
	$n = count($pht_link);
	echo $n.'<br>';
*/

  $prodlist_vid_p = $prodlist_vid->find('.proddesc');
  


//////////// Достаем изображения


$vi = array();


//записываем текст в файл

/*$str = "Изображения:";

    file_put_contents('file_video.txt',PHP_EOL . $str . PHP_EOL, FILE_APPEND); */
	
	foreach($vid_link as $valume){
		
		
		
		$fgc_link = "http://reklab.ru".$valume;
  
    $model_page_url = file_get_contents($fgc_link);  //Получаем страницы с фото
	
	$model_page = phpQuery::newDocument($model_page_url); //Создаём объект страницы библиотекой
	
	
	// ПОИСК ИЗОБРАЖЕНИЙ
	
	
	$qwerty = $model_page->find('#inn-content'); // поиск блока галереи 
	
	
	$videos_link = $qwerty->find('iframe'); //Ищем все теги img
	
	
	
	// ПОИСК НАЗВАНИЯ КАТАЛОГА
	
	$asdf = $model_page->find('#inn-laser-title'); // поиск блока галереи 
	
	$fdsa = $asdf->find('h1');
	
	$fdsa1 = $fdsa->text();
	
	
	
	// ПОИСК ОПИСАНИЯ КАТАЛОГА
	
	$zxcv = $model_page->find('#inn-content'); // поиск блока галереи 
	
	$vcxz = $zxcv->find('p');
	
	$vcxz1 = $vcxz->text();
	
	
	
	foreach ($videos_link as $video_link) {
		
    $videos[] = pq($video_link)->attr('src'); //В цикле помещаем ссылку на картинку в массив
	
	
	}
	
	
	
	file_put_contents('file_video.txt',PHP_EOL . $fdsa1 . PHP_EOL, FILE_APPEND); // вывод названия
	
		file_put_contents('file_video.txt', PHP_EOL . $vcxz1. PHP_EOL, FILE_APPEND);
	
	
	
	foreach($videos as $value){ 
		if(!in_array($value,$vi))
    {
		$vi[]=$value;
		
		$print_pht_link = $value;
		
		
	file_put_contents('file_video.txt', PHP_EOL . $print_pht_link, FILE_APPEND);
	
			}
		
        // Вывод ссылок на изображения.
	}
	file_put_contents('file_video.txt', PHP_EOL . PHP_EOL . PHP_EOL, FILE_APPEND);
	}
	
	
?>