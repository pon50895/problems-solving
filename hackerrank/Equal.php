<?php
/*
* Equal
* https://www.hackerrank.com/challenges/equal/submissions/code/151188305
*/
// Complete the equal function below.
function equal($arr) {
    $count = array();
    $count[] = count_array($arr);
    $min = min($arr);
    foreach ($arr as $key => $value)
    {
        $arr[$key] -= $min;
    }
    $count[] = count_array($arr);

    for($i = 1;$i < 5;$i++)
    {
        foreach($arr as $key => $value)
        {
            $arr[$key] += 1;
        }
        $count[] = count_array($arr);
    }

    return min($count);

}

function count_array($arr)
{
    $count = 0;

    $share_array = array(5,2,1);

    foreach($share_array as $share_number)
    {
        foreach($arr as $key => $value)
        {
            $quotient = ($arr[$key] - $arr[$key] % $share_number) / $share_number;
            $arr[$key] -= $quotient * $share_number;
            $count += $quotient;
        }
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $arr_temp);

    $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = equal($arr);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
