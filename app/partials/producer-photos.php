<?php
$producerPhotos = [
    ['file' => 'productora-aladino', 'area' => 'aladdin', 'width' => 1600, 'height' => 1150, 'caption' => 'Aladino', 'alt' => 'Escena de Aladino con participantes en vestuario teatral, cortinajes y decoración árabe.'],
    ['file' => 'productora-sailor-moon', 'area' => 'sailor', 'width' => 1600, 'height' => 1191, 'caption' => 'Sailor Moon', 'alt' => 'Presentación de Sailor Moon con vestuario de personajes y adornos en forma de corazón.'],
    ['file' => 'productora-modelaje-infantil-1', 'area' => 'model-one', 'width' => 1200, 'height' => 1600, 'caption' => 'Modelaje infantil', 'alt' => 'Participante de modelaje infantil con camiseta blanca y pantalón corto de mezclilla sobre una pasarela.'],
    ['file' => 'productora-modelaje-infantil-2', 'area' => 'model-two', 'width' => 1119, 'height' => 1600, 'caption' => 'Modelaje infantil', 'alt' => 'Participante de modelaje infantil con vestuario floral y una tela de colores sobre un hombro.'],
    ['file' => 'productora-bailarines', 'area' => 'dancers', 'width' => 1279, 'height' => 1502, 'caption' => 'Grupo de bailarines', 'alt' => 'Grupo de bailarines con vestuario negro, posando delante de una cortina.'],
];
?>
<?php foreach ($producerPhotos as $photo): ?>
<figure class="producer-photo producer-photo--<?= e($photo['area']) ?>">
    <a class="producer-photo-link" href="<?= e('/assets/' . $photo['file'] . '-original.jpg') ?>" target="_blank" rel="noopener" aria-label="<?= e('Ver fotografía completa: ' . $photo['alt'] . ' (nueva pestaña)') ?>">
        <img src="<?= e('/assets/' . $photo['file'] . '.webp') ?>" alt="<?= e($photo['alt']) ?>" width="<?= e((string) $photo['width']) ?>" height="<?= e((string) $photo['height']) ?>" loading="lazy" decoding="async">
    </a>
    <figcaption><?= e($photo['caption']) ?> · <a href="<?= e('/assets/' . $photo['file'] . '-original.jpg') ?>" target="_blank" rel="noopener">Ver fotografía completa<span class="producer-new-tab"> (nueva pestaña)</span></a></figcaption>
</figure>
<?php endforeach; ?>
