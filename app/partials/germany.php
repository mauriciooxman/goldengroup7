<?php
$germanyContact = $config;
$germanyContact['whatsapp_message'] = 'Hola, me gustaría recibir información para viajar y/o estudiar en Alemania con Star Winner.';
?>
<section class="container germany-page">
    <nav class="germany-breadcrumb" aria-label="Ruta de navegación">
        <a href="/">Inicio</a><span aria-hidden="true"> → </span><a href="/star-winner-turismo">Star Winner</a><span aria-hidden="true"> → </span><span aria-current="page">Alemania</span>
    </nav>
    <div class="germany-layout">
        <div class="germany-copy">
            <h1>¿Quieres viajar a Alemania?</h1>
            <p class="lead">Asesoramiento integral a personas que deseen viajar y/o estudiar en Alemania.</p>
            <h2>Ofrecemos</h2>
            <ul>
                <li>Curso básico de alemán.</li>
                <li>Tramitación de documentos.</li>
                <li>Charlas y conversaciones con nativos, facilitando la fluidez.</li>
                <li>Manual alemán-español, etc.</li>
            </ul>
            <?php if ($germanyWa = whatsappUrl($germanyContact)): ?><a class="button" href="<?= e($germanyWa) ?>">Consultar sobre Alemania <span aria-hidden="true">↗</span></a><?php endif; ?>
            <a class="germany-back" href="/star-winner-turismo">← Volver a Star Winner</a>
        </div>
        <figure class="germany-flyer">
            <img src="/assets/alemania-folleto-redisenado-v2.png" alt="Folleto de Golden Group 7 y Star Winner: asesoramiento para viajar y estudiar en Alemania. Información disponible en el texto de esta página." width="1122" height="1402" fetchpriority="high">
            <figcaption>Golden Group 7 · Star Winner Turismo</figcaption>
        </figure>
    </div>
</section>
