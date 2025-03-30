<?php
use Symfony\Component\Yaml\Yaml;

define('BOOTSTRAP_DIR', __DIR__ . '/bootstrap');
require_once BOOTSTRAP_DIR . '/autoload.php';

$config = Yaml::parseFile(BOOTSTRAP_DIR . '/config.yaml');
$algorithms = auto_register_algorithm();

if ($config['execute'] == 'all') {
    foreach ($algorithms as $algorithm) {
    
    }
} else {

}
