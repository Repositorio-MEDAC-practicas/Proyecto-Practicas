// ================= REVEAL =================

const revealEls = document.querySelectorAll(
  ".categories,.catalog,.b2b,.lifestyle,.party-strip"
);

if (revealEls.length) {

  const observer = new IntersectionObserver(entries=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        e.target.classList.add("show");
      }
    });
  },{threshold:.25});

  revealEls.forEach(el=>{
    el.classList.add("reveal");
    observer.observe(el);
  });

}

// ================= HERO SLIDER =================

const slides = document.querySelectorAll(".hero-slider .slide");
const dots   = document.querySelectorAll(".slider-dots .dot");

let current = 0;

function showSlide(i){

  if (!slides.length || !dots.length) return;

  slides.forEach(s => s.classList.remove("active"));
  dots.forEach(d => d.classList.remove("active"));

  if (!slides[i] || !dots[i]) return;

  slides[i].classList.add("active");
  dots[i].classList.add("active");
  current = i;
}

// Auto slider SOLO si existe
if (slides.length > 1) {

  setInterval(()=>{
    showSlide((current + 1) % slides.length);
  },7000);

}

// Click dots SOLO si existen
if (dots.length) {

  dots.forEach((dot,i)=>{
    dot.addEventListener("click",()=>showSlide(i));
  });

}

// ================= IDIOMAS =================

window.setLanguage = function(lang){

  localStorage.setItem("lang", lang);

  document.querySelectorAll("[data-es]").forEach(el=>{
    const text = el.dataset[lang];
    if(text) el.innerHTML = text;
  });

};

const savedLang = localStorage.getItem("lang") || "es";
setLanguage(savedLang);
