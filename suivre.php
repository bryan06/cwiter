<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Suivre des personnes</title>
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
			$ville=$resultat['ville'];
			$profession=$resultat['profession'];
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
		<div id="content3">
			<p><?php echo $name;?>, voici des personnes que vous seriez susceptible de suivre : <p>
			<?php 
				$req = $bdd->prepare('SELECT image FROM utilisateur'); //WHERE ville= :ville AND profession = :profession');
				$req->execute(array(
					'ville' => $ville,
					'profession' => $profession,
				));
				
				while ($donnees = $req->fetch()) {
					echo '<img src=utilisateur/image/'.$donnees['image'].'>';
			}
							//var_dump($donnees['image']);
			?>
		</div>
		<footer>
			<?php include("piedpage.php"); ?>
		</footer>
	</body>
</html>