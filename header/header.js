const header = document.querySelector(".martini-header");

window.addEventListener("scroll",()=>{
  if(window.scrollY > 60){
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});
