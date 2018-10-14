<?php
include 'meta.php';
?>
<!doctype html>
<html lang="pl">
<title>intro 0.1</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="images/logo.png">
<style>
	* {font-family: Lato, Share Tech Mono, Lucida Console;}
	p {font-size: 150%;text-align: center;display: none;color: white;}
	.p-loading {display: block;margin: 0;padding: 0;}
	.loading-bar {display: block;}
	.loading-text {text-align: left;}
	div.loading {font-size: 150%;text-align: center;color: white;float: left;}
	.span-loading {color: black;background: white;width: 0;position: absolute;margin-left: 1%;}
</style>
<script src="js/jquery-3.3.1.js"></script>
<body style="background: black;margin: 0 0 0 0;">
	<div style="position: fixed;top: 0;right: 0;font-size: 130%;z-index: 10;display: inline-block;">
		<a id="href-menu" href="menu.php" style="color: white;text-decoration: none;">[x]</a>
		<a id="href-reload" href="index.php" style="color: white;text-decoration: none;display: none;">[<i class="fas fa-redo" style="font-size: 60%;"></i>]</a>
	</div>
	<div id="div-1" style="background: white;height: 100%;width: 100%;position: fixed;top: 0;left: 0;"></div>
	<p>0</p>
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
	<p><span id="span-tak" style="width: 50%;float: left;text-decoration: underline;cursor: pointer;">tak</span><span id="span-nie" style="width: 50%;float: right;text-decoration: underline;">nie</span></p>
	<div id="div-2" style="background: black;height: 100%;width: 100%;position: fixed;top: 0;left: 0;display: none;">
		<div class="loading" style="width: 40%;text-align: right;">
			<div id="p-loading loading-text" class="p-loading"><span>kreatywność - ładowanie</span></div><br>
			<div id="p-loading loading-text" class="p-loading"><span>dokładność</span><span> - ładowanie </span></div><br>
			<div id="p-loading loading-text" class="p-loading"><span>zaangażowanie</span><span> - ładowanie </span></div><br>
			<div id="p-loading loading-text" class="p-loading"><span>samodzielność</span><span> - ładowanie </span></div><br>
			<div id="p-loading loading-text" class="p-loading"><span>wiedza</span><span> - ładowanie </span></div>
		</div>
		<div class="loading">
			<div class="p-loading loading-bar"><span id="creativity-loading" class="span-loading"><span id="creativity-loading-caption" style="visibility: hidden;">100%</span></span></div><br><br>
			<div class="p-loading loading-bar"><span id="precision-loading" class="span-loading"><span id="precision-loading-caption" style="visibility: hidden;">100%</span></span></div><br><br>
			<div class="p-loading loading-bar"><span id="engagement-loading" class="span-loading"><span id="engagement-loading-caption" style="visibility: hidden;">100%</span></span></div><br><br>
			<div class="p-loading loading-bar"><span id="self-reliance-loading" class="span-loading"><span id="self-reliance-loading-caption" style="visibility: hidden;">100%</span></span></div><br><br>
			<div class="p-loading loading-bar"><span id="knowledge-loading" class="span-loading"><span id="knowledge-loading-caption" style="visibility: hidden;">100%</span></span></div>
		</div>
		<br style="clear: left;">
		<br>
		<div id="motivation-letter" style="width: 100%;display: none;margin-top: 5%;">
			<p style="display: block;margin: 0;padding-top: initial;padding:-bottom: initial;">Niniejszym zapraszam do obejrzenia mojego CV</p>
			<p style="display: block;text-align: left;">Chciałbym nim zaprezentować siebie i wszystko czego się nauczyłem. Liczę, że w ten nieszablonowy sposób zachęcę Cię do spojrzenia na mnie poza stereotypami. Jeszcze nie mogę się pochwalić certyfikatem, ale powyższy zestaw zalet nie jest możliwy do wyuczenia.</p>
			<p style="display: block;text-align: left;">Pamiętaj, że każdego dnia uczę się czegoś nowego.</p>
			<p style="display: block;margin: 0;padding-top: initial;padding:-bottom: initial;text-align: center;"><a href="menu.php" tabindex="0" style="text-decoration: none;color: white;">Przejdź</a></p>
		</div>
	</div>
<script>
	$(document).ready(function(){
		var i = 1500;
		$('#div-1').fadeTo(2500, 0, 'linear', function(){
			$('#div-1').remove();
		});
		$('p').delay(2500).eq(0).fadeIn(i, function(){
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
	$('#span-tak').click(function(){
		$('#div-2').eq(0).fadeIn(1000).css({display: 'inlineBlock'});
		$('#creativity-loading').delay(1000).animate({width: '30%'}, 1000, function(){
			$('#creativity-loading-caption').css({visibility: 'visible'});
		});
		$('#precision-loading').delay(2200).animate({width: '30%'}, 1200, function(){
			$('#precision-loading-caption').css({visibility: 'visible'});
		});
		$('#engagement-loading').delay(3400).animate({width: '30%'}, 1400, function(){
			$('#engagement-loading-caption').css({visibility: 'visible'});
		});
		$('#self-reliance-loading').delay(4800).animate({width: '30%'}, 1400, function(){
			$('#self-reliance-loading-caption').css({visibility: 'visible'});
		});
		var x = $('#knowledge-loading');
		x.delay(6200).animate({width: '30%'}, 4000, function(){
			$('#knowledge-loading-caption').css({visibility: 'visible'});
			x.css({backgroundColor: 'red'});
			$('#knowledge-loading-caption').text('wciąż ładuję');
			$('#motivation-letter').delay(10200).css({display: 'block'});
			$('#href-reload').delay(10200).css({display: 'block'});
		});
	});
	$('#span-nie').mouseover(function(){
		$(this).fadeOut(200);
	});
</script>
</body>
</html>