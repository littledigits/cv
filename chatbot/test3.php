<?php
					

					$connection = mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
					mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
					mysql_query ("SET CHARSET utf8");
					mysql_query ("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
					$wynik = mysql_query ("SELECT * FROM chatbotbuttons WHERE tag IS NOT NULL") or die ("die przy zapytaniu");

					while ($rekord = mysql_fetch_assoc($wynik)){
						$id = $rekord['id'];
						$tag = $rekord['tag'];
						$return = $rekord['return'];



						if ($id != 'send'){
							if ($tag != '0'){
								echo 'else if (';
								$tag_arr = explode(';', $tag);
								for ($i = 0; $i < count($tag_arr); $i++){
									echo 'userMessage.search(/'.$tag_arr[$i].'/i) == 0 && userMessage.length <= '.strlen($tag_arr[$i]);
									if ($i < count($tag_arr) - 1){
										echo ' || ';
									}
								}
								echo '){document.getElementById("'.$id.'-button").style.display = "none";';
								echo "return '$return';}";
								echo '<hr>';
							}
						}
					}

					

					mysql_close($connection);
					?>