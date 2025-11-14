<?php
session_start();

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cash;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    // On prépare la requête
    $req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$_POST['email']]);

    // ON DEFINIT $user ICI
    $user = $req->fetch(PDO::FETCH_ASSOC);

    // On vérifie
    if ($user && $_POST['password'] === $user['password']) {

        $_SESSION['connected'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        $_SESSION['message'] = "Vous êtes connecté !";

        header('Location: private.php');
        exit;
    } else {
        echo "<p>Email ou mot de passe incorrect.</p>";
        echo '<a href="index.php">Retour</a>';
    }
}
