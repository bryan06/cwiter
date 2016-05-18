<?php
try {
    $bdd = new PDO('mysql:host=172.16.6.14;dbname=cwitter', 'root', 'YDTapg45149');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
session_start();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
		
$req = $bdd->prepare('SELECT id FROM followers WHERE nom = :nom AND prenom = :prenom');
	   $req->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
		));
$resultat = $req->fetch();

$id_util = $_SESSION['id'];
$id_follow = $resultat['id'];
		
$req = $bdd->prepare('INSERT INTO suivi(idutil, idfollow) VALUES (:id_util, :id_follow)');
                    $req->execute(array(
                        'id_util' => $id_util,
                        'id_follow' => $id_follow,
					));
//var_dump($id_util);
//var_dump($id_follow);
header("Refresh: 1;url=suivre.php");