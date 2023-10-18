var xhr = new XMLHttpRequest();
xhr.open('GET', 'control.php');
xhr.onload = function() {
    if(xhr.status === 200) {
        var json = xhr.responseText;
        console.log(json);
    } else {
        console.log("Error al cargar el servidor");
    }
}
xhr.send();
