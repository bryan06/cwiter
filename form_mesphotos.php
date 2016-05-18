<?php
try {
    $bdd = new PDO('mysql:host=172.16.6.14;dbname=cwitter', 'root', 'YDTapg45149');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['submit'])){
    $name=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $location='utilisateur/mesimages/';
    $target='utilisateur/mesimages/'.$name;
    $nameimg = $_POST['name'];
    if(move_uploaded_file($tmp_name,$location.$name)) {


        $req = $bdd->prepare('INSERT INTO mesphotos(p_img, p_title) VALUES (:p_img, :p_title)');
        $req = execute(array(
            'p_img' => $target,
            'p_title' => $nameimg,
        ));
        echo "photo chargé";
    }else{
        echo"photo non chargé";
    }
    $result=$bdd->prepare('SELECT * FROM mesphotos where p_id= ?');
        while($row=$result->fetch()){
            echo "<img src=".$row['p_img']." &nbsp ;>";
        }


}

?>