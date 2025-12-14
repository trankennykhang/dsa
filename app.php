<?php
use Symfony\Component\Yaml\Yaml;

define('BOOTSTRAP_DIR', __DIR__ . '/Bootstrap');

global $CFG;
require_once BOOTSTRAP_DIR . '/Autoload.php';
require_once BOOTSTRAP_DIR . '/Config.php';

autoLoadUtilities();
try {
    autoRegisterAlgorithm();
} catch (Exception $exception) {
    print $exception->getMessage();
    die();
}

// Got more than 1 argvs, check for valid argv (make algorithm name matching case-insensitive)
if (count($argv) >= 2) {
    $CFG->execute = [];
    for ($i = 1; $i < count($argv); $i++) {
        // normalize input to match stored algorithm names (e.g. "Bubble")
        $requested = ucfirst(strtolower($argv[$i]));
        if (empty(findAlgorithm($requested))) {
            die('Invalid algorithm: ' . $argv[$i]);
        } else {
            $CFG->execute[] = $requested;
        }
    }
}
$logger = function($value, $type) {
    print '   ***  ' . $type . ': ' .$value. "\n";
};
executeAlgorithms($logger);

