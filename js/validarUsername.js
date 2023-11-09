/* Este script consulta en la BBDD si ya existe el username del usuario que desea registrarse */

// Event listener para el formulario de registro
document
  .getElementById("registerForm")
  .addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    const response = await enviarDatosAlServidor(formData);

    if (response.error) {
      mostrarMensajeRegistro(response.message, true);
    } else {
      mostrarMensajeRegistro(response.message, false);
      setTimeout(() => {
        window.location.href = '/views/login.html'; // Redirige a la página principal
      }, 2000); // Redirige después de 2 segundos (puedes ajustar el tiempo)
    }
  });

// Función para enviar datos al servidor
async function enviarDatosAlServidor(formData) {
  try {
    const response = await fetch("/php/register.php", {
      method: "POST",
      body: formData,
    });

    if (!response.ok) {
      throw new Error("Error al enviar los datos al servidor.");
    }

    return await response.json();
  } catch (error) {
    const errorMessage = `Hubo un error al comunicarse con el servidor: ${error.message}`;
    return {
      error: true,
      message: errorMessage,
    };
  }
}

// Función para mostrar mensajes
function mostrarMensajeRegistro(mensaje, esError) {
  const mensajeRegistro = document.getElementById("mensajeRegistro");
  mensajeRegistro.textContent = mensaje;
  mensajeRegistro.style.color = esError ? "red" : "green";
  mensajeRegistro.style.display = "block";
}