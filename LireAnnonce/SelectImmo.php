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
                <li><a href="../LireAnnonce/lectureimmo.php">immomobile</a></li>
                <li><a href="../LireAnnonce/lectureImmo.php">Immobilié</a></li>
                <li><a href="../LireAnnonce/lectureDivers.php">Divers</a></li>
            </ul>
            </li>
            <li><a href="">Passer une annonces</a>
                <ul>
                    <li><a href="../PasserAnnonce/Formimmo.php">immomobile</a></li>
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
// Selection toute la table immo
$immo = $idcon->query('SELECT * FROM immo ORDER BY prix ASC');

// Recherche categorie
if(isset($_GET['categorie']) AND !empty($_GET['categorie']))
{
   $categorie = htmlspecialchars($_GET['categorie']);
// Selection à partir de la recherche de la categorie
   $immo = $idcon->query('SELECT * FROM immo WHERE categorie LIKE "%'.$categorie.'%" ORDER BY prix ASC');

   if($immo->rowCount() == 0)
   {
    $immo = $idcon->query('SELECT * FROM immo WHERE CONCAT(categorie) LIKE "%'.$categorie.'%" ORDER BY prix ASC');
   }
}
// recherche surface
if(isset($_GET['surface']) AND !empty($_GET['surface']))
{
   $surface = htmlspecialchars($_GET['surface']);
// Selection à partir de la recherche de la surface
   $immo = $idcon->query('SELECT * FROM immo WHERE surface LIKE "%'.$surface.'%" ORDER BY prix ASC');

   if($immo->rowCount() == 0)
   {
    $immo = $idcon->query('SELECT * FROM immo WHERE CONCAT(surface) LIKE "%'.$surface.'%" ORDER BY prix ASC');
   }
}
// reherche nbpiece
if(isset($_GET['nbpiece']) AND !empty($_GET['nbpiece']))
{
   $nbpiece = htmlspecialchars($_GET['nbpiece']);
// Selection à partir de la recherche de la nbpiece
   $immo = $idcon->query('SELECT * FROM immo WHERE nbpiece LIKE "%'.$nbpiece.'%" ORDER BY prix ASC');

   if($immo->rowCount() == 0)
   {
    $immo = $idcon->query('SELECT * FROM immo WHERE CONCAT(nbpiece) LIKE "%'.$nbpiece.'%" ORDER BY prix ASC');
   }
}
// recherche vente
if(isset($_GET['vente']) AND !empty($_GET['vente']))
{
   $vente = htmlspecialchars($_GET['vente']);
// Selection à partir de la recherche de la vente à vitesse
   $immo = $idcon->query('SELECT * FROM immo WHERE vente LIKE "%'.$vente.'%" ORDER BY prix ASC');

   if($immo->rowCount() == 0)
   {
    $immo = $idcon->query('SELECT * FROM immo WHERE CONCAT(vente) LIKE "%'.$vente.'%" ORDER BY prix ASC');
   }
}
// recherche kilométrage max
if(isset($_GET['meuble']) AND !empty($_GET['meuble']))
{
   $meuble = htmlspecialchars($_GET['meuble']);
// Selection à partir de la recherche du kilométrage
   $immo = $idcon->query('SELECT * FROM immo WHERE meuble = '.$meuble.' ORDER BY prix ASC');

   if($immo->rowCount() == 0)
   {
    $immo = $idcon->query('SELECT * FROM immo WHERE CONCAT(meuble) = '.$meuble.' ORDER BY prix ASC');
   }
}
// recherche prix max
if(isset($_GET['prix']) AND !empty($_GET['prix']))
{
   $prix = htmlspecialchars($_GET['prix']);
// Selection à partir de la recherche du prix
   $immo = $idcon->query('SELECT * FROM immo WHERE prix <= '.$prix.' ORDER BY prix ASC');

   if($immo->rowCount() == 0)
   {
    $immo = $idcon->query('SELECT * FROM immo WHERE CONCAT(prix) <= '.$prix.' ORDER BY prix ASC');
   }
}?><table class='table table-bordered table-success'>
    <thead class='thead-dark'>
        <tr>
        <td>categorie</td>
        <td>surface</td>
        <td>nbpiece</td>
        <td>vente à vitesse</td>
        <td>kilométrage</td>
        <td>Prix max</td>
        </tr>
    </thead>
    <tbody>
        <th><?= $categorie ?></th>
        <th><?= $surface ?> m²</th>
        <th><?= $nbpiece ?></th>
        <th><?= $vente ?></th>
        <th><?= $meuble ?></th>
        <th><?= $prix ?></th>
    </tbody>
</table><?php
if($immo->rowCount() > 0)
{
while($a = $immo->fetch())
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
<!-- Taleau categorie - Modèle - Année - Kilométrage -->
                            <table class='table table-bordered table-dark'>
                                <thead class='thead-light'>
                                    <td width="25%">
                                        <b><?=$a['categorie']?><br>
                                        <?=$a['surface']?> m²</b><br>
                                        <?php
                                        if ($a['meuble'] == "Oui")
                                        {
                                          echo "Logement meublé";
                                        }else
                                        {
                                          echo "Logement non meublé";
                                        }?><br>
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
                            echo "<img src='".$a['images']."' class='card-img-top' style=max-width:100%;height:immo;>"
                            ?>
<!-- Tableau Énergie - Couleur - Boîte -->
                            <table class='table table-bordered table-dark'>
                                <thead class='thead-dark'>
                                    <th scope='col'>
                                      <?php
                                      if ($a['nbpiece'] <= 1)
                                      {
                                        echo "Nombre de pièce";
                                      }
                                      else
                                      {

                                        echo "Nombre de pièces";
                                      }
                                      ?>
                                      </th>
                                    <th scope='col'>Vente</th>
                                    <th scope='col'>classe énergie</th>
                                    <th scope='col'>classe ges</th>
                                </thead>
                                <tbody>
                                    <td><?=$a['nbpiece']?></td>
                                    <td><?= $a['vente']?></td>
                                    <td><?= $a['energie']?></td>
                                    <td><?= $a['ges']?></td>
                                </tbody>
                            </table>
<!-- Tableau Descriptif -->
                            <table class='table table-bordered table-dark'>
                                <thead class='thead-light'>
                                    <td width="20%" height="10%">Descriptif du véhicule</td>
                                    <td><?= $a['descriptif']?></td>
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
    if ($nbpiece == "ess")
    {
        echo $categorie, " ",$surface, " ", $nbpiece, "ence ",$vente, " ",$meuble, "  ",$meuble, " ...";
    }
    elseif ($nbpiece == "die")
    {
        echo $categorie, " ",$surface, " ", $nbpiece, "sel ",$vente, " ",$meuble, "  ",$meuble, " ...";
    }
    elseif ($nbpiece == "gpl")
    {
        echo $categorie, " ",$surface, " ", $nbpiece, "gpl ",$vente, " ",$meuble, "  ",$meuble, " ...";
    }
}
?>
</body>
</html>