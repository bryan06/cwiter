<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=cwitter', 'root', '');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
session_start();
if (!($_SESSION['id'])) header('Location: index.php');
if (isset ($_COOKIE['id']))
{
    $_SESSION['id'] = $_COOKIE['id'];

}

?>
<link href="css/lightbox.css" rel="stylesheet">
<script src="dist/js/lightbox-plus-jquery.js"></script>
<div id="header">
    <ul>
        <li><a href="timeline.php">Accueil</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="followers.php">Followers</a></li>
        <li><a href="suivre.php">Suivre des personnes</a></li>
        <li><a href="deconnection.php">Déconnexion</a></li>
    </ul>
</div>
<?php
    $reponse = $bdd->prepare('SELECT * FROM utilisateur where id= ?');
    $reponse->execute(array($_SESSION['id'],
    ));
    $resultat=$reponse->fetch();
?>
    <div id="header_bottom">
        <div id="photo">
            <?php
                if(!empty($resultat['image']))
                {
                    ?>
                   <a style="color: #000000 " href="utilisateur/image/<?php echo $resultat['image']; ?>" data-lightbox=profil-1> <img width="200" height="200" class="profil" src="utilisateur/image/<?php echo $resultat['image']; ?>" border="3"/> </a>
                    <?php
                }
            ?>
        </div>
        <div id="user_name">
            <h1> <?php echo $resultat['prenom'];echo "  "; echo $resultat['nom'];?>  </h1>
        </div>
    </div>

    <form action="search.php" method="post">
        <table id="search">
            <tr>
                <td><input class="input_search" type="text" placeholder="nom" name="nom"></td>
                <td><input class="input_search" type="text" placeholder="prenom" name="prenom"></td>
                <td><input class="button_search" type="submit"  value="Recherche" name="submit_search" /></td>
            </tr>
        </table>
    </form>

