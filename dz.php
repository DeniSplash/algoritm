<?php

$arr = range(0, 1000000);
shuffle($arr);

function bubbleSort($array)
{
    for ($i = 0; $i < count($array); $i++) {
        $count = count($array);
        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
        }
    }
    return $array;
}

function shakerSort($array)
{
    $n = count($array);
    $left = 0;
    $right = $n - 1;
    do {
        for ($i = $left; $i < $right; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                list($array[$i], $array[$i + 1]) = array(
                    $array[$i + 1],
                    $array[$i]
                );
            }
        }
        $right -= 1;
        for ($i = $right; $i > $left; $i--) {
            if ($array[$i] < $array[$i - 1]) {
                list($array[$i], $array[$i - 1]) = array(
                    $array[$i - 1],
                    $array[$i]
                );
            }
        }
        $left += 1;
    } while ($left <= $right);

    return $array;
}

function quickSort(&$arr, $low, $high)
{
    $i = $low;
    $j = $high;
    $middle = $arr[($low + $high) / 2];
    do {
        while ($arr[$i] < $middle) ++$i;
        while ($arr[$j] > $middle) --$j;
        if ($i <= $j) {

            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;

            $i++;
            $j--;
        }
    } while ($i < $j);
    if ($low < $j) {

        quickSort($arr, $low, $j);
    }
    if ($i < $high) {

        quickSort($arr, $i, $high);
    }


    return $arr;
}

sort($arr);

var_dump($arr);


/*
Самые быстрые методы сортировки, это стандартные методы PHP,
пузырьковый метод самый медленный
*/
