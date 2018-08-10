<?php
//PLIK DO POBRANIA ZAWARTOŚCI ANALOGICZNEGO PLIKU Z CSS DOS - ADDITIONAL_INFORMATIONS.HTML
if ($_SERVER['DOCUMENT_ROOT']=="C:/Users/Lenovo/OneDrive") $path=$_SERVER['DOCUMENT_ROOT']."/littledigits.pl/cv/cv_html/additional_information.html";
else $path=$_SERVER['DOCUMENT_ROOT']."/littledigits.pl/cv/cv_html/additional_information.html";
$plik=fopen($path, "r") or die ("die fopen");
$odczytanyplik=fread($plik, filesize($path));
$zamienionyplik=str_replace("style-dos-like.css", "style-norton-commander-like.css", $odczytanyplik);
$zamienionyplik=str_replace("<header id=\"home\" class=\"mid-big\">
	<h1>www:\littledigits.pl\<a class=\"header-href\" href=\"http://littledigits.pl/cv/\">CURRICULUM VITAE\html\
			<span class=\"header-href-content\"><p>cd..</p>
			</span>
		</a>
	</h1>
</header>", "", $zamienionyplik);
$zamienionyplik=str_replace("<hr class=\"mid-big\">
		<p id=\"theme-name\">theme: DOS_like</p>
		<p class=\"mid-big\">HTML5 <i class=\"fa fa-html5\"></i>, font awesome <i class=\"fa fa-font-awesome\"></i> Podziękowania dla: Borsoft, P. Paprzycki</p>
		<p class=\"mid-big\">alfabet Morse'a &#8226;&#8211;&#8226;&#8226;|&#8226;&#8226;|&#8211;|&#8211;|&#8226;&#8211;&#8226;&#8226;|&#8226;|&#8211;&#8226;&#8226;|&#8226;&#8226;|&#8211;&#8211;&#8226;|&#8226;&#8226;|&#8211;|&#8226;&#8226;&#8226;</p>
		<p class=\"mid-big\">kod binarny <code>01101100 01101001 01110100 01110100 01101100 01100101 01100100 01101001 01100111 01101001 01110100 01110011</code></p>", "<h1>www:\littledigits.pl\<a class=\"header-href\" href=\"http://littledigits.pl/cv/\">CURRICULUM VITAE\html\
				<span class=\"header-href-content\"><p>cd..</p>
				</span>
			</a>
		</h1><p>theme: norton commander</p>", $zamienionyplik);
$zamienionyplik=str_replace("address.html", "address.php", $zamienionyplik);
$zamienionyplik=str_replace("workexperience.html", "workexperience.php", $zamienionyplik);
$zamienionyplik=str_replace("education_courses.html", "education_courses.php", $zamienionyplik);
$zamienionyplik=str_replace("literature.html", "literature.php", $zamienionyplik);
$zamienionyplik=str_replace("additional_information.html", "additional_information.php", $zamienionyplik);
echo $zamienionyplik;fclose($plik);
?>