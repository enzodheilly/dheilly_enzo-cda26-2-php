<?php
session_start();

if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Page privée</title>
</head>

<body>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<p style='color:green'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']); // Pour le supprimer après affichage
    }
    ?>

    <h2>Bienvenue dans l'espace privé !</h2>
    <p>Votre email : <?= $_SESSION['email'] ?></p>

    <a href="logout.php">Se déconnecter</a>

</body>

</html>