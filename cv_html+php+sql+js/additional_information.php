<?php
//$urladdres=$_SERVER['DOCUMENT_ROOT'].'/cv/';
if ($_SERVER['DOCUMENT_ROOT']=='C:/Users/Lenovo/OneDrive') {
	$urladdress=$_SERVER['DOCUMENT_ROOT'].'/cv/';
} else {
	$urladdress=$_SERVER['DOCUMENT_ROOT'].'/';
}

include $urladdress.'meta.php';

if(isset($_COOKIE['css'])){
	if($_COOKIE['css']=="dos") echo '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
	elseif($_COOKIE['css']=="nc") echo '<link rel="stylesheet" type="text/css" href="../css/style-norton-commander-like.css">';
}
else echo '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
?>
<!doctype html>
<html lang="pl-PL">
<title>DODATKOWE INFORMACJE</title>
<link rel="shortcut icon" href="../images/logo.png">
<body>
	<header id="header-dimension">
<?php
if (isset($_COOKIE['css'])) {
	if($_COOKIE['css']=="dos") include $urladdress.'widgets/header.php';
	elseif($_COOKIE['css']=="nc") echo '';
} else {include $urladdress.'widgets/header.php';
}
?>
	</header>
	<nav id="nav-dimension">
<?php
if (isset($_cookie['css'])) {
	if($_COOKIE['css']=="dos") include 'nav.txt';
	elseif($_COOKIE['css']=="nc") echo '';
} else {
	include $urladdress.'cv_html+php+sql+js/nav.txt';
}
?>
	</nav>
	<article id="article-dimension">
		<!--section-->
			<div id="iframe-left">
				<?php include "nav.html"; ?>
			</div>
			<div id="iframe-right">
				<h2 style="display: none;"><i class="fas fa-ellipsis-h"></i> INNE</h2>
				<?php
				$style=' style="display: none;"';

				$connection=mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
				mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
				mysql_query("SET CHARSET utf8");
				mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
				$wynik = mysql_query ("SELECT * FROM additional_information_other") or die ("die przy zapytaniu");
				$rekord = mysql_fetch_assoc($wynik);
				$key = $rekord['key']-1;
				$icone = $rekord['icone'];
				$description = $rekord['description'];

				if($icone!=""){$icone="<i class='fa $icone'></i>";}
				if($description!=""){$description=" $description<br>";}
				echo '<p'.$style.'>['.$key.'] '.$icone.$description.'</p>';
				?>

				<h2 style="display: none;"><i class="fas fa-user-plus"></i> ZAINTERESOWANIA</h2>
				<?php
				//mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
				mysql_query("SET CHARSET utf8");
				mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
				$wynik = mysql_query ("SELECT * FROM additional_information_interests") or die ("die przy zapytaniu");
		
				while ($rekord = mysql_fetch_assoc ($wynik)) {
				$key = $rekord['key']-1;
				$icone = $rekord['icone'];
				$description = $rekord['description'];
		
				if($icone!=""){$icone="<i class='fa $icone'></i>";}
				if($description!=""){$description=" $description<br>";}
				echo '<p'.$style.'>['.$key.'] '.$icone.$description.'</p>';}
				?>

				<h2 style="display: none;"><i class="fa fa-bullhorn"></i> JĘZYKI OBCE</h2>
				<?php
				//mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
				mysql_query("SET CHARSET utf8");
				mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
				$wynik = mysql_query ("SELECT * FROM additional_information_languages") or die ("die przy zapytaniu");
		
				while ($rekord = mysql_fetch_assoc ($wynik)) {
				$key = $rekord['key']-1;
				$description = $rekord['description'];
		
				if($description!=""){$description="$description<br>";}
				echo '<p'.$style.'>['.$key.'] '.$description.'</p>';}
				
				mysql_close($connection);
				?>
			</div>
		</article>

	<footer id="footer-dimension">
		<?php include $urladdress.'widgets/css_button.txt';

		if (isset($_COOKIE['css'])) {
		if ($_COOKIE['css']=="dos") include 'footer.txt';
		elseif ($_COOKIE['css']=="nc") include 'navigator.txt';
		else echo '';
		}
		else include 'footer.txt';
		?>

	</footer>

<script>
	<?php include $urladdress.'js/script.js';?>
	<?php include $urladdress.'js/jquery-3.3.1.js';?>
	$(document).ready(function() {
		$("h2").slideDown(1000);
		$("#iframe-right p").fadeIn(2000);
	});
</script>

</body>
</html>