<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
function findMin($arr)
{
    $min = $arr[0];
    $index = 0;
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $min) {
            $min = $arr[$i];
            $index = $i;
        }
    }
    return $index;
}

$nums = [];
for ($i =0;$i < 10;$i++) {
    $randomNum = random_int(0, 100);
    array_push($nums, $randomNum);
}

function prinArr($arr) {
    for ($i=0;$i<count($arr);$i++) {
        echo $arr[$i];
        echo ", ";
    }
}
echo prinArr($nums);

$minValue = findMin($nums);
echo "<br>";
echo "Min value at index: ".$minValue;
?>
</body>
</html>