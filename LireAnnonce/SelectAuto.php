<!DOCTYPE html>
<html lang="fr">
<head>
    <title>lireannonce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<header>
    <nav>
        <ul>
            <li class="déroulants"><a href="../Admin/ConnexionAdmin.php">🔒</a></li>
            <li class="déroulant"><a href="../index.php">Accueil</a></li>
            <li>
                <a href=""> Lire les annonces</a>
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
            <li class="déroulant"><a href="../SupprimerAnnonce/formSuppr.php">Supprimer une annonce</a></li>
        </ul>
    </nav>
</header>
<body><br><br><br>
<!-- Connexion BDD -->
<?php
$serveur='localhost';
$db = 'annonces';
$user = 'root';
$pass = '';
$dns="mysql:host=$serveur;dbname=$db";
$idcon = new PDO($dns, $user, $pass);
    ini_set('display_errors', 'off');
// Selection toute la table auto
$auto = $idcon->query('SELECT * FROM auto ORDER BY prix ASC');

// Recherche marque
if(isset($_GET['marque']) AND !empty($_GET['marque']))
{
   $marque = htmlspecialchars($_GET['marque']);
// Selection à partir de la recherche de la marque
   $auto = $idcon->query('SELECT * FROM auto WHERE marque LIKE "%'.$marque.'%" ORDER BY prix ASC');

   if($auto->rowCount() == 0)
   {
    $auto = $idcon->query('SELECT * FROM auto WHERE CONCAT(marque) LIKE "%'.$marque.'%" ORDER BY prix ASC');
   }
}
// recherche modele
if(isset($_GET['modele']) AND !empty($_GET['modele']))
{
   $modele = htmlspecialchars($_GET['modele']);
// Selection à partir de la recherche de la modele
   $auto = $idcon->query('SELECT * FROM auto WHERE modele LIKE "%'.$modele.'%" ORDER BY prix ASC');

   if($auto->rowCount() == 0)
   {
    $auto = $idcon->query('SELECT * FROM auto WHERE CONCAT(modele) LIKE "%'.$modele.'%" ORDER BY prix ASC');
   }
}
// reherche energie
if(isset($_GET['energie']) AND !empty($_GET['energie']))
{
   $energie = htmlspecialchars($_GET['energie']);
// Selection à partir de la recherche de la energie
   $auto = $idcon->query('SELECT * FROM auto WHERE energie LIKE "%'.$energie.'%" ORDER BY prix ASC');

   if($auto->rowCount() == 0)
   {
    $auto = $idcon->query('SELECT * FROM auto WHERE CONCAT(energie) LIKE "%'.$energie.'%" ORDER BY prix ASC');
   }
}
// recherche boite
if(isset($_GET['boite']) AND !empty($_GET['boite']))
{
   $boite = htmlspecialchars($_GET['boite']);
// Selection à partir de la recherche de la boite à vitesse
   $auto = $idcon->query('SELECT * FROM auto WHERE boite LIKE "%'.$boite.'%" ORDER BY prix ASC');

   if($auto->rowCount() == 0)
   {
    $auto = $idcon->query('SELECT * FROM auto WHERE CONCAT(boite) LIKE "%'.$boite.'%" ORDER BY prix ASC');
   }
}
// recherche kilométrage max
if(isset($_GET['km']) AND !empty($_GET['km']))
{
   $km = htmlspecialchars($_GET['km']);
// Selection à partir de la recherche du kilométrage
   $auto = $idcon->query('SELECT * FROM auto WHERE km <= '.$km.' ORDER BY prix ASC');

   if($auto->rowCount() == 0)
   {
    $auto = $idcon->query('SELECT * FROM auto WHERE CONCAT(km) <= '.$km.' ORDER BY prix ASC');
   }
}
// recherche année minimum
if(isset($_GET['annee']) AND !empty($_GET['annee']))
{
   $annee = htmlspecialchars($_GET['annee']);
// Selection à partir de la recherche de l'année
   $auto = $idcon->query('SELECT * FROM auto WHERE annee >= '.$annee.' ORDER BY prix ASC');

   if($auto->rowCount() == 0)
   {
    $auto = $idcon->query('SELECT * FROM auto WHERE CONCAT(annee) >= '.$annee.' ORDER BY prix ASC');
   }
}
// recherche prix max
if(isset($_GET['prix']) AND !empty($_GET['prix']))
{
   $prix = htmlspecialchars($_GET['prix']);
// Selection à partir de la recherche du prix
   $auto = $idcon->query('SELECT * FROM auto WHERE prix <= '.$prix.' ORDER BY prix ASC');

   if($auto->rowCount() == 0)
   {
    $auto = $idcon->query('SELECT * FROM auto WHERE CONCAT(prix) <= '.$prix.' ORDER BY prix ASC');
   }
}?><table class='table table-bordered table-success'>
    <thead class='thead-dark'>
        <tr>
        <td>marque</td>
        <td>modele</td>
        <td>Energie</td>
        <td>Boite à vitesse</td>
        <td>kilométrage</td>
        <td>Année</td>
        <td>Prix max</td>
        </tr>
    </thead>
    <tbody>
        <th><?= $marque ?></th>
        <th><?= $modele ?></th>
        <th><?= $energie ?></th>
        <th><?= $boite ?></th>
        <th><?= $km ?></th>
        <th><?= $annee ?></th>
        <th><?= $prix ?></th>
    </tbody>
