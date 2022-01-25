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