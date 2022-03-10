<!DOCTYPE html>
<html lang="fr">
<head>
    <title>LeBonWish</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../bootstrap-4.5.2-dist/css/bootstrap.css">
</head>
<body>
<!-- Inclure programme nom personne -->
   <?php include "name.php";?>
<!-- Accueil Message de bienvenue -->
    <div class="index">
        <div class="intro">
            <form action="index.php" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <select name="genre">
                    <option value="M.">Monsieur</option>
                    <option value="Mme.">Madame</option>
                </select>
            <input type="text" name="name" placeholder="Votre prénom est:">
            <input type="submit" name="submit" value="Prénommé"><br>
            <p>Salut <?php echo $genre,' ', htmlspecialchars($name); ?>:
<!-- Date/Heure -->
                <?php
                $date = date("d/m/Y");
                $heure = date("H:i:s");
                echo "Aujourd'hui " ,$date," " ,$heure;?><br>
            Bienvenue sur LeBonWish.com <br>
            Site de petites annonces Auto Immo Divers</p>
            </form>
        </div>
<!-- Lecture des annonces -->
        <p>La possibilité de visualiser de nombreuses annonces:<br>
            <a href="LireAnnonce/lectureAuto.php">
                <img src="img/lireauto.jpg">
            </a>
            <a href="LireAnnonce/lectureImmo.php">
                <img src="img/lireimmo.jpg">
            </a>
            <a href="LireAnnonce/lectureDivers.php">
                <img src="img/liredivers.jpg">
            </a>
        </p>
<!-- Passer une annonce -->
        <p>Ainsi que la mise en ligne d'annonce<br>
            <a href="PasserAnnonce/FormAuto.php">
                <img src="img/FormuAuto.jpg">
            </a>
            <a href="PasserAnnonce/FormImmo.php">
                <img src="img/FormuImmo.jpg">
            </a>
            <a href="PasserAnnonce/FormDivers.php">
                <img src="img/FormuDivers.jpg">
            </a>
        </p>
<!-- Suppression d'un annnonce -->
        <p>Et la possibilité d'effacer vos annonces<br>
            <a href="SupprimerAnnonce/formSuppr.php">
                <img src="img/supprimer.jpg">
            </a>
        </p>
    </div>
</body>
</html>