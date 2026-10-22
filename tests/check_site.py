"""Checks de integración sin dependencias. No navega ni modifica sitios externos."""
import os
from pathlib import Path
import socket
import subprocess
import time
from html.parser import HTMLParser
from urllib.error import HTTPError
from urllib.parse import urlsplit
from urllib.request import urlopen
from xml.etree import ElementTree

ROOT = Path(__file__).resolve().parents[1]
ROUTES = ['/', '/contacto', '/star-winner-turismo', '/master-academia-productora', '/aureola-mistica']
EMAILS = {'Goldengroup7@yahoo.com', 'Starwinner@gmail.com', 'Masterproducciones6@gmail.com'}


class Page(HTMLParser):
    def __init__(self):
        super().__init__()
        self.links, self.assets, self.metas, self.ids, self.fragments = [], [], {}, set(), []
        self.h1 = 0
        self.canonical = ''
        self.title = ''
        self.in_title = False
        self.floating_controls = []

    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        if 'contact-float' in a.get('class', '').split():
            self.floating_controls.append((tag, a))
        if tag == 'h1': self.h1 += 1
        if tag == 'title': self.in_title = True
        if 'id' in a: self.ids.add(a['id'])
        if tag == 'a': self.links.append(a.get('href', ''))
        if tag == 'meta': self.metas[a.get('name', a.get('property', ''))] = a.get('content', '')
        if tag == 'link' and a.get('rel') == 'canonical': self.canonical = a['href']
        if tag == 'link' and a.get('rel') in ('stylesheet', 'icon'): self.assets.append(a['href'])
        if tag == 'script' and 'src' in a: self.assets.append(a['src'])
        if tag == 'img':
            assert a.get('alt') and a.get('width') and a.get('height'), a
            self.assets.append(a['src'])

    def handle_endtag(self, tag):
        if tag == 'title': self.in_title = False

    def handle_data(self, data):
        if self.in_title: self.title += data


def run_mode(mode, production_url, expected_index, contact_email=''):
    with socket.socket() as sock:
        sock.bind(('127.0.0.1', 0))
        port = sock.getsockname()[1]
    base = f'http://127.0.0.1:{port}'
    env = dict(os.environ, GG_ENV=mode, GG_PRODUCTION_URL=production_url,
               GG_WHATSAPP='', GG_CONTACT_EMAIL=contact_email)
    proc = subprocess.Popen(['php', '-n', '-S', f'127.0.0.1:{port}', '-t', 'public', 'public/router.php'],
                            cwd=ROOT, env=env, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL,
                            creationflags=subprocess.CREATE_NO_WINDOW if os.name == 'nt' else 0)

    def fetch(path):
        try:
            with urlopen(base + path, timeout=3) as response:
                return response.status, response.headers, response.read()
        except HTTPError as error:
            return error.code, error.headers, error.read()

    try:
        for _ in range(50):
            try:
                fetch('/')
                break
            except OSError:
                time.sleep(.1)
        else: raise AssertionError('No se inició PHP')
        titles, descriptions = set(), set()
        asset_paths = set()
        for route in ROUTES:
            status, headers, content = fetch(route)
            assert status == 200, route
            html = content.decode('utf-8')
            assert 'Warning:' not in html and 'Fatal error' not in html
            assert 'wa.me' not in html and '<form' not in html and 'wixstatic' not in html
            assert 'Content-Security-Policy' in headers
            page = Page()
            page.feed(html)
            email_configured = contact_email in EMAILS
            expected_controls = (int(email_configured) if mode == 'production' else 2)
            assert len(page.floating_controls) == expected_controls
            for tag, attrs in page.floating_controls:
                assert attrs.get('aria-label') and attrs.get('title')
                if tag == 'button':
                    assert 'disabled' in attrs and 'href' not in attrs
                    assert mode != 'production'
                else:
                    assert tag == 'a' and email_configured
                    assert attrs['href'] == 'mailto:' + contact_email
            if page.floating_controls:
                assert html.index('class="contact-dock"') < html.index('</main>') < html.index('<footer')
            assert page.h1 == 1, route
            assert page.title and page.title not in titles
            assert page.metas['description'] and page.metas['description'] not in descriptions
            titles.add(page.title)
            descriptions.add(page.metas['description'])
            assert page.metas['og:title'] and page.metas['og:description']
            assert page.metas['robots'] == ('index, follow' if expected_index else 'noindex, nofollow')
            assert page.canonical == (production_url + route if expected_index else '')
            assert ('X-Robots-Tag' not in headers) == expected_index
            mails = {link[7:] for link in page.links if link.startswith('mailto:')}
            assert mails == EMAILS
            for link in page.links:
                if link.startswith('#'):
                    assert link[1:] in page.ids
                elif link.startswith('/'):
                    assert urlsplit(link).path in ROUTES, link
                    assert fetch(link)[0] == 200, link
                else:
                    assert link.startswith('mailto:'), link
            asset_paths.update(page.assets)
        for asset in asset_paths:
            assert asset.startswith('/assets/'), asset
            status, headers, content = fetch(asset)
            assert status == 200 and content, asset
            assert 'text/html' not in headers.get('Content-Type', ''), asset
        for route in ['/no-existe', '/app/config.php', '/docs/CONTENIDO.md', '/.git/config', '/inicio', '/acerca-de-1', '/acerca-de', '/assets/no-existe.svg', '/router.php']:
            status, _, content = fetch(route)
            assert status == 404 and b'ERROR 404' in content, route
            assert b'production_url' not in content
        _, _, robots = fetch('/robots.txt')
        assert (b'Allow: /' in robots) == expected_index
        status, _, content = fetch('/sitemap.xml')
        assert status == (200 if expected_index else 404)
        if expected_index:
            tree = ElementTree.fromstring(content)
            urls = [item.text for item in tree.findall('.//{*}loc')]
            assert urls == [production_url + route for route in ROUTES]
        print(f'OK {mode}, origen {"válido" if expected_index else "deshabilitado"}: 5 páginas, {len(asset_paths)} recursos, enlaces, contactos, 404, privacidad y SEO')
    finally:
        proc.terminate()
        proc.wait(timeout=5)


if __name__ == '__main__':
    run_mode('preview', '', False)
    # Origen reservado solo en el subproceso local, nunca una propuesta comercial.
    run_mode('production', 'https://seo.test', True)
    run_mode('production', '', False)
    run_mode('production', 'http://seo.test', False)
    run_mode('preview', 'https://seo.test', False)
    run_mode('preview', '', False, 'Goldengroup7@yahoo.com')
    run_mode('production', '', False, 'Goldengroup7@yahoo.com')
    run_mode('production', '', False, 'sin-correo')
