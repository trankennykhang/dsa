<?php
ini_set("memory_limit", "4096M");

if (count($argv) <= 1)
    die('Please input the number of value' . PHP_EOL);
if (!is_numeric($argv[1]))
    die('The number of value must be a number' . PHP_EOL);

$total = $argv[1];

if (count($argv) <= 1)
    die('Please enter the output file name' . PHP_EOL);

$filename = $argv[2];

// todo: regx check the filename
$arr = [];
$max = $total * 150;
$time = microtime(true);
print "Memory usage: ".memory_get_usage() . PHP_EOL;
for($i = 1; $i <= $total; $i++) {
    $number = rand(0, $max);
    $arr[] = $number;
    if ($i % 10000 === 0) {
        print "Generating number {$i}" . PHP_EOL;
        print "Time spent: ". (microtime(true) - $time) . PHP_EOL;
        print "Memory usage: ".memory_get_usage() . PHP_EOL;
    }
    if ($i % 1000000 === 0) {
        // write trunk data to file
        file_put_contents(__DIR__ . "/../data/" . $filename, implode(',', $arr) . ',', FILE_APPEND);

        // reset the arr
        $arr = [];
    }
}
// write data to file
file_put_contents(__DIR__ . "/../data/" . $filename, implode(',', $arr), FILE_APPEND);
