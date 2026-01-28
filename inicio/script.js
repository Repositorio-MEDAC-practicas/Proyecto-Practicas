// ================= REVEAL =================

const revealEls = document.querySelectorAll(
  ".categories,.catalog,.b2b,.lifestyle,.party-strip"
);

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

// ================= HERO SLIDER =================

const slides=document.querySelectorAll(".hero-slider .slide");
const dots=document.querySelectorAll(".slider-dots .dot");

let current=0;

function showSlide(i){
  slides.forEach(s=>s.classList.remove("active"));
  dots.forEach(d=>d.classList.remove("active"));

  slides[i].classList.add("active");
  dots[i].classList.add("active");
  current=i;
}

setInterval(()=>{
  showSlide((current+1)%slides.length);
},7000);

dots.forEach((dot,i)=>{
  dot.addEventListener("click",()=>showSlide(i));
});
