
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

  
  $prodlist_pht_p = $prodlist_pht->find('.proddesc');
  
  foreach ($prodlist_pht_p as $ph_lp) {
		
    $pht_p[] = pq($ph_lp)->html(); //� ����� �������� ������ �� �������� � ������
	
	}


//////////// ������� �����������


$re = array();


//���������� ����� � ����

/*$str = "�����������:";

    file_put_contents('file1.txt',PHP_EOL . $str . PHP_EOL, FILE_APPEND); */
	
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
	
	
	
	file_put_contents('file1.txt',PHP_EOL . $fdsa1 . PHP_EOL, FILE_APPEND); // ����� ��������
	
		file_put_contents('file1.txt', PHP_EOL . $vcxz1. PHP_EOL, FILE_APPEND);
	
	
	file_put_contents('file1.txt', PHP_EOL . $print_pht_link, FILE_APPEND);
	
	foreach($images as $value){ 
		if(!in_array($value,$re))
    {
		$re[]=$value;
		
		$print_pht_link = 'http://reklab.ru'.$value;
		
		
	file_put_contents('file1.txt', PHP_EOL . $print_pht_link, FILE_APPEND);
	
			}
		
        // ����� ������ �� �����������.
	}
	file_put_contents('file1.txt', PHP_EOL . PHP_EOL . PHP_EOL, FILE_APPEND);
	}
	
	
?>