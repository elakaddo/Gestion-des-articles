<!DOCTYPE html>
<html lang="fr">
	<head>
		<title><?php echo "Démarrage de Fil Rouge" ?></title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<style>
  		<?php include "css/style.css" ?>
	</style>

	<body>
		<!-- MAIN MENU-->
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class=" container">
				<a class="navbar-brand" href="<?= $this->router->accueil()?>">
					<img src="res/volant.png" style="margin-right:5px;"/>
					<span style="font-size:24px">Arti<span style="color:var(--color-util)">cles</span></span>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
				<div class="navbar-nav ms-auto">
					<a class="travel-nav-item nav-link" href="<?= $this->router->accueil()?>">ACCUEIL</a>
					<a class="travel-nav-item nav-link" href="<?= $this->router->getArticleCreationURL()?>">AJOUTER ARTICLE</a>
					<a class="travel-nav-item nav-link" href="<?= $this->router->getListURL()?>">LISTE DES ARTICLES</a>
					<a class="travel-nav-item nav-link" href="<?= $this->router->getAproposURL()?>">ABOUT PROJECT </a>
				</div>
				</div>
			</div>
		</nav>
		
		<div class="container">
				<h1><?= $title ?></h1>
				<div class="content">
					<?php if($this->feedback === "Article added succesfully"){?>
							<div class="alert alert-success" role="alert">
								<?= $this->feedback ?>
							</div><?php };
						if($this->feedback === "Article updated succefully!"){?>
							<div class="alert alert-success" role="alert">
								<?= $this->feedback ?>
							</div><?php };  
						if($this->feedback === "Article deleted succefully!"){?>
							<div class="alert alert-success" role="alert">
								<?= $this->feedback ?>
							</div><?php };  
						if($this->feedback === "Error invalid information!"){?>
							<div class="alert alert-danger" role="alert">
								<?= $this->feedback ?>
							</div><?php };?>
					<?= $content ?>
				</div>
  		</div>
		  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff003b" fill-opacity="1" d="M0,128L26.7,122.7C53.3,117,107,107,160,133.3C213.3,160,267,224,320,218.7C373.3,213,427,139,480,133.3C533.3,128,587,192,640,218.7C693.3,245,747,235,800,218.7C853.3,203,907,181,960,154.7C1013.3,128,1067,96,1120,74.7C1173.3,53,1227,43,1280,58.7C1333.3,75,1387,117,1413,138.7L1440,160L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path></svg>
		  
		<!-- FOOTER -->
		<footer>
			<div class="container">
				My skills in PHP & MySQL © 2022<br>
				Visit my - <a href="https://github.com/elakaddo">Github<a>
			</div>
		</footer>

	</body>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

