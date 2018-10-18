
<?
  require ('phpQuery/phpQuery/phpQuery.php');
  
  $model_page_url_par = file_get_contents('http://reklab.ru/gallery/');  //Получаем всю страницу
  
  $model_page_par = phpQuery::newDocument($model_page_url_par); //Создаём объект страницы библиотекой
  
  // изображения
  
  $prodlist = $model_page_par->find('.prodlist'); // поиск блока галереи 
  
  $prodlist_pht = $prodlist->find('.gal_pht');
  
  $prodlist_pht_a = $prodlist_pht->find('a');
  
  foreach ($prodlist_pht_a as $ph_link) {
		
    $pht_link[] = pq($ph_link)->attr('href'); //В цикле помещаем ссылку на картинку в массив
	
	}
/*	
	$n = count($pht_link);
	echo $n.'<br>';
*/

  
  $prodlist_pht_p = $prodlist_pht->find('.proddesc');
  
  foreach ($prodlist_pht_p as $ph_lp) {
		
    $pht_p[] = pq($ph_lp)->html(); //В цикле помещаем ссылку на картинку в массив
	
	}


//////////// Достаем изображения


$re = array();


//записываем текст в файл

/*$str = "Изображения:";

    file_put_contents('file1.txt',PHP_EOL . $str . PHP_EOL, FILE_APPEND); */
	
	foreach($pht_link as $valum){
		
		
		
		$fgc_link = "http://reklab.ru".$valum;
  
    $model_page_url = file_get_contents($fgc_link);  //Получаем страницы с фото
	
	$model_page = phpQuery::newDocument($model_page_url); //Создаём объект страницы библиотекой
	
	
	// ПОИСК ИЗОБРАЖЕНИЙ
	
	
	$qwerty = $model_page->find('#photogal'); // поиск блока галереи 
	
	
	$images_link = $qwerty->find('img'); //Ищем все теги img
	
	
	
	// ПОИСК НАЗВАНИЯ КАТАЛОГА
	
	$asdf = $model_page->find('#inn-laser-title'); // поиск блока галереи 
	
	$fdsa = $asdf->find('h1');
	
	$fdsa1 = $fdsa->text();
	
	
	
	// ПОИСК ОПИСАНИЯ КАТАЛОГА
	
	$zxcv = $model_page->find('#inn-content'); // поиск блока галереи 
	
	$vcxz = $zxcv->find('p');
	
	$vcxz1 = $vcxz->text();
	
	
	
	foreach ($images_link as $image_link) {
		
    $images[] = pq($image_link)->attr('src'); //В цикле помещаем ссылку на картинку в массив
	
	
	}
	
	
	
	file_put_contents('file1.txt',PHP_EOL . $fdsa1 . PHP_EOL, FILE_APPEND); // вывод названия
	
		file_put_contents('file1.txt', PHP_EOL . $vcxz1. PHP_EOL, FILE_APPEND);
	
	
	file_put_contents('file1.txt', PHP_EOL . $print_pht_link, FILE_APPEND);
	
	foreach($images as $value){ 
		if(!in_array($value,$re))
    {
		$re[]=$value;
		
		$print_pht_link = 'http://reklab.ru'.$value;
		
		
	file_put_contents('file1.txt', PHP_EOL . $print_pht_link, FILE_APPEND);
	
			}
		
        // Вывод ссылок на изображения.
	}
	file_put_contents('file1.txt', PHP_EOL . PHP_EOL . PHP_EOL, FILE_APPEND);
	}
	
	
?>