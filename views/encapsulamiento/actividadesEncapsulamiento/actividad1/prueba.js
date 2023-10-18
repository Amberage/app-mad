var xhr = new XMLHttpRequest();
var aciertos, actRealizada, fechaEntrega, alumnoID, alumnoUsername;

xhr.open('GET', 'control.php');
xhr.onload = function() {
    if(xhr.status === 200) {
        var json = xhr.responseText;
        var aciertos = json[0].aciertos;
        var actRealizada = json[0].actRealizada;
        var fechaEntrega = json[0].fechaEntrega;
        var alumnoID = json[0].alumnoID;
        var alumnoUsername = json[0].alumnoUsername;
    } else {
        console.log("Error al cargar el servidor");
    }
}
xhr.send();

console.log(aciertos);
console.log(actRealizada);
console.log(fechaEntrega);
console.log(alumnoID);
console.log(alumnoUsername);