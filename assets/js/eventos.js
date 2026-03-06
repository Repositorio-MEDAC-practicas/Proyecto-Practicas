document.addEventListener("DOMContentLoaded", () => {

  const formBox = document.querySelector(".form-eventos");

  if (!formBox) return;

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

});

/* =========================================================
   PACKS SLIDER — MOBILE
========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  if(window.innerWidth > 768) return;

  const grid = document.querySelector(".packs-grid");
  const packs = document.querySelectorAll(".pack");
  const prev = document.querySelector(".packs-arrow.left");
  const next = document.querySelector(".packs-arrow.right");

  if(!grid || !prev || !next) return;

  let index = 0;

  function update(){

    const width = packs[0].offsetWidth;

    grid.style.transform = `translateX(-${index * width}px)`;

  }

  next.addEventListener("click", () => {

    if(index < packs.length - 1){
      index++;
      update();
    }

  });

  prev.addEventListener("click", () => {

    if(index > 0){
      index--;
      update();
    }

  });

});