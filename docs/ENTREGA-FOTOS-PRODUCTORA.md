# Fotografías de Productora · entrega local

Composición exclusiva de `/master-academia-productora`. A partir de 1180 px: Aladino y modelaje 1 a la izquierda; Productora al centro; Sailor Moon y modelaje 2 a la derecha; bailarines debajo, en la columna central. Por debajo de 1180 px se muestra Productora primero y luego una galería de dos columnas; por debajo de 560 px, una columna. Academia permanece como bloque independiente.

## Archivos y destinos exactos en cPanel

| Archivo local modificado o nuevo | Destino |
| --- | --- |
| `app/partials/area.php` | `/home/goldengr/app/partials/area.php` |
| `app/partials/producer-photos.php` | `/home/goldengr/app/partials/producer-photos.php` |
| `public/assets/proposal-v2.css` | `/home/goldengr/public_html/assets/proposal-v2.css` |
| `public/assets/productora-aladino.webp` | `/home/goldengr/public_html/assets/productora-aladino.webp` |
| `public/assets/productora-aladino-original.jpg` | `/home/goldengr/public_html/assets/productora-aladino-original.jpg` |
| `public/assets/productora-sailor-moon.webp` | `/home/goldengr/public_html/assets/productora-sailor-moon.webp` |
| `public/assets/productora-sailor-moon-original.jpg` | `/home/goldengr/public_html/assets/productora-sailor-moon-original.jpg` |
| `public/assets/productora-modelaje-infantil-1.webp` | `/home/goldengr/public_html/assets/productora-modelaje-infantil-1.webp` |
| `public/assets/productora-modelaje-infantil-1-original.jpg` | `/home/goldengr/public_html/assets/productora-modelaje-infantil-1-original.jpg` |
| `public/assets/productora-modelaje-infantil-2.webp` | `/home/goldengr/public_html/assets/productora-modelaje-infantil-2.webp` |
| `public/assets/productora-modelaje-infantil-2-original.jpg` | `/home/goldengr/public_html/assets/productora-modelaje-infantil-2-original.jpg` |
| `public/assets/productora-bailarines.webp` | `/home/goldengr/public_html/assets/productora-bailarines.webp` |
| `public/assets/productora-bailarines-original.jpg` | `/home/goldengr/public_html/assets/productora-bailarines-original.jpg` |

Este documento es nuevo y solo local; no subirlo a `public_html`. No se modificaron los textos de servicios, los contactos, `app/config.php`, rutas, HTTPS ni la configuración de producción.

## Originales inspeccionados

Todos están en `public/assets/` y permanecen sin sobrescribir.

| Original | Identificación y dimensiones |
| --- | --- |
| `WhatsApp Image 2026-11-08 at 19.48.42.jpeg` | Aladino, 1600 × 1150 |
| `WhatsApp Image 2026-11-08 at 19.48.42 (1).jpeg` | Sailor Moon, 1600 × 1191 |
| `WhatsApp Image 2026-11-08 at 19.48.42 (2).jpeg` | Modelaje infantil 1, 1200 × 1600 |
| `WhatsApp Image 2026-11-08 at 19.48.43.jpeg` | Modelaje infantil 2, 1119 × 1600 |
| `WhatsApp Image 2026-11-08 at 19.48.43 (1).jpeg` | Bailarines de negro, 1279 × 1502 |

Las copias `-original.jpg` son idénticas a sus respectivos JPEG, comprobado mediante SHA-256. Permiten abrir el original con nombre legible y una extensión ya admitida por el router, sin alterar sus reglas.

## Ajustes realmente aplicados

Se utilizó Pillow, que ya estaba instalado, sin añadir dependencias ni generar imágenes. Solo las copias WebP recibieron estas operaciones globales:

- Luminosidad multiplicada por 1.02 y contraste por 1.025.
- Corrección suave de dominantes por canal, según la tabla siguiente.
- Máscara de enfoque de radio 0.7, intensidad 35 y umbral 4.
- Codificación WebP con calidad 88 y método 6.

| Fotografía | Multiplicador rojo | Verde | Azul |
| --- | --- | --- | --- |
| Aladino | 0.99 | 1.015 | 0.99 |
| Sailor Moon | 0.99 | 1.04 | 0.98 |
| Modelaje 1 | 1.03 | 1.02 | 0.96 |
| Modelaje 2 | 1.02 | 1.02 | 0.97 |
| Bailarines | 1.00 | 1.035 | 0.98 |

Sin recortes, ampliación, reconstrucción, retoque localizado de personas ni cambios de saturación. No se aplicó reducción de ruido para conservar el detalle de las fotografías. Se mantienen exactamente las dimensiones originales. Se revisó visualmente una comparación de las cinco copias frente a los originales; no implica una revisión del renderizado de la página.

## Validación

- Sintaxis PHP correcta en los dos archivos de plantilla de esta ronda.
- Pruebas HTTP aprobadas: seis páginas, 26 recursos, enlaces, contactos, 404, preview y producción simulada.
- Cinco imágenes en el orden solicitado, dimensiones explícitas, carga diferida y enlaces accesibles a los originales en otra pestaña.
- Listas y textos completos de Academia y Productora conservados.
- HTML de Aureola Mística, Star Winner y Alemania idéntico al anterior a esta ronda.
- Reglas CSS revisadas para las tres distribuciones, sin posicionamiento absoluto ni recortes en esta composición.

La inspección del renderizado en escritorio y móvil queda por confirmar por separado mediante navegador. No se publicó, hizo commit ni push.
