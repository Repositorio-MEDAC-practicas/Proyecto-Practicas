document.addEventListener("DOMContentLoaded", () => {
  const foam = document.querySelector(".beer-foam");
  const page = document.querySelector(".sobre-la-marca-page");
  const targets = document.querySelectorAll(".titulo, .privacy-section");
  const wraps = document.querySelectorAll(".privacy-wrap");
  const bubbles = document.querySelectorAll(".beer-bubbles span");

  // Función para actualizar posición de la espuma y color del texto
  function updateFoamPosition(section) {
    const wrap = section.querySelector(".privacy-wrap") || section;
    const wrapRect = wrap.getBoundingClientRect();
    const pageRect = page.getBoundingClientRect();

    // Centrado vertical de la espuma
    const top = wrapRect.top - pageRect.top + wrapRect.height / 2 - foam.offsetHeight / 2;
    foam.style.top = top + "px";

    // Nivel inferior de la espuma
    const foamBottom = top + foam.offsetHeight;
  }

  // Hover sobre secciones
  targets.forEach(section => {
    section.addEventListener("mouseenter", () => {
      updateFoamPosition(section);
    });
  });

  // Inicial: espuma centrada en la primera sección
  updateFoamPosition(targets[0]);

  // Función para randomizar burbujas
  function randomizeBubble(bubble) {
    bubble.style.left = (Math.random() * 99) + "%";
  }

  bubbles.forEach(bubble => {
    // valores aleatorios solo al inicio
    bubble.style.left = (Math.random() * 99) + "%";
    bubble.style.animationDuration = (5 + Math.random() * 3) + "s";
    // Delay negativo entre -0.1s y -0.9s para que las burbujas ya estén en movimiento al cargar
    bubble.style.animationDelay = -(0.1 + Math.random() * 3.9) + "s";

    // Cada vez que termina animación, se randomiza posición horizontal
    bubble.addEventListener("animationiteration", () => {
      randomizeBubble(bubble);
    });
  });
});