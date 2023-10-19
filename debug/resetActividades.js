function resetEncapsulamiento() {
    var xhr = new XMLHttpRequest();
    var serverMsg;

    xhr.open("GET", "/debug/resetActividades.php", false);
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