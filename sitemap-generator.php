<?php
// Read keywords from the file and store them in an array
$keywords = file('pages.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Start building the sitemap
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

// Loop through the array and add each URL to the sitemap
foreach ($keywords as $keyword) {
    // Clean up the keyword for the URL
    $cleanKeyword = strtolower(str_replace(' ', '-', trim($keyword)));

    // Construct the URL using the cleaned keyword
    $url = $cleanKeyword;

    // Add the URL and other sitemap attributes
    $sitemap .= '<url>' . PHP_EOL;
    $sitemap .= '<loc>' . htmlspecialchars($url) . '</loc>' . PHP_EOL;
    $sitemap .= '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
    $sitemap .= '<changefreq>daily</changefreq>' . PHP_EOL;
    $sitemap .= '<priority>0.8</priority>' . PHP_EOL;
    $sitemap .= '</url>' . PHP_EOL;
}

// Finish building the sitemap
$sitemap .= '</urlset>' . PHP_EOL;

// Output the sitemap to the browser or save to a file
header('Content-Type: application/xml');
echo $sitemap;
?>
