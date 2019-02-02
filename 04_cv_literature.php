<?php
	include 'meta.html';

	if(isSet($_COOKIE['css'])){
		if($_COOKIE['css']=="nc") echo '<link rel="stylesheet" href="css/style-norton-commander-like.css">';
	} else echo '<link rel="stylesheet" href="css/style-dos-like.css">';
?>
<title>LITERATURA - littleDIGITS</title>
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
				<h2 id="LITERATURA" style="display: none;"><i class="fa fa-book"></i> LITERATURA</h2>
				<?php
				$connection=mysql_connect("littledigits.pl", "kbt_cv", "testing") or die ("die przy połączeniu z serwerem");
				mysql_select_db("kbt_cv") or die ("die przy łączeniu z bazą");
				mysql_query("SET CHARSET utf8");
				mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
				$wynik=mysql_query("SELECT * FROM literature") or die ("die przy zapytaniu");
	
				while ($rekord = mysql_fetch_assoc($wynik)) {
				$key=$rekord['key'];
				$read=$rekord['read'];
				$title=$rekord['title'];
				$author=$rekord['author'];

				if($read!=""){$read="<i class='fa fa-check-square'></i> ";}else{$read="<i class='fas fa-square'></i> ";}
				if($title!=""){$title="<cite>$title</cite>";}

				echo '<p style="display: none;">['.$key.'] '.$read .'"'.$title.'" - '.$author.'</p>';
				}

				mysql_close($connection);
				?>
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
			$("#iframe-right p").fadeIn(1000);
		});
	});
</script>

</body>
</html>