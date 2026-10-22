# Lanzamiento y migración · no ejecutados

## Inventario inicial y equivalencias

| Ruta antigua en el .com | Ruta nueva equivalente |
| --- | --- |
| `/` | `/` |
| `/inicio` | `/star-winner-turismo` |
| `/acerca-de-1` | `/master-academia-productora` |
| `/acerca-de` | `/aureola-mistica` |

`/contacto` es una página nueva. Inventario basado en la navegación de las cuatro páginas consultadas; ampliar con sitemap antiguo, Search Console, analítica disponible y enlaces entrantes antes de cerrar el mapa. No se consultaron cuentas privadas ni se afirma que estas sean todas las URLs históricas.

## Antes de lanzar

1. Confirmar registro y titularidad del nuevo `.cl`, versión canónica con/sin www, certificados HTTPS, servicios incluidos en el hosting y respaldo de archivos/configuraciones. Nada de esto se modificó.
2. Inventariar y exportar DNS del `.com` y del `.cl` si existe: NS, A, AAAA, CNAME, MX, TXT (SPF, DKIM, DMARC y verificaciones), CAA y subdominios. Revisar TTL y preservar correo y verificaciones. No proponer ni aplicar cambios de DNS sin ese inventario y un plan aprobado.
3. Desplegar estructura privada/pública indicada en README, inicialmente en preview. Confirmar contenido y recursos; probar en móvil/tablet/escritorio y con teclado.
4. Configurar origen HTTPS real en `GG_PRODUCTION_URL` y `GG_ENV=production`. Verificar canonical propio, Open Graph, sitemap con cinco URLs y robots indexable. Mantener otras previsualizaciones en noindex. Unificar HTTP/HTTPS y www/sin www en el servidor, evitando bucles.

## Redirecciones permanentes

`redirects-301.htaccess.example` contiene ejemplos **comentados y desactivados**. Solo adaptarlos después de confirmar el origen nuevo. Deben instalarse donde se atiendan las solicitudes del `.com`, incluidas ambas variantes www/sin www y HTTP/HTTPS. Un `.htaccess` instalado solamente en el `.cl` no redirige por sí solo el `.com`; se debe mantener servicio y certificado para el dominio anterior.

Cada URL antigua conduce a su equivalente en un salto. No enviar todas a la portada. Para URLs históricas adicionales, decidir equivalencia individual o devolver 404/410 si no hay contenido sustituto. Las rutas antiguas devuelven 404 en este desarrollo: las redirecciones aún no están activas.

## Verificación de lanzamiento

- Comprobar con `curl -I` cada URL antigua, ambas variantes de host y protocolo: 301, Location correcta, sin bucles ni cadenas; destino final 200. Revisar también parámetros y enlaces de campañas.
- Confirmar 404 real, ausencia de noindex solo en producción aprobada, canonical único y recursos HTTPS locales.
- Verificar ambas propiedades en Search Console conservando sus registros DNS, enviar el nuevo sitemap y usar el cambio de dirección cuando corresponda a la migración. Vigilar indexación, 404 y cobertura.
- Conservar el dominio y las redirecciones antiguas al menos un año y, de ser posible, de forma indefinida. Actualizar enlaces propios y perfiles. Verificar que correo y verificaciones continúan funcionando. Mantener respaldo para reversión y monitorizar ambos dominios.
