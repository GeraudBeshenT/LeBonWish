<!DOCTYPE html>
<html>
<head>
    <title>Formulaire Auto</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
// Inclusion variable name/connexion à BDD
    $serveur='localhost';
        $db = 'annonces';
        $user = 'root';
        $pass = '';
        $idcon = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);
// Vérification formulaire complète
        if($_POST['categorie'] != "" &&
        $_POST['surface'] != "" &&
        $_POST['nbpiece'] != "" &&
        $_POST['vente'] != "" &&
        $_POST['meuble'] != "" &&
        $_POST['energie'] != "" &&
        $_POST['ges'] != "" &&
        $_POST['prix'] != "" &&
        $_POST['descriptif'] != "" &&
        $_POST['telephone'] != "" &&
        $_FILES['images']['error']==0 &&
        $_POST['datefin'] != "")
        {
// Insertion dans la BDD
            $categorie = $_POST['categorie'];
            $surface = $_POST['surface'];
            $nbpiece = $_POST['nbpiece'];
            $vente = $_POST['vente'];
            $meuble = $_POST['meuble'];
            $energie = $_POST['energie'];
            $ges = $_POST['ges'];
            $prix = $_POST['prix'];
            $descriptif = $_POST['descriptif'];
            $telephone = $_POST['telephone'];
            // Renommage de l'image un nombre compris entre 0 et 1000.png
            $_FILES['images']['name'] = rand(0,1000).'.png';
            // Déplacement de l'image dans le dosser photo
            move_uploaded_file($_FILES['images']['tmp_name'], '../LireAnnonce/photo-immo/'.basename($_FILES['images']['name']));
            $datefin = $_POST['datefin'];
// Requète d'insertion
            $requete ="INSERT INTO immo (categorie, surface, nbpiece, vente, meuble, energie, ges, prix, descriptif, telephone, images, datefin) VALUES('$categorie','$surface','$nbpiece','$vente','$meuble','$energie','$ges','$prix', '$descriptif', '$telephone', 'photo-immo/".$_FILES['images']['name']."', '$datefin')";
            $result = $idcon->query($requete);
                    
            if($result)
            {
                $sql ="SELECT id_immo AS id FROM immo WHERE id_immo=LAST_INSERT_ID()";
                $id = $idcon->query($sql);
                foreach ($id as $dns)
                {
                    session_start();
                    $id = $dns["id"];
                    echo"<script type='text/javascript'>
                        alert('Votre attention ".$genre." ".$name." ! Votre annonce Immo-".$id." a été enregistrée merci pour la confiance que vous nous accordez. Veillez a bien garder ce code pour la suppression si votre véhicule a été vendu avant ".$datefin."');". "window.location.replace('../LireAnnonce/lectureImmo.php');
                        </script>;";
                }
            }
            else // Cookie Problème d'insertion
            {
                echo"<script type='text/javascript'>
                alert ('Problème d'insertion')
                window.history.back();
                </script>";
            }
                echo"<script type='text/javascript'>
                window.history.back();
                </script>";
        }
        else // Cookie Insertion Incomplète
        {
            echo"<script type='text/javascript'>
            alert('Veuillez remplir tous les champs pour que votre annonce soit prise en compte');
            window.history.back();
            </script>";
        }
?>
</body>
</html>