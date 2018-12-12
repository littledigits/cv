<?php
include 'meta.php';
?>
<!doctype html>
<html lang="pl-PL">
<link rel="stylesheet" href ="css/style-dos-like.css">
<link rel="shortcut icon" href="images/logo.png">
<title>menu</title>
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
	} elseif ($folder=="bootstrap") {
		$target=$folder.'/printing.html';
	} elseif ($folder=="ranczo") {
		$target=$folder.'/index.php';
	}
	else {
		$target=$folder.'/address.php';
	}
	if ($disabled=='') {
		echo '<a href="cv_'.$target.'" class="index">'.strtoupper($folder)."</a><br><p>$opis. Ostatnio zmieniony ".date("d.m.Y H:i:s",fileatime("cv_".$folder)).'.</p><br>';
	} else {
		echo '<p><del>'.strtoupper($folder)."</p><p>$opis. Ostatnio zmieniony ".date("d.m.Y H:i:s",fileatime("cv_".$folder)).'.</del></p><br>';
	}
}
indexinfo ("html", "Czysty HTML z dodatkiem Font awesome", '');
indexinfo ("html+php+sql+js", "Aktualnie najbardziej zaawansowany wariant", '');
indexinfo("bootstrap", "Pierwsze podejście. Docelowo ta wersja cv ma słuzyć do wydruku lub tworzenia pliku pdf", '');
indexinfo("ranczo", "Drugie podejście do bootstrap. Projekt na podstawie materiałów Ranczo pod pomarańczą", '');
?>
</nav>
<footer>
<?php
include 'cv_html+php+sql+js/footer.txt';
?>
</footer>
</body>
</html>