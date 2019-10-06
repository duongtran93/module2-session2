<?php
$arrnums = [];
for ($i=0;$i<10;$i++) {
    $numOne = random_int(1, 100);
    array_push($arrnums, $numOne);
    $arrnums[$i] = [];
    echo "[";
    for ($j=0;$j<10;$j++) {
        $numTwo = random_int(1, 100);
        array_push($arrnums[$i], $numTwo);
        echo $arrnums[$i][$j]. " ";
    }
    echo "] <br>";
}

function findMax($arr) {
    $max = $arr[0][0];
    $index = null;
    for ($i=0;$i<count($arr);$i++) {
        for ($j=0;$j<count($arr[$i]);$j++) {
            if ($max < $arr[$i][$j]) {
                $max = $arr[$i][$j];
                $index = $i."-".$j;
            }
        }
    }
    return "max:" .$max." at index ".$index;
}
echo findMax($arrnums);

