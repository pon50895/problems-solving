<?php
/*
* Lily's Homework
* https://www.hackerrank.com/challenges/lilys-homework/problem
*/
// Complete the lilysHomework function below.
function lilysHomework($arr) 
{
    $length = count($arr);
    $order_arr = $arr;
    $reverse_order_arr = $arr;
    sort($order_arr);
    rsort($reverse_order_arr);

    $count  = compare_arr($arr, $order_arr);
    $rcount = compare_arr($arr, $reverse_order_arr);

    return min($count, $rcount);
}

function compare_arr($arr1, $arr2)
{
    $count = 0;
    $arr1_index = array_flip($arr1);

    foreach ($arr1 as $key => $value)
    {
        if ($arr1[$key] != $arr2[$key])
        {
            $arr_temp['value'] = array($arr1[$key], $arr2[$key]);
            $arr_temp['key']   = array($arr1_index[$arr1[$key]], $arr1_index[$arr2[$key]]);
            $arr1[$arr_temp['key'][0]] = $arr_temp['value'][1];
            $arr1[$arr_temp['key'][1]] = $arr_temp['value'][0];
            $arr1_index[$arr_temp['value'][0]] = $arr_temp['key'][1];
            $arr1_index[$arr_temp['value'][1]] = $arr_temp['key'][0];
            $count++;
        }
    }
    return $count;
}

function change_value($arr, $index1, $index2)
{
    $temp = $arr[$index1];
    $arr[$index1] = $arr[$index2];
    $arr[$index2] = $temp;
    return $arr;
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = lilysHomework($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
