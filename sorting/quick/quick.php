<?php
namespace dsa\sorting;
use dsa\interface\IAlgorithm;
use dsa\utilities\Number;
use dsa\utilities\Timer;

/**
 * @author Kenny Tran
 */
class Quick implements IAlgorithm
{
    public function execute()
    {
        // TODO: Implement execute() method.
        $arr = Number::persistence_random_array();
        Timer::start();
        // Implement the quicksort algorithm
        $this->quick($arr, 0, count($arr) - 1);

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
    private function quick(array &$arr, $start, $end)
    {
        if ($start < $end) {
            $pivot = $this->partition($arr, $start, $end);
            $this->quick($arr, $start, $pivot - 1);
            $this->quick($arr, $pivot+1, $end);
        }
    }
    private function swap(int &$a, int &$b) : void
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    // Partition function
    private function partition(array &$arr, int $start, int $end) : int
    {
        $j = $start;
        $pivot = $end;
        for ($i = $start; $i <= $end - 1; $i++) {
            if ($arr[$i] < $arr[$pivot]) {
                $this->swap($arr[$i], $arr[$j]);
                $j++;
            }

        }
        $this->swap($arr[$j], $arr[$pivot]);
        return $j;

    }

}
