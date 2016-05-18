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
if(isset($_POST['titre'])) $titre = $_POST['titre'];
$auteur = $_SESSION['id'];
if(isset($_POST['publication'])) $publication = $_POST['publication'];


if (!empty($_POST)){

    $erreurs=array();

    if (empty($_POST['titre'])){
    $erreurs['titre']="Vous avez oublier de mettre un titre !";
    }
    if(empty($_POST['publication'])){
        $erreurs['publication']= "Vous n'avez pas mis de contenu !";
    }
    if (empty($erreurs)){
        $req = $bdd->prepare('INSERT INTO news(titre, auteur, publication, date_creation) VALUES (:titre, :auteur, :publication, :date_creation)');
        $req->execute(array(
            'titre' => $titre,
            'auteur' => $auteur,
            'publication' => $publication,
            'date_creation' => date("Y-m-d H:i:s"),
        ));
        header('Location: timeline.php');
    }
}



