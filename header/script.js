// --- LOGIN DERECHO ---
const loginBtn = document.querySelector(".login-btn");
const loginDropdown = document.querySelector(".login-dropdown");

// Abrir y cerrar login
loginBtn.addEventListener("click", (e) => {
  e.stopPropagation(); // evita cerrar inmediatamente
  loginDropdown.style.display =
    loginDropdown.style.display === "block" ? "none" : "block";
});

// Evitar que clic dentro del formulario cierre el dropdown
loginDropdown.addEventListener("click", (e) => {
  e.stopPropagation();
});

// Cerrar dropdown al hacer clic fuera
window.addEventListener("click", () => {
  loginDropdown.style.display = "none";
});


