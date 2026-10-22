<section class="hero">
    <div class="container hero-layout">
    <div class="hero-copy">
        <p class="eyebrow"><span class="small-star" aria-hidden="true">✦</span> GOLDEN GROUP 7</p>
        <h1><span>Distintos caminos.</span><span>Un mundo de</span><em>experiencias.</em></h1>
        <p class="lead">Turismo, cultura y espiritualidad. Tres formas de descubrir, aprender y conectar con lo que te inspira.</p>
        <div class="hero-actions"><a class="button" href="#areas">Descubre nuestras áreas <span aria-hidden="true">↓</span></a><a class="secondary-link" href="/contacto">Conversemos <span aria-hidden="true">↗</span></a></div>
        <div class="hero-foot"><span aria-hidden="true">✧</span><p>Personas, experiencias y nuevas perspectivas.</p></div>
    </div>
    <div class="hero-art">
        <?php foreach ($config['service_images'] as $imageKey => $image): ?>
        <div class="hero-window hero-window--<?= e($imageKey) ?>"><img src="<?= e($image['src']) ?>" alt="<?= e($image['alt']) ?>" width="<?= e((string) $image['width']) ?>" height="<?= e((string) $image['height']) ?>" <?= $imageKey === 'turismo' ? 'fetchpriority="high"' : '' ?>></div>
        <?php endforeach; ?>
        <span class="art-caption">DESCUBRIR · CREAR · CONECTAR</span>
        <div class="art-label"><span aria-hidden="true">✦</span> Cada camino comienza<br>con una inquietud.</div>
    </div>
    <div class="hero-index"><?php foreach ($areas as $slug => $item): ?><a href="/<?= e($slug) ?>"><span><?= e($item['number']) ?></span><?= e($item['short']) ?><span aria-hidden="true">↗</span></a><?php endforeach; ?></div>
    </div>
</section>
<section class="areas-section" id="areas">
    <div class="container">
        <div class="section-heading"><div><p class="eyebrow">UN GRUPO, TRES MIRADAS</p><h2>¿Qué te inspira hoy?</h2></div><p>Encuentra el espacio que conecta<br>con tus intereses.</p></div>
        <div class="area-grid">
            <?php foreach ($areas as $slug => $item): ?>
            <?php $serviceImage = $config['service_images'][$item['key']]; ?>
            <a class="area-card <?= e($item['key']) ?>" href="/<?= e($slug) ?>">
                <div class="card-image"><img src="<?= e($serviceImage['src']) ?>" alt="<?= e($serviceImage['alt']) ?>" width="<?= e((string) $serviceImage['width']) ?>" height="<?= e((string) $serviceImage['height']) ?>" loading="lazy"><span class="card-number"><?= e($item['number']) ?></span><span class="round-arrow" aria-hidden="true">↗</span></div>
                <div class="card-copy"><p class="eyebrow"><?= e($item['eyebrow']) ?></p><h3><?= e($item['name']) ?></h3><p><?= e($item['intro']) ?></p><span class="text-link">Explorar esta área <span aria-hidden="true">↗</span></span></div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="container about-section">
    <div><p class="eyebrow">NUESTRA ESENCIA</p><h2>Lo que nos une<br>son las personas.</h2><span class="large-star" aria-hidden="true">✳</span></div>
    <div class="about-copy"><p class="intro-text">Golden Group 7 reúne distintas formas de vivir la cultura, el aprendizaje, la recreación y la espiritualidad.</p><p>Escuchamos los intereses de cada persona para orientar sus inquietudes hacia el área del grupo que mejor se relaciona con ellas.</p><div class="purpose-grid"><div><h3>Nuestra misión</h3><p>Acoger las necesidades sociales, culturales, educativas, espirituales y recreativas de las personas con empatía y atención.</p></div><div><h3>Nuestra visión</h3><p>Poner nuestras habilidades y conocimientos al servicio de experiencias significativas y ser reconocidos por una atención cercana y diferente.</p></div></div></div>
</section>
<?php require __DIR__ . '/cta.php'; ?>
