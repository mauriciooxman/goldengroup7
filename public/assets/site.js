(() => {
  const button = document.querySelector('.menu-toggle');
  const nav = document.querySelector('#navegacion');
  if (!button || !nav) return;
  const mobile = window.matchMedia('(max-width: 900px)');
  const setOpen = (open) => {
    button.setAttribute('aria-expanded', String(open));
    nav.hidden = mobile.matches && !open;
  };
  const sync = () => { button.hidden = !mobile.matches; setOpen(false); };
  button.addEventListener('click', () => setOpen(button.getAttribute('aria-expanded') !== 'true'));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && mobile.matches && button.getAttribute('aria-expanded') === 'true') {
      setOpen(false);
      button.focus();
    }
  });
  document.addEventListener('click', (event) => {
    if (mobile.matches && !nav.contains(event.target) && !button.contains(event.target)) setOpen(false);
  });
  mobile.addEventListener('change', sync);
  sync();
})();

// Mejora progresiva: el contenido se renderiza visible incluso sin JavaScript.
(() => {
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  if (reducedMotion.matches || !('IntersectionObserver' in window) || !Element.prototype.animate) return;
  const activeAnimations = new Set();
  const observer = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;
      observer.unobserve(entry.target);
      if (reducedMotion.matches) continue;
      const animation = entry.target.animate([
        { opacity: 0.65, transform: 'translateY(22px)' },
        { opacity: 1, transform: 'translateY(0)' },
      ], { duration: 480, easing: 'cubic-bezier(.2,.65,.3,1)' });
      activeAnimations.add(animation);
      animation.finished.then(() => activeAnimations.delete(animation), () => activeAnimations.delete(animation));
    }
  }, { threshold: 0.08 });
  document.querySelectorAll('.area-card, .about-section, .cta, .service, .tourism-presentation, .contact-layout').forEach((element) => {
    // No animar la primera pantalla ni retrasar su lectura.
    if (element.getBoundingClientRect().top >= window.innerHeight) observer.observe(element);
  });
  reducedMotion.addEventListener('change', () => {
    if (!reducedMotion.matches) return;
    observer.disconnect();
    for (const animation of activeAnimations) animation.cancel();
    activeAnimations.clear();
  });
})();
