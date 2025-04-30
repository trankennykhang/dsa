<?php
namespace Dsa\Sorting;
use Dsa\Interface\BaseAlgorithm;
use Dsa\Utilities\Number;
use Dsa\Utilities\Timer;

/**
 * @author Kenny Tran
 */
class Counting extends BaseAlgorithm
{
    public function execute() : void
    {
        // TODO: Implement execute() method.
        $arr = Number::persistenceRandomArray();

        Timer::start();

        // Implement the Counting algorithm
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
