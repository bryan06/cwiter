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
<html>
	<body>
		<?php
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$req = $bdd->prepare('SELECT nom, prenom FROM utilisateur WHERE nom LIKE ? AND prenom LIKE ?');
			$req->execute(array('%'.$nom.'%', '%'.$prenom.'%'
			));
		?>
		<form action="ajout.php" method="post">
			<table>
			<?php
				while ($resultat = $req->fetch()){
					echo '<tr>';
					echo '<td>';
					echo '<input type="hidden" name="nom" value='.$resultat['nom'].'>'.$resultat['nom'];
					echo '</td>';
					echo '<td>';
					echo '<input type="hidden" name="prenom" value='.$resultat['prenom'].'>'.$resultat['prenom'];
					echo '</td>';
					echo '<td><input type="submit" value="Suivre"/></td>';
			}
			?>
				</tr>
			</table>
		</form>
		<footer>
			<?php include("piedpage.php"); ?>
		</footer>
	</body>
</html>
	