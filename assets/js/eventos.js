document.addEventListener("DOMContentLoaded", () => {

  /* =============================
     Animación al entrar en vista
  ============================== */

  const formBox = document.querySelector(".form-eventos");

  if (formBox) {

    const observer = new IntersectionObserver(entries => {

      entries.forEach(entry => {
        if (entry.isIntersecting) {
          formBox.classList.add("visible");
        } else {
          formBox.classList.remove("visible");
        }
      });

    }, {
      threshold: 0.35
    });

    observer.observe(formBox);
  }

  /* =============================
     Scroll preciso tras enviar
  ============================== */

  const params = new URLSearchParams(window.location.search);

  if (params.get("enviado") === "1") {

    window.addEventListener("load", () => {

      const section = document.getElementById("form-eventos");

      if (!section) return;

      const header = document.querySelector("header");
      const headerOffset = header ? header.offsetHeight : 160;

      const extraOffset = 20; // 

      const elementPosition = section.getBoundingClientRect().top;
      const offsetPosition =
        elementPosition + window.pageYOffset - headerOffset - extraOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: "smooth"
      });

    });

  }

});
