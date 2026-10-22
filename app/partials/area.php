<?php $areaImage = $config['service_images'][$area['key']]; ?>
<section class="area-hero">
    <div class="container area-hero-layout">
    <div><a class="breadcrumb" href="/">Inicio</a><span class="breadcrumb-separator" aria-hidden="true"> / </span><span class="breadcrumb"><?= e($area['short']) ?></span><p class="eyebrow"><?= e($area['eyebrow']) ?></p><h1><?= e($area['headline']) ?></h1><p class="lead"><?= e($area['presentation']['subtitle'] ?? $area['academy_presentation']['subtitle'] ?? $area['page_intro'] ?? $area['intro']) ?></p><a class="button" href="/contacto">Consultar por esta área <span aria-hidden="true">↗</span></a></div>
    <img class="area-illustration" src="<?= e($areaImage['src']) ?>" alt="<?= e($areaImage['alt']) ?>" width="<?= e((string) $areaImage['width']) ?>" height="<?= e((string) $areaImage['height']) ?>" fetchpriority="high">
    </div>
</section>
<?php if (isset($area['presentation'])): ?>
<section class="services-section"><div class="container">
    <div class="section-heading"><div><p class="eyebrow">CONOCE EL ÁREA</p><h2><?= e($area['presentation']['heading']) ?></h2></div></div>
    <div class="tourism-presentation">
        <?php foreach ($area['presentation']['paragraphs'] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
        <ul><?php foreach ($area['presentation']['services'] as $service): ?><li><?= e($service) ?></li><?php endforeach; ?></ul>
        <p><?= e($area['presentation']['price_note']) ?></p>
    </div>
</div></section>
<?php elseif (isset($area['academy_presentation'])): ?>
<section class="services-section"><div class="container">
    <div class="section-heading"><div><p class="eyebrow">CONOCE EL ÁREA</p><h2>Nuestros servicios</h2></div></div>
    <div class="service-grid academy-presentation">
        <?php foreach ($area['academy_presentation']['groups'] as $group): ?>
        <article class="service">
            <h3><?= e($group['heading']) ?></h3>
            <p><?= e($group['intro']) ?></p>
            <ul><?php foreach ($group['services'] as $service): ?><li><?= e($service) ?></li><?php endforeach; ?></ul>
        </article>
        <?php endforeach; ?>
    </div>
</div></section>
<?php else: ?>
<section class="services-section"><div class="container"><div class="section-heading"><div><p class="eyebrow">CONOCE EL ÁREA</p><h2><?= e($area['name']) ?></h2></div><?php if ($area['key'] === 'mistica'): ?><img class="area-logo" src="<?= e($config['images']['aureola_logo']) ?>" alt="Marca Aureola Mística: alas y aureola" width="1200" height="400" loading="lazy"><?php endif; ?></div><div class="service-grid"><?php foreach ($area['services'] as $i => [$name, $text]): ?><article class="service"><span class="service-number"><?= e(sprintf('%02d', $i + 1)) ?></span><h3><?= e($name) ?></h3><p><?= e($text) ?></p></article><?php endforeach; ?></div><p class="service-note"><?= e($area['note']) ?></p></div></section>
<?php endif; ?>
<?php require __DIR__ . '/cta.php'; ?>
<section class="container other-areas"><h2>Otros caminos por descubrir</h2><div><?php foreach ($areas as $slug => $item): ?><?php if ($item['key'] !== $area['key']): ?><a href="/<?= e($slug) ?>"><?= e($item['name']) ?> <span aria-hidden="true">↗</span></a><?php endif; ?><?php endforeach; ?></div></section>
