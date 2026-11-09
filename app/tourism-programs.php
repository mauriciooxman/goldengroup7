<?php
declare(strict_types=1);

// Transcripción de los seis folletos originales entregados por la clienta.
return [
    'featured' => [
        'title' => 'Reina Isabel II y Príncipe Felipe en Valparaíso',
        'flyers' => [['file' => 'star-winner-reina-isabel-valparaiso.jpg', 'caption' => 'Reina Isabel II y Príncipe Felipe en Valparaíso']],
        'places' => [
            'Arco del Triunfo Británico.',
            'Monumento a Lord Thomas Cochrane.',
            'Barrio Europeo.',
            'Monumento a los Héroes de Iquique.',
            'Museo Naval y Marítimo.',
            'Otros lugares visitados por la reina y su esposo, el príncipe Felipe de Edimburgo, durante su visita a Chile.',
        ],
        'mentions' => ['Bus de turismo.', 'Guía de turismo profesional.', 'Informaciones.'],
    ],
    'categories' => [
        [
            'id' => 'tours-medio-dia', 'title' => 'Tours de medio día',
            'flyers' => [
                ['file' => 'star-winner-medio-dia-1.jpg', 'caption' => 'Tours de medio día · programas 1–4'],
                ['file' => 'star-winner-medio-dia-2.jpg', 'caption' => 'Tours de medio día · programas 5–8'],
            ],
            'tours' => [
                ['title' => 'Presencia de los Hermanos Carrera en Santiago', 'places' => [
                    'Monumento Ecuestre.', 'Plaza de la Constitución.', 'Catedral Metropolitana.', 'Museo Histórico Nacional.', 'Monumento a Javiera Carrera.', 'Biblioteca Nacional (Primera Imprenta).',
                ]],
                ['title' => 'Encuentro con la Época Colonial', 'places' => [
                    'Iglesia San Francisco y Museo.', 'Basílica de la Merced.', 'Casa del Gobernador Don José Antonio Manso de Velasco.', 'Casa del Corregidor Don Luís Manuel Zañartu.',
                ]],
                ['title' => 'Arte y Pintura en Chile', 'places' => ['Palacio de la Alhambra.', 'Catedral Metropolitana y Museo.', 'Palacio de Bellas Artes.']],
                ['title' => 'Panorámica Cultural de Santiago', 'places' => ['Iglesia de la Veracruz.', 'Plaza Mulato Gil de Castro.', 'Cerro San Cristóbal.', 'Parque Metropolitano.']],
                ['title' => 'Barrios Antiguos de Santiago', 'places' => ['Basílica de San Alfonso.', 'Club Hípico de Santiago.', 'Palacio Cousiño.', 'Avenida República.']],
                ['title' => 'Barrio de la Chimba', 'places' => ['Iglesia de la Viñita.', 'Iglesia Recoleta Dominica.', 'Iglesia Recoleta Franciscana.', 'Iglesia Niño Jesús de Praga.']],
                ['title' => 'Tours Nocturnos', 'places' => [
                    'Santiago con Espectáculos (obras de teatro, humoristas, ballet, etc.).', 'Valparaíso - Viña con Cena y Show.', 'Santiago con Cena y Show.',
                ]],
                ['title' => 'De Compras', 'places' => ['Mall “Alto Las Condes”.', 'Mall “Parque Arauco”.', 'Fábricas, etc.']],
            ],
        ],
        [
            'id' => 'tours-dia-completo', 'title' => 'Tours de día completo',
            'flyers' => [
                ['file' => 'star-winner-dia-completo-1.jpg', 'caption' => 'Tours de día completo · programas 1–4'],
                ['file' => 'star-winner-dia-completo-2.jpg', 'caption' => 'Tours de día completo · programas 5–8'],
            ],
            'tours' => [
                ['title' => 'Histórico: “La Tierra de los Hermanos Carrera”', 'places' => [
                    'Viña Undurraga (opcional).', 'Haciendas Sta. Ana de las Palmas.', 'Chacra el Rosario.', 'La Hacienda de San Miguel del Monte.', 'Pomaire (artesanía).',
                ]],
                ['title' => 'Templo de Maipú y Valle Calera de Tango', 'places' => [
                    'Templo Votivo de Maipú (Museos Histórico y Artesanal).', 'Calera de Tango (Vestigios Agroindustriales, Padres Jesuitas alemanes siglo XVIII).', 'Pucará de Chena (opcional).',
                ]],
                ['title' => 'Fiesta en el Cajón del Maipo', 'places' => ['La viña Tarapacá, ex Zavala.', 'Las Vertientes.', 'Pata del Diablo.', 'Pueblo San José de Maipo.']],
                ['title' => 'Por la Ruta del Tren Trasandino', 'places' => ['Los Andes.', 'Estación Río Blanco.']],
                ['title' => 'Valparaíso: “Patrimonio de la Humanidad” y Viña del Mar', 'groups' => [
                    ['title' => 'Valparaíso', 'places' => ['Ascensor Polanco.', 'Cerro Playa Ancha.', 'Barrio Universitario.', 'Puerto y Caleta.', 'Cerro Alegre.', 'Palacio Bellas Artes.']],
                    ['title' => 'Viña del Mar', 'places' => ['Quinta Vergara.', 'Casino Municipal.', 'Centro Comercial.']],
                ]],
                ['title' => 'Histórico Artesanal: “Descubriendo el Valle del Cachapoal”', 'groups' => [
                    ['title' => 'Rancagua', 'places' => ['Museo Patria Vieja.', 'Catedral y Plaza Los Héroes.', 'Iglesia de la Merced.']],
                    ['title' => 'Doñihue', 'places' => ['Taller de las chamanteras Artesanales.']],
                ]],
                ['title' => 'Histórico Religioso: “Descubriendo el Valle de Santa Teresita”', 'places' => [
                    'Villorrio de Pocuro.', 'Casa ex Presidente Pedro Aguirre Cerda y Domingo Faustino Sarmiento (M / N).', 'Convento Claustro Carmelitas.',
                ], 'groups' => [
                    ['title' => 'Curimón', 'places' => ['Sta. Rosa de Viterbo.', 'Cerámica Artística.']],
                ]],
                ['title' => 'Histórico: “Descubriendo el Valle de Colchagua”', 'groups' => [
                    ['title' => 'Rancagua', 'places' => ['Sitios Históricos.']],
                    ['title' => 'Pelequén', 'places' => ['Santuario Sta. Rosa de Lima.']],
                    ['title' => 'San Fernando', 'places' => ['Sitios Históricos.']],
                    ['title' => 'Santa Cruz', 'places' => ['Museo Histórico de Colchagua.']],
                ]],
            ],
        ],
    ],
    'annual' => [
        'title' => 'Programación anual',
        'flyers' => [['file' => 'star-winner-programacion-anual.jpg', 'caption' => 'Programación anual y condiciones de Star Winner']],
        // Orden de lectura por filas: izquierda y derecha, sin ordenar por fecha.
        'events' => [
            ['date' => 'ENERO 20', 'title' => '“Trilla a Yeguas Sueltas” Los Andes'],
            ['date' => '29 de JUNIO', 'title' => '“San Pedro Pescador” Valparaíso'],
            ['date' => '30 DE AGOSTO', 'title' => '“Santa Rosa de Lima de Pelequén”'],
            ['date' => '13 de JULIO', 'title' => '“Peregrinando hasta Sta. Teresita de los Andes”'],
            ['date' => '11 DE OCTUBRE', 'title' => '“Último Combate de la Patria Vieja” (1814) Los Andes'],
            ['date' => '31 de DICIEMBRE', 'title' => '“Año Nuevo en el Mar” Valparaíso'],
        ],
        'note' => 'Consulta fechas, disponibilidad y condiciones con Star Winner.',
        'conditions' => [
            '“STAR WINNER” se responsabiliza del total cumplimiento de las programaciones, salvo en las que actúa como intermediario.',
            'Se reserva el derecho de cambiar el itinerario en beneficio de los usuarios.',
            'No se responsabiliza por pérdidas de objetos personales de los pasajeros. La empresa no asume responsabilidad alguna por enfermedades o accidentes que afecten a los pasajeros por caso fortuito, fuerza mayor o NO acatar las indicaciones del Guía de turismo.',
            '“STAR WINNER” le ofrece los más atractivos, variados y novedosos programas turísticos existentes en el mercado.',
        ],
        'footer' => 'Servicio de Guías de Turismo',
    ],
];
