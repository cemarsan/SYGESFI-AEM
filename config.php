<?php
// Vérification des informations de connexion
if (isset($_POST['courriel']) && isset($_POST['mdp'])) { // Vérification des informations des utilisateurs
    // Affecter des variable à l'email et le mote de pass
    $courriel = $_POST['courriel'];
    $mdp = $_POST['mdp'];
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
        header("Location: bienvenu.php"); // Si le nombre eest superieur à 1 on sera redirigé vers la age bienvenu
    } else { // Si non
        echo "Courriel ou Mot de passe invalides !";
    }
}
