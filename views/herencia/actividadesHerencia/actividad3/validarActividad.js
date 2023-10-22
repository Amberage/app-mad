/*Control de vistas para las actividades*/
var xhr = new XMLHttpRequest();
var actRealizada, aciertosOriginal, fechaEntregaOriginal;

xhr.open("GET", "validarActividad.php", false); //true para ejecutar de manera asincrona y false para hacerlo de manera asincrona
xhr.onload = function () {
  if (xhr.status === 200) {
    //var json = xhr.responseText;
    var json = JSON.parse(xhr.responseText);
    actRealizada = json.actRealizada;
    aciertosOriginal = json.aciertos;
    fechaEntregaOriginal = json.fechaEntrega;

  } else {
    console.log("Error al cargar el servidor");
  }
};
xhr.send();

function generalCheck() {
  if (actRealizada === "Si") {
    window.location.href = "retroalimentacion.html";
  } else if (actRealizada === "No") {
    window.location.href = "cuestionario.html";
  } else if (window.location.pathname !== "/index.html") {
    window.location.href = "/index.html";
  }
}

function cuestionarioCheck() {
  if (actRealizada === "Si") {
    window.location.href = "retroalimentacion.html";
  }
}

function retroalimentacionCheck() {
  if (actRealizada === "No") {
    window.location.href = "/index.html";
  }
}
