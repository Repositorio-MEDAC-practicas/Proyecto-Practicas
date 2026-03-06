// ================= REVEAL =================

const revealEls = document.querySelectorAll(
  ".categories,.catalog,.b2b,.lifestyle,.party-strip"
);

if (revealEls.length) {

  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add("show");
      }
    });
  }, { threshold: 0.25 });

  revealEls.forEach(el => {
    el.classList.add("reveal");
    observer.observe(el);
  });

}


// ================= HERO SLIDER =================

const slides = document.querySelectorAll(".hero-slider .slide");
const dots = document.querySelectorAll(".slider-dots .dot");

let current = 0;

function showSlide(i) {

  if (!slides.length || !dots.length) return;

  slides.forEach(s => s.classList.remove("active"));
  dots.forEach(d => d.classList.remove("active"));

  if (!slides[i] || !dots[i]) return;

  slides[i].classList.add("active");
  dots[i].classList.add("active");
  current = i;
}

if (slides.length > 1) {

  setInterval(() => {
    showSlide((current + 1) % slides.length);
  }, 7000);

}

if (dots.length) {

  dots.forEach((dot, i) => {
    dot.addEventListener("click", () => showSlide(i));
  });

}


// ================= IDIOMAS =================

window.setLanguage = function (lang) {

  localStorage.setItem("lang", lang);

  document.querySelectorAll("[data-es]").forEach(el => {
    const text = el.dataset[lang];
    if (text) el.innerHTML = text;
  });

};

const savedLang = localStorage.getItem("lang") || "es";
setLanguage(savedLang);


// ================= BOTON LIMPIAR CARRITO =================

document.addEventListener("DOMContentLoaded", () => {

  const container = document.querySelector(".wp-block-woocommerce-cart-items-block");

  if (!container) return;

  if (document.querySelector(".freesoul-empty-cart")) return;

  const btn = document.createElement("a");

  btn.href = "?freesoul-empty-cart=true";
  btn.className = "freesoul-empty-cart";
  btn.textContent = "Vaciar carrito";

  container.prepend(btn);

});


// ================= NOTIFICACIÓN CARRITO =================

jQuery(document.body).on("added_to_cart", function () {

  const countEl = document.getElementById("freesoul-cart-count");

  if (!countEl) return;

  fetch("/?wc-ajax=get_refreshed_fragments")
    .then(r => r.json())
    .then(data => {

      if (!data.fragments) return;

      const temp = document.createElement("div");
      temp.innerHTML = data.fragments["div.widget_shopping_cart_content"] || "";

      const items = temp.querySelectorAll(".mini_cart_item").length;

      if (items > 0) {
        countEl.textContent = items;
        countEl.style.display = "inline-block";
      } else {
        countEl.style.display = "none";
      }

    });

});


// =========================================================
// PRODUCT SLIDER — MOBILE ONLY
// =========================================================

document.addEventListener("DOMContentLoaded", () => {

  if (window.innerWidth > 768) return;

  const grid = document.querySelector(".product-grid");
  const products = document.querySelectorAll(".product");
  const prev = document.querySelector(".product-arrow.left");
  const next = document.querySelector(".product-arrow.right");

  if (!grid || !prev || !next || !products.length) return;

  let index = 0;
  let slideWidth = products[0].offsetWidth;

  function updateSlider() {
    grid.style.transform = "translateX(-" + (index * slideWidth) + "px)";
  }

  next.addEventListener("click", () => {

    if (index < products.length - 1) {
      index++;
      updateSlider();
    }

  });

  prev.addEventListener("click", () => {

    if (index > 0) {
      index--;
      updateSlider();
    }

  });

  window.addEventListener("resize", () => {
    slideWidth = products[0].offsetWidth;
    updateSlider();
  });

});