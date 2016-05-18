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
        </header>

        <?php
        if(isset($erreur)){
            echo $erreur;
        }
        ?>
        <div id="alt_actualite">
            <h1 style="margin-left: 5em; text-shadow: 0 0 10px #660033;">Actualités :</h1><br>

            <form id="formtime" action="form_timeline.php" method="post">

                <p>
                    <?php
                    if (empty($resultat['image'])) {
                        ?>
                        <img width="70" height="70" src="utilisateur/image/<?php echo $resultat['image']; ?>" border="3"
                             class="positionImage"/>
                        <?php
                    }
                    ?>
                    <label style="margin-left: 7em ; font-size: 1.3em;" for="titre">Titre :</label>
                    <input class="input_name" type="text" name="titre" id="titre"placeholder="Titre de votre publication"><br><br>
                    <img style="margin-top: 0; display: inline;float: left" width="70" height="70" class="profil" src="utilisateur/image/<?php echo $resultat['image']; ?>" border="3"/>
                    <span style=" font-weight: bold; font-size:1.4em;margin-left: 8px; margin-top: 0; display:inline-block"> <?php echo $resultat['prenom'];echo "  "; echo $resultat['nom'] ?></span>
                    <textarea style="margin-left: 6em ; display: block;" id="mypublication" name="publication" rows="7" cols="70"placeholder="Publication"></textarea>
                    <input class="style_button" type="submit" style=" margin-top:10px; margin-left: 32%" value="Publier" >
                </p>
                <hr style=" margin-top: 0;margin-left: 0; width: 42%"><br/>
            </form><br><br>

            <div id="contentactualite">
                <?php
                //$reqimg=$bdd->prepare('SELECT image FROM utilisateur, news WHERE news.auteur = :id_utilisateur');
                //$reqimg->execute(array(
                //    'id_utilisateur' => $_SESSION['id'],
                //));
                $reqimg=$bdd->prepare('SELECT image FROM `utilisateur` INNER JOIN news ON news.auteur=utilisateur.id WHERE news.auteur=:id GROUP BY image');
                $reqimg->execute(array(
                    'id'=> $_SESSION['id'],
                 ));
                $image=$reqimg->fetch();
                $reqimg->closeCursor();

                    $reponse = $bdd->query('SELECT * FROM utilisateur ');

                    while ($donnees = $reponse->fetch()) {
                        $reponse2 = $bdd->query("SELECT * FROM news WHERE auteur=".$donnees['id']." ORDER BY date_creation DESC");
                ?>
                        <?php
                            while($donnees2=  $reponse2->fetch()){
                        ?>
                                <em>le <?php echo $donnees2['date_creation']; ?></em>
                                <img style="margin-top: 0;display: inline-block;float: left" width="70" height="70" class="profil" src="utilisateur/image/<?php echo $image['image']; ?>" border="3"/>
                                <h2> <?php echo $donnees['prenom'];echo "  "; echo $donnees['nom'];?>  </h2>
                                <label class="input_titre" style=" margin-left: 16em" for="titre">Titre : <?php echo $donnees2['titre']?> </label><br/>
                                <p>
                                    <?php
                                        $contenu = nl2br(stripslashes($donnees2['publication']));
                                        echo $contenu;
                                    ?>
                                    <hr style=" margin-left: 0; width: 42%"><br><br>
                                </p>
                                <?php
                            }


                                ?>
                            <?php
                    }
                            ?>
            </div>
        </div>
        <footer>
            <?php include("piedpage.php"); ?>
        </footer>
    </body>
</html>



