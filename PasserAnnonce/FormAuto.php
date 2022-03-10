<!DOCTYPE html>
<html>
<head>
    <title>Formualire Automobile</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="../bootstrap-4.5.2-dist/css/bootstrap.css">
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
<!-- Écrire une annonce -->
            <li><a href="">Passer une annonces</a>
                <ul>
                    <li>
                        <a href="FormAuto.php">Automobile</a>
                    </li>
                    <li>
                        <a href="FormImmo.php">Immobilié</a>
                    </li>
                    <li>
                        <a href="FormDivers.php">Divers</a>
                    </li>
                </ul>
            </li>
<!-- Supprimer une annonce -->
            <li class="déroulant">
                <a href="../SupprimerAnnonce/formSuppr.php">Supprimer une annonce</a>
            </li>
        </ul>
    </nav>
</header>
<!-- Formulaire insertion annonce -->
<div class="form">
    <div class="container"><br>
        <p class="a">Vous souhaitez vendre votre véhicule ?<br>
        Ce formulaire vous permet d'enregistrer votre voiture, ses caractéristiques, et autre.</p>
            <div class="row">
                <div class="col">
                    <form method="POST" action="stockAuto.php" enctype="multipart/form-data">
<!-- Tableau Marque - Modèle - Énergie - Boîte -->
                        <table class='table table-striped table-striped table-link'>
                            <thead class='thead-dark'>
                                <tr>
                                <th>Marque de votre voiture</th>
                                <th>Modèle de votre voiture</th>
                                <th>Énergie utilisée</th>
                                <th>Boîte à vitesse</th>
                            </thead>
<!-- Input -->
                            <tbody>
                                <td><br>
                                    <input type="text" class="form-control" id="marque" name="marque" required="" placeholder="ex: Renault, Peugeot, Masérati"></td>
                                <td>
                                    <br><input type="text" class="form-control" id="modele" name="modele" required="" placeholder="ex: Mégane, 207, 911">
                                </td>
                                <td>
                                    <input type="radio" id="ess" name="energie" value="ess"> Essence<br>
                                    <input type="radio" id="die" name="energie" value="die"> Diesel<br>
                                    <input type="radio" id="gpl" name="energie" value="gpl"> GPL<br>
                                </td>
                                <td>
                                    <input type="radio" id="manuelle" name="boite" value="manuelle"> Manuelle <br>
                                    <input type="radio" id="automatique" name="boite" value="automatique"> Automatique
                                </td>
                                </tr>
                            </tbody>
                        </table>
<!-- Tableau Couleur - Kilométrage - Année - Prix -->
                        <table class='table table-striped table-link'>
                            <thead class='thead-dark'>
                                <tr>
                                <th>Couleur</th>
                                <th>Kilométrage</th>
                                <th>Année de mise en service</th>
                                <th>Prix de vente</th>
                            </thead>
<!-- Input -->
                            <tbody>
                            <td>
                                <br><input type="text" class="form-control" id="couleur" name="couleur" required="" placeholder="ex: Gris mat, Rose, fuschia"><br>
                            </td>
                            <td>
                                <br><input type="text" class="form-control" id="km" name="km" pattern="[0-9]{5/6}" required="" placeholder="ex: 120000, 98500"><br>
                            </td>
                            <td>
                                <br><input type="text" class="form-control" id="annee" name="annee" pattern="[0-9]{4}" required="" placeholder="ex: 2008, 1990"><br>
                            </td>
                            <td>
                                <br><input type="text" class="form-control" id="prix" name="prix" pattern="[0-9]{4/6}" required="" placeholder="ex: 4500, 750"><br>
                            </td>
                            </tr>
                            </tbody>
                        </table>
<!-- Tableau Infomation -->
                        <table class='table table-striped table-link'>
                            <thead class='thead-dark'>
                                <tr>
                                <th>Informations supplémentaires</th>
                            </thead>
<!-- Input -->
                            <tbody>
                                <td>
                                    <br><textarea class="form-control" id="texte" name="texte" required=""></textarea><br>
                                </td>
                                </tr>
                            </tbody>
                        </table>
<!-- Tableau Téléphone - Photo - Date de fin -->
                        <table class='table table-striped table-link'>
                            <thead class='thead-dark'>
                                <tr>
                                <th>Numéro de téléphone:</th>
                                <th>Photographie de votre bien: </th>
                                <th>Fin de l'annonce le: </th>
                            </thead>
<!-- Input -->
                            <tbody>
                                <td>
                                    <br><input type="text" class="form-control" id="telephone" name="telephone" pattern="[0-9]{10}" required="" placeholder="ex: 0471680529, 0755259563"><ruby></ruby>
                                </td>
                                <td>
                                    <br><input type="file" class="form-control-file" id="images" name="images" required=""><br>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                                </td>
                                <td>
                                    <br><input type="text" class="form-control" id="datefin" name="datefin" required="" pattern="[0-9 -]{10}" placeholder="AAAA-MM-DD"><br>
                                </td>
                                </tr>
                            </tbody>
                        </table>
<!-- Boutton Validation/Insertion -->
                            <div class="col">
                                <input class="btn btn-warning" type="submit" name="button" value="Envoi">
                            </div><br>
                    </form>
                </div>
            </div>
    </div>
</div>
</body>
</html>