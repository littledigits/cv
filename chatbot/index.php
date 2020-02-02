<!DOCTYPE html>
<html lang="pl-PL">
<head>
<link rel="stylesheet" href ="../css/style-dos-like.css">
<link href="../fontawesome-free-5.2.0-web/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Coda|Sarpanch" rel="stylesheet">
<meta charset="utf-8">
<link rel="shortcut icon" href="../images/logo.png">
<meta name="keywords" content="krzysztof, borucki, tumkiewicz, borucki-tumkiewicz, webmaster, www, littledigits, littledigits.pl, tworzenie, przygotowanie, stworzenie, utworzenie, strona, strony, stron, stronach, html, css">
<meta name="description" content="Wirtualny asystent">
<meta name="author" content="Krzysztof Borucki-Tumkiewicz">
<meta name="copyright" content="Krzysztof Borucki-Tumkiewicz">
<meta name="robots" content="all">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="reply-to" content="kbt@littledigits.pl">
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<title>chatbot 0.4</title>
<style>
	body {margin: 0;padding: 0;}
	.bot, .bot * {font-family: 'Sarpanch', monospace;color: white;}
	.container {padding: 1px;text-align: center;border: none;}
	.discussion {text-align: left;padding: 6px;border-radius: 6px;border-width: 2px;border-style: solid;border-color: white;padding: 3px 0 3px 0;}
	.user {color: black;background: white;}
	textarea, input {resize: none;border: none; border-top: 1px dashed white;border-bottom: 1px dashed white;width: 100%;/*font-family: 'Coda';*/}
	button, .button {border: 1px solid white;padding: 3px;border-radius: 3px;margin: 1px;white-space: nowrap;}
	button:hover, .button:hover, .hover {color: black;background: white !important;}
	a {text-decoration: none;color: black !important;background: white;border-radius: 3px;}
	#discussion-area {align-items: center;}
	#user-area {text-align: center;margin: 0;padding: 0;border-top: 1px;position: fixed;bottom: 0;width: 100%;}
	#user-help-area div {padding: 1px;}
	.timestamp {font-size: 50%;margin-right: 2px;}
	.discussion-post {display: inline-flex;width: 99%;margin-top: 2px;margin-bottom: 2px;}
	::-moz-selection, ::selection {color: black;background: white;}
	svg {position: sticky;top: 0;}
	.suggest {animation: suggest 2s alternate-reverse infinite linear;}
	@keyframes suggest {
		from {background: black;text-shadow: none;}
		to {background: grey;text-shadow: 0 0 1px black;}
	}}
