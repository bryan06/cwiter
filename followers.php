<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Cwitter</title>
		<link rel="stylesheet" href="css/style2.css">
		<link rel="stylesheet" href="css/entete_style.css">
	</head>
	<body>
		<header>
			<?php include("entete.php"); ?>
		</header>
		<div id="header_bottom">
			<?php
			$name = $resultat['prenom'];
			$id = $_SESSION['id'];
			$requete = $bdd->prepare('SELECT COUNT(*) as countid FROM suivi WHERE idutil = :id');
			$requete->execute(array(
					'id' => $id,
			));
			$resultat = $requete->fetch();
			?>
			<div id="info">
				<p>Vous suivez <?php echo $resultat['countid']?> personnes</p>
			</div>

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
		<div id="content">
			<p><?php echo $name?>, ces personnes vous suivent : </p>
			<div id="followers">
				<?php
				$reponse = $bdd->query('SELECT image FROM followers, suivi WHERE followers.id = suivi.idutil AND suivi.idfollow='.$_SESSION['id']);
				while ($donnees = $reponse->fetch()) {
					echo '<img src=utilisateur/image/'.$donnees['image'].'>';
				}
				?>
			</div>
		</div>
		<footer>
			<?php include("piedpage.php"); ?>
		</footer>
	</body>
</html>