<?php

function luckyNumbers ($matrix) {
       $m = count($matrix);
       $n = count($matrix[0]);
       $luckyNumbers = [];
     
    $rowMins = array_fill(0, $m, PHP_INT_MAX);
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $rowMins[$i] = min($rowMins[$i], $matrix[$i][$j]);
        }
    }

    $colMaxs = array_fill(0, $n, PHP_INT_MIN);
    for ($j = 0; $j < $n; $j++) {
        for ($i = 0; $i < $m; $i++) {
            $colMaxs[$j] = max($colMaxs[$j], $matrix[$i][$j]);
        }
    }

    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($matrix[$i][$j] == $rowMins[$i] && $matrix[$i][$j] == $colMaxs[$j]) {
                $luckyNumbers[] = $matrix[$i][$j];
            }
        }
    }

    return $luckyNumbers;
}

function resultDesign($matrix){
    $results =  luckyNumbers ($matrix);
    echo '<br>Matrix: <br>';
    $x = count($matrix);
    for ($i = 0; $i < $x; $i++){
        echo "[ " . implode(", ", $matrix[$i]) . " ]". '<br>';
    }
    echo '<br>';
    echo 'Lucky Numbers: ' . implode(", ", luckyNumbers($matrix)) . '<br><hr>';
}

echo 'LYCKY NUMBERS in MATRIX <br><br>
is an element of the matrix such that <br>
it is the minimum element <br>
in its row and maximum in its column<br><hr>';

$matrix = [[3,7,8],[9,11,13],[15,16,17]];
resultDesign($matrix);

$matrix = [[1,10,4,2],[9,3,8,7],[15,16,17,12]];
resultDesign($matrix);

$matrix = [[7,8],[1,2]];
resultDesign($matrix);

?>