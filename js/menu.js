document.addEventListener('DOMContentLoaded', function() {
    var nav = document.getElementById('site-navigation');
    var button = nav.getElementsByClassName('menu-toggle')[0];
    
    if (undefined === button) return;

    button.onclick = function() {
        if (-1 !== nav.className.indexOf('toggled')) {
            nav.className = nav.className.replace(' toggled', '');
            button.setAttribute('aria-expanded', 'false');
        } else {
            nav.className += ' toggled';
            button.setAttribute('aria-expanded', 'true');
        }
    };
});