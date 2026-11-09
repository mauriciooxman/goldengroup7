<?php
$tourContact = $config;
$tourContact['whatsapp_message'] = 'Hola, me gustaría consultar por el programa de Star Winner: ' . $tourTitle . '.';
?>
<?php if ($tourWa = whatsappUrl($tourContact)): ?><a class="tour-contact" href="<?= e($tourWa) ?>"><?= e('Consultar por ' . $tourTitle) ?><span aria-hidden="true"> ↗</span></a><?php endif; ?>
