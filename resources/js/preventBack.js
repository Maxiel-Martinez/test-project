// preventBack.js

// Este script previene que el usuario retroceda en el historial del navegador
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
    window.location.replace(document.URL);
});
