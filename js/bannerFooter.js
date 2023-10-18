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
