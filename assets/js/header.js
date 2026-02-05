console.log("HEADER JS CARGADO");

document.addEventListener("DOMContentLoaded", () => {

  const header = document.querySelector(".freesoul-header");
  const toggleBtn = document.getElementById("themeToggle");
  const body = document.body;

  console.log("BOTON:", toggleBtn);

  /* ================= HEADER SCROLL ================= */

  if (header) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 60) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  }

  /* ================= DARK / LIGHT MODE ================= */

  if (!toggleBtn) {
    console.warn("NO existe #themeToggle");
    return;
  }

  const darkText = toggleBtn.dataset.dark || "Modo oscuro";
  const lightText = toggleBtn.dataset.light || "Modo claro";

  // cargar preferencia
  const savedTheme = localStorage.getItem("theme");

  if (savedTheme === "dark") {
    body.classList.add("dark-mode");
    toggleBtn.textContent = lightText;
  }

  toggleBtn.addEventListener("click", () => {

    console.log("CLICK BOTON");

    const isDark = body.classList.toggle("dark-mode");

    localStorage.setItem("theme", isDark ? "dark" : "light");

    toggleBtn.textContent = isDark ? lightText : darkText;

  });

});