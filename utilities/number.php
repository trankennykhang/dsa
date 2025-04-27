<?php
namespace dsa\utilities;

class Number {
    private static array $_persistence_array = [];
    public static function random_array(int $total = 100, array $range = [0,1000]) : array
    {
        $arr = [];
        for ($i = 0; $i < $total; $i++) {
            $arr[] = rand($range[0], $range[1]);
        }
        return $arr;
    }
    public static function persistence_random_array(int $total = 100, array $range = [0,100]) : array
    {
        if (empty(self::$_persistence_array)) {
            self::$_persistence_array = self::random_array();
        }
        return self::$_persistence_array;
    }
}