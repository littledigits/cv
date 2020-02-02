<?php
$connection = mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
mysql_query ("SET CHARSET utf8");
mysql_query ("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
$wynik = mysql_query ("SELECT * FROM chatbotbuttons") or die ("die przy zapytaniu");

while ($rekord = mysql_fetch_assoc($wynik)){
	$id = $rekord['id'];
	$onclick = $rekord['onclick'];

	$id_arr = explode('-', $id);
	for ($i = 0; $i < count($id_arr); $i++){
		$id_arr[$i] = ucfirst($id_arr[$i]);
	}
	echo implode('', $id_arr).'<br>';
}
?>