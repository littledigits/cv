<?php
include 'meta.php';
?>
<title>menu</title>
<style>
		@keyframes leftrightbg {
			from {width: 100%;}
			to {width: 0;}
		}
		@keyframes showthis {
			from {left: -100%;}
			to {left: 0;}
		}
	</style>
</head>
<body>
<header>
<h1>www:\littleDIGITS.pl\CURRICULUM VITAE\</h1>
</header>
<nav style="display: block;">
<p style="font-size: 120%;">Każdy z poniższych odnośników służy do testowania i prezentowania specyficznych sytuacji</p><br>
<?php
function indexinfo($folder, $opis, $disabled) {
	if ($folder=="html") {
		$target=$folder.'/address.html';
	} elseif ($folder=="bootstrap") {
		$target=$folder.'/printing.html';
	} elseif ($folder=="ranczo") {
		$target=$folder.'/index.php';
	}
	else {
		$target=$folder.'/address.php';
	}
	if ($disabled=='') {
		echo '<a href="cv_'.$target.'" class="index">'.strtoupper($folder)."</a><br><p>$opis. Ostatnio zmieniony ".date("d.m.Y H:i:s",fileatime("cv_".$folder)).'.</p><br>';
	} else {
		echo '<p><del>'.strtoupper($folder)."</p><p>$opis. Ostatnio zmieniony ".date("d.m.Y H:i:s",fileatime("cv_".$folder)).'.</del></p><br>';
	}
}
indexinfo ("html", "Czysty HTML z dodatkiem Font awesome", '');
indexinfo ("html+php+sql+js", "Aktualnie najbardziej zaawansowany wariant", '');
indexinfo("ranczo", "Projekt na podstawie materiałów Ranczo pod pomarańczą", '');
?>
</nav>
<footer>
	<div id="footer-loading-bar" style="background-image: linear-gradient(to right, black, white); width: 0;height: 100%;float: left;animation: leftrightbg 3s 2 alternate-reverse;z-index: 20;position: absolute;top: 0;"></div>
	<div style="width: 100%;animation: showthis forwards; animation-delay: 3s;z-index: 10;background: black;color: white;position: relative;top: 0;left: -100%;">
		<span id="theme-name">theme: DOS_like </span><br class="mid-big">
		<span id="footer-brands-icons"><span class="mid-big">HTML5 </span><i class="fab fa-html5"></i> <span class="mid-big">CSS3 </span><i class="fab fa-css3"></i> <span class="mid-big">PHP </span><i class="fab fa-php"></i> <span class="mid-big">Font Awesome </span><i class="fab fa-font-awesome"></i> <span class="mid-big">MySQL </span><i class="fas fa-database"></i> <span class="mid-big">JavaScript </span><i class="fab fa-js"></i> <span class="mid-big">Bootstrap</span><img src="../images/bootstrap.png"><span class="mid-big"> Podziękowania dla: Borsoft, P. Paprzycki</span></span>
		<div class="footer-roll">
			<p class="big">alfabet Morse'a &#8226;&#8211;&#8226;&#8226;|&#8226;&#8226;|&#8211;|&#8211;|&#8226;&#8211;&#8226;&#8226;|&#8226;|&#8211;&#8226;&#8226;|&#8226;&#8226;|&#8211;&#8211;&#8226;|&#8226;&#8226;|&#8211;|&#8226;&#8226;&#8226;</p>
		<p class="big">kod binarny <code>01101100 01101001 01110100 01110100 01101100 01100101 01100100 01101001 01100111 01101001 01110100 01110011</code></p>
		<p id="bottom-p" class="bottom-p">Czas</p>
		</div>
	</div>
</footer>
<script>
	var d = new Date();
	document.getElementById('bottom-p').innerHTML = d.getDate() + '.' + d.getMonth()+1 + '.' + d.getFullYear() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
	setInterval(datetime, 1000);
	function datetime(){
		var d = new Date();
		document.getElementById('bottom-p').innerHTML = d.getDate() + '.' + d.getMonth()+1 + '.' + d.getFullYear() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
}
</script>
</body>
</html>