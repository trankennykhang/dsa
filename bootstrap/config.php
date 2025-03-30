<?php
namespace dsa\bootstrap;
class CONFIG {

    private static $_instance;
    private $arr = array();
    private function __construct() {}
    public static function get() {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
            $this->_instance
        }
    }
}
?>