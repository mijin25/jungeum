<?php
// Thin delegator to the real homepage
// Set a flag to indicate we're loading from root
if (!defined('LOADING_FROM_ROOT')) {
    define('LOADING_FROM_ROOT', true);
}

// Include the actual homepage without changing directory
$pages_index = __DIR__ . '/pages/index.php';
if (file_exists($pages_index)) {
    include $pages_index;
} else {
    die('Error: Could not find pages/index.php');
}