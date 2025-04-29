<?php
namespace dsa\sorting;
use dsa\interface\IAlgorithm;
use dsa\utilities\Number;
use dsa\utilities\Timer;

/**
 * @author Kenny Tran
 */
class Bubble implements IAlgorithm
{
    public function execute()
    {
        // TODO: Implement execute() method.
        $arr = Number::persistence_random_array();

        Timer::start();

        // Implement the bubble algorithm
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
