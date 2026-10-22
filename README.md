# Golden Group 7 · propuesta local

Sitio PHP renderizado en servidor, sin dependencias, compilación, base de datos ni servicios externos. Cinco páginas, componentes compartidos y recursos locales. No se ha publicado ni modificado el sitio actual.

## Ejecutar

Requiere PHP 8.3 o superior en una rama mantenida y con sus parches vigentes. Validado aquí con PHP 8.3.16; confirmar versión disponible en SoluciónHost. [Soporte oficial de PHP](https://www.php.net/supported-versions.php).

Desde esta carpeta:

```powershell
php -n -S 127.0.0.1:8080 -t public public/router.php
```

También puedes ejecutar `powershell -ExecutionPolicy Bypass -File .\iniciar-local.ps1`. Mantén la terminal abierta durante la revisión: la dirección local solo funciona mientras el servidor está ejecutándose.

Abrir http://127.0.0.1:8080. Detener con Ctrl+C. `-n` evita una advertencia del php.ini local de Laragon sobre una extensión XML ausente; el sitio no necesita esa extensión. No se modificó la configuración de Laragon. El servidor integrado es solo para desarrollo.

## Editar

- `app/config.php`: empresa, correos, redes, WhatsApp, dominio y rutas de imágenes. No se asignan correos a áreas. En producción, WhatsApp solo aparece con un número válido configurado, que debe estar confirmado por la clienta.
- Botones flotantes: `whatsapp` (`GG_WHATSAPP`, formato internacional solo dígitos) usa temporalmente el número autorizado por el usuario; `contact_email` (`GG_CONTACT_EMAIL`) usa `Goldengroup7@yahoo.com`. Ambos valores están en `app/config.php`. Una variable de entorno vacía desactiva ese canal: en preview queda deshabilitado y en producción se oculta. El número empresarial definitivo sigue pendiente.
- `app/content.php`: contenido de las tres áreas.
- `app/partials/`: cabecera, páginas, pie y llamadas a contacto.
- `public/assets/`: estilos, JavaScript, logos e ilustraciones. Sin fuentes remotas ni cookies de seguimiento.

El entorno predeterminado es `preview`: noindex en HTML y cabecera, robots bloqueado, sin canonical ni sitemap público. Solo se habilita indexación cuando `GG_ENV=production` y `GG_PRODUCTION_URL` contiene el origen HTTPS confirmado, sin barra final ni subcarpeta. Pueden configurarse como variables de entorno de PHP o en los valores de `app/config.php`. Un dominio vacío o inválido conserva noindex. No usar valores de prueba en producción.

## Despliegue futuro en cPanel

1. Confirmar PHP mantenido, Apache/mod_rewrite o compatibilidad de LiteSpeed, `AllowOverride`, HTTPS y permisos del hosting. No se ha accedido a SoluciónHost.
2. Opción preferida: colocar el proyecto fuera de `public_html` y configurar el document root del dominio exclusivamente en su carpeta `public/`.
3. Alternativa: subir **el contenido** de `public/` (incluido `.htaccess`; `router.php` es opcional) a `public_html/`; colocar `app/` en una carpeta hermana de `public_html`, fuera del directorio público. Esta disposición conserva `dirname(__DIR__) . '/app'` sin cambios.
4. No subir `docs/`, `tests/`, README, repositorios ni credenciales al directorio público. Configurar PHP con errores ocultos al visitante y registro privado; permisos habituales 755 en directorios y 644 en archivos.
5. Mantener preview hasta aprobar contenido y dominio. Después configurar producción, revisar las cinco páginas, 404, robots, sitemap y HTTPS. Ver [migración](docs/MIGRACION.md).

## Comprobaciones

```powershell
Get-ChildItem app,public -Recurse -Filter *.php | ForEach-Object { php -n -l $_.FullName }
node --check public/assets/site.js
python tests/check_site.py
```

Python y Node solo se usan para verificaciones opcionales, nunca en producción. El script prueba HTTP, enlaces y recursos, metadatos, contactos, 404, privacidad y SEO en preview, producción simulada y configuración inválida. Consulta [validación](docs/VALIDACION.md) para sus límites y la revisión manual pendiente.

Materiales, fuentes y decisiones visuales: [contenido e identidad](docs/CONTENIDO.md).
