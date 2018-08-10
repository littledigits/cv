<?php
$q = $_REQUEST["q"];

mysql_connect("littledigits.pl", "kbt_cv", "testing") or die ("connect error");
mysql_select_db("kbt_cv") or die ("select_db error");
mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");

$allrecords=mysql_query("SELECT * FROM experience_details WHERE skill LIKE '%$q%'") or die ("query error");

echo '<table>';
while($record=mysql_fetch_assoc($allrecords)){
	$skilltext=$record['skill'];
	$skillbar=$record['skillbar'];
	$wide=$skillbar*20;

	echo '<tr><td>&#9507 </td><td style="text-align: right;">'.$skilltext.'</td><td style="background-color:white; color:black; width: 30%;text-align:right;"><div class="skillbar" style="width: '.$wide.'%;padding-top: 3px;">'.$skillbar.'</div></td></tr>';
}
echo '</table>';
?>