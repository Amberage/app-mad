// Función para mostrar la información del usuario
function mostrarInformacionUsuario() {
  const userDataCookie = getCookie("userData");

  if (userDataCookie) {
    const userDataJSON = decodeURIComponent(atob(userDataCookie));
    const userData = JSON.parse(userDataJSON);
    const userDataDisplay = document.getElementById("userDataDisplay");
    const mensajeBienvenida = `Bienvenid@ ${userData.nombre} ${userData.aPaterno}!!`;
    document.getElementById("mensajeBienvenida").innerHTML = mensajeBienvenida;
  } else {
    console.log("No se encontró la cookie del usuario.");
    window.location.href = "../index.html";
  }
}

// Función para obtener el valor de una cookie por su nombre
function getCookie(name) {
  const decodedCookie = decodeURIComponent(document.cookie);
  const cookies = decodedCookie.split(";");

  for (let i = 0; i < cookies.length; i++) {
    let cookie = cookies[i];
    while (cookie.charAt(0) === " ") {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(name) === 0) {
      return cookie.substring(name.length + 1, cookie.length);
    }
  }
  return "";
}

// Función para eliminar la cookie y redireccionar a index.html
function cerrarSesion() {
  document.cookie = "userData=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  window.location.href = "../index.html";

  const userDataCookieValue = getCookie("userData");
  console.log("Sesión finalizada. Cookie eliminada:", userDataCookieValue);
}

// Llama a la función para mostrar la información del usuario al cargar la página
window.onload = mostrarInformacionUsuario;