<?php
if ($_SERVER['DOCUMENT_ROOT']=='C:/Users/Lenovo/OneDrive') {
	$urlheaderaddress='localhost/cv/menu.php';
} else {
	$urlheaderaddress='littledigits.pl/menu.php';
}
echo '<h1><a class="header-href" href="http://'.$urlheaderaddress.'">www:\littleDIGITS.pl\CURRICULUM VITAE\</a></h1>';
?>