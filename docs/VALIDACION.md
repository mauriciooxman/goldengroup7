# Validación local · 22 octubre 2026

Segunda propuesta visual: PHP y JavaScript sin errores de sintaxis; pruebas HTTP de cinco páginas, nueve recursos y ocho combinaciones de entorno aprobadas. Los textos de presentación y las listas se compararon antes y después: se conservan completos. `app/content.php`, `app/config.php` y el componente de contacto flotante conservan sus hashes. También se comprobó la lógica del menú y del movimiento reducido en Node con un DOM simulado, el anidamiento HTML y el contraste numérico de seis pares principales de colores (mínimo 4,5:1). El navegador no está disponible: no se aprobaron comprobaciones visuales de escritorio, celular, contraste sobre fotografías ni ausencia de desbordamiento horizontal. Las reglas responsive y la navegación sin JavaScript se revisaron en código.

## Ejecutado y aprobado

- Sintaxis de los 12 archivos PHP con PHP 8.3.16, usando `-n` para omitir el php.ini local que referencia una extensión XML ausente.
- Sintaxis de JavaScript mediante `node --check`.
- Pruebas HTTP con servidor integrado real: las cinco páginas responden 200, tienen un H1, títulos y descripciones distintos, metadatos Open Graph y enlaces internos válidos.
- Ocho recursos locales responden correctamente. Imágenes con dimensiones y textos alternativos; sin dependencias de Wix en el HTML servido.
- Los tres `mailto:` coinciden con los contactos publicados. Ausencia de formulario y enlaces WhatsApp sin configurar. No se comprobó entrega de correo ni se enviaron mensajes.
- 404 real para rutas inexistentes, antiguas aún sin redirección, recursos ausentes e intentos de acceso a configuración/documentación. No se expone el código privado en estas respuestas.
- SEO en cinco combinaciones de entorno: preview sin dominio, producción con origen HTTPS de prueba local, producción sin dominio, producción con HTTP inválido y preview con origen definido. Preview e información incompleta mantienen noindex, omiten canonical y no entregan sitemap; producción válida genera canonical y sitemap de cinco URLs. Las pruebas no publican ni solicitan el origen simulado.

## Revisión de código realizada

Navegación semántica visible sin JavaScript. Mejora progresiva del menú móvil con botón nativo, `aria-controls`, estado `aria-expanded`, cierre con Escape y retorno de foco. Enlaces con foco visible, enlace para saltar al contenido, rejillas adaptables, tamaños fluidos y respeto por `prefers-reduced-motion`. No hay carruseles ni carga de fuentes o scripts externos. Estas observaciones son del código, no equivalen a pruebas de interacción en navegador.

## Pendiente de comprobación visual y manual

Actualización de logo y accesos flotantes: se comprobó el margen del PNG original (1200 × 400 px), se encuadró su emblema mediante CSS y se ampliaron sus tamaños con reglas separadas para escritorio y móvil. Se añadieron pruebas HTTP de controles deshabilitados sin enlaces en preview, ocultos en producción sin datos y correo funcional solo cuando es válido. El bloque sticky pertenece a `main` y precede al footer para limitar su desplazamiento. El navegador volvió a devolver un inventario vacío, por lo que estos cambios tampoco tienen una comprobación visual aprobada en escritorio o móvil.

La herramienta de navegador devolvió un inventario vacío; no fue posible abrir una previsualización ni capturar pantallas. No se dan por aprobados el diseño a tamaños concretos, la ausencia de desbordamiento horizontal, el uso real del menú con teclado ni su comportamiento con lector de pantalla.

Al abrir la propuesta, revisar las cinco páginas a 360/390 px, 768 px y 1440 px: legibilidad, recortes, espacios, foco con Tab/Shift+Tab, Enter/Espacio en el menú, cierre con Escape, cambio de orientación y navegación con JavaScript desactivado. Comprobar que no haya desplazamiento lateral ni enlaces ocultos alcanzables en el menú cerrado. Verificar apertura del cliente de correo. Contrastar logos e ilustraciones con la clienta.

Apache/cPanel, reglas `.htaccess`, TLS, correo y DNS no se probaron en un hosting: el alcance fue exclusivamente local. La disponibilidad de PHP mantenido y módulos del servidor debe confirmarse antes del despliegue.
