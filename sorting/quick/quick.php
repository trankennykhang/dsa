<?php
namespace dsa\sorting;
use dsa\interface\BaseAlgorithm;
use dsa\utilities\Number;
use dsa\utilities\Timer;

/**
 * @author Kenny Tran
 */
class Quick extends BaseAlgorithm
{
    public function execute() : void
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

    /**
     * @param array<int, int> $arr
     * @param int $start
     * @param int $end
     * @return void
     */
    private function quick(array &$arr, int $start, int $end): void
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

    /**
     * Partition array
     * @param array<int, int> $arr
     * @param int $start
     * @param int $end
     * @return int
     */
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
