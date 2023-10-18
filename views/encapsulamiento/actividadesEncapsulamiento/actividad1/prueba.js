// Contenido de prueba.js

// Imprimir el JSON en la consola
console.log("JSON Data:", actDataJSON);

// Acceder a las variables del JSON
var actData = JSON.parse(actDataJSON);

// Acceso a variables individualmente
console.log('Aciertos:', actData.aciertos);
console.log('ActRealizada:', actData.actRealizada);
console.log('Fecha de Entrega:', actData.fechaEntrega);
console.log('Alumno ID:', actData.alumnoID);
console.log('Alumno Username:', actData.alumnoUsername);
