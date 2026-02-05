document.addEventListener('DOMContentLoaded', () => {

  const loader = document.getElementById('freesoul-loader');

  if (!loader) return;

  window.addEventListener('load', () => {

    setTimeout(() => {
      loader.classList.add('hide');
    }, 300);

  });

});
