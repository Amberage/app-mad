/*Este script recoge el username y el password del formulario de login
para mandarlos a un PHP donde esperara la respuesta de datos validos o
invalidos para el login
*/
function redirectToLogin() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  const formData = new FormData();
  formData.append("username", username);
  formData.append("password", password);

  fetch("../php/login.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (!data.error) {
        // Redirigir en caso de éxito
        window.location.href = data.redirect;
      } else {
        mostrarMensajeLogin(data.message, data.error);
      }
    })
    .catch((error) => console.error("Error:", error));
}

function mostrarMensajeLogin(mensaje, esError) {
  const loginMessage = document.getElementById("loginMessage");
  loginMessage.textContent = mensaje;
  loginMessage.style.color = esError ? "red" : "green";
}
