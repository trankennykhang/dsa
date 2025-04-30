<?php
namespace Dsa\Sorting;
use Dsa\Interface\BaseAlgorithm;
use Dsa\Utilities\Number;
use Dsa\Utilities\Timer;

/**
 * @author Kenny Tran
 */
class Merge extends BaseAlgorithm
{
    public function execute() : void
    {
        // TODO: Implement execute() method.
        $arr = Number::persistenceRandomArray();
        Timer::start();

        // Implement the Merge algorithm (divide and conquer)
        $arr = $this->divide($arr);

        Timer::stop();
        print "Total time: " . Timer::getTime() . "\n";
        print implode(",", $arr);
        print PHP_EOL;
    }

    /**
     * @param array<int, int> $arr
     * @return array<int, int>
     */
    private function divide(array $arr): array
    {
        $total = count($arr);
        if ($total == 2) {
            return $this->merge([$arr[0]], [$arr[1]]);
        }
        if ($total == 1) {
            return $this->merge([$arr[0]]);
        }
        $half = (int)floor($total / 2);
        $left = $this->divide(array_slice($arr, 0, $half));
        $right = $this->divide(array_slice($arr, $half, $total - $half));

        return $this->merge($left, $right);
    }

    /**
     * @param array<int, int> $left
     * @param array<int, int>|null $right
     * @return array<int, int>
     */
    private function merge(array $left, array $right = null): array
    {
        if ($right == null) {
            return $left;
        }
        if (count($left) == 1 && count($right) == 1) {
            if ($left[0] < $right[0]) {
                return [$left[0], $right[0]];
            } else return [$right[0], $left[0]];
        }
        $sorted_merged = [];
        $from = 0;
        for ($i=0;$i<count($left);$i++) {
            for($j=$from;$j<count($right);$j++) {
                if ($left[$i] <= $right[$j]) {
                    $sorted_merged[] = $left[$i];
                    continue 2;
                } else {
                    $sorted_merged[] = $right[$j];
                    $from=$j+1;
                }
            }
            $sorted_merged[] = $left[$i];
        }
        for ($j=$from;$j<count($right);$j++) {
            $sorted_merged[] = $right[$j];
        }
        return $sorted_merged;
    }
}
