/* Para preguntas: Calificar respuestas */
var aciertosActividad = 0;
function calificarRespuestas() {
  var aciertosActividad = 0;
  let todosCamposCompletos = true;

  const respuestasCorrectas = {
    q1: "a",
    q2: "c",
    q3: "a",
    q4: "b",
    q5: "b"
  };

  Object.keys(respuestasCorrectas).forEach((id) => {
    const selectElement = document.getElementById(id);
    const seleccion = selectElement.value;

    if (seleccion === "") {
      todosCamposCompletos = false;
    } else if (respuestasCorrectas[id] === seleccion) {
      aciertosActividad += 1;
    }
  });

  if (!todosCamposCompletos) {
    errorRespuestas.innerHTML =
      "Conteste la última pregunta para poder enviar sus respuestas.";
  } else {
    errorRespuestas.innerHTML = "";
    btnSubmit.style.display = "none";
    btnPrev.style.display = "none";
    btnNext.style.display = "none";

    resultadoElement.innerHTML = `Aciertos obtenidos: <span style="color: green">${aciertosActividad}/8</span>`;

    /*Mandar los resultados a la la BBDD*/
    var xhr = new XMLHttpRequest();
    // Configurar una solicitud POST al archivo PHP
    xhr.open("POST", "enviarAciertos.php", false);

    // Establecer una función que se ejecutará cuando la solicitud se complete
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Manejar la respuesta del servidor (si es necesario)
        console.log(xhr.responseText);
      }
    };
    // Establecer el encabezado de la solicitud para enviar datos como un formulario
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Enviar la variable al servidor
    xhr.send("aciertosActividad=" + aciertosActividad);
    /* fin del envio */

    setTimeout(function () {
      window.location.href = "retroalimentacion.html";
    }, 2500);
  }
}
