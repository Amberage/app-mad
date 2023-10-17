function ejecutarTest() {
  function getCookie(name) {
    const cookieName = `${name}=`;
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(";");
    for (let i = 0; i < cookieArray.length; i++) {
      let cookie = cookieArray[i].trim();
      if (cookie.indexOf(cookieName) === 0) {
        return cookie;
      }
    }
    return null;
  }

  const userDataCookie = getCookie("userData");

  if (userDataCookie) {
    // Decodificar la cookie desde base64 y mostrarla en la consola
    const base64DecodedUserDataCookie = atob(
      userDataCookie.substring("userData=".length)
    );

    // Intentar parsear el JSON y mostrarlo en la consola de forma legible
    try {
      const userData = JSON.parse(base64DecodedUserDataCookie);
      console.log("La cookie 'userData' es:", userData);
    } catch (error) {
      console.error("Error al parsear la cookie 'userData' como JSON:", error);
      console.log(
        "Contenido de la cookie (decodificado desde base64):",
        base64DecodedUserDataCookie
      );
    }
  } else {
    console.log("La cookie 'userData' no está presente o no se puede leer.");
  }
}
