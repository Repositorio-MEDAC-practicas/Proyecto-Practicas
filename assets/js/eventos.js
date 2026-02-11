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