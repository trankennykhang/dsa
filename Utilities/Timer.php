<?php
namespace Dsa\Utilities;

class Timer {
    public static float $startTime = 0;
    public static float $endTime = 0;
    public static bool $micro = true;
    public static function start() : void
    {
        if (self::$micro) {
            self::$startTime = microtime(true);
        } else self::$startTime = time();
    }
    public static function stop() : void
    {
        if (self::$micro) {
            self::$endTime = microtime(true);
        } else self::$endTime = time();
    }
    public static function use_second() : void
    {
        self::$micro = false;
    }
    public static function getTime() : float
    {
        return round(self::$endTime - self::$startTime, 2);
    }
}
