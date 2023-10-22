//Resetar Encapsulamiento
function resetEncapsulamiento() {
    var xhr = new XMLHttpRequest();
    var serverMsg;

    xhr.open("GET", "/debug/resetEncapsulamiento.php", false);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var json = JSON.parse(xhr.responseText);
            alert(JSON.stringify(json));
        } else {
            console.log("Error al cargar el servidor");
        }
    };
    xhr.send();
}

//Resetear Herencia
function resetHerencica() {
    var xhr = new XMLHttpRequest();
    var serverMsg;

    xhr.open("GET", "/debug/resetHerencia.php", false);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var json = JSON.parse(xhr.responseText);
            alert(JSON.stringify(json));
        } else {
            console.log("Error al cargar el servidor");
        }
    };
    xhr.send();
}