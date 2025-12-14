<?php
namespace Dsa\Sorting;
use Dsa\Interface\BaseAlgorithm;
use Dsa\Utilities\Number;
use Dsa\Utilities\Timer;
use Dsa\Logger\Logger;

/**
 * @author Kenny Tran
 */
class Bubble extends BaseAlgorithm
{
    public function execute($logger = null) : void
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
        $this->debug(Timer::getTime(), Logger::TOTAL_TIME, $logger);
        $this->debug(implode(",", $arr), Logger::RESULT, $logger);

    }
}
