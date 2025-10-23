<?php
// Thin delegator to the real homepage
// Change working directory to pages folder for correct relative paths
chdir(__DIR__ . '/pages');
include 'index.php';