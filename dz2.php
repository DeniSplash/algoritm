<?php
$arr = range(0, 1000000);
shuffle($arr);

$pos = binarySearch($myArray, $num);
while ($pos != null) {
    unset($arr[$pos]);
    $pos = binarySearch($myArray, $num);
}

function binarySearch($myArray, $num)
{
    $left = 0;
    $right = count($myArray) - 1;
    while ($left <= $right) {
        $middle = floor(($right + $left) / 2);
        if ($myArray[$middle] == $num) {
            return $middle;
        } elseif ($myArray[$middle] > $num) {
            $right = $middle - 1;
        } elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
    }
    return null;
}

function InterpolationSearch($myArray, $num)
{
    $start = 0;
    $last = count($myArray) - 1;
    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])
    ) {
        $pos = floor($start + (
            (($last - $start) / ($myArray[$last] - $myArray[$start]))
            * ($num - $myArray[$start])
        ));
        if ($myArray[$pos] == $num) {
            return $pos;
        }
        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        } else {
            $last = $pos - 1;
        }
    }
    return null;
}
