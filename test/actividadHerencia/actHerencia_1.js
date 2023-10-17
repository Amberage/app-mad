function calificarRespuestas() {
    let puntaje = 0;
    let todosCamposCompletos = true;

    const respuestasCorrectas = {
        "auto": "terrestre",
        "avion": "aereo",
        "helicoptero": "aereo",
        "coyote": "carnivoro",
        "puma": "carnivoro",
        "jaguar": "carnivoro",
        "motocicleta": "terrestre",
        "bicicleta": "terrestre",
        "elefante": "herbivoro",
        "cebra": "herbivoro",
        "avioneta": "aereo",
        "koala": "herbivoro"
    };

    Object.keys(respuestasCorrectas).forEach(id => {
        const selectElement = document.getElementById(id);
        const seleccion = selectElement.value;

        if (seleccion === '') {
            todosCamposCompletos = false;
        } else if (respuestasCorrectas[id] === seleccion) {
            puntaje += 1;
        }
    });

    if (!todosCamposCompletos) {
        alert("Complete todos los campos");
    } else {
        resultadoElement.innerHTML = `Puntaje: <span style="color: green">${puntaje}</span>`;
    }
}
