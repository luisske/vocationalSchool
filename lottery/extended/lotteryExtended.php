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
$number = 4;
$amount = 20;

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

function findNumbers(array $jackpot, int $number, int $amount): array {
    $tries = 0;
    $draw = array();
    $draws = array();

    while ($jackpot != $draw) {
        $draw = calcRandomArray($number, $amount);
        sort($draw);

        $tries++;
        if ($tries < 1000) {
            echo implode(" ", $draw)."<br>";
        }
        array_push($draws, $draw);
    }
    echo "Glückszahlen: { ".implode(" | ", $draw)." } nach ".$tries." Ziehungen gefunden."."<br>";
    return $draws;
}

function getMatchingNumbers(array $jackpot, array $draws) {
    $matchingNumbers = array_fill(0, count($jackpot)+1, 0);

    foreach ($draws as $key => $value) {
        for($i = 0; $i <= count($matchingNumbers); $i++) {
            if (count(array_intersect($jackpot, $value)) == $i) {
                $matchingNumbers[$i]++;
            }
        }
    }
    foreach ($matchingNumbers as $key => $value) {
        echo $key." Übereinstimmungen: ".$value."<br>";
    }
}

$jackpot = calcRandomArray($number, $amount);
echo "Glückszahlen: ".implode(" ", $jackpot)."<br>";

$draws = findNumbers($jackpot, $number, $amount);
getMatchingNumbers($jackpot, $draws);
?>
</body>
</html>