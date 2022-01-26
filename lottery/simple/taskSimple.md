# Aufgabe

Schreiben Sie eine Funktion, welche ein Array aus sechs
Zufallszahlen zwischen einschließlich 1 und 49 zurückgibt.
Jede dieser Zufallszahlen darf in dem Array nur einmal
vorkommen.

Beispiel:<br>
falsch:  [12, 3, 20, 12, 8, 48] ---
richtig: [12, 3, 20, 14, 8, 48]

Bevor die o. g. Funktion das Array mit den sechs Zufallszahlen zurückgibt, sollen die Zahlen in dem Array aufsteigend sortiert werden.

Beispiel:<br>
[3, 8, 12, 14, 20, 48]

Mit der o. g. Funktion sollen folgende Parameter übergeben werden: $number und $amount (siehe ganz unten).

Stellen Sie sicher, dass es sich bei diesen beiden Parametern jeweils um den Datentyp Integer handelt und dass
o. g. Funktion einen Wert vom Datentyp Array zurückgibt.

Rufen Sie o. g. Funktion innerhalb einer Schleife auf:
Lassen Sie sich die Array-Einträge mit Leerzeichen
getrennt ausgeben. Nach jeder 6er-Kombination soll
ein Zeilenumbruch erfolgen. Es sollen insgesamt
10 6er-Kombinationen ausgegeben werden (= 10 Schleifen-
durchläufe), z. B.

*<br>
3 18 19 29 41 47<br>
5 7 30 36 44 47<br>
3 18 20 23 31 38<br>
10 12 14 24 32 34<br>
8 16 30 32 37 47<br>
8 20 28 32 33 34<br>
3 8 12 14 20 48<br>
22 29 31 41 46 49<br>
8 18 20 31 36 47<br>
1 2 12 13 16 43<br>
*

# Hilfestellung & Tipps

Bei der Lösung dieser Aufgabe können folgende
Funktionen eine Hilfe sein:

### mt_rand($min, $max);
Diese Funktion liefert eine Zufallszahl zwischen 
(einschließlich) $min und $max. Die Funktion
mt_rand() arbeitet zufälliger als die ältere
Funktion rand().

### in_array($wert, $array);
Diese Funktion prüft, ob ein Wert ($wert) in einem
Array ($array) existiert. Sie gibt true zurück,
wenn $wert in $array gefunden wurde, ansonsten
gibt sie false zurück.

### sort($array);
Die Funktion sort($array) sortiert die Einträge
von $array aufsteigend.

### implode($string, $array);
Diese Funktion verbindet Array-Einträge zu einem
String und gibt diesen String zurück. Dabei wird
$string (standardmäßig eine leere Zeichenkette)
zwischen die einzelnen Array-Einträge gesetzt.

