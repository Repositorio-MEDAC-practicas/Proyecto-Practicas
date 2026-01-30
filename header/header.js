const header = document.querySelector(".freesoul-header");

window.addEventListener("scroll", () => {
  if (window.scrollY > 60) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

// ===== MODO OSCURO / CLARO =====

const toggleBtn = document.getElementById("themeToggle");
const body = document.body;

// cargar preferencia guardada
if (localStorage.getItem("modo") === "dark") {
  body.classList.add("dark-mode");
  toggleBtn.textContent = "Modo claro";
} else {
  toggleBtn.textContent = "Modo oscuro";
}

// click
toggleBtn.addEventListener("click", () => {
  body.classList.toggle("dark-mode");

  const isDark = body.classList.contains("dark-mode");

  toggleBtn.textContent = isDark ? "Modo claro" : "Modo oscuro";
  localStorage.setItem("modo", isDark ? "dark" : "light");
});
