let pixels = 0;

function moverFondo() {
    pixels += 0.05;
    document.body.style.backgroundPosition = `0px +${pixels}px`;
}

setInterval(moverFondo, 1);
