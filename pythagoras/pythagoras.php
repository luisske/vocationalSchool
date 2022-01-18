<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<title>PHP: Pythagoras</title>
<style>
* {
	font-family: Verdana;
}
body {
	margin: 1.4em;
	background: #EEE;
}
table {
	border-collapse: collapse;
	background: #FFF;
}
th, td {
	border: 1px solid black;
	text-align: center;
	padding: .5em 1.2em;
}
th {
	background: #CCC;
}
tr.header {
	background: #DCDCDC;
}
tr.primitive {
	background: #f8e604;
}	
</style>
</head>
<body>
<?php

function getTriple(int $max) {
	$triples  = array();

	$iterationCounter = 0;
	for($b = 1; $b < $max; $b++) {
		for($a = 1; $a < $b; $a++) {
			$c = calcHyp($a, $b);
			if ($c <= $max) {
				if (pow($c, 2) == (pow($a, 2) + pow($b, 2))) {
					$triple = array("a" => $a, "b" => $b, "c" => $c);
					array_push($triples, $triple);
				}
			}
			$iterationCounter++;
		}
	}
	echo "Iterations: ".$iterationCounter."<br>\n";
	echo "Triples for cMax=".$max.": ".count($triples)."<br>\n";
	return $triples;
}

function calcHyp(int $a, int $b) {
	$c = sqrt(pow($a, 2) + pow($b, 2));
	// floor
	if (($c % 1) == 0) {
		return (int) $c;
	}
	return $c;
}

// gesucht: gemeinsame Teiler
function isPrimitive(int $a, int $b): bool {
	return ((ggT($a, $b)) == 1);
}

function ggT($u, $v) {
	while ( $u!=0 ) {
		if ( $u < $v ) {
			$w = $u;
			$u = $v;
			$v = $w;
		}
		$u = $u - $v;
	}
	return $v;
}

function checkPrimitive(array $triple): bool {
	return isPrimitive($triple['a'], $triple['b']);
}

function sortArray(array $triples, string $col1, string $col2): array {
	
	// TODO prüfen nach abc
	/*if (in_array($col1, ['a', 'b', 'c'], false)) {
		$col1 = "a";
	}*/

	$sorted1 = array_column($triples, $col1);
	$sorted2 = array_column($triples, $col2);
	array_multisort($sorted1, $sorted2, $triples);
	return $triples;
}

function printTable(array $triples) {
	$tableString = "<table>\n";
	$tableString .= "<tr class='header'>\n";
	$tableString .= "<td>a</td>\n";
	$tableString .= "<td>b</td>\n";
	$tableString .= "<td>c</td>\n";
	$tableString .= "</tr>\n";

	foreach ($triples as $key => $value) {
		$tableString .= (checkPrimitive($value) ? "<tr class='primitive'>\n" : "<tr>\n");
		foreach ($value as $key2 => $value2) {
			$tableString .= "<td>".$value2."</td>\n";
		}
		$tableString .= "</tr>\n";
	}
	$tableString .= "</table>\n";
	echo $tableString;
}

function outputTriples(int $max, string $col1, string $col2) {
	$finalTriples = sortArray(getTriple($max), $col1, $col2);
	printTable($finalTriples);
}

//echo "<pre>";
//print_r(getTriple(65));
//echo "</pre>\n";

outputTriples(65, 'a', 'b');

?>
</body>
</html>
