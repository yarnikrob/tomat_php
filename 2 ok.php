
<?
  require ('phpQuery/phpQuery/phpQuery.php');
  
  $model_page_url_par = file_get_contents('http://reklab.ru/gallery/');  //�������� ��� ��������
  
  $model_page_par = phpQuery::newDocument($model_page_url_par); //������ ������ �������� �����������
  
  // �����������
  
  $prodlist = $model_page_par->find('.prodlist'); // ����� ����� ������� 
  
  $prodlist_pht = $prodlist->find('.gal_pht');
  
  $prodlist_pht_a = $prodlist_pht->find('a');
  
  foreach ($prodlist_pht_a as $ph_link) {
		
    $pht_link[] = pq($ph_link)->attr('href'); //� ����� �������� ������ �� �������� � ������
	
	}
/*	
	$n = count($pht_link);
	echo $n.'<br>';
*/


//////////// ������� �����������


$re = array();

$filename = 'somefile.txt';

//���������� ����� � ����


    foreach($pht_link as $valum){
		
		$fgc_link = "http://reklab.ru".$valum;
  
    $model_page_url = file_get_contents($fgc_link);  //�������� �������� � ����
	
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
	
	
	echo "<h1>" . $fdsa1 . "</h1>"; // ����� �������� ��������

	echo $vcxz1 . "<br> <br>"; // ����� �������� ��������
	
	foreach($images as $value){ 
		if(!in_array($value,$re))
    {
		$re[]=$value;
	echo '<a href="http://reklab.ru'. $value . '">http://reklab.ru'. $value . '</a><br>';	}
		
        // ����� ������ �� �����������. ��! ����������� �� ��������� �� ������� ��� �� �������. ��� img � iframe �� ����� �� ��������
	
	}
	echo '<br><br><br>';
	}
	
	
?>