<?php
use Symfony\Component\Yaml\Yaml;

define('BOOTSTRAP_DIR', __DIR__ . '/bootstrap');
require_once BOOTSTRAP_DIR . '/autoload.php';
require_once BOOTSTRAP_DIR . '/config.php';

try {
    $list = auto_register_algorithm();
} catch (Exception $exception) {
    print $exception->getMessage();
    die();
}

foreach ($list as $type => $algorithms) {
    foreach ($algorithms as $algorithm) {
        if ((is_string($CFG->execute) && $CFG->execute == 'all') ||
                (is_array($CFG->execute) && in_array($algorithm, $CFG->execute))) {
        print "********************************\n";
        $timeStart = microtime(true);
        print "Execute " . ucfirst($type) . ': ' . ucfirst($algorithm) . "\n";
        $reflectionClass = new ReflectionClass('dsa\\' . $type . '\\' . ucfirst($algorithm));
        $instance = $reflectionClass->newInstance();
        $instance->execute();
        print "Total time: " . (microtime(true) - $timeStart) . "\n";
        print "***********DONE******************\n";

    }
}

}
