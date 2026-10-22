<?php
declare(strict_types=1);

return [
    'name' => 'Golden Group 7',
    'environment' => getenv('GG_ENV') ?: 'preview',
    // Solo configurar tras confirmar dominio, HTTPS y versión con/sin www.
    'production_url' => rtrim(getenv('GG_PRODUCTION_URL') ?: '', '/'),
    'emails' => ['Goldengroup7@yahoo.com', 'Starwinner@gmail.com', 'Masterproducciones6@gmail.com'],
    'whatsapp' => trim(getenv('GG_WHATSAPP') ?: ''), // Número empresarial confirmado, formato internacional solo dígitos.
    'contact_email' => trim(getenv('GG_CONTACT_EMAIL') ?: ''), // Correo empresarial del botón flotante; pendiente de confirmar.
    'socials' => [],
    'service_images' => [
        'turismo' => [
            'src' => '/assets/starwinner-turismo.png', 'width' => 554, 'height' => 310,
            'alt' => 'Persona consultando un mapa turístico',
        ],
        'academia' => [
            'src' => '/assets/master-academia.png', 'width' => 555, 'height' => 310,
            'alt' => 'Ramo de flores en una celebración de boda',
        ],
        'mistica' => [
            'src' => '/assets/aureola-mistica.png', 'width' => 556, 'height' => 310,
            'alt' => 'Persona de espaldas con alas blancas decorativas',
        ],
    ],
    'images' => [
        'logo' => '/assets/golden-original.png',
        'hero' => '/assets/journey.svg',
        'turismo' => '/assets/journey.svg',
        'academia' => '/assets/culture.svg',
        'mistica' => '/assets/spirit.svg',
        'aureola_logo' => '/assets/aureola-original.png',
    ],
];
