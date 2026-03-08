document.addEventListener("DOMContentLoaded", () => {

  const form = document.querySelector(".freesoul-form");

  if (!form) return;

  const inputs = form.querySelectorAll("input, textarea");

  /* ================= LABEL ACTIVE ================= */

  inputs.forEach(input => {

    // Si ya tiene valor (autofill, etc)
    if (input.value.trim() !== "") {
      input.classList.add("active");
    }

    // Al escribir
    input.addEventListener("input", () => {
      if (input.value.trim() !== "") {
        input.classList.add("active");
      } else {
        input.classList.remove("active");
      }
    });

  });


  /* ================= BOTÓN LOADING ================= */

  form.addEventListener("submit", () => {

    const button = form.querySelector(".contacto-btn");

    if (!button) return;

    button.innerText = "Enviando...";
    button.disabled = true;

  });


  /* ================= VALIDACIÓN BÁSICA ================= */

  form.addEventListener("submit", (e) => {

    const nombre = form.querySelector("input[name='nombre']");
    const email = form.querySelector("input[name='email']");
    const mensaje = form.querySelector("textarea[name='mensaje']");

    let error = false;

    // limpiar estados
    form.querySelectorAll(".error").forEach(el => el.classList.remove("error"));

    // validar
    if (!nombre.value.trim()) {
      nombre.classList.add("error");
      error = true;
    }

    if (!email.value.includes("@")) {
      email.classList.add("error");
      error = true;
    }

    if (!mensaje.value.trim()) {
      mensaje.classList.add("error");
      error = true;
    }

    if (error) {
      e.preventDefault();

      const button = form.querySelector(".contacto-btn");
      button.innerText = "Enviar mensaje";
      button.disabled = false;
    }

  });


  /* ================= RESET BOTÓN (BACK CACHE) ================= */

  window.addEventListener("pageshow", () => {
    const button = form.querySelector(".contacto-btn");
    if (button) {
      button.innerText = "Enviar mensaje";
      button.disabled = false;
    }
  });


  /* ================= SCROLL AUTOMÁTICO ================= */

  if (window.location.hash === "#contacto-form") {
    const target = document.querySelector("#contacto-form");
    if (target) {
      target.scrollIntoView({ behavior: "smooth" });
    }
  }


  /* ================= ANIMACIÓN ENTRADA SCROLL ================= */

  const elements = document.querySelectorAll(
    ".contacto-info, .contacto-form"
  );

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = 1;
        entry.target.style.transform = "translateY(0)";
      }
    });
  }, {
    threshold: 0.2
  });

  elements.forEach(el => {
    observer.observe(el);
  });

});