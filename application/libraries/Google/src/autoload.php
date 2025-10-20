<?php
// application/libraries/Google/src/autoload.php

defined('BASEPATH') OR exit('No direct script access allowed');

spl_autoload_register(function ($class) {
    $prefix = 'Google\\';
    
    // FIX: __DIR__ is now the directory that *contains* Client.php.
    // We should append a trailing slash, but NOT '/src'.
    $base_dir = __DIR__ . '/'; // This is the fix!

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    // This resolves to: .../src/ + Client.php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});