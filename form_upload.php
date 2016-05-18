<?php
try {
    $bdd = new PDO('mysql:host=172.16.6.14;dbname=cwitter', 'root', 'YDTapg45149');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


if( isset($_FILES['image']) AND !empty($_FILES['image']['name']) )
{
    $tailleMax= 4194304;
    $extensionsValides= array('jpg','jpeg', 'gif','png');
    if($_FILES['image']['size']<=$tailleMax)
    {
        session_start();
        //Renvoi l'extension du fichier en ingorant le premier caractère + conversion minuscule
        $extensionsUpload=strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
        if(in_array($extensionsUpload, $extensionsValides))
        {
            $chemin="utilisateur/image/".$_SESSION['id'].".".$extensionsUpload ;
            $resultimage=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
            if($resultimage)
            {
                $req= $bdd->prepare('UPDATE utilisateur SET image= :image WHERE id= :id');
                $req->execute(array(
                   'image' => $_SESSION['id'].".".$extensionsUpload,
                    'id' => $_SESSION['id'],
                ));
                $req2= $bdd->prepare('UPDATE followers SET image= :image WHERE mail= :mail');
                $req2->execute(array(
                    'image' => $_SESSION['id'].".".$extensionsUpload,
                    'mail' => $_SESSION['mail'],
                ));
                //var_dump($_SESSION['mail']);
                header("Refresh: 1;url=profil.php");
            }
            else
            {
                echo $erreur="Erreur durant l'importation de votre photo profil";
            }
        }
        else
        {

            echo $erreur= "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }

    }
    else
    {
        echo $erreur= "Votre photo de profil ne doit pas dépasser 4Mo";
    }

}


?>