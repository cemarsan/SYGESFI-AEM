<?php
// On demarre la session sur cette page
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="styles/styleGeneral.css">
    <link rel="stylesheet" href="styles/styleBienvenue.css">
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

</body>
<div class="footer">
    <p>© 2023 Assemblée Evagélique de Montréal - AEM</p>
</div>

</html>