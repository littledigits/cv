<?php
	include 'meta.html';

	if(isSet($_COOKIE['css'])){
		if($_COOKIE['css']=="nc") echo '<link rel="stylesheet" href="css/style-norton-commander-like.css">';
	} else echo '<link rel="stylesheet" href="css/style-dos-like.css">';
?>
<title>WYKSZTAŁCENIE, KURSY I SZKOLENIA - littleDIGITS</title>
</head>
<body>
	<header id="header-dimension">
		<?php
			if (isSet($_COOKIE['css'])) {
				if($_COOKIE['css']=="nc") echo '';
			} else include 'widgets/header.html';
		?>
	</header>
	<nav id="nav-dimension">
		<?php
			if (isSet($_cookie['css'])) {
				if($_COOKIE['css']=="nc") echo '';
			} else include 'widgets/nav.txt';
		?>
	</nav>
	<article id="article-dimension">
		<!--section-->
			<div id="iframe-left">
				<?php include 'widgets/nav.html'; ?>
			</div>
			<div id="iframe-right">
		<section>
			<div>
				<h2 style="display: none;"><i class="fa fa-university"></i> WYKSZTAŁCENIE</h2>
				<h3 style="display: none;">[1] 10.2018 <i class="fa fa-arrow-right"></i> 12.2018</i></h3>
				<p style="display: none;"><a href="http://www.pja.edu.pl/" target="_blank">Polsko-Japońska Akademia Technik Komputerowych</a><span>, kierunek Informatyka</span></p>
				<h3 style="display: none;">[0] 09.2006 <i class="fa fa-arrow-right"></i> 04.2008</h3>
				<p style="display: none;">Prywatne Liceum Ogólnokształcące dla Dorosłych Nr 19 w Warszawie. Zaliczony egzamin maturalny.</p>
			</div>
			<div>
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
		</section>
	</div>
</article>

	<footer id="footer-dimension">
		<?php include 'widgets/css_button.txt';?>

		<?php
			if (isSet($_COOKIE['css'])) {
				if ($_COOKIE['css']=="nc") include 'widgets/navigator.txt';
				else echo '';
			} else include 'widgets/footer.html';
		?>
	</footer>

<script>
	<?php include 'js/script.js';?>
	<?php include 'js/jquery-3.3.1.js';?>
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