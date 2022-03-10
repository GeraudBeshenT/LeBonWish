<?php
// Connexion BDD
$serveur='localhost';
$db = 'annonces';
$user = 'root';
$pass = '';
$idcon = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);
// obtention ID requete deletion d'après l'id
$id_immo = $_GET['id_immo'];
$delete ="DELETE FROM immo WHERE id_immo = '$id_immo'";
$del = $idcon->query($delete);
// si la requete s'effectue
if($del)
{
  // fermeture session+redirection 
    header("location:Admin.php");
    exit; 
}
else
{
  // message d'erreur
    echo "Error deleting record";
}
?>