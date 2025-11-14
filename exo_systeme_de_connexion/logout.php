<?php
session_start();
session_unset();   // Vide la session
session_destroy(); // Détruit totalement la session
header('Location: index.php');
exit;
