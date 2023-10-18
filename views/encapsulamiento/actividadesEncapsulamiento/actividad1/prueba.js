/*Pasar las variables de PHP a JS
Fuente: https://www.youtube.com/watch?v=ev9wASpNN9A
*/
var xhr = new XMLHttpRequest();
var aciertos, actRealizada, fechaEntrega, alumnoID, alumnoUsername;

xhr.open('GET', 'control.php', false); //true para ejecutar de manera asincrona y false para hacerlo de manera asincrona
xhr.onload = function() {
    if(xhr.status === 200) {
        //var json = xhr.responseText;
        var json = JSON.parse(xhr.responseText);
        aciertos = json.aciertos;
        actRealizada = json.actRealizada;
        fechaEntrega = json.fechaEntrega;
        alumnoID = json.alumnoID;
        alumnoUsername = json.alumnoUsername;
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