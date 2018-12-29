<?php
//$url=$_SERVER['DOCUMENT_ROOT'].'/cv/';
if ($_SERVER['DOCUMENT_ROOT']=='C:/Users/Lenovo/OneDrive') {
	$urladdress=$_SERVER['DOCUMENT_ROOT'].'/cv/';
} else {
	$urladdress=$_SERVER['DOCUMENT_ROOT'].'/';
}

include $urladdress.'meta.php';

if(isset($_COOKIE['css'])){
	if($_COOKIE['css']=="dos") print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
	elseif($_COOKIE['css']=="nc") print '<link rel="stylesheet" type="text/css" href="../css/style-norton-commander-like.css">';
}
else print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
?>
<!doctype html>
<html lang="pl-PL">
<title>WYKSZTAŁCENIE, KURSY I SZKOLENIA - littleDIGITS</title>
<link rel="shortcut icon" href="../images/logo.png">
<body>
<header id="header-dimension">
<?php
if (isset($_COOKIE['css'])) {
	if($_COOKIE['css']=="dos") include $urladdress.'widgets/header.php';
	elseif($_COOKIE['css']=="nc") print '';
} else {include $urladdress.'widgets/header.php';
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
	<h2 style="display: none;"><i class="fa fa-university"></i> WYKSZTAŁCENIE</h2>
	<h3 style="display: none;">[1] 10.2018 <i class="fa fa-arrow-right"></i> 12.2018</i></h3>
	<p style="display: none;"><a href="http://www.pja.edu.pl/" target="_blank">Polsko-Japońska Akademia Technik Komputerowych</a><span>, kierunek Informatyka</span></p>
	<h3 style="display: none;">[0] 09.2006 <i class="fa fa-arrow-right"></i> 04.2008</h3>
	<p style="display: none;">Prywatne Liceum Ogólnokształcące dla Dorosłych Nr 19 w Warszawie. Zaliczony egzamin maturalny.</p>
	<h2 style="display: none;"><i class="fas fa-thumbs-up"></i> KURSY I SZKOLENIA</h2>
	<p style="display: none;">[4] kurs pierwszej pomocy <i class="fa fa-medkit"></i></p>
	<p style="display: none;">[3] SCRUM DLA ZESPOŁU 
		<abbr title="podgląd dokumentu">
			<a href ="../pdf/Zaswiadczenie ukonczenia szkolenia scrum dla zespolu.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
			</a>
		</abbr>
	</p>
	<p style="display: none;">[2] MS Access - zbieranie i konsolidacja informacji, przetwarzanie i prezentacja danych 
		<abbr title="podgląd dokumentu">
			<a href="../pdf/Swiadectwo ukonczenia szkolenia MS Access - zbieranie i konsolidacja informacji, przetwarzanie i prezentacja danych.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
			</a>
		</abbr>
	</p>
	<p style="display: none;">[1] MS Excel 2010 - Przegląd narzędzi zaawansowanych 
		<abbr title="podgląd dokumentu">
			<a href="../pdf/Swiadectwo ukonczenia szkolenia MS Excel 2010 - Przeglad narzedzi zaawansowanych.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
			</a>
		</abbr>
	</p>
	<p style="display: none;">[0] MS Excel dla zaawansowanych 
		<abbr title="podgląd dokumentu">
			<a href="../pdf/Dyplom Microsoft Excel dla Zaawansowanych.pdf" target="_blank">
				<i class="fas fa-file-pdf"></i>
			</a>
		</abbr>
	</p>
	</div>
</article>

<footer id="footer-dimension">
<?php include $urladdress.'widgets/css_button.txt';?>

<?php
if (isset($_COOKIE['css'])) {
	if ($_COOKIE['css']=="dos") include 'footer.txt';
	elseif ($_COOKIE['css']=="nc") include 'navigator.txt';
	else print '';
}
else include 'footer.txt';
?>

</footer>

<script>
	<?php include $urladdress.'js/script.js';?>
	<?php include $urladdress.'js/jquery-3.3.1.js';?>
	$(document).ready(function() {
		$("h2").slideDown(1000, function(){
			$("h3").slideDown(1000, function() {
				$("#iframe-right p").slideDown(1000);
			});
		});
	});
</script>

</body>
</html>