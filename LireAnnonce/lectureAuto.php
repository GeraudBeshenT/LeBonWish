<!DOCTYPE html>
<html>
<head>
    <title> Annonces Auto</title>
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
                <a href="../Admin/ConnexionAdmin.php">🔒</a>
            </li>
<!-- Accueil -->
            <li class="déroulant">
                <a href="../index.php">Accueil</a>
            </li>
<!-- Lecture des annonces -->
            <li>
                <a href=""> Lire les annonces</a>
                    <ul>
                        <li>
                            <a href="lectureAuto.php">Automobile</a>
                        </li>
                        <li>
                            <a href="lectureImmo.php">Immobilié</a>
                        </li>
                        <li>
                            <a href="lectureDivers.php">Divers</a>
                        </li>
                    </ul>
            </li>
<!-- Écrire une annonce -->
            <li><a href="">Passer une annonces</a>
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
<!-- Supprimer une annonce -->
            <li class="déroulant">
                <a href="../SupprimerAnnonce/formSuppr.php">Supprimer une annonce</a>
            </li>
        </ul>
    </nav>
</header><br>

<!-- Padding formulaire -->
<div style="padding-top: 9.9%;"></div>
<!-- Formulaire recherche -->
<div class="lectauto">
    <h1>Recherche avancées</h1>
    <div class="boxauto">
        <form method="GET" action="SelectAuto.php">
            <table class='table table-warning'>
                <thead class='thead-dark'>
                    <tr>
                    <th>Marque</th>
                    <th>Modele</th>
                    <th>Énergie</th>
                    <th>Boite à vitesse</th>
                </thead>
<!-- Input recherche Marque - Modèle - Énergie - Boîte à vitesse -->
                <tbody>
                    <td>
                        <br><input type="search" class="form-control" name="marque">
                    </td>
                    <td>
                        <br><input type="search" class="form-control" name="modele">
                    </td>
                    <td>
                        <input type="radio" name="energie" value="">Toutes<br>
                        <input type="radio" name="energie" value="ess">Essence<br>
                        <input type="radio" name="energie" value="die">Diesel<br>
                        <input type="radio" name="energie" value="gpl">GPL
                    </td>
                    <td>
                        <input type="radio" name="boite" value="manuelle">Manuelle<br>
                        <input type="radio" name="boite" value="automatique">Automatique
                    </td>
                    </tr>
                </tbody>
            </table>
            <table class='table table-primary'>
                <thead class='thead-dark'>
                    <tr>
                    <th>Kilométrage maximum</th>
                    <th>Année minimum</th>
                    <th>Prix maximum</th>
                </thead>
<!-- Input recherche Kilométrage - Année - Prix -->
                <tbody>
                    <td>
                        <br><input type="search" class="form-control" name="km"><br>
                    </td>
                    <td>
                        <br><input type="search" class="form-control" name="annee"><br>
                    </td>
                    <td>
                        <br><input type="search" class="form-control" name="prix"><br>
                    </td>
                    </tr>
                </tbody>
            </table>
<!-- Boutton validation recherche -->
            <input type="submit" class="btn btn-warning" value="Valider">
        </form>
    </div>
        <p>Ce formulaire vous permet de choisir votre voiture de rêve.<br>
        Il vous suffit d'inscrire les différents critères de recherche.<br>
        Cependant si vous ne cherchez pas de voiture précise, vous pouvez cliquer sur <b>"Envoi"</b> sans aucun critère.</p>
</div>
</body>
</html>

