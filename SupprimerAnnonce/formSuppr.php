<!DOCTYPE html>
<html>
<head>
    <title>Supprimer une annonce:</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../bootstrap-4.5.2-dist/css/bootstrap.css">
</head>
<header>
    <nav>
        <ul>
            <li class="déroulants"><a href="../Admin/ConnexionAdmin.php">🔒</a></li>
            <li class="déroulant"><a href="../index.php">Accueil</a></li>
            <li><a href=""> Lire les annonces</a>
                <ul>
                    <li><a href="../LireAnnonce/lectureAuto.php">Automobile</a></li>
                    <li><a href="../LireAnnonce/lectureImmo.php">Immobilié</a></li>
                    <li><a href="../LireAnnonce/lectureDivers.php">Divers</a></li>
                </ul>
            </li>
            <li><a href="">Passer une annonces</a>
                <ul>
                    <li><a href="../PasserAnnonce/FormAuto.php">Automobile</a></li>
                    <li><a href="../PasserAnnonce/FormImmo.php">Immobilié</a></li>
                    <li><a href="../PasserAnnonce/FormDivers.php">Divers</a></li>
                </ul>
            </li>
            <li class="déroulant"><a href="formSuppr.php">Supprimer une annonce</a></li>
        </ul>
    </nav>
</header>
    <div style="padding-top: 12.72%;">
    <form action="supprimer.php" method="GET">
    <div class="container"><br>
    <p>Formulaire de suppression:<br>
    Choisissez la catégorie de votre annonce,<br>
    Puis indiquez le numéro de votre annonce.</p>
        <table class='table'>
            <thead>
                <tr>
                <td>
                    <h4>Annonce de type:</h4>
                </td>
                <td>
                    <h4>Identifiant de votre annonce:</h4>
                </td>
            </thead>
                <tbody>
                <th>
                    <input type="radio" id="Auto" name="table" value="Auto" checked=""> Automobile <br>
                    <input type="radio" id="Immo" name="table" value="Immo"> Immobilié <br>
                    <input type="radio" id="Divers" name="table" value="Divers"> Divers <br>
                </th>
                <th>
                    <input type="search" name="id">
                    <input type="submit" name="supprimer">
                </th>
                </tr>
                </tbody>
        </table>
    </div>
    </form>
    </div>
</body>
</html>