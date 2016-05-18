<?php
try {
    $bdd = new PDO('mysql:host=172.16.6.14;dbname=cwitter', 'root', 'YDTapg45149');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Cwitter</title>
		<link rel="stylesheet" href="css/body_style.css">
		<link rel="stylesheet" href="css/entete_style.css">
	</head>
	<body>
		<header>
			<?php include("entete.php"); ?>
            <?php
            $reponse = $bdd->prepare('SELECT * FROM utilisateur where id= ?');
            $reponse->execute(array($_SESSION['id'],
            ));
            $resultat=$reponse->fetch();
            ?>

		</header>
        <?php include("form_upload.php"); ?>
        <?php
        if(isset($erreur)){
            echo $erreur;
        }
        ?>
        <script type="text/javascript">
            function toggle_visibility(id){
                var e=document.getElementById(id);
                if (e.style.display=='block')
                    e.style.display='none';
                else
                    e.style.display='block';
            }
        </script>
		<div id="pop_image">
			<div class="pop_couv">
				<div class="pop_content">
                    <button  style="float: right; background-color: #80808080"><a href="javascript:void(0)" style="color= black; text-decoration: none" onclick="toggle_visibility('pop_image');">X</a> </button>
					<h1 style="color: #FFFFFF">Modifier la photo profil</h1>
					<form method="post" action="form_upload.php" enctype="multipart/form-data">
						<input class="fileinput"  style="margin-top: 40px ;margin-left: 1em;"   id="photo_profile" type="file" accept="image/*" name="image" placeholder="Importer une photo" /><br/><br/>
                        <input class="style_button" style="margin-left:7em;width: 15em; margin-top:8em;float: bottom" type="submit" value="Mettre à jour la photo">
					</form>
				</div>
			</div>
		</div>
        <button class="style_button" style="margin-left: 7.5em; width: 15em"><a href="javascript:void(0)" style="color: black; text-decoration: none" onclick="toggle_visibility('pop_image');">Modifier votre Photo</a> </button>
        <div id="info_user">
			<p>Date de naissance: <?php echo $resultat['naissance'] ?> </p>
			<p>Habite à :<?php echo $resultat['ville']?></p>
			<p>Travaille à: <?php echo $resultat['profession']?></p>
		</div>
		<script type='text/javascript'>
			function  chooseFile(){
                document.getElementById("photo_profile").click();
            }

		</script>


		<div id="menu">
			<ul>
				<li><a href="modifier_profil.php">Modifier</a></li>
				<li><a href="mesphotos.php">Photos</a></li>
				<li><a href="followers.php">Followers</a></li>
			</ul>
		</div>

		<div id="edit_info">
			<h2>Editer mes informations :</h2>
			<form action="form_modifier_profil.php" method="post" id="alt_info" name="alt_info">
				<p><input type="text" class="input_name" value="<?php echo $resultat['nom']?>" placeholder="Nom:" name="nom" /></p>
				<p><input type="text" class="input_name" value="<?php echo $resultat['prenom']?>" placeholder="Prenom:" name="prenom" /></p>
				<p><input type="date" class="input_name" value="<?php echo $resultat['naissance']?>" name="naissance" ></p>
				<p><input type="text" class="input_name" value="<?php echo $resultat['ville']?>" placeholder="Ville: "  name="ville" ></p>
                <p><input type="text" class="input_name" value="<?php echo $resultat['profession']?>" placeholder="Profession:" name="profession" ></p>
				<input type="submit" class="style_button" value="Modifier" name="submit_connexion" />
			</form>
		</div>

	</body>

</html>
