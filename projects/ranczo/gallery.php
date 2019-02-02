<!doctype html>
<html>
	<head>
		<title>Galeria - Ranczo pod pomarańczą</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="/bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet">
		<link href="/fontawesome-free-5.2.0-web/css/all.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
		<script src="jquery-3.3.1.js"></script>
	</head>
	<body>
		<div id="main-container" class="container-fluid">
			<header>
				<?php
					include 'header.html';
				?>
			</header> 
			<nav>
				<div class="row justify-content-center d-none d-lg-flex pb-0">
					<ul class="nav nav-tabs border-0">
						<li class="nav-item"><a href="index.php" class="nav-link px-5 mx-2 bg-warning text-secondary">O nas</a></li>
						<li class="nav-item"><a href="offer.php" class="nav-link px-5 mx-2 bg-warning text-secondary">Oferta</a></li>
						<li class="nav-item"><a href="attractions.php" class="nav-link px-5 mx-2 bg-warning text-secondary">Atrakcje</a></li>
						<li class="nav-item"><a href="#" class="nav-link px-5 mx-2 bg-light text-dark">Galeria</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link px-5 mx-2 bg-warning text-secondary">Kontakt</a></li>
					</ul>
				</div>

				<div class="row bg-transparent navbar navbar-light d-lg-none">
					<a class="navbar-brand text-warning navbar-brand-style" href="#">Ranczo pod pomarańczą</a>
					<button class="navbar-toggler mb-1 bg-warning" type="button" data-toggle="collapse" data-target="#small-menu" aria-controls="small-menu" aria-expanded="false" aria-label="Toggle navigation">
						<i class="navbar-toggler-icon"></i>
					</button>
					<div class="collapse navbar-collapse" id="small-menu">
						<ul class="navbar-nav nav-pills">
							<li class="nav-item"><a href="index.php" class="nav-link px-5 mx-3 bg-warning text-secondary">O nas</a></li>
							<li class="nav-item"><a href="offer.php" class="nav-link px-5 mx-3 bg-warning text-secondary">Oferta</a></li>
							<li class="nav-item"><a href="attractions.php" class="nav-link px-5 mx-3 bg-warning text-secondary">Atrakcje</a></li>
							<li class="nav-item"><a href="#" class="nav-link px-5 mx-3 bg-light text-dark">Galeria</a></li>
							<li class="nav-item"><a href="contact.php" class="nav-link px-5 mx-3 bg-warning text-secondary">Kontakt</a></li>
							<li class="nav-item dropdown mt-1">
								<a href="#" class="nav-link px-5 mx-3 bg-warning text-secondary dropdown-toggle" id="language-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="flase">Lang&nbsp;
									<i class="fas fa-globe"></i></i>
								</a>
								<ul class="dropdown-menu bg-transparent border-0 m-0 p-0" aria-labelledby="navbarDropdown">
									<li><a href="#" class="nav-link px-5 mx-3 bg-info text-light"><samp>EN&nbsp;</samp><img src="img/en.gif"></a></li>
									<li><a href="#" class="nav-link px-5 mx-3 bg-info text-light"><samp>FR&nbsp;</samp><img src="img/fr.gif"></a></li>
									<li><a href="#" class="nav-link px-5 mx-3 bg-info text-light"><samp>DE&nbsp;</samp><img src="img/de.gif"></a></li>
									<li><a href="#" class="nav-link px-5 mx-3 bg-info text-light"><samp>IT&nbsp;</samp><img src="img/it.gif"></a></li>
									<li><a href="#" class="nav-link px-5 mx-3 bg-info text-light"><samp>RU&nbsp;</samp><img src="img/ru.gif"></a></li>
									<li><a href="#" class="nav-link px-5 mx-3 bg-info text-light"><samp>ES&nbsp;</samp><img src="img/es.gif"></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="row">
				<div class="col-sm-1">
					<ul class="nav d-none d-lg-block">
								<li><a href="#" class="btn btn-info p-1"><samp>EN&nbsp;</samp><img src="img/en.gif"></a></li>
								<li><a href="#" class="btn btn-info p-1"><samp>FR&nbsp;</samp><img src="img/fr.gif"></a></li>
								<li><a href="#" class="btn btn-info p-1"><samp>DE&nbsp;</samp><img src="img/de.gif"></a></li>
								<li><a href="#" class="btn btn-info p-1"><samp>IT&nbsp;</samp><img src="img/it.gif"></a></li>
								<li><a href="#" class="btn btn-info p-1"><samp>RU&nbsp;</samp><img src="img/ru.gif"></a></li>
								<li><a href="#" class="btn btn-info p-1"><samp>ES&nbsp;</samp><img src="img/es.gif"></a></li>
							</ul>
				</div>
				<div class="col-xs-12 col-sm-10 bg-light jumbotron">
					<h3 class="text-secondary">zdjęcia</h3>
					
					<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="img/JESIEŃ - WIDOKI ZE SPACERU/Jesień - widoki ze spaceru - 1 - Ranczo Pod Pomarańczą.JPG" alt="Jesień - widoki ze spaceru - 1 - Ranczo Pod Pomarańczą.JPG">
								<div class="carousel-caption">
									<p>1/x</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="img/JESIEŃ - WIDOKI ZE SPACERU/Jesień - widoki ze spaceru - 2 - Ranczo Pod Pomarańczą.JPG" alt="Jesień - widoki ze spaceru - 2 - Ranczo Pod Pomarańczą.JPG">
								<div class="carousel-caption">
									<p>2/x</p>
								</div>
							</div>
						</div>
						<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
							<span class="" aria-hidden="true">Poprzedni</span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					

				</div>
				<div class="col-sm-1"></div>				
			</div>

			<footer>
				<?php
					include 'footer.html';
				?>
			</footer>
		</div>

		<script src="/bootstrap-4.1.3-dist/js/bootstrap.js"></script>

	</body>
</html>