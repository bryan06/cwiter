<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mon profil</title>
		<link rel="stylesheet" href="css/style2.css">
		<link rel="stylesheet" href="css/entete_style.css">
	</head>
	<body>
		<header>
			<?php include("entete.php"); ?>
		</header>
			<div id="info2">
				<p>Date de naissance :<?php echo $resultat['naissance']?></p>
				<p>Habite à : <?php echo $resultat['ville']?></p>
				<p>Travaille/Etudie à: <?php echo $resultat['profession']?></p>
			</div>
		<div id="menu">
			<div class="dessous">
				<ul>
					<li><a href="modifier_profil.php">Modifier</a></li>
					<li><a href="mesphotos.php">Photos</a></li>
					<li><a href="followers.php">Followers</a></li>
				</ul>
			</div>
		</div>
		<div id="content2">
			<div id="addpic">
				<p class="last">Dernières photos ajoutées : </p>
				<img src="http://placehold.it/150x150"/>
				<!--<p class="pseudo">Pseudo</p>-->
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
			</div>
			<div id="lastfollow">
				<p class="last"> Dernières personnes suivies : </p>
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
			</div>
			<div id="lastfollowers">
				<p class="last"> Dernières personnes qui m'ont suivi : </p>
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
				<img src="http://placehold.it/150x150"/>
			</div>
		</div>
		<footer>
			<?php include("piedpage.php"); ?>
		</footer>
	</body>
</html>