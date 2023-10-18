/*Pasar las variables de PHP a JS
Fuente: https://www.youtube.com/watch?v=ev9wASpNN9A
*/
var xhr = new XMLHttpRequest();
var aciertos, actRealizada, fechaEntrega, alumnoID, alumnoUsername;

xhr.open('GET', 'control.php');
xhr.onload = function() {
    if(xhr.status === 200) {
        var json = xhr.responseText;
        var aciertos = json.aciertos;
        var actRealizada = json.actRealizada;
        var fechaEntrega = json.fechaEntrega;
        var alumnoID = json.alumnoID;
        var alumnoUsername = json.alumnoUsername;

        console.log(aciertos);
        console.log(actRealizada);
        console.log(fechaEntrega);
        console.log(alumnoID);
        console.log(alumnoUsername);
    } else {
        console.log("Error al cargar el servidor");
    }
}
xhr.send();

console.log("1"+aciertos);
console.log("1"+actRealizada);
console.log("1"+fechaEntrega);
console.log("1"+alumnoID);
console.log("1"+alumnoUsername);