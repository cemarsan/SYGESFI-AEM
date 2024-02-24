<?php
// Demarrons la session avant toutes choses
session_start();

/*
if (isset($_POST['Inscrire'])) { // En cliquant sur le boutton Inscrire, alors :
    // Vérification des informations de connexion
    if (isset($_POST['nom']) && isset($_POST['prenom'])) { // Vérification des informations des membres
        // Affectation des variables
        $id_membre = $_POST['idmembre'];
        $nom_membre = $_POST['nom'];
        $prenom_membre = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $courriel = $_POST['email'];
        $rue = $_POST['rue'];
        $ville = $_POST['ville'];
        $province = $_POST['province'];
        $code_postale = $_POST['codepostal'];
        
    }
} */

//Connexion à la abase de données
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_poasse = "";
$nom_base_donnee = "aembd";
$con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_poasse, $nom_base_donnee);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Info Membre</title>
    <link rel="stylesheet" href="styles/styleGeneral.css">
    <link rel="stylesheet" href="styles/styleInscription">
</head>

<script src="js/gestionMembre.js"></script>

<?php
require_once('menu.php');
?>

<?php
// Ensuite on affiche le contenu de la variable session
echo "<p class='message'> Vous êtes connecté entant que " . $_SESSION['courriel'] . "</p>";
// $resultat = $con->query("SELECT * FROM membre WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%' LIMIT 100");
?>

<body>

    <form action="" method="post">
        Sélectionner un membre à modifier :
        <select name="rechmodif">
            <?php
            $resultat = $con->query("SELECT * FROM membre ORDER BY nom ASC");
            while ($ligne = mysqli_fetch_array($resultat)) {
                echo "<option value=" . $ligne['idmembre'] . ">" . $ligne['nom'] . " " . $ligne['prenom'] . "</option>";
            }
            ?>
        </select>
        <input type=submit name="Envoyer" value="Envoyer">
    </form>

    <?php
    if (isset($_POST['Envoyer'])) {

        $rm = $_REQUEST['rechmodif'];
        echo "Vous avec sélectionné le membre don le numéro est: " . $rm;
    }
    ?>





    <!-- 
    <form action="modifierMembres.php" name="formModification" method="post">
        <fieldset>
            <legend>Coordonnées :</legend>

            <input type="hidden" name=" idmembre" size="20" maxlength="6" value="No membre" id="nom" />

            <label for="nom">Nom* :</label>
            <input type="text" name=" nom" size="20" maxlength="40" value="nom" id="nom" />

            <label for="prnom">Prénom* :</label>
            <input type="text" name=" prenom" size="20" maxlength="40" value="prenom" id="prenom" />

            <label for="telephone">Téléphone :</label>
            <input type="text" name=" telephone" size="14" maxlength="14" value="telephone" id="telephone" />

            <label for="email">Courriel :</label>
            <input type="email" name="email" size="20" maxlength="40" value="email" id="email" />

            <div class="form-group">
                <label for="adresse">Adresse membre :</label>
                <input type="rue" name="rue" class="form-control" id="autocomplete" placeholder="rue">
                <input type="ville" name="ville" class="form-control" id="inputCity" placeholder="ville">
                <input type="province" name="province" class="form-control" id="inputState" placeholder="province">
                <input type="code_postal" name="codepostal" class="form-control" id="inputZip" placeholder="code postal">
            </div>
            </textarea>
        </fieldset>

        <p>
            <input type="submit" name="Enregistrer" value="Enregistrer" />
            <input type="reset" name="Annuler" value="Annuler" />
        </p>

    </form>
-->

</body>

<div class="footer">
    <p>© 2023 Assemblée Evagélique de Montréal - AEM</p>
</div>

</html>