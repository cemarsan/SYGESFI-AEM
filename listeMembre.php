<?php
// On demarre la session sur cette page
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste membre</title>
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

<body>
    <?php
    //Connexion à la abase de données
    $nom_serveur = "localhost";
    $utilisateur = "root";
    $mot_de_poasse = "";
    $nom_base_donnee = "aembd";
    $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_poasse, $nom_base_donnee);

    //La requête
    $req = "SELECT * FROM membre ";

    //exécution de la requête
    $resultat = mysqli_query($con, $req);

    //Création du tableau et affichage des infos
    $tab = mysqli_fetch_all($resultat);
    $chaine = "<table border ='0px'> 
                <caption> Liste des membres </caption>
            <tr><td>No. Membre</td><td>Nom</td><td>Prénom</td><td>Téléphone</td><td>Courriel</td><td>Adresse</td></tr>";
    foreach ($tab as $ligne) {
        $chaine .= "<tr><td>$ligne[0]</td><td>$ligne[1]</td>
            <td>$ligne[2]</td><td>$ligne[3]</td><td>$ligne[4]</td><td>$ligne[5]." . $ligne[6] . " " . $ligne[7] . " " . $ligne[8] . "</td></tr>";
    }
    $chaine .= "</table>";
    echo $chaine;
    ?>
</body>
<div class="footer">
    <p>© 2023 Assemblée Evagélique de Montréal - AEM</p>
</div>

</html>