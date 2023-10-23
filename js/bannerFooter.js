/*Banners 
En caso de querer realizar cambios al header o footer se deben realizar en los codigos de abajo en la seccción del HTML
*/
/*
// Headers
const menuHTML = `
  <div class="menu">
    <ul>
      <li><a href="/views/home.html">Inicio</a></li>
      <li></li>
      <li><a href="/views/encapsulamiento/encapsulamiento.html">Encapsulamiento</a></li>
      <li></li>
      <li><a href="/views/herencia/herencia.html">Herencia</a></li>
      <li></li>
      <li><a href="/views/polimorfismo/polimorfismo.html">Polimorfismo</a></li>
      <li></li>
      <li><a href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
    </ul>
     </div>
        `;

    /*
    // Obtén una referencia a los elementos de la barra de menú
    const inicio = document.getElementById('inicio');
    const encapsulamiento = document.getElementById('encapsulamiento');
    const herencia = document.getElementById('herencia');
    const polimorfismo = document.getElementById('polimorfismo');
    const cerrarSesion = document.getElementById('cerrarSesion');

    // Agrega un evento click a cada elemento de la barra de menú
    inicio.addEventListener('click', () => {
        // Cambia el color de fondo del elemento 'Inicio'
        inicio.style.backgroundColor = '#8152b8';
        // Restaura los colores de fondo de los otros elementos
        encapsulamiento.style.backgroundColor = '';
        herencia.style.backgroundColor = '';
        polimorfismo.style.backgroundColor = '';
        cerrarSesion.style.backgroundColor = '';
    });
    // Repite el proceso para otros elementos del menú
    encapsulamiento.addEventListener('click', () => {
        encapsulamiento.style.backgroundColor = '#8152b8';
        inicio.style.backgroundColor = '';
        herencia.style.backgroundColor = '';
        polimorfismo.style.backgroundColor = '';
        cerrarSesion.style.backgroundColor = '';
    });

    herencia.addEventListener('click', () => {
      herencia.style.backgroundColor = '#8152b8';
      inicio.style.backgroundColor = '';
      encapsulamiento.style.backgroundColor = '';
      polimorfismo.style.backgroundColor = '';
      cerrarSesion.style.backgroundColor = '';
    });

    polimorfismo.addEventListener('click', () => {
      polimorfismo.style.backgroundColor = '#8152b8';
      inicio.style.backgroundColor = '';
      encapsulamiento.style.backgroundColor = '';
      herencia.style.backgroundColor = '';
      cerrarSesion.style.backgroundColor = '';
    });

    cerrarSesion.addEventListener('click', () => {
      cerrarSesion.style.backgroundColor = '#8152b8';
      inicio.style.backgroundColor = '';
      encapsulamiento.style.backgroundColor = '';
      herencia.style.backgroundColor = '';
      polimorfismo.style.backgroundColor = '';
    });

const menuContainer = document.getElementById('menuHeader'); // Busca en el HTML el id menuHeader para vacciar el menuHTML
menuContainer.innerHTML = menuHTML;*/

// Footer
const footerHTML = `
<footer style="max-width: 100%; height: auto;">
  <img width="100px" src="/assets/images/logo.png" />
  <img width="200px" src="/assets/images/contacto.png" />
</footer>
`;

const footerContainer = document.getElementById('endFooter'); // Busca en el HTML el id endFooter para vacciar el menuHTML
footerContainer.innerHTML = footerHTML;

// Footer
const userDisplayHTML = `
<div class="userDataDisplay">
  <span>Usuario: </span><span id="nombreUsuario"></span>
</div>
`;

const dataContainer = document.getElementById('dataShow'); // Busca en el HTML el id endFooter para vacciar el menuHTML
dataContainer.innerHTML = userDisplayHTML;
