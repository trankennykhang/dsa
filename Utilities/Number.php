<?php
namespace dsa\utilities;

class Number {

    private static array $_persistence_array = [];
    /**
     * @param int $total
     * @param array<int, int> $range
     * @return array<int, int>
     */
    public static function randomArray(int $total = 100, array $range = [0,1000]) : array
    {
        $arr = [];
        for ($i = 0; $i < $total; $i++) {
            $arr[] = rand($range[0], $range[1]);
        }
        return $arr;
    }
    /**
     * @param int $total
     * @param array<int, int> $range
     * @return array<int, int>
     */
    public static function persistenceRandomArray(int $total = 100, array $range = [0,100]) : array
    {
        if (empty(self::$_persistence_array)) {
            self::$_persistence_array = self::randomArray();
        }
        return self::$_persistence_array;
    }
}