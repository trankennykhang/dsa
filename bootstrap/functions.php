<?php

function get_config(){

}
function auto_register_algorithm() {
    $config = get_config();
foreach ($config['algorithms'] as $algorithm) {
$folders = get_subfolders($algorithm);
foreach ($folders as $folder) {
// Check for valid structure

// include ();
print "register algorithm $algorithm\n";
}
}
}
function get_subfolders(string $path): string {
return "";
}
function check_valid() {

}