// Función para mostrar la información del usuario
function revisarCuenta() {
    const userDataCookie = getCock("userData");
  
    if (userDataCookie) {
      const userDataJSON = decodeURIComponent(atob(userDataCookie));
      const userData = JSON.parse(userDataJSON);
      const tipoCuenta = `${userData.userType}`;
      console.log(tipoCuenta);
  
      if (tipoCuenta === "docente") {
        window.location.href = "/views/admin/";
      } else if (tipoCuenta === "alumno") {
        window.location.href = "/views/home.html";
      }
    } else {
      console.log("No se encontró la cookie del usuario.");
      window.location.href = "/views/login.html";
    }
  }
  
  // Función para obtener el valor de una cookie por su nombre
  function getCock(name) {
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
  
  
  // Llama a la función para mostrar la información del usuario al cargar la página
  window.onload = revisarCuenta;