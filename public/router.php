<?php
declare(strict_types=1);
// Solo entrega archivos públicos conocidos; nunca rutas fuera del document root.
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$file = realpath(__DIR__ . rawurldecode($path));
if ($file && str_starts_with($file, __DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR)
    && is_file($file) && in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['css','js','svg','png','webp','jpg'], true)) {
    return false;
}
require __DIR__ . '/index.php';
