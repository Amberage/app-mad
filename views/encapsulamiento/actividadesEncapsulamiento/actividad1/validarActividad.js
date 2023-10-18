/*Control de vistas para las actividades*/
var xhr = new XMLHttpRequest();
var actRealizada;

xhr.open("GET", "control.php", false); //true para ejecutar de manera asincrona y false para hacerlo de manera asincrona
xhr.onload = function () {
  if (xhr.status === 200) {
    //var json = xhr.responseText;
    var json = JSON.parse(xhr.responseText);
    actRealizada = json.actRealizada;
  } else {
    console.log("Error al cargar el servidor");
  }
};
xhr.send();


console.log(actRealizada);
/* if (actRealizada === 'Si') {
  window.location.href = "retroalimentacion.html";
}

if (actRealizada === 'No') {
  window.location.href = "cuestionario.html";
} */