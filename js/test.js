function loadContent(type) {
    switch(type) {
        case 'users':
            window.location.href = 'home.php';
            break;
        case 'about':
            window.location.href = 'about.html';
            break;
        case 'contact':
            window.location.href = 'contact.html';
            break;
        default:
            window.location.href = '404.html'; // Redirect to a 404 or error page if the value doesn't match any case
    }
}

