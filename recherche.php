<?php
// On demarre la session sur cette page
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche membre</title>
    <link rel="stylesheet" href="styles/styleGeneral.css">
    <link rel="stylesheet" href="styles/styleListeMembre.css">
</head>

<?php
require_once('menu.php');
?>

<?php
// Ensuite on affiche le contenu de la variable session
echo "<p class='message'> Vous êtes connecté entant que " . $_SESSION['courriel'] . "</p>";
//echo " <p> Bienvenu dans GESFIC-AEM, l'application de Gestion financière et de comptabilité de l'AEM </p>";
?>

<form method="POST" action="">
    Rechercher un membre par nom ou prénom : <input type="text" name="recherche">
    <input type="submit" value="Rechercher">
    <input type="reset" value="Reinitialiser">
</form>

<body>

    <?php
    if (isset($_POST['recherche'])) { // En cliquant sur le boutton, alors :
        // Vérification des informations de connexion
        if ($recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '') { // Vérification des informations des utilisateurs

            //Connexion à la abase de données
            $nom_serveur = "localhost";
            $utilisateur = "root";
            $mot_de_poasse = "";
            $nom_base_donnee = "aembd";
            $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_poasse, $nom_base_donnee);

            // la requete mysql
            $resultat = $con->query("SELECT * FROM membre WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%' LIMIT 100");
            $num_ligne = mysqli_num_rows($resultat); // Compter de ligne ayant rapport à la equette SQL

            if ($num_ligne  !=  0) {

                // affichage du résultat
                while ($r = mysqli_fetch_array($resultat)) {

                    //Création du tableau et affichage des infos
                    $tab = mysqli_fetch_all($resultat);
                    $chaine = "<table border ='0px'> 
                    <caption> Liste des membres </caption>
                    <tr><td>No. Membre</td><td>Nom</td><td>Prénom</td><td>Téléphone</td><td>Courriel</td><td>Adresse</td></tr>";
                    foreach ($tab as $r) {
                        $chaine .= "<tr><td>$r[0]</td><td>$r[1]</td>
                        <td>$r[2]</td><td>$r[3]</td><td>$r[4]</td><td>$r[5]." . $r[6] . " " . $r[7] . " " . $r[8] . "</td></tr>";
                    }
                    $chaine .= "</table>";
                    echo $chaine;
                    //echo 'Résultat de la recherche: ' . $r['nom'] . ', ' . $r['prenom'] . ' <br />';

                }
            } else { // Si non
                echo ' Aucunes données ne correspondent à votre recherche !';
            }
        }
    }
    ?>
</body>
<div class="footer">
    <p>© 2023 Assemblée Evagélique de Montréal - AEM</p>
</div>

</html>