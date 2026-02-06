document.addEventListener("DOMContentLoaded", () => {

  const loader = document.getElementById("freesoul-loader");
  const img = document.getElementById("loader-img");

  if (!loader || !img) return;

  /* ======================================
     UTIL — SABER SI ES OSCURO
  ====================================== */

  function isDarkMode() {
    return document.documentElement.classList.contains("dark-mode");
  }

  /* ======================================
     SET IMAGEN SEGÚN MODO (SIN FLASH)
  ====================================== */

  function setLoaderImage() {

    const targetSrc = isDarkMode()
      ? img.dataset.dark
      : img.dataset.light;

    if (img.getAttribute("src") !== targetSrc) {
      img.setAttribute("src", targetSrc);
    }

    img.style.opacity = "1";
  }

  // aplicar inmediatamente
  setLoaderImage();

  // escuchar cambios de modo
  document.addEventListener("themeChanged", setLoaderImage);

  /* ======================================
     OCULTAR LOADER CON RETRASO
  ====================================== */

  window.addEventListener("load", () => {

    // deja que se vea un poco más
    setTimeout(() => {

      loader.classList.add("hide");

      setTimeout(() => {
        loader.style.display = "none";
      }, 900);

    }, 900); // ⏱ dura más en pantalla

  });

});
