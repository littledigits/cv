<?php
	include 'meta.html';

	if(isSet($_COOKIE['css'])){
		if($_COOKIE['css']=="nc") echo '<link rel="stylesheet" href="css/style-norton-commander-like.css">';
	} else echo '<link rel="stylesheet" href="css/style-dos-like.css">';
?>
<title>DOŚWIADCZENIE ZAWODOWE - littleDIGITS</title>
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
<h2 style="display: none;"><i class="fa fa-suitcase"></i> DOŚWIADCZENIE ZAWODOWE</h2>
<?php
function h3($ii){echo '<h3 class="clickable" onclick="subdirOpenClose'.$ii.'()" style="display: none;">';}
?>
<?php echo h3('1');?>
01.08.2017 <i class="fa fa-arrow-right"></i> <?php echo date("d.m.Y")." r."?> (<ins>obecnie</ins>): <ins><abbr title="obecnie">webmaster</abbr></ins> 
<span><i id="h301i01" class="fas fa-chevron-circle-down"></i><i id="h301i02" class="fas fa-chevron-circle-up subdir-visible-hidden"></i></span>
</h3>
<div id="h301div" class="subdir-visible-hidden">
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> prowadzenie stron internetowych WordPress <i class="fab fa-wordpress"></i></p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> administracja platformą e-learning Moodle</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> administracja kontem www</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> dotychczasowe projekty: <i class="fa fa-link"></i> <a href="http://agencjamojedziecko.pl/" target="_blank">agencjamojedziecko.pl</a>, <i class="fa fa-link"></i> <a href="http://crossfitboxekipa.pl" target="_blank">crossfitboxekipa.pl</a>, <a href="http://moodle.agencjamojedziecko.pl/eszkola" target="_blank"><i class="fa fa-link"></i> Moodle</a></p>
</div>

<?php h3('2');?>
14.08.2008 <i class="fa fa-arrow-right"></i> <?php echo date("d.m.Y")." r."?> (<ins>obecnie</ins>): referent, starszy referent, starszy konsultant, <ins><abbr title="obecne stanowisko">specjalista do spraw projektów</abbr></ins> - innogy Polska S.A. (dawniej RWE Polska S.A.) 
<span><i id="h302i01" class="fas fa-chevron-circle-down"></i><i id="h302i02" class="fas fa-chevron-circle-up subdir-visible-hidden"></i></span>
</h3>
<div id="h302div" class="subdir-visible-hidden">
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> rejestracja scenariuszy testowych, błędów i czynności w aplikacji JIRA,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> przygotowanie szablonów w programie Adobe LiveCycle Designer,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> realizacja zawarcia, zmian, aneksów i rozwiązań umów,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> analiza, tworzenie i korygowanie faktur VAT,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> udzielanie odpowiedzi reklamacji rozliczeń i pozostałych,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> przygotowywanie raportów SAP, Excel,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> przygotowywanie specyfikacji nowych funkcjonalności systemowych, testowanie, szkolenia i instrukcje dla użytkowników,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> koordynacja pracy zespołu.</p>
</div>

<?php h3('3');?>
01.07.2006 <i class="fa fa-arrow-right"></i> 10.04.2008: samodzielny pracownik hali - hipermarket E.Leclerc 
<span><i id="h303i01" class="fas fa-chevron-circle-down"></i><i id="h303i02" class="fas fa-chevron-circle-up subdir-visible-hidden"></i></span>
</h3>
<div id="h303div" class="subdir-visible-hidden">
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> prawidłowe liczenie, ważenie i identyfikowanie artykułów przyjmowanych do i wydawanych z magazynu,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> sprawdzanie towarów z fakturami pod względem jakościowym i ilościowym,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> rejestracja i gromadzenie danych dotyczących strat i niedoborów zaistniałych w magazynie,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> tworzenie zamówień na podstawie przewidywanego wolumenu sprzedaży towaru,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> koordynacja pracy zespołu.</p>
</div>

<?php h3('4');?>
12.09.2006 <i class="fa fa-arrow-right"></i> 30.06.2007: pracownik hali – hipermarket E.Leclerc 
<span><i id="h304i01" class="fas fa-chevron-circle-down"></i><i id="h304i02" class="fas fa-chevron-circle-up subdir-visible-hidden"></i></span>
</h3>
<div id="h304div" class="subdir-visible-hidden">
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> prawidłowe liczenie, ważenie i identyfikowanie artykułów przyjmowanych do i wydawanych z magazynu,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> sprawdzanie towarów z fakturami pod względem jakościowym i ilościowym,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> rejestracja i gromadzenie danych dotyczących strat i niedoborów zaistniałych w magazynie.</p>
</div>

<?php h3('5');?>
14.01.2004 <i class="fa fa-arrow-right"></i> 07.09.2006: pracownik magazynu – hipermarket Tesco 
<span><i id="h305i01" class="fas fa-chevron-circle-down"></i><i id="h305i02" class="fas fa-chevron-circle-up subdir-visible-hidden"></i></span>
</h3>
<div id="h305div" class="subdir-visible-hidden">
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> prawidłowe liczenie, ważenie i identyfikowanie artykułów przyjmowanych do i wydawanych z magazynu,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> sprawdzanie towarów z fakturami pod względem jakościowym i ilościowym,</p>
<p class="h3-p-list"><i class="fa fa-cog fa-spin"></i> rejestracja i gromadzenie danych dotyczących strat i niedoborów zaistniałych w magazynie.</p>
</div>
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
		$("h2").slideDown(1000, function() {
			$("h3").fadeIn(1000);
		});
	});
</script>

</body>
</html>