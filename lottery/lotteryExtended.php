<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<title>Lotto</title>
</head>
<body>
<h2>Lotto</h2>
<?php
// 1. Aufgabe (= Teilaufgabe)

// Schreiben Sie eine Funktion, welche ein Array aus fünf
// Zufallszahlen zwischen einschließlich 1 und 20 zurückgibt.
// Jede dieser Zufallszahlen darf in dem Array nur einmal
// vorkommen.
// Beispiel:
// falsch: [12, 3, 20, 12, 8]
// richig: [12, 3, 20, 14, 8]
// Bevor die o. g. Funktion das Array mit den fünf Zufalls-
// zahlen zurückgibt, sollen die Zahlen in dem Array auf-
// steigend sortiert werden.
// Beispiel: [3, 8, 12, 14, 20]

//////////////////////////////////////////////////////////////////////

// 2. Aufgabe

// Um diese Aufgabe zu lösen, sollten zwei Variablen vorab
// definiert werden:
// - Menge von Zahlen ($number)
// - Zahlenpool ($amount)

// Es soll aus einem Zahlenpool (z. B. von 1 bis 20) eine 
// bestimmte Menge von Zahlen (z. B. 5 Zahlen) gezogen werden. 
// Das wäre dann die Glückskombination.
// Die Zahlen sollen in dieser Glückskombination aufsteigend 
// sortiert werden.

// Diese Glückskombination soll zunächst ausgegeben werden 
// nach dem Schema:
// Die Glückskombination: 1 3 8 9 12

// Anschließend sollen solange Kombinationen (wieder auf-
// steigend sortiert) gezogen werden, bis irgendwann 
// zufällig die Glückskombination gezogen wird.
// Folgendes soll dann ausgegeben werden: alle weiteren 
// Kombinationen, durchnummeriert nach dem Schema:
// 1. Ziehung: 1 4 5 12 13
// 2. Ziehung: 2 6 7 18 19
// usw.

// Zuletzt soll eine statistische Auswertung der Ziehungen
// erfolgen nach dem Schema:
// Insgesamt 12395 Ziehungen, darunter:
// 0 Richtige: 2373
// 1 Richtige: 5425
// 2 Richtige: 3681
// 3 Richtige: 855
// 4 Richtige: 60
// 5 Richtige: 1

// Ergänzen Sie das Skript so, dass bei der Ausgabe aller 
// Kombinationen nur die ersten 1000 Kombinationen aus-
// gegeben werden und danach die Zeile: 
// ... und weitere 11395 Ziehungen 

//////////////////////////////////////////////////////////////////////

// 3. Aufgabe (= Zusatzaufgabe)

// Das Skript soll um ein Formular erweitert werden:
// - Einzeiliges Eingabefeld: Menge von Zahlen ($number)
// - Einzeiliges Eingabefeld: Zahlenpool ($amount)
// - Schaltfläche zum Absenden des Formulars

// Bereits eingetragene Werte bleiben sollen beim 
// Absenden des Formulars stehenbleiben.

// Gibt der Benutzer HTML-spezifische Sonderzeichen ein,
// sollen diese maskiert werden.

// Leerzeichen am Anfang und am Ende der Eingabe sollen
// entfernt werden.

// Die Benutzereingaben in diesem Formular sollen validiert 
// werden. Beim Validieren des Formulars sollen alle 
// Fehlermeldungen in einem Array gespeichert (= eingesammelt) 
// werden und später dann ausgegeben werden.

// Folgende Eingaben sollen validiert werden:

// Für die Angabe: Menge von Zahlen bzw. Zahlenpool soll es 
// jeweils Fehlermeldungen geben für folgende Fälle:
// - es handelt sich nicht um eine Zahl 
//  (es wurde nichts oder keine Zahl eingegeben)
// - es handelt sich um keine ganze Zahl

// Weiterhin soll es Fehlermeldungen geben, wenn folgendes 
// NICHT erfüllt wird:
// - Menge von Zahlen: mindestens 1, höchstens 6
// - Zahlenpool: mindestens 2, höchstens 49
// - Menge von Zahlen muss kleiner sein als die Größe des 
//   Zahlenpools

