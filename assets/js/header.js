console.log("HEADER JS CARGADO");

document.addEventListener("DOMContentLoaded", () => {

  const header = document.querySelector(".freesoul-header");
  const toggleBtn = document.getElementById("themeToggle");

  /* ================= HEADER SCROLL ================= */

  if (header) {
    window.addEventListener("scroll", () => {
      header.classList.toggle("scrolled", window.scrollY > 60);
    });
  }

  /* ================= DARK / LIGHT MODE ================= */

  if (!toggleBtn) return;

  const html = document.documentElement;

  const darkText  = toggleBtn.dataset.dark  || "Modo oscuro";
  const lightText = toggleBtn.dataset.light || "Modo claro";

  /* ===== aplicar preferencia guardada ===== */

  const savedTheme = localStorage.getItem("theme");

  if (savedTheme === "dark") {
    html.classList.add("dark-mode");
    toggleBtn.textContent = lightText;
  } else {
    html.classList.remove("dark-mode");
    toggleBtn.textContent = darkText;
  }

  // avisar al loader cuando ya existe DOM
  document.dispatchEvent(new Event("themeChanged"));

  /* ===== click toggle ===== */

  toggleBtn.addEventListener("click", () => {

    const isDark = html.classList.toggle("dark-mode");

    localStorage.setItem("theme", isDark ? "dark" : "light");

    toggleBtn.textContent = isDark ? lightText : darkText;

    document.dispatchEvent(new Event("themeChanged"));

  });

});
