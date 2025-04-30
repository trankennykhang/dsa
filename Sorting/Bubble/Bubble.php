<?php
namespace Dsa\Sorting;
use Dsa\Interface\BaseAlgorithm;
use Dsa\Utilities\Number;
use Dsa\Utilities\Timer;

/**
 * @author Kenny Tran
 */
class Bubble extends BaseAlgorithm
{
    public function execute() : void
    {
        // TODO: Implement execute() method.
        $arr = Number::persistenceRandomArray();

        Timer::start();

        // Implement the Bubble algorithm
        $length = count($arr);
        while ($length > 0) {
            for ($i = 0; $i < $length - 1; $i++) {
                if ($arr[$i] > $arr[$i + 1]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$i + 1];
                    $arr[$i + 1] = $temp;
                }
            }
            $length--;
        }
        Timer::stop();
        print "Total time: " . Timer::getTime() . "\n";
        print implode(",", $arr);
        print PHP_EOL;
    }
}
