<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<?php

$serveur='localhost';
$db = 'annonces';
$user = 'root';
$pass = '';
$idcon = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);
include '../name.php';

if($_GET['id'] != "" && $_GET['table'] != "")
	{
		$id = $_GET['id'];
		$table = $_GET['table'];

		$sql = "DELETE FROM ".$table." WHERE id_auto = '$id'";
		$suppr = $idcon->query($sql);
		if($suppr)
			{
			    echo"<script type='text/javascript'>
			      alert('".$genre." ".$name.", votre annonce ".$table." a été supprimée. Nous espérons que votre véhicule a été vendu comme vous le souhaitez, au plaisir de vous revoir sur notre site de vente LeBonWish');". "window.location.replace('../index.php');
			        </script>;";
				exit; 
			}
			else
			{
		    	echo "Il y a une erreur °_°";
			}
	}
if($_GET['id'] != "" && $_GET['table'] != "")
	{
		$id = $_GET['id'];
		$table = $_GET['table'];

		$sql = "DELETE FROM ".$table." WHERE id_immo = '$id'";
		$suppr = $idcon->query($sql);
		if($suppr)
			{
			    echo"<script type='text/javascript'>
			      alert('Madame/Monsieur ".$name.", votre annonce ".$table." a été supprimée. Nous espérons que votre bien a été vendu comme vous le souhaitez, au plaisir de vous revoir sur notre site de vente LeBonWish.');". "window.location.replace('../index.php');
			        </script>;";
				exit; 
			}
			else
			{
		    	echo "Il y a une erreur °_°";
			}
	}
if($_GET['id'] != "" && $_GET['table'] != "")
	{
		$id = $_GET['id'];
		$table = $_GET['table'];

		$sql = "DELETE FROM ".$table." WHERE id_divers = '$id'";
		$suppr = $idcon->query($sql);
		if($suppr)
			{
			    echo"<script type='text/javascript'>
			      alert('Madame/Monsieur ".$name.", votre annonce ".$table." a été supprimée. Nous espérons que votre véhicule a été vendu comme vous le souhaitez.');". "window.location.replace('../index.php');
			        </script>;";
				exit; 
			}
			else
			{
		    	echo "Il y a une erreur °_°";
			}
	}
?>
</body>
</html>