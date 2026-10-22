# Contenido e identidad · 22 octubre 2026

## Fuentes consultadas

Se leyeron las cuatro páginas del sitio actual con la herramienta web:

| URL | Datos observados |
| --- | --- |
| https://www.goldengroup7.com/ | Nombre, misión, visión, tres áreas y tres correos |
| https://www.goldengroup7.com/inicio | Turismo cultural, viajes educativos, orientación sobre Alemania, idioma y documentación |
| https://www.goldengroup7.com/acerca-de-1 | Producción de eventos y formación en arte, patrimonio, modelaje, protocolo e imagen |
| https://www.goldengroup7.com/acerca-de | Agrupación angélica, oráculos, ceremonias, talleres y recorridos espirituales |

Los tres correos publicados son `Goldengroup7@yahoo.com`, `Starwinner@gmail.com` y `Masterproducciones6@gmail.com`. Se conservan como contactos del grupo, sin inferir responsabilidades. Su publicación no demuestra que las casillas estén operativas; no se enviaron mensajes.

Se descargaron e inspeccionaron los banners originales de Golden Group y Aureola desde los recursos públicos de Wix. Copias de referencia en `docs/reference/`; copias locales usadas en `public/assets/`. El sitio nuevo no solicita recursos a Wix. Confirmar autorización y versiones maestras antes del lanzamiento. No se pudo inspeccionar la composición del sitio completo mediante navegador: no había navegador conectado.

## Propuesta visual

Segunda propuesta: primera pantalla oscura con fotografías temáticas en capas, tipografía sans serif de sistema, navegación en cápsula y acentos dorados. Los servicios alternan imagen y texto en portada; las páginas interiores tienen cabecera panorámica y composiciones de lectura distintas. `public/assets/proposal-v2.css` aplica esta dirección sobre la base existente, sin modificar los textos revisados ni la configuración. Las imágenes siguen siendo recursos temáticos provisionales, sin atribuirlas a actividades reales del cliente.

Se conserva el logo del grupo y la referencia al negro y dorado. Fondo marfil, verde oscuro, dorado mate y títulos serif aportan una lectura más tranquila. Turismo usa verde salvia; Academia, terracota; Aureola, lavanda. Se conserva también el banner de Aureola como marca del área.

`journey.svg`, `culture.svg` y `spirit.svg` son ilustraciones vectoriales provisionales creadas para esta propuesta. Representan viaje, cultura y espiritualidad; no muestran lugares, personas ni eventos reales del cliente. Se reemplazan desde el mapa `images` en configuración, actualizando dimensiones y textos alternativos cuando corresponda. El favicon es una propuesta provisional inspirada en el motivo estrellado de la marca, no un nuevo logo oficial.

Los tres bloques de áreas de la portada usan ahora las imágenes aportadas en `public/assets/`: `starwinner-turismo.png`, `master-academia.png` y `aureola-mistica.png`. Sus rutas, dimensiones originales y textos alternativos están centralizados en `service_images` de `app/config.php`. Se usan como imágenes temáticas sin atribuirlas a eventos o personas del grupo. Las ilustraciones del hero y de las páginas interiores se conservan.

## Confirmaciones de la clienta

- Vigencia, alcance y redacción final de todos los servicios; misión y visión reformuladas. No se anuncian programas, fechas, precios ni cupos.
- Años históricos mencionados: Turismo desde 1989, Academia desde 1994 y agrupación espiritual desde 2005. Se registran aquí y no se presentan como hechos verificados al visitante. También quedan sin validar las afirmaciones de liderazgo y trayectoria del sitio anterior.
- En Aureola se resumieron las prácticas con lenguaje respetuoso, sin afirmaciones de clarividencia comprobada, curación o resultados garantizados. No se mantienen promesas de salud ni de cambio de destino.
- Funcionamiento y titularidad de los tres correos, y cuál corresponde a cada área si se desea diferenciarlos.
- Accesos flotantes activados por petición del usuario: WhatsApp usa temporalmente su número autorizado y el correo apunta a `Goldengroup7@yahoo.com`; valores centralizados en configuración. Sustituir el número temporal cuando se confirme el empresarial definitivo. Se mantienen los demás correos históricos. Redes sociales y dirección física: no confirmadas; no se muestran.
- Fotografías definitivas, autorización de uso de logos y archivos de mayor calidad. No se reutilizaron las fotografías de terceros del sitio anterior.
- Dominio `.cl` definitivo, registro, acceso y elección de versión con o sin www: pendientes.
