<!DOCTYPE html>
<html>
<head>
  <title>Administration</title>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-4.5.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<!-- Menu -->
<header>
    <nav>
        <ul>
<!-- Page Admin -->
          <li class="déroulants">
            <a href="ConnexionAdmin.php">🔒</a>
          </li>
<!-- Page d'Accueil -->
          <li class="déroulant">
            <a href="../index.php">Accueil</a>
          </li>
<!-- Lecture des annonces -->
          <li>
            <a href=""> Lire les annonces</a>
              <ul>
                <li>
                  <a href="../LireAnnonce/lectureAuto.php">Automobile</a>
                </li>
                <li>
                  <a href="../LireAnnonce/lectureImmo.php">Immobilié</a>
                </li>
                <li>
                  <a href="../LireAnnonce/lectureDivers.php">Divers</a>
                </li>
              </ul>
          </li>
<!-- Formulaire -->
          <li>
            <a href="">Passer une annonces</a>
              <ul>
                <li>
                  <a href="../PasserAnnonce/FormAuto.php">Automobile</a>
                </li>
                <li>
                  <a href="../PasserAnnonce/FormImmo.php">Immobilié</a>
                </li>
                <li>
                  <a href="../PasserAnnonce/FormDivers.php">Divers</a>
                </li>
              </ul>
          </li>
<!-- Suppression annonce -->
          <li class="déroulant">
            <a href="../SupprimerAnnonce/formSuppr.php">Supprimer une annonce</a>
          </li>
        </ul>
    </nav>
</header>
<!-- Input des identifiants -->
<div style="padding-top: 15%;">
<?php
session_start();
if (isset($_POST['Valider']))
{
// Si ID & MDP non nul
	if (!empty($_POST['Identifiant']) AND !empty($_POST['mdp']))
	{
// id de connexion valides
		$ID = "Admin";
		$MDP = "1234";
// verification input
		$IDinput = htmlspecialchars($_POST['Identifiant']);
		$MDPinput = htmlspecialchars($_POST['mdp']);
        
		if ($IDinput == $ID AND $MDPinput == $MDP)
		{
// Si mdp correct direction Admin.php
			$_SESSION['mdp'] = $MDPinput;
			header('Location: Admin.php');
		}
        else // Sinon vérification
        {
			echo "Veuillez re vérifier vos identifiants";
		}
	}
    else // si champs vide 
    {
		echo "Compléter tous les champs";
	}
}
?>
<!-- Formulaire connexion -->
<p>Espace Administration</p>
    <div class="form" style="padding-top: 5%">
        <div class="container">
            <form method="POST" action="" align="center"><br>
            	Identifiant:
                    <input type="text" name="Identifiant" autocomplete="off">
            	Mot de passe:
                    <input type="password" name="mdp">
                    <input type="submit" class="btn btn-success" name="Valider">
            </form><br>
        </div>
    </div>
</div>
</body>
</html>