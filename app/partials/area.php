<?php $areaImage = $config['service_images'][$area['key']]; ?>
<section class="area-hero">
    <div class="container area-hero-layout">
    <div><a class="breadcrumb" href="/">Inicio</a><span class="breadcrumb-separator" aria-hidden="true"> / </span><span class="breadcrumb"><?= e($area['short']) ?></span><p class="eyebrow"><?= e($area['eyebrow']) ?></p><h1><?= e($area['headline']) ?></h1><p class="lead"><?= e($area['presentation']['subtitle'] ?? $area['academy_presentation']['subtitle'] ?? $area['page_intro'] ?? $area['intro']) ?></p><a class="button" href="/contacto">Consultar por esta área <span aria-hidden="true">↗</span></a></div>
    <img class="area-illustration" src="<?= e($areaImage['src']) ?>" alt="<?= e($areaImage['alt']) ?>" width="<?= e((string) $areaImage['width']) ?>" height="<?= e((string) $areaImage['height']) ?>" fetchpriority="high">
    </div>
</section>
<?php if (isset($area['presentation'])): ?>
<section class="services-section tourism-intro"><div class="container">
    <div class="section-heading"><div><p class="eyebrow">CONOCE EL ÁREA</p><h2><?= e($area['presentation']['heading']) ?></h2></div></div>
    <div class="tourism-presentation">
        <?php foreach ($area['presentation']['paragraphs'] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
    </div>
</div></section>
<?php require __DIR__ . '/tourism-programs.php'; ?>
<?php elseif (isset($area['academy_presentation'])): ?>
<section class="services-section"><div class="container">
    <div class="section-heading"><div><p class="eyebrow">CONOCE EL ÁREA</p><h2>Nuestros servicios</h2></div></div>
    <div class="academy-presentation">
        <?php foreach ($area['academy_presentation']['groups'] as $group): ?>
        <?php $isProducer = $group['heading'] === 'Productora'; ?>
        <?php if ($isProducer): ?><div class="producer-showcase"><?php endif; ?>
        <article class="service <?= $isProducer ? 'producer-copy' : 'academy-course' ?>">
            <h3><?= e($group['heading']) ?></h3>
            <p><?= e($group['intro']) ?></p>
            <ul><?php foreach ($group['services'] as $service): ?><li><?= e($service) ?></li><?php endforeach; ?></ul>
        </article>
        <?php if ($isProducer): ?><?php require __DIR__ . '/producer-photos.php'; ?></div><?php endif; ?>
        <?php endforeach; ?>
    </div>
</div></section>
<?php else: ?>
<section class="services-section"><div class="container">
    <div class="section-heading"><h2><?= e($area['name']) ?></h2><img class="area-logo" src="<?= e($config['images']['aureola_logo']) ?>" alt="Marca Aureola Mística: alas y aureola" width="1200" height="400" loading="lazy"></div>
    <div class="service-grid">
        <?php foreach ($area['services'] as $i => $service): ?>
        <article class="service">
            <span class="service-number"><?= e(sprintf('%02d', $i + 1)) ?></span>
            <h3><?= e($service['name']) ?></h3>
            <div class="service-body">
                <?php foreach ($service['paragraphs'] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
                <?php if (isset($service['items'])): ?>
                <ul class="ceremony-list" role="list">
                    <?php foreach ($service['items'] as $item): ?>
                    <li><span class="ceremony-text"><?php if (str_starts_with($item, 'Noche Mística:')): ?><strong>Noche Mística</strong><?= e(substr($item, strlen('Noche Mística'))) ?><?php else: ?><?= e($item) ?><?php endif; ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if (isset($service['groups'])): ?>
                <div class="workshop-groups">
                    <?php foreach ($service['groups'] as $group): ?>
                    <section class="workshop-group">
                        <h4><?= e($group['name']) ?></h4>
                        <?php if (isset($group['levels'])): ?>
                            <?php foreach ($group['levels'] as $level): ?>
                                <?php [$levelName, $levelDescription] = explode(':', $level, 2); ?>
                                <p class="workshop-level"><strong><?= e($levelName) ?></strong>:<?= e($levelDescription) ?></p>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p><?= e($group['paragraph']) ?></p>
                        <?php endif; ?>
                    </section>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
    <p class="service-note"><strong>Nota:</strong> <?= e($area['note']) ?></p>
</div></section>
<?php endif; ?>
<?php require __DIR__ . '/cta.php'; ?>
<section class="container other-areas"><h2>Otros caminos por descubrir</h2><div><?php foreach ($areas as $slug => $item): ?><?php if ($item['key'] !== $area['key']): ?><a href="/<?= e($slug) ?>"><?= e($item['name']) ?> <span aria-hidden="true">↗</span></a><?php endif; ?><?php endforeach; ?></div></section>
