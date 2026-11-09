<div class="tour-flyers">
    <?php foreach ($flyers as $flyer): ?>
    <?php
    $flyerUrl = '/assets/' . $flyer['file'];
    [$flyerWidth, $flyerHeight] = getimagesize(dirname(__DIR__, 2) . '/public' . $flyerUrl);
    ?>
    <figure class="tour-flyer">
        <a href="<?= e($flyerUrl) ?>" target="_blank" rel="noopener" aria-label="<?= e('Ver folleto completo: ' . $flyer['caption'] . ' (nueva pestaña)') ?>">
            <img src="<?= e($flyerUrl) ?>" alt="<?= e('Folleto original: ' . $flyer['caption']) ?>" width="<?= e((string) $flyerWidth) ?>" height="<?= e((string) $flyerHeight) ?>" loading="lazy">
        </a>
        <figcaption><?= e($flyer['caption']) ?> · <a href="<?= e($flyerUrl) ?>" target="_blank" rel="noopener">Ver folleto completo<span class="tour-new-tab"> (nueva pestaña)</span></a></figcaption>
    </figure>
    <?php endforeach; ?>
</div>
