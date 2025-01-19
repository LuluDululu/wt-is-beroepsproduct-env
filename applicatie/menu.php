<?php
$eten = [
    'shoarma' => 6.75,
    'hummus' => 8.50,
    'kofte' => 7.20,
    'bloemkool' => 3
];

$drinken = [
    'soda' => 3.50,
    'haha bier' => 4.50
];

$menu = [
    'eten' => $eten,
    'drinken' => $drinken
];

function showMenu() {
    $html = '';

    global $menu; // Toegang tot de globale `$menu`-variabele

    foreach ($menu as $categorie => $items) {
        $html .= "<h2>{$categorie}</h2>"; // Categorie kop
        $html .= "<ul>"; // Begin van een lijst voor items

        foreach ($items as $item => $prijs) { // Loop door de items in de subarray
            $html .= "<li>{$item}: &euro;{$prijs}</li>"; // Toon het item en de prijs
        }

        $html .= "</ul>"; // Sluit de lijst
    }

    return $html;
}

echo showMenu();
?>