// Falls es Fehlermeldungen gibt, soll diese als ungeordnete
// HTML-Liste ausgegeben werden.

// Falls es keine Fehlermeldungen gibt, soll die Glücks-
// kombination gezogen und ausgegeben werden. Dann soll
// so oft gezogen werden, bis die Glückskombination
// gezogen wird (siehe: 2. Aufgabe).

//////////////////////////////////////////////////////////////////////

// Bei der Lösung dieser Aufgaben können folgende Funktionen 
// eine Hilfe sein:

// rand($min, $max) bzw. mt_rand($min, $max);
// Diese Funktion liefert eine Zufallszahl zwischen 
// (einschließlich) $min und $max.
// Zuverlässiger als rand() arbeitet die Funktion mt_rand(). 
// mt steht für Mersenne Twister, einem bekannten 
// Zufallsalgorithmus, welcher bessere (zufälligere) 
// Zufallszahlen liefert.

// in_array($wert, $array);
// Diese Funktion prüft, ob ein Wert ($wert) in einem Array 
// ($array) existiert. 
// Sie gibt true zurück, wenn $wert in $array gefunden wurde, 
// ansonsten gibt sie false zurück.

// sort($array);
// Die Funktion sort($array) sortiert die Einträge von $array 
// aufsteigend.

// array_intersect($array1, $array2)
// Diese Funktion ermittelt die Schnittmenge von Arrays.
// array_intersect($array1, $array2, ...) gibt alle Werte von 
// $array1 zurück, die auch in $array2 usw. enthalten sind.

// array_fill($startindex, $anzahl_eintraege, $wert);
// Diese Funktion füllt ein Array mit Werten. Der erste 
// Parameter stellt die Indexnummer dar, mit der gestartet 
// wird (meist die 0), im zweiten Parameter ist die Anzahl der 
// Einträge für dieses Array gespeichert und der dritte 
// Parameter ($wert) stellt den Wert dar, den jeder Eintrag 
// zunächst erhält.

// implode($string, $array);
// Diese Funktion verbindet Array-Elemente zu einem String und 
// gibt diesen String zurück. Dabei wird $string (standardmäßig 
// eine leere Zeichenkette) zwischen die einzelnen Array-Elemente 
// gesetzt.

// set_time_limit(sekundenanzahl);
// Mit dieser Funktion wird das Zeit-Limit zum Verarbeiten des 
// Skripts, welches standardmäßig bei 30 Sekunden liegt, 
// hochgesetzt auf eine bestimmte Anzahl von Sekunden: 
// so setzt beispielsweise set_time_limit(1200); das Zeit-Limit 
// zum Verarbeiten des Skripts hoch auf 1200 Sekunden 
// (= 20 Minuten).
//-------------------------------------------------------------------

$number = 4;
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

function findNumbers(array $glueckszahlen, int $number, int $amount): array {
    $tries = 0;
    $ziehung = array();
    $retries = array();

    while ($glueckszahlen != $ziehung) {
        $ziehung = calcRandomArray($number, $amount);
        sort($ziehung);

        $tries++;
        if ($tries < 1000) {
            echo implode(" ", $ziehung)."<br>";
        }
        array_push($retries, $ziehung);
    }
    echo "Glückszahlen ".implode(" ", $ziehung)." nach ".$tries." Ziehungen gefunden.";
    return $retries;
}

function getMetrics(array $glueckszahlen, array $retries) {
    $count1 = 0;

    foreach ($retries as $key => $value) {
        
        if (array_intersect($glueckszahlen, $value) == 1) {
            $count1++;
        }
    }
    echo "Übereinstimmungen: ".$count1;
}

$glueckszahlen = calcRandomArray($number, $amount);
echo "Glückszahlen: ".implode(" ", $glueckszahlen)."<br>";

$retries = findNumbers($glueckszahlen, $number, $amount);
getMetrics($glueckszahlen, $retries);

?>
</body>
</html>