<?php
				$connection = mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
				mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
				mysql_query ("SET CHARSET utf8");
				mysql_query ("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
				$wynik = mysql_query ("SELECT * FROM chatbotbuttons") or die ("die przy zapytaniu");

				while ($rekord = mysql_fetch_assoc($wynik)){
					$id = $rekord['id'];
					$onclick = $rekord['onclick'];
					$value = $rekord['value'];
					$dependent = $rekord['dependent'];
					
					echo '<hr>';
					if($id != 'send'){
						echo 'function '.$onclick.'(){document.getElementById("user-message").value = "'.$value.'";send();';
						if ($dependent != null){
							$dependent_array = explode(';', $dependent);
							//var_dump($dependent_array).'<br>';
							$dependent_array_length = count($dependent_array);
							for ($i = 0; $i < $dependent_array_length; $i++){
								echo 'document.getElementById("'.$dependent_array[$i].'-button").style.display = "block";';
							}
						}
						echo '}';
					}
				}

				/*$wynik = mysql_query ("SELECT dependent FROM chatbotbuttons") or die ("die dependent");
				while ($rekord = mysql_fetch_assoc($wynik)){
					$dependent = $rekord['dependent'];
					echo $dependent;
				}*/

			mysql_close($connection);
			?>