</style>
</head>
	<body>
		<div id="container-chat" class="container">
			<svg id="face-top" height="100" width="100" style="border: 2px solid white;border-radius: 50%;margin: 0 0 auto;">
				<path id="smile" d="M 20 75 q 30 0 60 0" stroke="white" stroke-width="2" fill="none" />
				<line x1="50" y1="20" x2="40" y2="60" style="stroke: white;stroke-width: 2;"/>
				<line x1="40" y1="60" x2="50" y2="65" style="stroke: white;stroke-width: 2;"/>
				<ellipse id = "blinkingeye" cx="30" cy="20" rx="10" ry="10" fill="white" stroke="white" stroke-width="2"/>
				<circle cx="70" cy="20" r="10" fill="none" stroke="white" stroke-width="2"/>
			</svg>
			
			<div id="discussion-area" class="container" style="overflow-y: auto;">
				<div class="discussion-post">
					<p class="discussion bot"></p>
					<div>
						<svg height="30" width="30" style="border: 2px solid white;border-radius: 50%;">
							<path id="smile" d="M 6 22.5 q 9 0 18 0" stroke="white" stroke-width="2" fill="none" />
							<line x1="15" y1="6" x2="12" y2="18" style="stroke: white;stroke-width: 2;"/>
							<line x1="12" y1="18" x2="15" y2="19.5" style="stroke: white;stroke-width: 2;"/>
							<ellipse id = "blinkingeye" cx="9" cy="6" rx="3" ry="3" fill="white" stroke="white" stroke-width="2"/>
							<circle cx="21" cy="6" r="3" fill="none" stroke="white" stroke-width="2"/>
						</svg>
						<div class="timestamp"></div>
					</div>
				</div>
			</div>
		</div>

		<div id="user-area">
			<div id="user-help-area" class="" style="display: flex;overflow-x: auto;">

				<?php
					$connection = mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
					mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
					mysql_query ("SET CHARSET utf8");
					mysql_query ("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
					$wynik = mysql_query ("SELECT * FROM chatbotbuttons") or die ("die przy zapytaniu");

					while ($rekord = mysql_fetch_assoc($wynik)){
						$id = $rekord['id'];
						$onclick = $rekord['onclick'];
						$order = $rekord['order'];
						$value = $rekord['value'];
						$starting = $rekord['starting'];
						if ($order != null || $starting > 0){
							$display = 'block';
						} else {
							$display = 'none';
						}
						if ($onclick == null){
							$id_arr = explode('-', $id);
							for ($i = 0; $i < count($id_arr); $i++){
								$id_arr[$i] = ucfirst($id_arr[$i]);
							}
						$onclick = implode('', $id_arr);
						}
						echo '<button id="'.$id.'-button" onclick="'.$onclick.'()" style="order: '.$order.';display: '.$display.';">'.$value.'</button>';						
					}

					mysql_close($connection);
				?>
			</div>
			<textarea id="user-message" onkeyup="sendKey(event)" oninput="sendButton(), hint()" autofocus placeholder="zacznij pisać"></textarea>
		</div>

		<script type="text/javascript">
			document.getElementsByTagName('p')[0].innerHTML = 'Cześć. Jestem ' + document.title + ' Krzyśka na jego stronie littleDIGITS. <span class="suggest" onclick="tellMore()" style="border-radius: 3px;cursor: pointer;">Opowiedzieć więcej?</span>';
			document.getElementsByClassName('timestamp')[0].innerHTML = timestamp();
			document.getElementById('tell-more-button').setAttribute('class', 'suggest');

			sendButton();hint();widthHeight();
			
			function Send(){
				var userMessage = uMvt();
				var userMessageArr = userMessage.split("");
				userMessage = userMessage.slice(userMessage.length);
				for (var i = 0; i < userMessageArr.length; i++){
					if (userMessageArr[i].charCodeAt(0) != '10'){
						userMessage += userMessageArr[i];
					}					
				}
				var pCreate = document.createElement('p');
				var pText = document.createTextNode(userMessage);
				pCreate.appendChild(pText);
				pCreate.setAttribute('class', 'discussion user');
				var divOtherContainer = document.createElement('div');
				divOtherContainer.style.display = 'flex';
				divOtherContainer.style.flexDirection = 'column';
				divOtherContainer.setAttribute('align-items', 'center');
				divOtherContainer.innerHTML = '<i class="fas fa-user-circle"></i>';
				var divTimestamp = document.createElement('div');
				divTimestamp.setAttribute('class', 'timestamp');
				divTimestamp.innerHTML = timestamp();
				divOtherContainer.appendChild(divTimestamp);
				var divContainerCreate = document.createElement('div');
				divContainerCreate.appendChild(pCreate);
				divContainerCreate.appendChild(divOtherContainer);
				divContainerCreate.style.display = 'inline-flex';
				divContainerCreate.style.width = '99%';
				document.getElementById('discussion-area').appendChild(divContainerCreate);
				var pCreate = document.createElement('p');
				pCreate.innerHTML = uM(userMessage);

				var a = document.getElementById('discussion-area').children;
				pCreate.setAttribute('id', 'discussion-bot' + (a.length + 1));
				pCreate.setAttribute('class', 'discussion bot');
								
				var divOtherContainer = document.createElement('div');
				divOtherContainer.style.display = 'flex';
				divOtherContainer.style.flexDirection = 'column';
				divOtherContainer.setAttribute('align-items', 'center');
				divOtherContainer.innerHTML = svg();
				var divTimestamp = document.createElement('div');
				divTimestamp.setAttribute('class', 'timestamp');
				divTimestamp.innerHTML = timestamp();
				divOtherContainer.appendChild(divTimestamp);
				var divContainerCreate = document.createElement('div');
				divContainerCreate.appendChild(pCreate);
				divContainerCreate.appendChild(divOtherContainer);		
				divContainerCreate.style.display = 'inline-flex';
				divContainerCreate.style.width = '99%';
				document.getElementById('discussion-area').appendChild(divContainerCreate);
				document.getElementById('user-message').value = '';
				document.getElementById('user-message').focus();
				document.getElementById('send-button').style.display = 'none';
				document.getElementById('face-top').style.display = 'none';
				widthHeight();
				
				var b = 0;
				for (var i = 0; i < a.length; i++){
					b += a[i].offsetHeight;
				}
				var c = document.getElementById('discussion-area').lastChild.offsetHeight;
				var d = document.getElementById('discussion-area').offsetHeight;
				if (c > d){
					b = b - c;
				}
				document.getElementById('discussion-area').scrollTo(0, b);
			}

			function uM(userMessage){
				if ((userMessage.search(/cześć/i) == 0 || userMessage.search(/czesc/i) == 0 || userMessage.search(/witam/i) == 0) && userMessage.length <= 6){
					return 'Cześć.';
				} <?php
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
							}
						}
					}					

					mysql_close($connection);
					?> else {
					return 'Nie rozumiem co zostało napisane. Przekazuję do analizy Krzyśka. Jeżeli chcesz to zostaw jakiś kontakt do siebie, żeby mógł odpowiedzieć.';
				}
			}
			
			function sendKey(event){
				if (event.keyCode == 13){
					if (uMvt().length > 0){
						//ustaw kursor na koniec
						Send();
					} else {
						document.getElementById('user-message').value = '';
					}
				}
			}

			function hint(){
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
							echo 'uMvt().search(/'.$tag.'/i) >= 0';
						}
						echo '){document.getElementById("'.$id.'-button").setAttribute("class", "suggest");document.getElementById("'.$id.'-button").style.display = "block";';
						//SPRAWDZIĆ ZE SKRYPTEM W JAVASCRIPT - document.getElementById('tell-more-button').removeAttribute('class');
						if($dependent != null){
							if(strpos($dependent, ';') > 0){
								$dependent_array = explode(';', $dependent);
								for($i = 0; $i < count($dependent_array); $i++){
									echo 'document.getElementById("'.$dependent_array[$i].'-button").removeAttribute("class");';
								}
							} else {
								echo 'document.getElementById("'.$dependent.'-button").removeAttribute("class");';
							}
						}
						echo '} else {document.getElementById("'.$id.'-button").removeAttribute("class");}';
					}
				}
				?>
			}


			function uMvt(){return document.getElementById('user-message').value.trim();}
				

			function sendButton(){
				if (uMvt().length > 0){
					document.getElementById('send-button').style.display = 'block';
					//document.getElementById('send-button').removeAttribute('disabled');
				} else {
					document.getElementById('send-button').style.display = 'none';
					//document.getElementById('send-button').setAttribute('disabled', 'disabled');
				}

			}
			
			<?php
				$connection = mysql_connect ("littledigits.pl", "kbt_cv", "testing") or die ("die przy łączeniu z serwerem");
				mysql_select_db ("kbt_cv") or die ("die przy łączeniu z bazą");
				mysql_query ("SET CHARSET utf8");
				mysql_query ("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
				$wynik = mysql_query ("SELECT id,onclick,value,dependent FROM chatbotbuttons") or die ("die przy zapytaniu");

				while ($rekord = mysql_fetch_assoc($wynik)){
					$id = $rekord['id'];
					$onclick = $rekord['onclick'];
					$value = $rekord['value'];
					$dependent = $rekord['dependent'];

					if($id != 'send'){
						if ($onclick == null){
							$id_arr = explode('-', $id);
							for ($i = 0; $i < count($id_arr); $i++){
								$id_arr[$i] = ucfirst($id_arr[$i]);
							}
						$onclick = implode('', $id_arr);
						}
						
						echo 'function '.$onclick.'(){document.getElementById("user-message").value = "'.$value.'";Send();';
						if ($dependent != null){
							$dependent_array = explode(';', $dependent);
							for ($i = 0; $i < count($dependent_array); $i++){
								echo 'document.getElementById("'.$dependent_array[$i].'-button").style.display = "block";';
							}
						}
						echo '}';
					}
				}

			mysql_close($connection);
			?>

			function widthHeight(){
				var a = window.innerHeight;
				var b = document.getElementById('container-chat').offsetHeight;
				var c = document.getElementById('user-area').offsetHeight;
				var d = a - c;
				var e = document.getElementById('discussion-area');
				e.style.height = d + 'px';
			}

			function svg(){
				return '<svg height="30" width="30" style="border: 2px solid white;border-radius: 50%;"><path id="smile" d="M 6 22.5 q 9 0 18 0" stroke="white" stroke-width="2" fill="none" /><line x1="15" y1="6" x2="12" y2="18" style="stroke: white;stroke-width: 2;"/><line x1="12" y1="18" x2="15" y2="19.5" style="stroke: white;stroke-width: 2;"/><ellipse id = "blinkingeye" cx="9" cy="6" rx="3" ry="3" fill="white" stroke="white" stroke-width="2"/><circle cx="21" cy="6" r="3" fill="none" stroke="white" stroke-width="2"/></svg>';
			}

			function timestamp(){
				var date = new Date;
				var hours = date.getHours();
				var minutes = date.getMinutes();
				var seconds = date.getSeconds();
				if (hours < 10){
					hours = '0' + hours;
				}
				if (minutes < 10){
					minutes = '0' + minutes;
				}
				if (seconds < 10){
					seconds = '0' + seconds;
				}
				return hours + '' + minutes + '' + seconds;
			}

			window.addEventListener('resize', widthHeight);

		</script>
				
	</body>
</html>