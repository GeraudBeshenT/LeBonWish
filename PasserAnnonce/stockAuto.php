<!DOCTYPE html>
<html>
<head>
    <title>Formulaire Auto</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
// Inclusion variable name/connexion à BDD
    include '../name.php';
    $serveur='localhost';
        $db = 'annonces';
        $user = 'root';
        $pass = '';
        $idcon = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);
// Vérification formulaire complète
        if($_POST['marque'] != "" &&
        $_POST['modele'] != "" &&
        $_POST['energie'] != "" &&
        $_POST['couleur'] != "" &&
        $_POST['boite'] != "" &&
        $_POST['km'] != "" &&
        $_POST['annee'] != "" &&
        $_POST['prix'] != "" &&
        $_POST['texte'] != "" &&
        $_POST['telephone'] != "" &&
        $_FILES['images']['error']==0 &&
        $_POST['datefin'] != "")
        {
// Insertion dans la BDD
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $energie = $_POST['energie'];
            $couleur = $_POST['couleur'];
            $boite = $_POST['boite'];
            $km = $_POST['km'];
            $annee = $_POST['annee'];
            $prix = $_POST['prix'];
            $texte = $_POST['texte'];
            $telephone = $_POST['telephone'];
            // Renommage de l'image un nombre compris entre 0 et 1000.png
            $_FILES['images']['name'] = rand(0,1000).'.png';
            // Déplacement de l'image dans le dosser photo
            move_uploaded_file($_FILES['images']['tmp_name'], '../LireAnnonce/photo-auto/'.basename($_FILES['images']['name']));
            $datefin = $_POST['datefin'];
// Requète d'insertion
            $requete ="INSERT INTO auto (marque, modele, energie, couleur, boite, km, annee, prix, texte, telephone, images, datefin) VALUES('$marque','$modele','$energie','$couleur','$boite','$km','$annee','$prix', '$texte', '$telephone', 'photo-auto/".$_FILES['images']['name']."', '$datefin')";
            $result = $idcon->query($requete);
                    
            if($result)
            {
                $sql ="SELECT id_auto AS id FROM auto WHERE id_auto=LAST_INSERT_ID()";
                $id = $idcon->query($sql);
                foreach ($id as $dns)
                {
                    session_start();
                    $id = $dns["id"];
                    echo"<script type='text/javascript'>
                        alert('Votre attention ".$genre." ".$name." ! Votre annonce Auto-".$id." a été enregistrée merci pour la confiance que vous nous accordez. Veillez a bien garder ce code pour la suppression si votre véhicule a été vendu avant ".$datefin."');". "window.location.replace('../LireAnnonce/lectureAuto.php');
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