<?php
// index.php - Page de connexion
?>
<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
</head>

<body>
    <h2>Connexion</h2>
    <form action="login.php" method="POST">
        <label>Login :</label>
        <input type="text" name="email" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>

        <button type="submit">Se connecter</button>
    </form>
</body>

</html>