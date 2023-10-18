// Realizar una solicitud AJAX para obtener los datos del archivo.php
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            const actData = JSON.parse(xhr.responseText);
            // Aquí puedes acceder a las variables recuperadas
            const aciertos = actData.aciertos;
            const actRealizada = actData.actRealizada;
            const fechaEntrega = actData.fechaEntrega;
            const alumnoID = actData.alumnoID;
            const alumnoUsername = actData.alumnoUsername;

            // Haz lo que necesites con las variables
            console.log('Aciertos:', aciertos);
            console.log('Actividad Realizada:', actRealizada);
            console.log('Fecha de Entrega:', fechaEntrega);
            console.log('ID del Alumno:', alumnoID);
            console.log('Nombre de Usuario del Alumno:', alumnoUsername);
        } else {
            console.error('Hubo un error al obtener los datos:', xhr.status, xhr.statusText);
        }
    }
};

xhr.open('GET', 'control.php', true);
xhr.send();
