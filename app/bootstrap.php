<?php
declare(strict_types=1);

$config = require __DIR__ . '/config.php';
$areas = require __DIR__ . '/content.php';
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function productionUrl(array $config): string {
    $url = $config['production_url'];
    $parts = parse_url($url);
    return $config['environment'] === 'production' && filter_var($url, FILTER_VALIDATE_URL) !== false && is_array($parts)
        && ($parts['scheme'] ?? '') === 'https' && !empty($parts['host'])
        && empty($parts['user']) && empty($parts['pass']) && empty($parts['query'])
        && empty($parts['fragment']) && empty($parts['path']) ? $url : '';
}
function whatsappUrl(array $config): string {
    if (preg_match('/^[1-9][0-9]{7,14}$/D', $config['whatsapp']) !== 1) { return ''; }
    $message = trim($config['whatsapp_message'] ?? '');
    return 'https://wa.me/' . $config['whatsapp'] . ($message !== '' ? '?text=' . rawurlencode($message) : '');
}
$baseUrl = productionUrl($config);
$indexable = $baseUrl !== '';
