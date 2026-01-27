// reveal elegante
const revealEls = document.querySelectorAll(
  ".categories, .catalog, .b2b, .final, .lifestyle"
);

const observer = new IntersectionObserver(entries=>{
  entries.forEach(e=>{
    if(e.isIntersecting){
      e.target.classList.add("show");
    }
  });
},{threshold:0.25});

revealEls.forEach(el=>{
  el.classList.add("reveal");
  observer.observe(el);
});

// hover CTA
document.querySelectorAll(".btn-main").forEach(btn=>{
  btn.addEventListener("mouseenter",()=>{
    btn.style.transform="scale(1.08)";
  });
  btn.addEventListener("mouseleave",()=>{
    btn.style.transform="scale(1)";
  });
});
