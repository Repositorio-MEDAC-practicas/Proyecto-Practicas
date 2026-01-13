document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll("li");

    items.forEach(li => {
        const colorOriginal = getComputedStyle(li).backgroundColor;
        const textoOriginal = getComputedStyle(li).color;

        li.addEventListener("mouseenter", () => {
            li.style.backgroundColor = "#cca795";
            li.style.color = "#23232e";
        });

        li.addEventListener("mouseleave", () => {
            li.style.backgroundColor = colorOriginal;
            li.style.color = textoOriginal;
        });
    });
});
