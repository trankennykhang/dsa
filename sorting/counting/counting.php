<?php
namespace dsa\sorting;
use dsa\interface\IAlgorithm;
use dsa\utilities\Number;
use dsa\utilities\Timer;

/**
 * @author Kenny Tran
 */
class Counting implements IAlgorithm
{
    public function execute()
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

    public function register()
    {
        // TODO: Implement register() method.
    }

    public function description()
    {
        // TODO: Implement description() method.
    }

    public function name()
    {
        // TODO: Implement name() method.
        return __CLASS__;
    }
}
