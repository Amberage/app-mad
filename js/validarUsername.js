// Event listener para el formulario de registro
document
  .getElementById("registerForm")
  .addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    const response = await enviarDatosAlServidor(formData);

    mostrarMensajeRegistro(response.message, response.error);
  });

// Función para enviar datos al servidor
async function enviarDatosAlServidor(formData) {
  try {
    const response = await fetch("../php/register.php", {
      method: "POST",
      body: formData,
    });

    if (!response.ok) {
      throw new Error("Error al enviar los datos al servidor.");
    }

    return await response.json();
  } catch (error) {
    return {
      error: true,
      message: "Hubo un error al comunicarse con el servidor.",
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
