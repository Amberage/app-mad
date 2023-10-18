/*Este script hace 3 cosas:
1. Almacena el nombre del usuario en la variable nombreUsuario
2. Valida que existan datos en la cookie, de no existir redirigue al index
3. Tiene un metodo para cerrar la sesión (eliminar la cookie)
4. Contiene el banner y el footer de los HTML correspondientes
*/
// Función para mostrar la información del usuario
function mostrarInformacionUsuario() {
  const userDataCookie = getCookie("userData");

  if (userDataCookie) {
    const userDataJSON = decodeURIComponent(atob(userDataCookie));
    const userData = JSON.parse(userDataJSON);
    const userDataDisplay = document.getElementById("userDataDisplay");
    const nombreUsuario = `${userData.nombre}`;
    document.getElementById("nombreUsuario").innerHTML = nombreUsuario;
  } else {
    console.log("No se encontró la cookie del usuario.");
    window.location.href = "/views/login.html";
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


/*Banners 
En caso de querer realizar cambios al header o footer se deben realizar en los codigos de abajo en la seccción del HTML

*/

// Header
const menuHTML = `
  <div class="menu">
    <ul>
      <li><a href="/views/home.html" class="menu-destacado">Inicio</a></li>
      <li></li>
      <li><a href="/views/encapsulamiento/encapsulamiento.html">Encapsulamiento</a></li>
      <li></li>
      <li><a href="#">Herencia</a></li>
      <li></li>
      <li><a href="#">Polimorfismo</a></li>
      <li></li>
      <li><a href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
    </ul>
  </div>
`;

const menuContainer = document.getElementById('menuHeader'); // Busca en el HTML el id menuHeader para vacciar el menuHTML
menuContainer.innerHTML = menuHTML;

// Footer
const footerHTML = `
<footer style="margin-top: 100px;">
  <img width="100px" src="/assets/images/logo.png" />
  <img width="200px" src="/assets/images/contacto.png" />
</footer>
`;

const footerContainer = document.getElementById('endFooter'); // Busca en el HTML el id endFooter para vacciar el menuHTML
footerContainer.innerHTML = footerHTML;

