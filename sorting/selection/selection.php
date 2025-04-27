<?php
namespace dsa\sorting;
use dsa\interface\IAlgorithm;
use dsa\utilities\Number;
use dsa\utilities\Timer;

/**
 * @author Kenny Tran
 */
class Selection implements IAlgorithm
{
    public function execute()
    {
        // TODO: Implement execute() method.
        $arr = Number::persistence_random_array();

        Timer::start();

        // Implement the selection algorithm (min to max)
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
