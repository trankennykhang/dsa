<?php
namespace dsa\sorting;
use dsa\interface\BaseAlgorithm;
use dsa\utilities\Number;
use dsa\utilities\Timer;

/**
 * @author Kenny Tran
 */
class Counting extends BaseAlgorithm
{
    public function execute() : void
    {
        // TODO: Implement execute() method.
        $arr = Number::persistence_random_array();

        Timer::start();

        // Implement the counting algorithm
        $max = $arr[0];
        foreach ($arr as $value) {
            if ($value > $max) {
                $max = $value;
            }
        }
        $counter = array_fill(0, $max+1, 0);
        foreach ($arr as $value) {
            if (isset($counter[$value]))
                $counter[$value] += 1;
            else $counter[$value] = 1;
        }
        $arr = [];
        foreach ($counter as $value => $times) {
            for ($i = 0; $i < $times; $i++) {
                $arr[] = $value;
            }
        }
        Timer::stop();
        print "Total time: " . Timer::getTime() . "\n";
        print implode(",", $arr);
        print PHP_EOL;
    }
}
