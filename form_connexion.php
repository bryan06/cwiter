<?php
try {
    $bdd = new PDO('mysql:host=172.16.6.14;dbname=cwitter', 'root', 'YDTapg45149');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['mail'])) $email = $_POST['mail'];
if(isset($_POST['mdp'])) $mdp = sha1($_POST['mdp']);


$req = $bdd->prepare('SELECT id, mail, mdp FROM utilisateur  WHERE mail = :mail AND mdp = :mdp');
$req->execute(array(
    'mail' => $email,
    'mdp' => $mdp,
));

$resultat = $req->fetch();
if (!$resultat)
{
    echo 'Mauvais email ou mot de passe !';
    header('Location index.php?err=1');
}
else
{
    session_start();
    $_SESSION['id']=$resultat['id'];
    $_SESSION['prenom']=$resultat['prenom'];
    $_SESSION['mail']=$resultat['mail'];
    $_SESSION['ville']=$resultat['ville'];
    $_SESSION['profession']=$resultat['profession'];
    if (isset($_POST['checkbox1']))
    {
        $expire = time() + 365*24*3600;
        setcookie('id', $_SESSION['id'], $expire);
    }
    header('Location: timeline.php');
}
?>

