<?php
declare(strict_types=1);
require dirname(__DIR__) . '/app/bootstrap.php';

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$routes = array_merge(['/','/contacto'], array_map(static fn(string $slug): string => '/' . $slug, array_keys($areas)));
header('Content-Type: text/html; charset=UTF-8');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Content-Security-Policy: default-src 'self'; img-src 'self'; style-src 'self'; script-src 'self'; base-uri 'none'; frame-ancestors 'none'; form-action 'none'");
if (!$indexable) { header('X-Robots-Tag: noindex, nofollow'); }
if ($path === '/robots.txt') {
    header('Content-Type: text/plain; charset=UTF-8');
    echo $indexable ? "User-agent: *\nAllow: /\nSitemap: {$baseUrl}/sitemap.xml\n" : "User-agent: *\nDisallow: /\n";
    exit;
}
if ($path === '/sitemap.xml') {
    if (!$indexable) { http_response_code(404); exit; }
    header('Content-Type: application/xml; charset=UTF-8');
    echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($routes as $route) { echo '<url><loc>' . e($baseUrl . $route) . '</loc></url>'; }
    echo '</urlset>'; exit;
}
$area = $areas[ltrim($path, '/')] ?? null;
$notFound = !in_array($path, $routes, true);
if ($notFound) { http_response_code(404); }
$title = $notFound ? 'Página no encontrada' : ($area['name'] ?? ($path === '/contacto' ? 'Contacto' : 'Turismo, cultura y espiritualidad'));
$description = $area['description'] ?? ($path === '/contacto' ? 'Conversemos sobre turismo, actividades culturales y encuentros espirituales. Canales de contacto de Golden Group 7.' : 'Tres áreas, un mismo propósito: conectar personas con experiencias de turismo, cultura, aprendizaje y espiritualidad. Conoce Golden Group 7.');
$canonical = $indexable && !$notFound ? $baseUrl . $path : '';
require dirname(__DIR__) . '/app/partials/header.php';
if ($notFound) {
    echo '<section class="container error-page"><p class="eyebrow">ERROR 404</p><h1>Este camino no lleva a una página.</h1><p>Vuelve al inicio para conocer nuestras áreas o encontrar cómo contactarnos.</p><a class="button" href="/">Volver al inicio <span aria-hidden="true">↗</span></a></section>';
} elseif ($area) {
    require dirname(__DIR__) . '/app/partials/area.php';
} elseif ($path === '/contacto') {
    require dirname(__DIR__) . '/app/partials/contact.php';
} else {
    require dirname(__DIR__) . '/app/partials/home.php';
}
require dirname(__DIR__) . '/app/partials/footer.php';
