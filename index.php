<?php
$url=$_SERVER['DOCUMENT_ROOT'].'/cv/';
include $url.'meta.txt';
?>
<!doctype html>
<html lang="pl-PL">
<link rel="shortcut icon" href="images/logo.png">
<title></title>
<body>
<header>
<h1>www:\littleDIGITS.pl\CURRICULUM VITAE\</h1>
</header>
<nav style="display: block;">
<p style="font-size: 120%;">Każdy z poniższych odnośników służy do testowania i prezentowania specyficznych sytuacji</p><br>
<?php
function indexinfo($folder, $opis, $disabled) {
	if ($folder=="html") {
		$target=$folder.'/address.html';
	} else {
		$target=$folder.'/address.php';
	}
	if ($disabled=='') {
		echo '<a href="cv_'.$target.'" class="index">'.strtoupper($folder)."</a><br><p>$opis. Ostatnio zmieniony ".date("d.m.Y H:i:s",fileatime("cv_".$folder)).'.</p><br>';
	} else {
		echo '<p><del>'.strtoupper($folder)."</p><p>$opis. Ostatnio zmieniony ".date("d.m.Y H:i:s",fileatime("cv_".$folder)).'.</del></p><br>';
	}
}
//indexinfo("bootstrap", "W przyszłości");
indexinfo ("html", "Czysty HTML z dodatkiem Font awesome", '');
indexinfo ("html+php", "Treść jest odczytywana z wersji html i zamieniana w celu wyświetlenia w motywie norton commander", '');
indexinfo ("html+php+sql", 'Celem były eksperymenty z &ltiframe&gt. Wariant porzucony', 'disabled');
indexinfo ("html+php+sql+js", "Aktualnie najbardziej zaawansowany wariant", '');
?>
</nav>
<footer>
<p>theme: DOS_like</p>
<p class="mid-big">HTML5 <i class="fab fa-html5"></i>, font awesome <i class="fab fa-font-awesome"></i> Podziękowania dla: Borsoft, P. Paprzycki</p>
<p class="mid-big">alfabet Morse'a &#8226;&#8211;&#8226;&#8226;|&#8226;&#8226;|&#8211;|&#8211;|&#8226;&#8211;&#8226;&#8226;|&#8226;|&#8211;&#8226;&#8226;|&#8226;&#8226;|&#8211;&#8211;&#8226;|&#8226;&#8226;|&#8211;|&#8226;&#8226;&#8226;</p>
<p class="mid-big">kod binarny <code>01101100 01101001 01110100 01110100 01101100 01100101 01100100 01101001 01100111 01101001 01110100 01110011</code></p>
</footer>
</body>
</html>