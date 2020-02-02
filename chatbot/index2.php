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
<script src="/js/jquery-3.3.1.min.js"></script>
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
				<!--button id="send-button" class="button" onclick="Send()" style="order: 0">wyślij</button>
				<button id="help-button" class="button" onclick="help()" style="order: 101">pomoc</button>
				<button id="tell-more-button" class="button" onclick="tellMore()" style="order: 102">opowiedz więcej</button>
				<button id="interests-button" class="button" onclick="interests()" style="order: 103">zainteresowania</button>
				<button id="work-experience-button" class="button" onclick="workExperience()" style="order: 104">doświadczenie zawodowe</button>
				<button id="save-discussion" class="button" onclick="" style="order: 105">zapisz dyskusję</button>
				<button id="tell-more-www-button" class="button" onclick="tellMoreWww()" style="display: none;">więcej o www</button>
				<button id="work-experience-webmaster-button" class="button" onclick="workExperienceWebmaster()" style="display: none;">webmaster</button>
				<button id="literature-button" class="button" onclick="literature()" style="display: none;">literatura</button>
				<button id="work-experience-project-specialist-button" class="button" onclick="workExperienceProjectSpecialist()" style="display: none;">specjalista ds projektów</button-->

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

		<script>
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

				/*if ((userMessage.search(/cześć/i) == 0 || userMessage.search(/czesc/i) == 0 || userMessage.search(/witam/i) == 0) && userMessage.length <= 6){
					pCreate.innerHTML = 'Cześć.';
				} else if (userMessage.search(/pomocy/i) == 0 && userMessage.length <= 7 || userMessage.search(/pomoc/i) == 0 && userMessage.length <= 6){
					document.getElementById('help-button').style.display = 'none';
					pCreate.innerHTML = 'Jeżeli masz jakieś problem to opisz go. W razie potrzeby skorzystaj z innych form kontaktu: <a href="mailto:kbt@littledigits.pl">kbt@littledigits.pl</a>, <a href="http://littledigits.pl" target="_blank">littledigits.pl</a>, <a href="tel:+48-668-14-25-95">668-142-595</a>.';
				} else if ((userMessage.search(/opowiedz więcej/i) == 0 || userMessage.search(/opowiedz wiecej/i) == 0) && userMessage.length <= 16){
					document.getElementById('tell-more-button').style.display = 'none';
					pCreate.innerHTML = 'Możesz samemu zadawać pytania lub skorzystać z podpowiedzi na dole. Obecenie jestem w stanie rozpoznać kilka słów kluczowych. Jeżeli jakieś rozpoznam to je <span class="suggest" style="border-radius: 3px;cursor: pointer;">podświetlę</span>.';
				} else if (userMessage.search(/zainteresowania/i) == 0 && userMessage.length <= 16){
					document.getElementById('interests-button').style.display = 'none';
					pCreate.innerHTML = 'Technologie - tworzenie stron internetowych - HTML 5, CSS 3, PHP 5, JavaScript (reszta w przyszłości), baz danych SQL, funkcjonalności Visual basic.';
				} else if ((userMessage.search(/doświadczenie zawodowe/i) == 0 || userMessage.search(/doswiadczenie zawodowe/i) == 0) && userMessage.length <= 23){
					document.getElementById('work-experience-button').style.display = 'none';
					pCreate.innerHTML = '01.08.2017 - obecnie: webmaster i 14.08.2008 - obecnie: referent, starszy referent, starszy konsultant, specjalista do spraw projektów - innogy Polska S.A. (dawniej RWE Polska S.A.)';
				} else if (userMessage.search(/webmaster/i) == 0 && userMessage.length <= 11 || (userMessage.search(/więcej o doświadczeniu webmaster/i) == 0 || userMessage.search(/wiecej o doswiadczeniu webmaster/i) == 0) && userMessage.length <= 33){
					document.getElementById('work-experience-webmaster-button').style.display = 'none';
					pCreate.innerHTML = 'Dotychczasowe projekty: <a href="http://agencjamojedziecko.pl" target="_blank">agencjamojedziecko.pl</a>, <a href="http://moodle.agencjamojedziecko.pl/eszkola" target="_blank">Platforma e-learningowa MCE School</a>, <a href="http://crossfitboxekipa.pl" target="_blank">crossfitboxekipa.pl</a>. Strony www prowadzone są przez CMS <a href="https://wordpress.com" traget="_blank">WordPress</a>, a wykonane działania to np. galeria zdjęć, dodawanie wiadomości (blog i komunikaty), SEO. Platforma e-learningowa to CMS <a href="https://moodle.org" target="_blank">Moodle</a>, ujednolicanie wyglądu z www, dodawanie zadań dla kursantów, zarządzanie użytkownikami. Przenoszenie zawartości pomiędzy serwerami, zarządzanie domeną, weryfikacja ruchu pod względem ataków hakerskich.';
				} else if ((userMessage.search(/więcej o www/i) == 0 || userMessage.search(/wiecej o www/i) == 0) && userMessage.length <= 13 || (userMessage.search(/więcej o tej stronie/i) == 0 || userMessage.search(/wiecej o tej stronie/i) == 0) && userMessage.length <= 21 || (userMessage.search(/więcej o tej stronie www/i) == 0 || userMessage.search(/wiecej o tej stronie www/i) == 0) && userMessage.length <= 25 || (userMessage.search(/opowiedz więcej o tej stronie www/i) == 0 || userMessage.search(/opowiedz wiecej o tej stronie www/i) == 0) && userMessage.length <= 34 || (userMessage.search(/opowiedz więcej o www/i) == 0 || userMessage.search(/opowiedz wiecej o www/i) == 0) && userMessage.length <= 22 || (userMessage.search(/opowiedz więcej o stronie www/i) == 0 || userMessage.search(/opowiedz wiecej o stronie www/i) == 0) && userMessage.length <= 30){
					document.getElementById('tell-more-www-button').style.display = 'none';
					pCreate.innerHTML = 'Stronę littleDIGITS Krzysiek traktuje jako swoje CV. Każdy może się w nim zapoznać bieżącymi informacjami (w przeciwieństwie do CV wysyłanego w ramach rekrutacji). Dodatkowo wszystko zostało przygotowane przez niego samodzielnie. W ten sposób możesz samemu się przekonać o jego możliwościach bez czytania suchych opisów.';
				} else if ((userMessage.search(/więcej o doświadczeniu specjalista zarządzania projektami/i) == 0 || userMessage.search(/wiecej o doswiadczeniu specjalista zarzadzania projektami/i) == 0) && userMessage.length <= 58 || (userMessage.search(/specjalista zarządzania projektami/i) == 0 || userMessage.search(/specjalista zarzadzania projektami/i) == 0) && userMessage.length <= 35 || (userMessage.search(/specjalista ds projektów/i) == 0) && userMessage.length <= 25){
					document.getElementById('work-experience-project-specialist-button').style.display = 'none';
					pCreate.innerHTML = 'Doświadczenie na tym stanowisku to początkowo: modelowanie procesów i analiza ich poprawności, tworzenie raportów z systemu SAP ISU i ich automatyzacja przez VBS i Microsoft Excel. Od maja 2017 r. Krzysiek zajmuje się analizą systemową i wprowadzaniem zmian w systemie SAP CRM oraz programowalnych formularzach przygotowywanych w Adobe LiveCycle Designer. Organizacja pracy jest oparta na filozofii Agile.';
				} else if (userMessage.search(/literatura/i) == 0){
					document.getElementById('literature-button').style.display = 'none';
					pCreate.innerHTML = 'Możesz pomyśleć - "co to znaczy przeczytać książkę". Niby to nic wielkiego, ale to jednak pokazuje, że Krzysiek nie tworzy kopiując wzory z internetu. No dobra, czasem kopiuje, ale tylko w ostateczności. Poza tym możesz się dowiedzieć dokładniej jakie tematy leżą na orbicie jego zainteresowań.';
				} else {
					pCreate.innerHTML = 'Nie rozumiem co zostało napisane. Przekazuję do analizy Krzyśka. Jeżeli chcesz to zostaw jakiś kontakt do siebie, żeby mógł odpowiedzieć.';
				}*/

				var a = document.getElementById('discussion-area').children;
				pCreate.setAttribute('id', 'discussion-bot' + (a.length + 1));
				pCreate.setAttribute('class', 'discussion bot');
				pCreate.setAttribute('onclick', 'pCreateScrollTo(this)');
				
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
					?>/*
				else if (userMessage.search(/pomocy/i) == 0 && userMessage.length <= 7 || userMessage.search(/pomoc/i) == 0 && userMessage.length <= 6){
					document.getElementById('help-button').style.display = 'none';
					return 'Jeżeli masz jakiś problem to opisz go. W razie potrzeby skorzystaj z innych form kontaktu: <a href="mailto:kbt@littledigits.pl">kbt@littledigits.pl</a>, <a href="http://littledigits.pl" target="_blank">littledigits.pl</a>, <a href="tel:+48-668-14-25-95">668-142-595</a>.';
				} else if ((userMessage.search(/opowiedz więcej/i) == 0 || userMessage.search(/opowiedz wiecej/i) == 0) && userMessage.length <= 16){
					document.getElementById('tell-more-button').style.display = 'none';
					return 'Możesz samemu zadawać pytania lub skorzystać z podpowiedzi na dole. Obecenie jestem w stanie rozpoznać kilka słów kluczowych. Jeżeli jakieś rozpoznam to je <span class="suggest" style="border-radius: 3px;cursor: pointer;">podświetlę</span>.';
				} else if (userMessage.search(/zainteresowania/i) == 0 && userMessage.length <= 16){
					document.getElementById('interests-button').style.display = 'none';
					return 'Technologie - tworzenie stron internetowych - HTML 5, CSS 3, PHP 5, JavaScript (reszta w przyszłości), baz danych SQL, funkcjonalności Visual basic.';
				} else if ((userMessage.search(/doświadczenie zawodowe/i) == 0 || userMessage.search(/doswiadczenie zawodowe/i) == 0) && userMessage.length <= 23){
					document.getElementById('work-experience-button').style.display = 'none';
					return '01.08.2017 - obecnie: webmaster i 14.08.2008 - obecnie: referent, starszy referent, starszy konsultant, specjalista do spraw projektów - innogy Polska S.A. (dawniej RWE Polska S.A.)';
				} else if (userMessage.search(/webmaster/i) == 0 && userMessage.length <= 11 || (userMessage.search(/więcej o doświadczeniu webmaster/i) == 0 || userMessage.search(/wiecej o doswiadczeniu webmaster/i) == 0) && userMessage.length <= 33){
					document.getElementById('work-experience-webmaster-button').style.display = 'none';
					return 'Dotychczasowe projekty: <a href="http://agencjamojedziecko.pl" target="_blank">agencjamojedziecko.pl</a>, <a href="http://moodle.agencjamojedziecko.pl/eszkola" target="_blank">Platforma e-learningowa MCE School</a>, <a href="http://crossfitboxekipa.pl" target="_blank">crossfitboxekipa.pl</a>. Strony www prowadzone są przez CMS <a href="https://wordpress.com" traget="_blank">WordPress</a>, a wykonane działania to np. galeria zdjęć, dodawanie wiadomości (blog i komunikaty), SEO. Platforma e-learningowa to CMS <a href="https://moodle.org" target="_blank">Moodle</a>, ujednolicanie wyglądu z www, dodawanie zadań dla kursantów, zarządzanie użytkownikami. Przenoszenie zawartości pomiędzy serwerami, zarządzanie domeną, weryfikacja ruchu pod względem ataków hakerskich.';
				} else if ((userMessage.search(/więcej o www/i) == 0 || userMessage.search(/wiecej o www/i) == 0) && userMessage.length <= 13 || (userMessage.search(/więcej o tej stronie/i) == 0 || userMessage.search(/wiecej o tej stronie/i) == 0) && userMessage.length <= 21 || (userMessage.search(/więcej o tej stronie www/i) == 0 || userMessage.search(/wiecej o tej stronie www/i) == 0) && userMessage.length <= 25 || (userMessage.search(/opowiedz więcej o tej stronie www/i) == 0 || userMessage.search(/opowiedz wiecej o tej stronie www/i) == 0) && userMessage.length <= 34 || (userMessage.search(/opowiedz więcej o www/i) == 0 || userMessage.search(/opowiedz wiecej o www/i) == 0) && userMessage.length <= 22 || (userMessage.search(/opowiedz więcej o stronie www/i) == 0 || userMessage.search(/opowiedz wiecej o stronie www/i) == 0) && userMessage.length <= 30){
					document.getElementById('tell-more-www-button').style.display = 'none';
					return 'Stronę littleDIGITS Krzysiek traktuje jako swoje CV. Każdy może się w nim zapoznać bieżącymi informacjami (w przeciwieństwie do CV wysyłanego w ramach rekrutacji). Dodatkowo wszystko zostało przygotowane przez niego samodzielnie. W ten sposób możesz samemu się przekonać o jego możliwościach bez czytania suchych opisów.';
				} else if ((userMessage.search(/więcej o doświadczeniu specjalista zarządzania projektami/i) == 0 || userMessage.search(/wiecej o doswiadczeniu specjalista zarzadzania projektami/i) == 0) && userMessage.length <= 58 || (userMessage.search(/specjalista zarządzania projektami/i) == 0 || userMessage.search(/specjalista zarzadzania projektami/i) == 0) && userMessage.length <= 35 || (userMessage.search(/specjalista ds projektów/i) == 0) && userMessage.length <= 25){
					document.getElementById('work-experience-project-specialist-button').style.display = 'none';
					return 'Doświadczenie na tym stanowisku to początkowo: modelowanie procesów i analiza ich poprawności, tworzenie raportów z systemu SAP ISU i ich automatyzacja przez VBS i Microsoft Excel. Od maja 2017 r. Krzysiek zajmuje się analizą systemową i wprowadzaniem zmian w systemie SAP CRM oraz programowalnych formularzach przygotowywanych w Adobe LiveCycle Designer. Organizacja pracy jest oparta na filozofii Agile.';
				} else if (userMessage.search(/literatura/i) == 0){
					document.getElementById('literature-button').style.display = 'none';
					return 'Możesz pomyśleć - "co to znaczy przeczytać książkę". Niby to nic wielkiego, ale to jednak pokazuje, że Krzysiek nie tworzy kopiując wzory z internetu. No dobra, czasem kopiuje, ale tylko w ostateczności. Poza tym możesz się dowiedzieć dokładniej jakie tematy leżą na orbicie jego zainteresowań.';
				} else if(userMessage.search(/przeczytane/i) == 0){
					document.getElementById('readed-button').style.display = 'none';
					return '[0] "Ćwiczenia z makropoleceń w Excelu" - Agnieszka Snarska, [1] "Praktyczny kurs SQL" - Danuta Mendrala, Marcin Szeliga, [2] "HTML5 i CSS3" - Dawid Mazur, [3] "Wstęp do CSS3 i HTML5" - Bartosz Danowski, [4] "Pozycjonowanie i optymalizacja stron www" - Bartosz Danowski, Michał Makaruk, [5] "AJAX w mgnieniu oka" - Phil Ballard, [6] "PHP5 Tworzenie stron WWW Ćwiczenia praktyczne" - Andrzej Kierzkowski, [7] "Bootstrap praktyczne projekty" - Michał Kortas.';
				}*/ else {
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
				if(uMvt().search(/pomocy/i) >= 0 && uMvt().length <= 6 || uMvt().search(/pomoc/i) >= 0/* && uMvt().length <= 5*/){
					document.getElementById('help-button').setAttribute('class', 'suggest');
					document.getElementById('help-button').style.display  = 'block';
				} else {
					document.getElementById('help-button').removeAttribute('class');
				}
				if((uMvt().search(/opowiedz więcej/i) >= 0 || uMvt().search(/opowiedz wiecej/i) >= 0) && uMvt().length <= 15){
					document.getElementById('tell-more-button').setAttribute('class', 'suggest');
				} else {
					document.getElementById('tell-more-button').removeAttribute('class');
				}
				if(uMvt().search(/doświadczenie zawodowe/i) >= 0 || uMvt().search(/doswiadczenie zawodowe/i) >= 0){
					document.getElementById('work-experience-button').setAttribute('class', 'suggest');
				} else {
					document.getElementById('work-experience-button').removeAttribute('class');
				}
				if((uMvt().search(/więcej o www/i) >= 0 || uMvt().search(/wiecej o www/i) >= 0)/* && uMvt().length <= 12*/ || (uMvt().search(/więcej o tej stronie/i) >= 0 || uMvt().search(/wiecej o tej stronie/i) >= 0)/* && uMvt().length <= 20*/ || (uMvt().search(/opowiedz więcej o stronie www/i) >= 0 || uMvt().search(/opowiedz wiecej o stronie www/i) >= 0)/* && uMvt().length <= 29*/){
					document.getElementById('tell-more-www-button').style.display = 'block';
					document.getElementById('tell-more-www-button').setAttribute('class', 'suggest');
					document.getElementById('tell-more-button').removeAttribute('class');
				} else {
					document.getElementById('tell-more-www-button').removeAttribute('class');
					document.getElementById('tell-more-www-button').style.display = 'none';
				}
				if (uMvt().search(/webmaster/i) >= 0/* && uMvt().length <= 9*/){
					document.getElementById('work-experience-webmaster-button').style.display = 'block';
					document.getElementById('work-experience-webmaster-button').setAttribute('class', 'suggest');
					//document.getElementById('').removeAttribute('class');
				} else {
					//document.getElementById('work-experience-webmaster-button').removeAttribute('class');
					document.getElementById('work-experience-webmaster-button').style.display = 'none';
				}
				if (uMvt().search(/specjalista/i) >= 0){
					document.getElementById('work-experience-project-specialist-button').style.display = 'block';
					document.getElementById('work-experience-project-specialist-button').setAttribute('class', 'suggest');
				} else {
					document.getElementById('work-experience-project-specialist-button').style.display = 'none';
				}
				if (uMvt().search(/zainteresowania/i) >= 0){
					document.getElementById('interests-button').style.display = 'block';
					document.getElementById('interests-button').setAttribute('class', 'suggest');
				} else {
					document.getElementById('interests-button').removeAttribute('class');
				}
				if (uMvt().search(/literatura/i) >= 0){
					document.getElementById('literature-button').style.display = 'block';
					document.getElementById('literature-button').setAttribute('class', 'suggest');
				} else {
					document.getElementById('literature-button').removeAttribute('class');
				}
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

			function pCreateScrollTo(x){
				var a = document.getElementById('discussion-area').children;
				var b = 0;
				var c = Number(x.getAttribute('id').slice(14));
				alert(c);
				for (var i = 0; i <= c; i++){
					b += a[i].offsetHeight;
					alert(b);
				}
				/*alert('suma b =' + b);
				b -= x.offsetHeight;*/
				alert('test');
				alert(b);
				document.getElementById('discussion-area').scrollTo(0, b);
			}

			window.addEventListener('resize', widthHeight);

			/*function help(){
				document.getElementById('user-message').value = 'pomocy';
				Send();
			}
			function tellMore(){
				document.getElementById('user-message').value = 'opowiedz więcej';
				Send();
			}
			function interests(){
				document.getElementById('user-message').value = 'zainteresowania';
				Send();
			}
			function workExperience(){
				document.getElementById('user-message').value = 'doświadczenie zawodowe';
				Send();
			}
			function tellMoreWww(){
				document.getElementById('user-message').value = 'opowiedz więcej o stronie www';
				Send();
			}
			function workExperienceWebmaster(){
				document.getElementById('user-message').value = 'więcej o doświadczeniu webmaster';
				Send();
			}
			function workExperienceProjectSpecialist(){
				document.getElementById('user-message').value = 'więcej o doświadczeniu specjalista zarządzania projektami';
				Send();
			}
			function literature(){
				document.getElementById('user-message').value = 'literatura';
				Send();
			}*/

		</script>
				
	</body>
</html>