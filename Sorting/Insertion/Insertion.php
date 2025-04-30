<?php
namespace Dsa\Sorting;
use Dsa\Interface\BaseAlgorithm;
use Dsa\Utilities\Number;
use Dsa\Utilities\Timer;

/**
 * @author Kenny Tran
 */
class Insertion extends BaseAlgorithm
{
    public function execute(): void
    {
        // TODO: Implement execute() method.
        $arr = Number::persistenceRandomArray();

        Timer::start();

        // Implement the Insertion algorithm
        $minPos = -1;
        $length = count($arr);
        $sorted_total = 1;
        for ($i = $sorted_total; $i < $length; $i++) {
            for ($j = 0; $j < $sorted_total; $j++) {
                if ($arr[$j] > $arr[$i]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
            $sorted_total++;
        }
        Timer::stop();
        print "Total time: " . Timer::getTime() . "\n";
        print implode(",", $arr);
        print PHP_EOL;
    }
}
