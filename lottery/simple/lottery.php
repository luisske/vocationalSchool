<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<title>PHP: Zufallszahlen</title>
</head>
<body>
<h2>Zufallszahlen</h2>
<?php
// Aufgabe

// Schreiben Sie eine Funktion, welche ein Array aus sechs
// Zufallszahlen zwischen einschließlich 1 und 49 zurückgibt.
// Jede dieser Zufallszahlen darf in dem Array nur einmal
// vorkommen.
// Beispiel:
// falsch:  [12, 3, 20, 12, 8, 48]
// richtig: [12, 3, 20, 14, 8, 48]
// Bevor die o. g. Funktion das Array mit den sechs Zufalls-
// zahlen zurückgibt, sollen die Zahlen in dem Array auf-
// steigend sortiert werden.
// Beispiel: [3, 8, 12, 14, 20, 48]

// Mit der o. g. Funktion sollen folgende Parameter über-
// geben werden: $number und $amount (siehe ganz unten).

// Stellen Sie sicher, dass es sich bei diesen beiden Para-
// metern jeweils um den Datentyp Integer handelt und dass
// o. g. Funktion einen Wert vom Datentyp Array zurückgibt.

// Rufen Sie o. g. Funktion innerhalb einer Schleife auf:
// Lassen Sie sich die Array-Einträge mit Leerzeichen
// getrennt ausgeben. Nach jeder 6er-Kombination soll
// ein Zeilenumbruch (<br>) erfolgen. Es sollen insgesamt
// 10 6er-Kombinationen ausgegeben werden (= 10 Schleifen-
// durchläufe), z. B.

/*
3 18 19 29 41 47
5 7 30 36 44 47
3 18 20 23 31 38
10 12 14 24 32 34
8 16 30 32 37 47
8 20 28 32 33 34
3 8 12 14 20 48
22 29 31 41 46 49
8 18 20 31 36 47
1 2 12 13 16 43
*/

//////////////////////////////////////////////////////////////////////

// Bei der Lösung dieser Aufgabe können folgende
// Funktionen eine Hilfe sein:

// mt_rand($min, $max);
// Diese Funktion liefert eine Zufallszahl zwischen 
// (einschließlich) $min und $max. Die Funktion
// mt_rand() arbeitet zufälliger als die ältere
// Funktion rand().

// in_array($wert, $array);
// Diese Funktion prüft, ob ein Wert ($wert) in einem
// Array ($array) existiert. Sie gibt true zurück,
// wenn $wert in $array gefunden wurde, ansonsten
// gibt sie false zurück.

// sort($array);
// Die Funktion sort($array) sortiert die Einträge
// von $array aufsteigend.

// implode($string, $array);
// Diese Funktion verbindet Array-Einträge zu einem
// String und gibt diesen String zurück. Dabei wird
// $string (standardmäßig eine leere Zeichenkette)
// zwischen die einzelnen Array-Einträge gesetzt.

//////////////////////////////////////////////////////////////////////

// 6 Zufallszahlen aus definiertem Bereich
$number = 6;

// von 1 bis 49
$amount = 49;

function calcRandomArray(int $number, int $amount): array {
    $intArray = array();

    while (count($intArray) < $number) {
        $randomInt = mt_rand(1, $amount);
        if (!in_array($randomInt, $intArray)) {
            array_push($intArray, $randomInt);
        }
    }
    sort($intArray);
    return $intArray;
}

for ($i=0; $i < 10; $i++) { 
    $intArray = calcRandomArray($number, $amount);
    echo implode(" ",$intArray)."<br>";
}

?>
</body>
</html>