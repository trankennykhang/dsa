<?php
function get_config() : \stdClass
{
    global $CFG;
    return $CFG;
}
/**
 * @return array<string, array<string, string>>
 */
function autoRegisterAlgorithm()
{
    global $CFG;
    $algorithms = [];
    foreach ($CFG->folders as $folder) {
        $algorithms[$folder] = [];
        $sub_folders = getChildrenFolders($folder);
        foreach ($sub_folders as $sub_folder) {
            // Check for valid structure
            if (isValidAlgorithm($CFG->dirroot . '/' . $folder . '/' . $sub_folder, $sub_folder)) {
                // Do not include class files manually; Composer autoload (PSR-4) will load classes on demand.
                $algorithms[$folder][] = $sub_folder;
            }
        }
    }
    $CFG->algorithms = $algorithms;
}
function autoLoadUtilities() : void
{
    // Utilities are autoloaded by Composer; no manual includes required.
}

/**
 * @param string $path
 * @return array<int, string>
 */
function getChildrenFolders(string $path): array
{
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
function isValidAlgorithm(string $path, string $name): bool
{
    // check for
    if (!file_exists($path . '/' . $name .'.php')) {
        throw new Exception("$path is not a valid algorithm");
    }
    return true;
}
function findAlgorithm(string $name): array {
    global $CFG;
    foreach ($CFG->algorithms as $key=>$algorithms) {
        foreach ($algorithms as $algorithm) {
            if ($name == $algorithm) {
                return ['key' => $key, 'algorithm' => $algorithm];
            }
        }
    }
    return [];
}
function executeAlgorithms($logger) : void {
    global $CFG;
    foreach ($CFG->algorithms as $type => $algorithms) {
        foreach ($algorithms as $algorithm) {
            if (in_array('all', $CFG->execute) || in_array($algorithm, $CFG->execute)) {
                print "Execute " . ucfirst($type) . ': ' . ucfirst($algorithm) . "\n";
                $reflectionClass = new ReflectionClass('Dsa\\' . $type . '\\' . ucfirst($algorithm));
                $instance = $reflectionClass->newInstance();
                $instance->execute($logger);
                print "   *** done\n";
            }

        }
    }
}