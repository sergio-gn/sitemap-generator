<?php 
$keywords = [
    'keyword1',
    'keyword2',
    'keyword3'
];
// Start building the sitemap
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL; // Loop through the array and add each URL to the sitemap
foreach ($keywords as $keyword) {
    $url = 'https://examplewebsite.com.au/prefix-before-' . strtolower(str_replace(' ', '-', $keyword));
    $sitemap .= '<url>' . PHP_EOL;
    $sitemap .= '<loc>' . $url . '</loc>' . PHP_EOL;
    $sitemap .= '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
    $sitemap .= '<changefreq>daily</changefreq>' . PHP_EOL;
    $sitemap .= '<priority>0.8</priority>' . PHP_EOL;
    $sitemap .= '</url>' . PHP_EOL;
} // Finish building the sitemap
$sitemap .= '</urlset>' . PHP_EOL; // Output the sitemap to the browser or save to a file
header('Content-Type: application/xml');
echo $sitemap;
