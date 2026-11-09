# Programas de Star Winner · entrega local

Se incorporaron los folletos en `/star-winner-turismo`, después de la presentación y antes del enlace único a Alemania: Reina Isabel II, medio día, día completo y programación anual. Se mantienen las demás áreas, contactos, rutas y configuración.

## Archivos para cPanel

| Archivo local | Destino exacto |
| --- | --- |
| `app/partials/area.php` | `/home/goldengr/app/partials/area.php` |
| `app/tourism-programs.php` | `/home/goldengr/app/tourism-programs.php` |
| `app/partials/tourism-programs.php` | `/home/goldengr/app/partials/tourism-programs.php` |
| `app/partials/tour-flyers.php` | `/home/goldengr/app/partials/tour-flyers.php` |
| `app/partials/tour-contact.php` | `/home/goldengr/app/partials/tour-contact.php` |
| `public/assets/proposal-v2.css` | `/home/goldengr/public_html/assets/proposal-v2.css` |
| `public/assets/star-winner-reina-isabel-valparaiso.jpg` | `/home/goldengr/public_html/assets/star-winner-reina-isabel-valparaiso.jpg` |
| `public/assets/star-winner-medio-dia-1.jpg` | `/home/goldengr/public_html/assets/star-winner-medio-dia-1.jpg` |
| `public/assets/star-winner-medio-dia-2.jpg` | `/home/goldengr/public_html/assets/star-winner-medio-dia-2.jpg` |
| `public/assets/star-winner-dia-completo-1.jpg` | `/home/goldengr/public_html/assets/star-winner-dia-completo-1.jpg` |
| `public/assets/star-winner-dia-completo-2.jpg` | `/home/goldengr/public_html/assets/star-winner-dia-completo-2.jpg` |
| `public/assets/star-winner-programacion-anual.jpg` | `/home/goldengr/public_html/assets/star-winner-programacion-anual.jpg` |

Las seis imágenes JPG son copias idénticas, verificadas por SHA-256, de los originales JPEG. No se recortaron, convirtieron ni editaron. Los originales permanecen intactos.

| Original en `public/assets/` | Copia utilizada |
| --- | --- |
| `WhatsApp Image 2026-11-08 at 19.24.53.jpeg` | `star-winner-reina-isabel-valparaiso.jpg` |
| `WhatsApp Image 2026-11-08 at 19.26.24.jpeg` | `star-winner-medio-dia-1.jpg` |
| `WhatsApp Image 2026-11-08 at 19.26.24 (1).jpeg` | `star-winner-medio-dia-2.jpg` |
| `WhatsApp Image 2026-11-08 at 19.26.24 (2).jpeg` | `star-winner-dia-completo-1.jpg` |
| `WhatsApp Image 2026-11-08 at 19.26.24 (3).jpeg` | `star-winner-dia-completo-2.jpg` |
| `WhatsApp Image 2026-11-08 at 19.26.24 (4).jpeg` | `star-winner-programacion-anual.jpg` |

También se modificó `tests/check_site.py` para verificar los enlaces de ampliación a recursos locales. Este documento y las pruebas son solo locales: no subirlos a `public_html`.

## Transcripción

Se revisaron los seis originales ampliados. No quedaron fragmentos ilegibles identificados. Se conserva literalmente «Taller de las chamanteras Artesanales» y la abreviatura «M / N», sin corregirlos ni interpretarlos.

La programación anual conserva el orden de lectura por filas: ENERO 20, 29 de JUNIO, 30 DE AGOSTO, 13 de JULIO, 11 DE OCTUBRE y 31 de DICIEMBRE. No se asignó año a las salidas; 1814 se conserva como parte del nombre histórico del programa. Las condiciones se transcriben en un bloque secundario asociado a la programación.

## Validación

- Sintaxis PHP de los cinco archivos PHP de esta entrega.
- Pruebas HTTP de seis páginas, 16 recursos, enlaces, contactos, 404, preview y producción simulada; sitemap y canonical conservados.
- Comprobación específica de 17 programas, seis actividades anuales, dos actividades opcionales y 23 mensajes de WhatsApp con nombre de programa.
- Seis imágenes completas con proporciones originales y 12 enlaces de ampliación a otra pestaña; igualdad binaria con los originales.
- Enlace único de Alemania después de toda la programación; los nuevos bloques no se renderizan en otras áreas.

La revisión del renderizado en escritorio y móvil debe confirmarse por separado; las verificaciones anteriores no sustituyen una inspección visual del navegador.

No se modificaron `app/config.php`, `.htaccess`, el router ni las reglas de HTTPS en esta ronda. No sobrescribir la configuración de producción al trasladar estos cambios. No se publicó, hizo commit ni push.