</table><?php
if($auto->rowCount() > 0)
{
while($a = $auto->fetch())
{
?>
<!-- Tableau récapitulatif des critères de recherche -->

<!-- Affichage des recherches en bootstrap card -->
<div style="padding-top: 12.72%;">
    <div class='container'>
        <div class='row'>
            <div class='col mt-4'>
                <div class='card-deck'>
                    <div class='card'>
                        <div class="card bg-warning border-dark">                        
                        <div class="card-img-overlay">
<!-- Taleau Marque - Modèle - Année - Kilométrage -->
                            <table class='table table-bordered table-dark'>
                                <thead class='thead-light'>
                                    <td width="25%">
                                        <b><?=$a['marque']?>
                                        <?=$a['modele']?></b><br>Mise en service en : 
                                        <?=$a['annee']?><br>
                                        <?=$a['km']?>km<br>
                                        <a class='btn btn-info'>
                                            <u>Au prix de: <?=$a['prix']?>€</u>
                                        </a>
                                    </td>
                                </thead>
                            </table>
                        </div>
<!-- Affichage Image -->
                        <div class='card-body' style="margin-top: -5%;">
                            <?php
                            echo "<img src='".$a['images']."' class='card-img-top' style=max-width:100%;height:auto;>"
                            ?>
<!-- Tableau Énergie - Couleur - Boîte -->
                            <table class='table table-bordered table-dark'>
                                <thead class='thead-dark'>
                                    <th scope='col'>Énergie</th>
                                    <th scope='col'>Couleur</th>
                                    <th scope='col'>Boîte</th>
                                </thead>
                                <tbody>
                                    <td><?php
                                        if ($a['energie'] == "ess")
                                        {
                                            echo "Essence";
                                        }
                                        elseif ($a['energie'] == "die")
                                        {
                                            echo "Diesel";
                                        }
                                        elseif ($a['energie'] == "gpl")
                                        {
                                            echo "GPL";
                                        }
                                        ?></td>
                                    <td><?= $a['couleur']?></td>
                                    <td><?= $a['boite']?></td>
                                </tbody>
                            </table>
<!-- Tableau Descriptif -->
                            <table class='table table-bordered table-dark'>
                                <thead class='thead-light'>
                                    <td width="20%" height="10%">Descriptif du véhicule</td>
                                    <td><?= $a['texte']?></td>
                                </thead>
                            </table>
<!-- Boutton Affichage Téléphone -->
                                <a class='btn btn-info'>
                                    Téléphone: 0<?= $a['telephone']?>
                                </a>
                        </div>
<!-- Affichage date de suppression d'annonce -->
                        <div class='card-footer'>
                            <small>L'annonce se terminera le:
                                <?= $a['datefin']?>
                            </small>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
}
else // Affichage annonce inconnu
{
    echo"Aucun résultat ne correspond à vos critères: <br>";
    if ($energie == "ess")
    {
        echo $marque, " ",$modele, " ", $energie, "ence ",$boite, " ",$km, " ",$annee, " ",$km, " ...";
    }
    elseif ($energie == "die")
    {
        echo $marque, " ",$modele, " ", $energie, "sel ",$boite, " ",$km, " ",$annee, " ",$km, " ...";
    }
    elseif ($energie == "gpl")
    {
        echo $marque, " ",$modele, " ", $energie, "gpl ",$boite, " ",$km, " ",$annee, " ",$km, " ...";
    }
}
?>
</body>
</html>