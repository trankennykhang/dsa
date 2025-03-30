<?php
function get_config() {
    global $CFG;
    return $CFG;
}
function auto_register_algorithm() {
    global $CFG;
    $arr = [];
    foreach ($CFG->algorithms as $algorithm) {
        $arr[$algorithm] = [];
        $folders = get_children_folders($algorithm);
        foreach ($folders as $folder) {
            // Check for valid structure
            if (is_valid_algorithm($CFG->dirroot . '/' . $algorithm . '/' . $folder, $folder)) {
                // include ();
                include $CFG->dirroot . '/' . $algorithm . '/' . $folder . '/' . $folder. '.php';
                $arr[$algorithm][] = $folder;
            }
        }
    }
    return $arr;
}
function get_children_folders(string $path): array {
    global $CFG;
    $dirs = [];
    if (is_dir($CFG->dirroot . '/' . $path)) {
        $dir = dir($CFG->dirroot . '/' .$path);
        while (($entry = $dir->read()) !== false) {
            if ($entry != '.' && $entry != '..' && is_dir($CFG->dirroot . '/' . $path . '/' . $entry)) {
                $dirs[] = $entry;
            }
        }
    }
    return $dirs;
}
function is_valid_algorithm(string $path, $name): bool {
    // check for
    if (!file_exists($path . '/' . $name .'.php')) {
        throw new Exception("$path is not a valid algorithm");
    }
    return true;
}