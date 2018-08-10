<!doctype html>
<html>
<head>
	<title>
	LITERATURA	
	</title>
	<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">
<?php
include $_SERVER ['DOCUMENT_ROOT']."/littleDIGITS/cv/meta.txt";
?>
</head>
<body style="width: 99%;height: 99%;">
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

	if($read!=""){$read="<i class='fa fa-check-square'></i> ";} else{$read="<i class='fa fa-square-o'></i> ";}
	if($title!=""){$title="<cite>$title</cite>";}

	print("<p>[$key] $read '$title' - $author</p>");
	}
?>

</body>
</html>