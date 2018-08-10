<!DOCTYPE html>
<lang="pl">
<head>
<title>
Curriculum vitae
</title>
<?php
if(isset($_POST['select'])){
	if($_POST['select']=="dos"){print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';}
	elseif($_POST['select']=="nc"){print '<link rel="stylesheet" type="text/css" href="../css/style-norton-commander-like.css">';}
}
else print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
?>
<?php
include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv/meta.txt";
?>
</head>
<body>

<header>
<?php
if(isset($_POST['select'])){
	if($_POST['select']=="dos"){include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv_test_iframe/header.html";}
	else print '';
}
else include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv_test_iframe/header.html";
?>
</header>
<nav>
<?php
if(isset($_POST['select'])){
	if($_POST['select']=="dos"){include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv_test_iframe/nav.html";}
	elseif($_POST['select']=="nc"){print '';}
}
else include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv_test_iframe/nav.html";
?>
</nav>
<!--article>
	<section-->
		<iframe id="iframe-left" src="nav.html"></iframe>
		<iframe id="iframe-right" src="adress.php" name="main"></iframe>
	<!--/section>
</article>
<aside>
</aside-->
<footer>
	<hr>
	<form method="post" action="index.php">
		<select name="select">
			<option value="dos">DOS_like</option>
			<option value="nc">norton commander</option>
		</select>
		<input type="submit" value="zatwierdź zmianę" name="">
	</form>

<?php
if(isset($_POST['select'])){
	if($_POST['select']=="dos"){include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv_test_iframe/footer.html";}
	elseif ($_POST['select']=="nc"){include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv_test_iframe/header.html";}
	else print '';
}
else include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv_test_iframe/footer.html";
?>

	<p>Strona wyświetlona (czas serwera) <?php
	$weekday=array('Monday'=>'poniedziałek', 'Tuesday'=>'wtorek', 'Wednesday'=>'środa', 'Thursday'=>'czwartek', 'Friday'=>'piątek', 'Saturday'=>'sobota', 'Sunday'=>'niedziela');
	echo date("d.m.Y")." r. (".$weekday[date("l")].") ".date("h:i:s");
	?>
</footer>
</body>
</html>