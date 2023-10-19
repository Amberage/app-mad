function showAlert(message) {
    alert(message);
}

// Hacer una petición AJAX para obtener el mensaje del archivo PHP
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            showAlert(response.message);
        } else {
            showAlert('Error en la petición al servidor.');
        }
    }
};

xhr.open('GET', 'resetActividades.php', true);
xhr.send();
