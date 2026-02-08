document.addEventListener("DOMContentLoaded", () => {

  const grid = document.getElementById("grid-catalogo");

  const cards = [...document.querySelectorAll(".catalogo-card")];
  const filtros = document.querySelectorAll(".catalogo-filtros button");
  const searchInput = document.getElementById("catalogoSearch");

  const bottomPagination = document.getElementById("catalogoPagination");

  /* =============================
     PAGINACION ARRIBA
  ============================= */

  const topPagination = document.createElement("div");
  topPagination.className = "catalogo-pagination";
  topPagination.id = "catalogoPaginationTop";

  grid.parentNode.insertBefore(topPagination, grid);

  const filtrosSection = document.querySelector(".catalogo-filtros");

  const PER_PAGE = 12;

  let currentPage = 1;
  let currentFilter = "all";
  let currentSearch = "";
  let currentSort = "default";

  let visibleCards = [...cards];

  /* =============================
     LEER ?buscar=
  ============================= */

  const params = new URLSearchParams(window.location.search);

  if (params.has("buscar")) {

    const value = params.get("buscar").toLowerCase();

    currentSearch = value;

    if (searchInput) {
      searchInput.value = value;
    }

  }

  /* =============================
     SCROLL SOLO PAGINACION
  ============================= */

  function scrollToFiltros() {

    if (!filtrosSection) return;

    const top =
      filtrosSection.getBoundingClientRect().top +
      window.scrollY -
      180;

    window.scrollTo({
      top,
      behavior: "smooth"
    });

  }

  /* =============================
     SHUFFLE (ALEATORIO)
  ============================= */

  function shuffle(array) {

    const arr = [...array];

    for (let i = arr.length - 1; i > 0; i--) {

      const j = Math.floor(Math.random() * (i + 1));
      [arr[i], arr[j]] = [arr[j], arr[i]];

    }

    return arr;

  }

  /* =============================
     CORE
  ============================= */

  function applyAll(resetPage = true, doScroll = false) {

    visibleCards = [...cards];

    // FILTER
    if (currentFilter !== "all") {
      visibleCards = visibleCards.filter(card =>
        card.dataset.categoria === currentFilter
      );
    }

    // SEARCH
    if (currentSearch) {
      visibleCards = visibleCards.filter(card =>
        card.dataset.nombre.includes(currentSearch)
      );
    }

    // SORT / RELEVANCIA
    if (currentSort === "default") {
      visibleCards = shuffle(visibleCards);
    } else {
      sortCards();
    }

    reorderGrid();

    if (resetPage) {
      renderPage(1, doScroll);
    } else {
      renderPage(currentPage, doScroll);
    }

  }

  /* =============================
     SORT
  ============================= */

  function sortCards() {

    if (currentSort === "price-asc") {
      visibleCards.sort((a, b) =>
        parseFloat(a.dataset.price) - parseFloat(b.dataset.price)
      );
    }

    if (currentSort === "price-desc") {
      visibleCards.sort((a, b) =>
        parseFloat(b.dataset.price) - parseFloat(a.dataset.price)
      );
    }

    if (currentSort === "alpha-asc") {
      visibleCards.sort((a, b) =>
        a.dataset.nombre.localeCompare(b.dataset.nombre)
      );
    }

    if (currentSort === "alpha-desc") {
      visibleCards.sort((a, b) =>
        b.dataset.nombre.localeCompare(a.dataset.nombre)
      );
    }

  }

  /* =============================
     REORDENAR GRID
  ============================= */

  function reorderGrid() {

    visibleCards.forEach(card => {
      grid.appendChild(card);
    });

  }

  /* =============================
     PAGINATION
  ============================= */

  function renderPage(page, doScroll = false) {

    currentPage = page;

    cards.forEach(c => c.style.display = "none");

    const start = (page - 1) * PER_PAGE;
    const end = start + PER_PAGE;

    visibleCards.slice(start, end).forEach(c => {
      c.style.display = "block";
    });

    renderPagination();

    if (doScroll) {
      scrollToFiltros();
    }

  }

  function renderPagination() {

    const totalPages = Math.ceil(visibleCards.length / PER_PAGE);

    bottomPagination.innerHTML = "";
    topPagination.innerHTML = "";

    if (totalPages <= 1) return;

    [topPagination, bottomPagination].forEach(container => {

      const prev = document.createElement("button");
      prev.innerText = "Anterior";
      prev.disabled = currentPage === 1;
      prev.onclick = () => renderPage(currentPage - 1, true);
      container.appendChild(prev);

      for (let i = 1; i <= totalPages; i++) {

        const btn = document.createElement("button");
        btn.innerText = i;

        if (i === currentPage) btn.classList.add("active");

        btn.onclick = () => renderPage(i, true);

        container.appendChild(btn);

      }

      const next = document.createElement("button");
      next.innerText = "Siguiente";
      next.disabled = currentPage === totalPages;
      next.onclick = () => renderPage(currentPage + 1, true);
      container.appendChild(next);

    });

  }

  /* =============================
     FILTROS
  ============================= */

  filtros.forEach(btn => {

    btn.addEventListener("click", () => {

      filtros.forEach(b => b.classList.remove("active"));
      btn.classList.add("active");

      currentFilter = btn.dataset.filter;

      applyAll(true, false);

    });

  });

  /* =============================
     BUSCADOR
  ============================= */

  searchInput.addEventListener("input", e => {

    currentSearch = e.target.value.toLowerCase();

    applyAll(true, false);

  });

  /* =============================
     ORDENAR CUSTOM
  ============================= */

  const customSelect = document.querySelector(".custom-select");
  const trigger = customSelect.querySelector(".custom-select-trigger");
  const options = customSelect.querySelector(".custom-options");

  trigger.addEventListener("click", () => {
    customSelect.classList.toggle("open");
  });

  options.querySelectorAll(".custom-option").forEach(opt => {

    opt.addEventListener("click", () => {

      currentSort = opt.dataset.value;

      trigger.innerText = opt.innerText;

      customSelect.classList.remove("open");

      applyAll(true, false);

    });

  });

  document.addEventListener("click", e => {

    if (!customSelect.contains(e.target)) {
      customSelect.classList.remove("open");
    }

  });

  // INIT — aplica filtro si viene desde home
  applyAll(true, false);

});


/* =============================
   CART COUNTER UI
============================= */

document.querySelectorAll(".catalogo-card").forEach(card => {

  const minus = card.querySelector(".cart-minus");
  const plus = card.querySelector(".cart-plus");
  const qtyEl = card.querySelector(".cart-qty");

  let qty = 0;

  plus.addEventListener("click", () => {
    qty++;
    qtyEl.textContent = qty;
  });

  minus.addEventListener("click", () => {
    if (qty > 0) {
      qty--;
      qtyEl.textContent = qty;
    }
  });

});
