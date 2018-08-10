<!DOCTYPE html>
<html>
<head>
<title>
DANE PODSTAWOWE
</title>
<?php
if(isset($_POST['select'])){
	if($_POST['select']=="dos"){print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';}
	elseif($_POST['select']=="nc"){print '<link rel="stylesheet" type="text/css" href="../css/style-norton-commander-like.css">';}
}
else print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
?>
<?php
if ($css=="dos") {
	print '<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">';
}
elseif ($css=="nc") {
	print '<link rel="stylesheet" type="text/css" href="../css/style-norton-commander-like.css">';
}
?>
<?php
include $_SERVER['DOCUMENT_ROOT']."/littleDIGITS/cv/meta.txt";
?>
</head>
<body style="width: 99%;height: 99%;">
<h2>Dane podstawowe</h2>
<!--a href="https://www.google.pl/maps/@52.1283143,21.0604289,3a,75y,263.94h,89.61t/data=!3m6!1e1!3m4!1slO2cxsw3NaATqgpVCCrIcA!2e0!7i13312!8i6656!6m1!1e1" target="_blank" title="Google Street View"><i class="fa fa-street-view"></i></a>
<a href="https://www.bing.com/maps?osid=085a8d97-4481-485b-9c3a-adbb807dabd0&cp=52.128366~21.059288&lvl=18&v=2&sV=2&form=S00027" target="_blank">(dojazd BING)</a> <a href="https://wego.here.com/directions/mix//ulica-Romualda-Mielczarskiego-1,-02-798-Warszawa,-Polska:loc-dmVyc2lvbj0xO3RpdGxlPXVsaWNhK1JvbXVhbGRhK01pZWxjemFyc2tpZWdvKzE7bGFuZz1wbDtsYXQ9NTIuMTI4Mjk5NzEzMTM0NzY2O2xvbj0yMS4wNjAxMjkxNjU2NDk0MTQ7c3RyZWV0PXVsaWNhK1JvbXVhbGRhK01pZWxjemFyc2tpZWdvO2hvdXNlPTE7Y2l0eT1XYXJzemF3YTtwb3N0YWxDb2RlPTAyLTc5ODtjb3VudHJ5PVBPTDtkaXN0cmljdD1VcnN5biVDMyVCM3c7c3RhdGU9V29qLitNYXpvd2llY2tpZTtjb3VudHk9V2Fyc3phd2E7Y2F0ZWdvcnlJZD1idWlsZGluZztzb3VyY2VTeXN0ZW09aW50ZXJuYWw7bmxhdD01Mi4xMjgzMTExNTcyMjY1NjtubG9uPTIxLjA2MDQ0OTYwMDIxOTcyNw?map=52.1283,21.06013,15,normal" target="_blank">(HERE MAPS)</a> <a href="http://jakdojade.pl/?tc=52.1283:21.060129&tn=Romualda%20Mielczarskiego%201&td=Romualda%20Mielczarskiego%201&cid=3000&aro=1" target="_blank">(dojazd jakdojade.pl)</a-->
<?php
mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
$wynik = mysql_query ("SELECT * FROM adress") or die ("die przy zapytaniu");
$rekord = mysql_fetch_assoc($wynik);
	$identity = $rekord['identity'];
	$www=$rekord['www'];
	$birthday=$rekord['birthday'];
	$adress=$rekord['adress'];
	$phone=$rekord['phone'];
	$e_mail=$rekord['e-mail'];
	$skype=$rekord['skype'];
	$facebook=$rekord['facebook'];

	if($identity!=""){$identity="<p><i class='fa fa-vcard'></i> $identity<br><p>";}
	if($www!=""){$www="<p><i class='fa fa-industry'></i> <a href='http://$www' target='_blank'>$www</a></p>";}
	if($birthday!=""){$birthday="<p><i class='fa fa-birthday-cake'></i> $birthday</p>";}
	if($adress!=""){$adress="<p><i class='fa fa-globe'></i> $adress</p>";}
	if($phone!=""){$phone="<p><i class='fa fa-phone'></i> $phone</p>";}
	if($e_mail!=""){$e_mail="<p><i class='fa fa-at'></i> <a href='mailto:$e_mail'>$e_mail</a></p>";}
	if($skype!=""){$skype="<p>$skype</p>";}
	if($facebook!=""){$facebook="<p>$facebook</p>";}

print "$identity$www$birthday$adress$phone$e_mail$skype$facebook";

if(isSet($_POST["tekst"])){
	$tekst=htmlspecialchars($_POST['tekst']);
	print "<br>wpisany tekst = $tekst<br>";
	print '<a href="adress.php">Jeszcze raz?</a>';
} else {
	print '<br><form method="post" action="adress.php">';
	print '<p width="auto">Wpisz treść</p><input type="text" name="tekst" autofocus><br>';
	print '<input type="submit" value="Zapisz wiadomość">';
	print '</form>';
}
?>
</body>
</html>