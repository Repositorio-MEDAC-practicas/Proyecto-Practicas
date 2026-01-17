(() => {
  const script = document.currentScript;
  const scriptPath = script.src;
  const basePath = scriptPath.substring(0, scriptPath.lastIndexOf("/"));

  const langPath = scriptPath.includes("/footer/")
    ? scriptPath.split("/footer/")[0] + "/lang"
    : "../lang";

  const defaultLang = localStorage.getItem("lang") || "es";

  fetch(`${basePath}/footer.html`)
    .then(res => res.text())
    .then(html => {
      document.getElementById("footer").innerHTML = html;

      const link = document.createElement("link");
      link.rel = "stylesheet";
      link.href = `${basePath}/footer.css`;
      document.head.appendChild(link);

      loadLanguage(defaultLang);
    });

  function loadLanguage(lang) {
    fetch(`${langPath}/${lang}.json`)
      .then(res => res.json())
      .then(data => {
        document.querySelectorAll("[data-i18n]").forEach(el => {
          const keys = el.dataset.i18n.split(".");
          let text = data;
          keys.forEach(k => text = text?.[k]);
          if (text) el.textContent = text;
        });
      });
  }

  window.setLanguage = function (lang) {
    localStorage.setItem("lang", lang);
    loadLanguage(lang);
  };
})();
