<?php
// Demarrons la session avant toutes choses
session_start();
if (isset($_POST['bouton-valider'])) { // En cliquant sur le boutton, alors :
    // Vérification des informations de connexion
    if (isset($_POST['courriel']) && isset($_POST['mdp'])) { // Vérification des informations des utilisateurs
        // Affecter des variable à l'email et le mote de pass
        $courriel = $_POST['courriel'];
        $mdp = $_POST['mdp'];
        $nomutilisateur = $_POST['nomutilisateur'];
        $erreur = "";
        // Verifions si les inforations sont correctes
        //Connexion à la abase de données
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_poasse = "";
        $nom_base_donnee = "aembd";
        $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_poasse, $nom_base_donnee);
        // Requete pour selectionner les utilisateurs qui ont pour courriel et mot de passe les indetifiants qui ont été entrées
        $req = mysqli_query($con, "SELECT * FROM utilisateurs WHERE courriel='$courriel' AND motdepasse='$mdp' ");
        $num_ligne = mysqli_num_rows($req); // Compter de ligne ayant rapport à la equette SQL
        if ($num_ligne > 0) {
            header("Location: bienvenu.php"); // Si le nombre est superieur à 0 on sera redirigé vers la page bienvenu
            // Créons une variable de type sesson qui va contenir le courriel de l'utilisateur
            $_SESSION['courriel'] = $courriel;
        } else { // Si non
            $erreur = "Courriel ou Mot de passe invalides !";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleConnexion.css" type="text/css">
    <link rel="stylesheet" href="styles/styleGeneral.css" type="text/css">
    <title>Connexion</title>
</head>

<body>
    <section>
        <a class="logonomapp" href="/">
            <img src="img/AEM_Logo_noir_sanstexte.png" width="200" height="200" alt="">
        </a>
        <h1> Connexion </h1>
        <h1> GESFIC - AEM </h1>
        <P> Système de Gestion Finacière et de Comptabilité de l'AEM</P>
        <?php
        if (isset($erreur)) { // Si la variable erreur existe, on affiche le contenu;
            echo "<p class= 'Erreur'>" . $erreur . " </p>";
        }
        ?>
        <form action="" method="POST">
            <label> Courriel:</label>
            <input type="text" name="courriel">
            <!-- <label> Nom utilisateur:</label> -->
            <input type="hidden" name="nomutilisateur">
            <label> Mot de passe:</label>
            <input type="password" name="mdp">
            <input type="submit" value="Se connecter" name="bouton-valider">

        </form>
    </section>
</body>

<div class="footer">
    <p>© 2023 Assemblée Evagélique de Montréal - AEM</p>
</div>

</html>