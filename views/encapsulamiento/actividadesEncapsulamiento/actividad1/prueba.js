var variableJS = "Hola desde JavaScript";

// Crear un objeto XMLHttpRequest
var xhr = new XMLHttpRequest();

// Configurar una solicitud POST al archivo PHP
xhr.open("POST", "prueba.php", true);

// Establecer una función que se ejecutará cuando la solicitud se complete
xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        // Manejar la respuesta del servidor (si es necesario)
        console.log(xhr.responseText);
    }
};

// Establecer el encabezado de la solicitud para enviar datos como un formulario
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Enviar la variable al servidor
xhr.send("variablePHP=" + variableJS);