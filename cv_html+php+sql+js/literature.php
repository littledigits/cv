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
<title>LITERATURA</title>
<link rel="shortcut icon" href="../images/logo.png">
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
	<h2 id="LITERATURA"><i class="fa fa-book"></i> LITERATURA</h2>
<!--?php
//przeczytane
$teraz=140;//ilość dotychczas przeczytanych stron
$max=152;//ilość strona do przeczytania
$procent=round($teraz/$max*100);
?-->
<!--?php echo $procent;?>%)-->

<?php
	mysql_connect("littledigits.pl", "kbt_cv", "testing") or die ("die przy połączeniu z serwerem");
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

	print("<p>[$key] $read '$title' - $author</p>");
	}
?>
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