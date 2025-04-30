<?php
namespace Dsa\Sorting;
use Dsa\Interface\BaseAlgorithm;
use Dsa\Utilities\Number;
use Dsa\Utilities\Timer;

/**
 * @author Kenny Tran
 */
class Selection extends BaseAlgorithm
{
    public function execute() : void
    {
        // TODO: Implement execute() method.
        $arr = Number::persistenceRandomArray();

        Timer::start();

        // Implement the Selection algorithm (min to max)
        $minPos = -1;
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = $i; $j < count($arr); $j++) {
                if ($minPos == -1)
                    $minPos = $j;
                elseif ($arr[$minPos] > $arr[$j])
                    $minPos = $j;
            }
            $temp = $arr[$i];
            $arr[$i] = $arr[$minPos];
            $arr[$minPos] = $temp;
        }
        Timer::stop();
        print "Total time: " . Timer::getTime() . "\n";
        print implode(",", $arr);
        print PHP_EOL;
    }
}
