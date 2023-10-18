# Como generar nuevas actividades a raiz de esta  
1. En calificarRespuestas asignar las nuevas respuestas a las preguntas.
2. En el control.php cambiar la sintaxys SQL para apuntar al numero de actividad deseado y tabla deseada [Linea 29]  
3. En cuestionario y retroalimentacion cambiar los titulos

# Comunicación PHP -> JavaScript
```javascript
/*Pasar las variables de PHP a JS
Fuente: https://www.youtube.com/watch?v=ev9wASpNN9A
*/
var xhr = new XMLHttpRequest();
var aciertos, actRealizada, fechaEntrega, alumnoID, alumnoUsername;

xhr.open("GET", "control.php", false); //true para ejecutar de manera asincrona y false para hacerlo de manera asincrona
xhr.onload = function () {
  if (xhr.status === 200) {
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
};
xhr.send();

console.log(aciertos);
console.log(actRealizada);
console.log(fechaEntrega);
console.log(alumnoID);
console.log(alumnoUsername);

if (actRealizada === 'Si') {
  window.location.href = "retroalimentacion.html";
}
```
