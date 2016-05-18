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
if (isset ($_COOKIE['id']))
{
    setcookie('id', '', -1);
}
session_unset ();
session_destroy ();
header ('location: index.php');
?>