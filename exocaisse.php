<?php

$montantDu = 18;
$totalDonne = 30;

$a_rendre = calcul($montantDu, $totalDonne, "standard");
print_r($a_rendre);

function calcul($montantDuParClient, $totalDonneParClient, $modeDeRendu = "standard", $valeurPreferee = null)
{
    $reste = $totalDonneParClient - $montantDuParClient;

    $unites = [50, 20, 10, 5, 2, 1];

    if ($modeDeRendu === "smallFirst") {
        sort($unites);
    } else if ($modeDeRendu === "bigFirst") {
        rsort($unites);
    } else if ($modeDeRendu === "preferred" && $valeurPreferee !== null) {
        if (in_array($valeurPreferee, $unites)) {
            $unites = array_diff($unites, [$valeurPreferee]);
            array_unshift($unites, $valeurPreferee);
        }
    }

    $rendu = [];

    foreach ($unites as $u) {
        if ($reste >= $u) {
            $nb = intdiv($reste, $u);
            $rendu[$u] = $nb;
            $reste -= $nb * $u;
        }
    }

    return $rendu;
}
