<?php
$url=$_SERVER['DOCUMENT_ROOT'].'/cv/';
include $url.'meta.txt';
?>
<!doctype html>
<html lang="pl-PL">
<link rel="stylesheet" href ="css/style-dos-like.css">
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
indexinfo ("html+php+sql+js", "Aktualnie najbardziej zaawansowany wariant", '');
?>
</nav>
<footer>
<?php
include $url.'cv_html+php+sql+js/footer.txt';
?>
</footer>
</body>
</html>