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

<div style="padding-top: 10%;">
  <?php
  session_start();
  if (!$_SESSION['mdp'])
  {
    header('Location: ../index.php');
  }
  ?>
  <!-- bouton deconnexion -->
  <p>Session Administrateur<br><a href="logout.php" class="btn btn-secondary">Déconnexion</a></p>
  <!-- Tableau affichage annonce + Date de fin -->
  <p>Annonces de type Automobiles</p>
  <table class='table table-bordered table-warning'>
    <thead class='thead-light'>
      <tr>
        <td>ID</td>
        <td>Fin de l'annonce le:</td>
        <td>Suppression</td>
      </tr>
    </thead>
  <!-- Connexion BDD -->
  <?php
  $serveur='localhost';
  $db = 'annonces';
  $user = 'root';
  $pass = '';
  $idcon = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);
  // selection table en datefin croissant
  $sql =("SELECT * FROM auto ORDER BY datefin asc");
  $res = $idcon->query($sql);
  foreach ($res as $dns)
  {
  ?>
    <tbody>
      <tr>
        <!-- affichage annonce + date -->
        <td><?= $dns['id_auto']; ?></td>
        <td><?= $dns['datefin']; ?></td>
        <!-- bouton supprimer -->
        <td><a href="SupprimerAuto.php?id_auto=<?php echo $dns['id_auto']; ?>">Suppression</a></td>
      </tr>
    </tbody>
  <?php
  }
  ?>
  </table>

  <p>Annonces de type Immobilier</p>

  <table class='table table-bordered table-warning'>
    <thead class='thead-light'>
      <tr>
        <td>ID</td>
        <td>Fin de l'annonce le:</td>
        <td>Suppression</td>
      </tr>
    </thead>
  <!-- Connexion BDD -->
  <?php
  // selection table en datefin croissant
  $sql =("SELECT * FROM immo ORDER BY datefin asc");
  $res = $idcon->query($sql);
  foreach ($res as $dns)
  {
  ?>
    <tbody>
      <tr>
        <!-- affichage annonce + date -->
        <td><?= $dns['id_immo']; ?></td>
        <td><?= $dns['datefin']; ?></td>
        <!-- bouton supprimer -->
        <td><a href="SupprimerImmo.php?id_immo=<?php echo $dns['id_immo']; ?>">Suppression</a></td>
      </tr>
    </tbody>
  <?php
  }
  ?>
  </table>

  <p>Annonces de type Divers</p>

  <table class='table table-bordered table-warning'>
    <thead class='thead-light'>
      <tr>
        <td>ID</td>
        <td>Fin de l'annonce le:</td>
        <td>Suppression</td>
      </tr>
    </thead>
  <!-- <?php
  $sql =("SELECT * FROM divers ORDER BY datefin asc");
  $res = $idcon->query($sql);
  foreach ($res as $dns)
  {
  ?>
    <tbody>
      <tr>
        <td><?= $dns['id_divers']; ?></td>
        <td><?= $dns['datefin']; ?></td>
        <td><a href="SupprimerDivers.php?id_divers=<?php echo $dns['id_divers']; ?>">Suppression</a></td>
      </tr>
    </tbody>
  <?php
  }
  ?>
  </table> -->
</div>
</body>
</html>