<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?> | <?= e($config['name']) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <meta name="robots" content="<?= $indexable && !$notFound ? 'index, follow' : 'noindex, nofollow' ?>">
    <?php if ($canonical): ?><link rel="canonical" href="<?= e($canonical) ?>"><?php endif; ?>
    <meta property="og:locale" content="es_CL">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e($config['name']) ?>">
    <meta property="og:title" content="<?= e($title) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <?php if ($canonical): ?>
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e($baseUrl . $config['images']['logo']) ?>">
    <meta property="og:image:width" content="1200"><meta property="og:image:height" content="400">
    <meta property="og:image:alt" content="Marca Golden Group 7 en negro y dorado">
    <?php endif; ?>
    <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="/assets/site.css">
    <link rel="stylesheet" href="/assets/proposal-v2.css">
    <script src="/assets/site.js" defer></script>
</head>
<body class="<?= e($area['key'] ?? 'group') ?>">
<a class="skip-link" href="#contenido">Saltar al contenido</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="/" aria-label="Golden Group 7 · Inicio"><img src="<?= e($config['images']['logo']) ?>" alt="Golden Group 7" width="1200" height="400"></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="navegacion" hidden>Menú <span aria-hidden="true">☰</span></button>
        <nav id="navegacion" aria-label="Navegación principal">
            <a href="/" <?= $path === '/' ? 'aria-current="page"' : '' ?>>Inicio</a>
            <?php foreach ($areas as $slug => $item): ?><a href="/<?= e($slug) ?>" <?= $path === '/' . $slug ? 'aria-current="page"' : '' ?>><?= e($item['short']) ?></a><?php endforeach; ?>
            <a class="nav-contact" href="/contacto" <?= $path === '/contacto' ? 'aria-current="page"' : '' ?>>Conversemos <span aria-hidden="true">↗</span></a>
        </nav>
    </div>
</header>
<main id="contenido" tabindex="-1">
