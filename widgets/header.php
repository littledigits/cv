<?php
if ($_SERVER['DOCUMENT_ROOT']=='C:/Users/Lenovo/OneDrive') {
	$urladdress='localhost/cv/';
} else {
	$urladdress='littledigits.pl/cv/';
}
echo '<h1>www:\littleDIGITS.pl\<a class="header-href" href="http://'.$urladdress.'">CURRICULUM VITAE\
				<span class="header-href-content"><p>cd..</p>
				</span>
			</a>
		</h1>';
?>