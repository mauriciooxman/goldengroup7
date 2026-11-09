<?php $programs = require dirname(__DIR__) . '/tourism-programs.php'; ?>
<div class="container tourism-programs">
    <section class="tour-category tour-featured" aria-labelledby="tour-reina-isabel">
        <h2 id="tour-reina-isabel"><?= e($programs['featured']['title']) ?></h2>
        <div class="tour-category-layout">
            <?php $flyers = $programs['featured']['flyers']; require __DIR__ . '/tour-flyers.php'; ?>
            <div class="tour-featured-copy">
                <h3>Programa</h3>
                <ul class="tour-places"><?php foreach ($programs['featured']['places'] as $place): ?><li><?= e($place) ?></li><?php endforeach; ?></ul>
                <h3>El folleto también señala</h3>
                <ul class="tour-places"><?php foreach ($programs['featured']['mentions'] as $mention): ?><li><?= e($mention) ?></li><?php endforeach; ?></ul>
                <?php $tourTitle = $programs['featured']['title']; require __DIR__ . '/tour-contact.php'; ?>
            </div>
        </div>
    </section>
    <?php foreach ($programs['categories'] as $category): ?>
    <section class="tour-category" aria-labelledby="<?= e($category['id']) ?>">
        <h2 id="<?= e($category['id']) ?>"><?= e($category['title']) ?></h2>
        <div class="tour-category-layout">
            <?php $flyers = $category['flyers']; require __DIR__ . '/tour-flyers.php'; ?>
            <div class="tour-itineraries">
                <?php foreach ($category['tours'] as $tour): ?>
                <details class="tour-itinerary">
                    <summary><h3><?= e($tour['title']) ?></h3></summary>
                    <div class="tour-itinerary-body">
                        <?php if (isset($tour['places'])): ?><ul class="tour-places"><?php foreach ($tour['places'] as $place): ?><li><?= e($place) ?></li><?php endforeach; ?></ul><?php endif; ?>
                        <?php foreach ($tour['groups'] ?? [] as $tourGroup): ?>
                        <h4><?= e($tourGroup['title']) ?></h4>
                        <ul class="tour-places"><?php foreach ($tourGroup['places'] as $place): ?><li><?= e($place) ?></li><?php endforeach; ?></ul>
                        <?php endforeach; ?>
                        <?php $tourTitle = $tour['title']; require __DIR__ . '/tour-contact.php'; ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endforeach; ?>
    <section class="tour-category tour-annual" aria-labelledby="programacion-anual">
        <h2 id="programacion-anual"><?= e($programs['annual']['title']) ?></h2>
        <p class="tour-availability"><?= e($programs['annual']['note']) ?></p>
        <div class="tour-category-layout">
            <?php $flyers = $programs['annual']['flyers']; require __DIR__ . '/tour-flyers.php'; ?>
            <div>
                <dl class="tour-calendar">
                    <?php foreach ($programs['annual']['events'] as $event): ?>
                    <div><dt><?= e($event['date']) ?></dt><dd><?= e($event['title']) ?><?php $tourTitle = $event['title']; require __DIR__ . '/tour-contact.php'; ?></dd></div>
                    <?php endforeach; ?>
                </dl>
                <details class="tour-conditions">
                    <summary>Condiciones indicadas en el folleto</summary>
                    <?php foreach ($programs['annual']['conditions'] as $condition): ?><p><?= e($condition) ?></p><?php endforeach; ?>
                    <p><?= e($programs['annual']['footer']) ?></p>
                </details>
            </div>
        </div>
    </section>
    <div class="tour-germany"><a class="button germany-link" href="/star-winner-turismo/alemania">¿Te gustaría viajar a Alemania? <span aria-hidden="true">↗</span></a></div>
</div>
