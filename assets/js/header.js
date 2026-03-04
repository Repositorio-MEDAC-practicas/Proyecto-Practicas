console.log("HEADER JS CARGADO");

document.addEventListener("DOMContentLoaded", () => {

  const header = document.querySelector(".freesoul-header");
  const toggleBtn = document.getElementById("themeToggle");

  /* =========================================================
     HEADER SCROLL
  ========================================================= */

  if (header) {
    window.addEventListener("scroll", () => {
      header.classList.toggle("scrolled", window.scrollY > 60);
    });
  }

  /* =========================================================
     DARK / LIGHT MODE (FIXED)
  ========================================================= */

  const html = document.documentElement;

  if (toggleBtn) {

    const darkText  = toggleBtn.dataset.dark  || "Modo oscuro";
    const lightText = toggleBtn.dataset.light || "Modo claro";

    const savedTheme = localStorage.getItem("theme");

    if (savedTheme === "dark") {
      html.classList.add("dark-mode");
      toggleBtn.textContent = lightText;
    } else {
      html.classList.remove("dark-mode");
      toggleBtn.textContent = darkText;
    }

    document.dispatchEvent(new Event("themeChanged"));

    toggleBtn.addEventListener("click", () => {

      const isDark = html.classList.toggle("dark-mode");

      localStorage.setItem("theme", isDark ? "dark" : "light");

      toggleBtn.textContent = isDark ? lightText : darkText;

      document.dispatchEvent(new Event("themeChanged"));

    });

  }

  /* =========================================================
     📱 MOBILE MENU — BURGER FIX
  ========================================================= */

  const burger = document.querySelector(".burger");
  const navLeft = document.querySelector(".nav-left");
  const navRight = document.querySelector(".nav-right");

  if (burger && navLeft && navRight) {

    burger.addEventListener("click", () => {

      const isOpen = navLeft.classList.toggle("open");

      navRight.classList.toggle("open", isOpen);

      document.body.classList.toggle("menu-open", isOpen);

      burger.classList.toggle("active", isOpen);

    });

    /* 🔹 Cerrar menú al hacer click en un enlace */
    const links = document.querySelectorAll(".nav-left a, .nav-right a");

    links.forEach(link => {
      link.addEventListener("click", () => {

        navLeft.classList.remove("open");
        navRight.classList.remove("open");
        document.body.classList.remove("menu-open");
        burger.classList.remove("active");

      });
    });

  }

});

/* =========================================================
   MOBILE MENU REAL
========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  const burger = document.querySelector(".burger");
  const navLeft = document.querySelector(".nav-left");
  const navRight = document.querySelector(".nav-right");
  const mobileMenu = document.getElementById("mobile-menu");

  if (!burger || !navLeft || !navRight || !mobileMenu) return;

  // 🔥 crear contenido UNA VEZ
  mobileMenu.innerHTML = navLeft.innerHTML + navRight.innerHTML;

  burger.addEventListener("click", () => {

    const isOpen = mobileMenu.classList.toggle("open");

    document.body.classList.toggle("menu-open", isOpen);

  });

});

/* =========================================================
   MOBILE MENU — BOTÓN CERRAR (X)
========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  const mobileMenu = document.getElementById("mobile-menu");

  if (!mobileMenu) return;

  // Crear botón solo si no existe
  if (!mobileMenu.querySelector(".mobile-close")) {

    const closeBtn = document.createElement("button");
    closeBtn.classList.add("mobile-close");
    closeBtn.setAttribute("aria-label", "Cerrar menú");
    closeBtn.innerHTML = "✕";

    mobileMenu.appendChild(closeBtn);

    closeBtn.addEventListener("click", () => {
      mobileMenu.classList.remove("open");
      document.body.classList.remove("menu-open");
    });

  }

});