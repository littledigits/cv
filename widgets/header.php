<?php
if ($_SERVER['DOCUMENT_ROOT']=='C:/Users/User/OneDrive') {
	$urlheaderaddress='localhost/menu.php';
} elseif ($_SERVER['DOCUMENT_ROOT']=='C:/Users/Lenovo/OneDrive'){
	$urlheaderaddress='localhost/cv/menu.php';
} else {
	$urlheaderaddress='littledigits.pl/menu.php';
}
echo '<h1 class="header"><p id="rotate" onclick="rotateX()">CURRICULUM VITAE</p><a class="header-href" href="http://'.$urlheaderaddress.'">www:\littleDIGITS.pl\CURRICULUM VITAE\</a></h1>';
?>