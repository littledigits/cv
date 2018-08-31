<?php
if ($_SERVER['DOCUMENT_ROOT']=='C:/Users/Lenovo/OneDrive') {
	$urladdress='localhost/cv/menu.php';
} else {
	$urladdress='littledigits.pl/cv/menu.php';
}
echo '<h1><a class="header-href" href="http://'.$urladdress.'">www:\littleDIGITS.pl\CURRICULUM VITAE\</a></h1>';
?>