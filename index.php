<!DOCTYPE html>
<html>
<?php include('form_inscription.php'); ?>
	<head>
		<meta charset="utf-8"/>
		<title>Cwitter</title>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<header>
			<div id="title"><strong>Cwitter</strong></div>
		</header>

		<div id="connexion_container">
			<form action="form_connexion.php" method="post" id="alt_connexion" name="alt_connexion">
				<p class="titre"><span style="color: white; ">Connexion</span></p>
				<input type="email" class="style_input" placeholder="Email Address" name="mail"/>
                <!--  <?php if($_GET['err']==1) echo "ca marche pas!";?> -->
				<input type="password" class="style_input" placeholder="Mot de passe" name="mdp"/><br />
			<div id="checkbox1">
                <input type="checkbox"  name="checkbox1" id="checkbox_id" value="1"><label style="color: white" for="checkbox_id">Se souvenir de moi</label><br/>
			</div>
                <input type="submit" class="style_button1" value="Connexion" name="submit_connexion" />
			</form>

		</div>
		<div id="inscription_container">
			<form action="form_inscription.php" method="post" id="alt_inscription" name="alt_inscription">
				<p class="titre"><span style="color: white; ">Inscription</span></p>
				<table>
					<tr>
						<td><input type="text" class="input_name" placeholder="Nom" name="nom" value="<?php if(isset($nom)) {echo $nom;}?>" /></td>
						<td><input type="text" class="input_name" placeholder="Prenom" name="prenom" /></td>
					</tr>
				</table>

				<input type="email" class="style_input" placeholder="Email Address" name="mail"/>
				<input type="password" class="style_input" placeholder="Mot de passe" name="mdp"/>
				<input type="password" class="style_input" placeholder="Retaper mot de passe"name="mdp2"/><br />

				<span style="color: white; ">Date de naissance:</span> <input type="date" name="naissance">
				<table>
					<tr>
						<td><input type="radio" name="sexe" value="M"><span style="color: white; ">Homme</span></td>
						<td rowspan="2"><input type="submit" class="style_button2" value="Inscription" name="submit_connexion" /></td>
					</tr>
					<tr><td><input type="radio" name="sexe" value="F"><span style="color: white; ">Femme</span></td></tr>
				</table>

			</form>
            <?php
            if(isset($erreur)){
                echo $erreur;
            }
            ?>
		</div>
	</body>
</html>