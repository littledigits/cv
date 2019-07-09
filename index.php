<?php
include 'meta.html';
?>
<title>intro 0.81 - littleDIGITS</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="/images/logo.png">
<style>
	* {font-family: Lato, Share Tech Mono, Lucida Console;cursor: default;}
	p {font-size: 24px;text-align: center;display: none;color: white;}
	.p-loading {display: block;margin: 0;padding: 0;vertical-align: middle;}
	.loading {color: white;width: 100%;}
	.span-loading {color: black;background: white;width: 0;margin: 0;padding: 0;vertical-align: middle;text-align: center;height: 24px;}
	.span-loading * {color: black;background: transparent;font-size: 80%;margin: 0;padding: 0;height: 100%;}
	#href-menu, #href-reload {text-shadow: black 0 0 2px;text-decoration: none;}
	#href-menu:hover, #href-reload:hover, .fa-redo:hover {font-size: 150%;}
	a {cursor: pointer;}
	#span-tak, #span-nie {width: 50%;margin-top: 10px;}
	.ld-button {color: white;background: black;border: 1px solid white;border-radius: 5px;padding-left: 15px;padding-right: 15px;text-decoration: none;}
	.ld-button:hover {color: black;background: white;cursor:pointer;}
</style>
<script src="/js/jquery-3.3.1.js"></script>
<body style="background: black;margin: 0 0 0 0;">
	<div id="href-menu-reload" style="position: fixed;top: 0;right: 0;font-size: 130%;z-index: 10;padding: 5px;background: transparent;">
		<a id="href-menu" href="01_cv_address.php">[x]</a>
		<a id="href-reload" href="/" style="display: none;">[<i class="fas fa-redo" style="font-size: 60%;"></i>]</a>
	</div>
	<div id="div-1" style="background: white;height: 100%;width: 100%;overflow: auto;"></div>
	<p style="padding-top: 40px;">0</p>
	<p>1</p>
	<p>2</p>
	<p>3</p>
	<p>4</p>
	<p>5</p>
	<p>6</p>
	<p>7</p>
	<p>8</p>
	<p>9</p>
	<p>Mam nadzieję, że przyciągnąłem Twoją uwagę i możemy przejść dalej?</p>
	<p><span id="span-tak" style="float: left;"><span class="ld-button">tak</span></span><span id="span-nie" style="float: right;">nie</span></p>
	<div id="div-2" style="background: black;height: 100%;width: 100%;position: fixed;top: 0;left: 0;display: none;overflow: auto;padding-top: 40px;">

		<div class="loading">
			<div class="p-loading"><span>kreatywność - ładowanie </span><br><span id="creativity-loading" class="span-loading"><span id="creativity-loading-caption" style="visibility: hidden;"></span></span></div>
			
			<div class="p-loading"><span>dokładność - ładowanie </span><br><span id="precision-loading" class="span-loading"><span id="precision-loading-caption" style="visibility: hidden;"></span></span></div>
			
			<div class="p-loading"><span>zaangażowanie - ładowanie </span><br><span id="engagement-loading" class="span-loading"><span id="engagement-loading-caption" style="visibility: hidden;"></span></span></div>
			
			<div class="p-loading"><span>samodzielność - ładowanie </span><br><span id="self-reliance-loading" class="span-loading"><span id="self-reliance-loading-caption" style="visibility: hidden;"></span></span></div>
			
			<div class="p-loading"><span>wiedza - ładowanie </span><br><span id="knowledge-loading" class="span-loading"><span id="knowledge-loading-caption" style="visibility: hidden;"></span></span></div>
		</div>
		
		<br style="clear: left;">
		<br>
		<div id="motivation-letter" style="width: 100%;display: none;margin-top: 5%;margin-bottom: 15%;">
			<p style="display: block;margin: 0;padding-top: initial;padding:-bottom: initial;">Niniejszym zapraszam do obejrzenia mojego CV</p>
			<p style="display: block;text-align: left;">Chciałbym nim zaprezentować siebie i wszystko czego się nauczyłem. Liczę, że w ten nieszablonowy sposób zachęcę Cię do spojrzenia na mnie poza stereotypami. Jeszcze nie mogę się pochwalić certyfikatem, ale powyższy zestaw zalet nie jest możliwy do wyuczenia.</p>
			<p style="display: block;text-align: left;">Pamiętaj, że każdego dnia uczę się czegoś nowego.</p>
			<p style="display: block;margin: 20px 0;padding-top: initial;padding:-bottom: initial;text-align: center;"><a href="01_cv_address.php" tabindex="0" class="ld-button">Przejdź</a></p>
		</div>
	</div>
<script>
	var i = 1500;
	$(document).ready(function(){
		$('#div-1').fadeTo(i*1.6666666666666666666666666666667, 0, 'linear', function(){
			$('#div-1').remove();
		});
		$('p').delay(i*1.6666666666666666666666666666667).eq(0).fadeIn(i, function(){
			$('p').eq(1).fadeIn(i*0.8, function(){
				$('p').eq(2).fadeIn(i*0.7, function(){
					$('p').eq(3).fadeIn(i*0.6, function(){
						$('p').eq(4).fadeIn(i*0.5, function(){
							$('p').eq(5).fadeIn(i*0.4, function(){
								$('p').eq(6).fadeIn(i*0.3, function(){
									$('p').eq(7).fadeIn(i*0.25, function(){
										$('p').eq(8).fadeIn(i*0.2, function(){
											$('p').eq(9).fadeIn(i*0.15, function(){
												$('p').eq(10).fadeIn(i, function(){
													$('p').eq(11).fadeIn(i);
												});
											});
										});
									});
								});
							});
						});
					});
				});
			});
		});
	});
	$('#span-tak').children().click(function(){
		var screenWidth = document.body.clientWidth;
		if (screenWidth < 480) {spanWidth = '100%'; brVisible = ''} else {spanWidth = '30%'; brVisible = 'br';}
		$(brVisible).css({display: 'none'});
		$('#div-2').eq(0).fadeIn(i/1.25).css({display: 'inlineBlock'});
		$('#creativity-loading').delay(i/1.25).animate({width: spanWidth}, i/1.5, function(){
			$('#creativity-loading-caption').css({visibility: 'visible'});
			$('#creativity-loading-caption').text('100%');
		});
		$('#precision-loading').delay(i*1.466666666666667).animate({width: spanWidth}, i/1.25, function(){
			$('#precision-loading-caption').css({visibility: 'visible'});
			$('#precision-loading-caption').text('100%');
		});
		$('#engagement-loading').delay(i*2.266666666666667).animate({width: spanWidth}, i/1.4, function(){
			$('#engagement-loading-caption').css({visibility: 'visible'});
			$('#engagement-loading-caption').text('100%');
		});
		$('#self-reliance-loading').delay(i*3.2).animate({width: spanWidth}, i/1.4, function(){
			$('#self-reliance-loading-caption').css({visibility: 'visible'});
			$('#self-reliance-loading-caption').text('100%');
		});
		var x = $('#knowledge-loading');
		x.delay(i*4).animate({width: spanWidth}, i*2.666666666666667, function(){
			$('#knowledge-loading-caption').css({visibility: 'visible'});
			x.css({backgroundColor: 'red'});
			$('#knowledge-loading-caption').text('wciąż ładuję');
			$('#motivation-letter').css({display: 'block'});
			$('#href-reload').css({display: 'block'});
			$('#href-menu').css({display: 'none'});
		});
	});
	$('#span-nie').mouseover(function(){
		$(this).fadeOut(i/7.5);
	});
</script>
</body>
</html>