
<?

  require ('phpQuery/phpQuery/phpQuery.php');
    $model_page_url = file_get_contents('http://reklab.ru/gallery/34/');  //�������� ��� ��������
	
	$model_page = phpQuery::newDocument($model_page_url); //������ ������ �������� �����������
	
	
	// ����� �����������
	
	$qwerty = $model_page->find('#photogal'); // ����� ����� ������� 
  
	$images_link = $qwerty->find('img'); //���� ��� ���� img
	
	
	
	// ����� �������� ��������
	
	$asdf = $model_page->find('#inn-laser-title'); // ����� ����� ������� 
	
	$fdsa = $asdf->find('h1');
	
	$fdsa1 = $fdsa->text();
	
	
	
	// ����� �������� ��������
	
	$zxcv = $model_page->find('#inn-content'); // ����� ����� ������� 
	
	$vcxz = $zxcv->find('p');
	
	$vcxz1 = $vcxz->text();
	
	
	
	foreach ($images_link as $image_link) {
		
    $images[] = pq($image_link)->attr('src'); //� ����� �������� ������ �� �������� � ������
	
	}
	
	
	echo "<h1>" . $fdsa1 . "</h1><br>"; // ����� �������� ��������

	echo $vcxz1 . "<br> <br>"; // ����� �������� ��������
	
	foreach($images as $value){
		echo '<img scr="http://reklab.ru'. $value . '" width="100%"><br>';	
        // ����� ����� �����������. ��! ����������� �� ��������� �� ������� ��� �� �������. ��� img � iframe �� ����� �� ��������
	}
?>