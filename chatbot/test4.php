<?php
				$connection = mysql_connect('littledigits.pl', 'kbt_cv', 'testing') or die ('błąd łączenia z serwerem');
				mysql_select_db('kbt_cv') or die ('błąd łączenia z bazą');
				mysql_query('SET CHARSET utf8');
				mysql_query('SET NAMES `utf8` COLLATE `utf8_polish_ci`');
				$wynik = mysql_query('SELECT id,dependent,tag FROM chatbotbuttons') or die ('błąd zapytania');
				while ($rekord = mysql_fetch_assoc($wynik)){
					$id = $rekord['id'];
					$dependent = $rekord['dependent'];
					$tag = $rekord['tag'];

					if($tag != '0'){
						echo 'if (';
						if(strpos($tag, ';') > 0){
							$tag_arr = explode(';', $tag);
							for($i = 0; $i < count($tag_arr); $i++){
								echo 'uMvt().search(/'.$tag_arr[$i].'/i) >= 0 && uMvt().length <= '.strlen($tag_arr[$i]);
								if($i != count($tag_arr) - 1){
									echo ' || ';
								}
							}
						} else {
							echo 'uMvt().search(/'.$tag.'/i) >= 0 && uMvt().length <= '.strlen($tag);
						}
						echo '){document.getElementById("'.$id.'-button").setAttribute("class", "suggest");document.getElementById("'.$id.'-button").style.display = "block";} else {document.getElementById("'.$id.'-button").removeAttribute("class");}';
					}
				}
				?>