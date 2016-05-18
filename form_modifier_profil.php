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
$naissance = $_POST['naissance'];
$ville = $_POST['ville'];
$profession = $_POST['profession'];


$id= $_SESSION['id'] ;


$req = $bdd->prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, naissance  = :naissance, ville = :ville, profession = :profession WHERE id= :id');
$req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'naissance' => $naissance,
    'ville' => $ville,
    'profession' => $profession,
    'id'=> $id,
));

header('Location: modifier_profil.php');
?>