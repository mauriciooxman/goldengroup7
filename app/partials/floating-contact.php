<?php
$floatingChannels = [
    'whatsapp' => ['label' => 'Contactar por WhatsApp', 'url' => whatsappUrl($config)],
    'email' => [
        'label' => 'Contactar por correo electrónico',
        'url' => filter_var($config['contact_email'], FILTER_VALIDATE_EMAIL) !== false
            ? 'mailto:' . $config['contact_email'] : '',
    ],
];
$showUnavailableContacts = $config['environment'] !== 'production';
$visibleChannels = array_filter($floatingChannels, static fn(array $channel): bool => $channel['url'] !== '' || $showUnavailableContacts);
?>
<?php if ($visibleChannels): ?>
<aside class="contact-dock" aria-label="Contacto rápido">
    <?php foreach ($visibleChannels as $channelKey => $channel): ?>
        <?php $label = $channel['label'] . ($channel['url'] === '' ? ' · Aún no disponible' : ''); ?>
        <?php if ($channel['url'] !== ''): ?>
        <a class="contact-float contact-float--<?= e($channelKey) ?>" href="<?= e($channel['url']) ?>" aria-label="<?= e($label) ?>" title="<?= e($label) ?>">
        <?php else: ?>
        <button class="contact-float contact-float--<?= e($channelKey) ?>" type="button" disabled aria-label="<?= e($label) ?>" title="<?= e($label) ?>">
        <?php endif; ?>
            <?php if ($channelKey === 'whatsapp'): ?>
            <svg viewBox="0 0 32 32" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M27.5 15.5a12 12 0 0 1-17.8 10.6L4 28l1.9-5.7A12 12 0 1 1 27.5 15.5Z"/><path d="m12 9-2 1c-1 1 .1 4.8 3.3 8s7 4.3 8 3.3l1-2-4-2-1.3 1.3a13 13 0 0 1-3.6-3.6l1.3-1.3Z"/></svg>
            <?php else: ?>
            <svg viewBox="0 0 32 32" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3.5" y="6.5" width="25" height="19" rx="3"/><path d="m4.5 8 11.5 9L27.5 8M4.5 24l8-8m15 8-8-8"/></svg>
            <?php endif; ?>
        <?php if ($channel['url'] !== ''): ?></a><?php else: ?></button><?php endif; ?>
    <?php endforeach; ?>
</aside>
<?php endif; ?>
