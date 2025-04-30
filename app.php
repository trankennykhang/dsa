<?php
use Symfony\Component\Yaml\Yaml;

define('BOOTSTRAP_DIR', __DIR__ . '/Bootstrap');

global $CFG;
require_once BOOTSTRAP_DIR . '/Autoload.php';
require_once BOOTSTRAP_DIR . '/Config.php';

autoLoadUtilities();
try {
    $list = autoRegisterAlgorithm();
} catch (Exception $exception) {
    print $exception->getMessage();
    die();
}

foreach ($list as $type => $algorithms) {
    foreach ($algorithms as $algorithm) {
        if (in_array('all', $CFG->execute) || in_array($algorithm, $CFG->execute)) {
        print "********************************\n";
        print "Execute " . ucfirst($type) . ': ' . ucfirst($algorithm) . "\n";
        $reflectionClass = new ReflectionClass('dsa\\' . $type . '\\' . ucfirst($algorithm));
        $instance = $reflectionClass->newInstance();
        $instance->execute();
        print "***********DONE******************\n";

    }
}

}
