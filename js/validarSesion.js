/*Este script revisa si existe una cookie existente para ahorrarnos el logeo
cada que se va al index.html */

document.addEventListener('DOMContentLoaded', function() {
    // Verificar si la cookie "userData" está presente
    const userDataCookie = getCookie('userData');

    if (userDataCookie) {
        // La cookie "userData" existe, redirigir a home.html
        window.location.href = '../views/home.html';
    }
});

// Función para obtener el valor de una cookie por su nombre
function getCookie(cookieName) {
    const name = cookieName + '=';
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');

    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i].trim();

        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }

    return null;
}
