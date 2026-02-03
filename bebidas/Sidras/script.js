
const input = document.getElementById("buscador-input");
const boton = document.getElementById("buscador-btn");

boton.addEventListener("click", buscar);

input.addEventListener("keydown", (e) => {
    if (e.key === "Enter") buscar();
});

function buscar() {
    const texto = input.value.toLowerCase().trim();
    if (!texto) return;

    const elementos = document.querySelectorAll("h1, h2, h3, p, span");

    for (const el of elementos) {
    if (el.textContent.toLowerCase().includes(texto)) {
        el.scrollIntoView({
        behavior: "smooth",
        block: "center"
        });

      // opcional: resaltar el resultado
        el.style.background = "#ffeaa7";
        setTimeout(() => el.style.background = "", 1500);
        break;
    }
    }
}
