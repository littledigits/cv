<!doctype html>
<html>
<head>
	<title>
	INNE	
	</title>
	<link rel="stylesheet" type="text/css" href="../css/style-dos-like.css">
<?php
include $_SERVER ['DOCUMENT_ROOT']."/littleDIGITS/cv/meta.txt";
?>
</head>
<body style="width: 99%;height: 99%;">
	<h2><i class="fa fa-commenting-o"></i> INNE</h2>
	<?php
		mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
		mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
		mysql_query("SET CHARSET utf8");
		mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
		$wynik = mysql_query ("SELECT * FROM additional_informations_other") or die ("die przy zapytaniu");
		$rekord = mysql_fetch_assoc($wynik);
			$key = $rekord['key']-1;
			$icone = $rekord['icone'];
			$description = $rekord['description'];

			if($icone!=""){$icone="<i class='fa $icone'></i>";}
			if($description!=""){$description=" $description<br>";}
		print "[$key] $icone$description";
	?>

	<h2><i class="fa fa-user-plus"></i> ZAINTERESOWANIA</h2>
	<?php
		mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
		mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
		mysql_query("SET CHARSET utf8");
		mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
		$wynik = mysql_query ("SELECT * FROM additional_informations_interests") or die ("die przy zapytaniu");
		
		while ($rekord = mysql_fetch_assoc ($wynik)) {
		$key = $rekord['key']-1;
		$icone = $rekord['icone'];
		$description = $rekord['description'];
		
		if($icone!=""){$icone="<i class='fa $icone'></i>";}
		if($description!=""){$description=" $description<br>";}
		print "[$key] $icone$description";}
	?>

	<h2><i class="fa fa-bullhorn"></i> JĘZYKI OBCE</h2>
	<?php
		mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
		mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
		mysql_query("SET CHARSET utf8");
		mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
		$wynik = mysql_query ("SELECT * FROM additional_informations_languages") or die ("die przy zapytaniu");
		
		while ($rekord = mysql_fetch_assoc ($wynik)) {
		$key = $rekord['key']-1;
		$description = $rekord['description'];
		
		if($description!=""){$description="$description<br>";}
		print "[$key] $description";}
	?>
</body>
</html>