
<?

  require ('phpQuery/phpQuery/phpQuery.php');
    $model_page_url = file_get_contents('http://reklab.ru/gallery/34/');  //Получаем всю страницу
	
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
	
	
	echo "<h1>" . $fdsa1 . "</h1><br>"; // вывод НАЗВАНИЯ КАТАЛОГА

	echo $vcxz1 . "<br> <br>"; // вывод описания КАТАЛОГА
	
	foreach($images as $value){
		echo '<img scr="http://reklab.ru'. $value . '" width="100%"><br>';	
        // Вывод самих изображений. Но! изображения не выводятся по причине мне не ведомой. Тег img и iframe не хотят их выводить
	}
?>