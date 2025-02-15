<?php
/**
 * @author Kenny Tran
 */

$numberOfElements = 100;
$arr = [];
for ($i = 0; $i < $numberOfElements; $i++) {
    $arr[] = rand(0, 1000);
}
$timeStart = microtime(true);

// Implement the selection algorithm (min to max)
$minPos = -1;
for ($i = 0; $i < count($arr); $i++) {
    for ($j = $i; $j < count($arr); $j++) {
        if ($minPos == -1)
            $minPos = $j;
        elseif($arr[$minPos] > $arr[$j])
            $minPos = $j;
    }
    $temp = $arr[$i];
    $arr[$i] = $arr[$minPos];
    $arr[$minPos] = $temp;
}
print microtime(true) - $timeStart;
print PHP_EOL;
print implode(",", $arr);
