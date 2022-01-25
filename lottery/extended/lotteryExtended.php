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