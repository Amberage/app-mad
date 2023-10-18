/* Para preguntas: Calificar respuestas */
function calificarRespuestas() {
  let puntaje = 0;
  let todosCamposCompletos = true;

  const respuestasCorrectas = {
    q1: "si",
    q2: "no",
    q3: "si",
    q4: "si",
    q5: "no",
    q6: "si",
    q7: "no",
    q8: "no",
  };

  Object.keys(respuestasCorrectas).forEach((id) => {
    const selectElement = document.getElementById(id);
    const seleccion = selectElement.value;

    if (seleccion === "") {
      todosCamposCompletos = false;
    } else if (respuestasCorrectas[id] === seleccion) {
      puntaje += 1;
    }
  });

  if (!todosCamposCompletos) {
    errorRespuestas.innerHTML = "Conteste la última pregunta para poder enviar sus respuestas.";
  } else {
    errorRespuestas.innerHTML = "";
    btnSubmit.style.display = 'none';
    btnPrev.style.display = 'none';
    btnNext.style.display = 'none';

    resultadoElement.innerHTML = `Puntaje obtenido: <span style="color: green">${puntaje}/8</span>`;
    setTimeout(function () {
      window.location.href = "actividad1_Encapsulamiento.html";
    }, 2500);
  }
}
