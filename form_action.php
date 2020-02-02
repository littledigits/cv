<?php
		$mail = $_POST['mail'];
		$angielski = $_POST['angielski'];
		$planeta_sportu = $_POST['planeta_sportu'];

		if (isset($angielski)){
			echo 'język angielski<br>nr konta bankowego do wpłat xxxx';
		} else {echo '';}

		if (isset($planeta_sportu)){
			echo '<hr>planeta sportu<br>nr konta bankowego do wpłat';
		} else {echo '';}
?>