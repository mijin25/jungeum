<?php
/**
 * Build script for GitHub Pages
 * Converts PHP pages to static HTML
 */

$dist_dir = __DIR__ . '/dist';
$pages_dir = __DIR__ . '/pages';

// Create dist directory
if (!is_dir($dist_dir)) {
    mkdir($dist_dir, 0755, true);
}

// Copy assets
echo "Copying assets...\n";
exec("xcopy /E /I /Y assets dist\\assets");
exec("xcopy /E /I /Y css dist\\css");
exec("xcopy /E /I /Y js dist\\js");
exec("xcopy /E /I /Y data dist\\data");

// Build pages
$pages = [
    'index.php' => 'index.html',
];

foreach ($pages as $source => $target) {
    echo "Building $source...\n";
    
    // Capture output
    ob_start();
    
    // Set environment variable for static build
    $_SERVER['REQUEST_METHOD'] = 'GET';
    $_SERVER['REQUEST_URI'] = '/';
    
    // Change working directory
    chdir($pages_dir);
    
    try {
        include $source;
        $html = ob_get_clean();
        
        // Adjust paths for static site
        $html = str_replace('../css/', 'css/', $html);
        $html = str_replace('../js/', 'js/', $html);
        $html = str_replace('../assets/', 'assets/', $html);
        $html = str_replace('../data/', 'data/', $html);
        $html = str_replace('../lib/', 'lib/', $html);
        $html = str_replace('../components/', 'components/', $html);
        
        // Write to dist
        file_put_contents($dist_dir . '/' . $target, $html);
        
        echo "✓ Built $target\n";
    } catch (Exception $e) {
        ob_end_clean();
        echo "✗ Error building $source: " . $e->getMessage() . "\n";
    }
}

echo "Build complete!\n";

