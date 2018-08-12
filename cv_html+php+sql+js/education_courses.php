<?php
$url=$_SERVER['DOCUMENT_ROOT'].'/cv/';

include $url.'meta.txt';

if(isset($_COOKIE['css'])){
	if($_COOKIE['css']=="dos") print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
	elseif($_COOKIE['css']=="nc") print '<link rel="stylesheet" type="text/css" href="../css/style-norton-commander-like.css">';
}
else print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
?>
<!doctype html>
<html lang="pl-PL">
<title>[xyz] WYKSZTAŁCENIE, KURSY I SZKOLENIA</title>
<link rel="Shortcut icon" href="../images/logo.png">
<body>
<header id="header-dimension">
<?php
if (isset($_COOKIE['css'])) {
	if($_COOKIE['css']=="dos") include $url.'widgets/header.php';
	elseif($_COOKIE['css']=="nc") print '';
} else {include $url.'widgets/header.php';
}
?>
</header>
<nav id="nav-dimension">
<?php
if (isset($_cookie['css'])) {
	if($_COOKIE['css']=="dos") include 'nav.txt';
	elseif($_COOKIE['css']=="nc") print '';
} else {
	include 'nav.txt';
}
?>
</nav>
<article id="article-dimension">
	<!--section-->
		<div id="iframe-left">
			<?php include 'nav.html'; ?>
		</div>
<div id="iframe-right">
	<h2><i class="fa fa-university"></i> WYKSZTAŁCENIE</h2>
	<h3>[1] 10.2018 <i class="fa fa-arrow-right"></i> </h3>
	<p><a href="http://www.pja.edu.pl/" target="_blank">Polsko-Japońska Akademia Technik Komputerowych</a><span>, kierunek Informatyka</span></p>
	<h3>[0] 09.2006 <i class="fa fa-arrow-right"></i> 04.2008</h3>
	<p>Prywatne Liceum Ogólnokształcące dla Dorosłych Nr 19 w Warszawie. Zaliczony egzamin maturalny.</p>
	<h2><i class="fas fa-thumbs-up"></i> KURSY I SZKOLENIA</h2>
	<p>[4] kurs pierwszej pomocy <i class="fa fa-medkit"></i></p>
	<p>[3] SCRUM DLA ZESPOŁU 
		<abbr title="podgląd dokumentu">
			<a href ="../pdf/Zaswiadczenie ukonczenia szkolenia scrum dla zespolu.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
			</a>
		</abbr>
	</p>
	<p>[2] MS Access - zbieranie i konsolidacja informacji, przetwarzanie i prezentacja danych 
		<abbr title="podgląd dokumentu">
			<a href="../pdf/Swiadectwo ukonczenia szkolenia MS Access - zbieranie i konsolidacja informacji, przetwarzanie i prezentacja danych.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
			</a>
		</abbr>
	</p>
	<p>[1] MS Excel 2010 - Przegląd narzędzi zaawansowanych 
		<abbr title="podgląd dokumentu">
			<a href="../pdf/Swiadectwo ukonczenia szkolenia MS Excel 2010 - Przeglad narzedzi zaawansowanych.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
			</a>
		</abbr>
	</p>
	<p>[0] MS Excel dla zaawansowanych 
		<abbr title="podgląd dokumentu">
			<a href="../pdf/Dyplom Microsoft Excel dla Zaawansowanych.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
		</abbr>
	</p>
	</div>
</article>

<footer id="footer-dimension">
<?php include $url.'widgets/css_button.txt';?>

<?php
if (isset($_COOKIE['css'])) {
	if ($_COOKIE['css']=="dos") include 'footer.txt';
	elseif ($_COOKIE['css']=="nc") include 'navigator.txt';
	else print '';
}
else include 'footer.txt';
?>

	<p class="bottom-p">Strona wyświetlona (czas serwera) <?php
	$weekday=array('Monday'=>'poniedziałek', 'Tuesday'=>'wtorek', 'Wednesday'=>'środa', 'Thursday'=>'czwartek', 'Friday'=>'piątek', 'Saturday'=>'sobota', 'Sunday'=>'niedziela');
	echo date("d.m.Y")." r. (".$weekday[date("l")].") ".date("h:i:s");
	?>
	</p>
</footer>

<script>
	<?php include $url.'js/script.js';?>
	<?php include $url.'js/jquery-3.3.1.js';?>	
</script>

</body>
</html>