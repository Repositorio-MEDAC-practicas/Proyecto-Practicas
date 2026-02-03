const input = document.getElementById("buscador-input");
const boton = document.getElementById("buscador-btn");

const bebidas = {
  "lager": "Cervezas",
  "pilsner": "Cervezas",
  "rubia": "Cervezas",
  "tostada": "Cervezas",
  "negra": "Cervezas",
  "trigo": "Cervezas",
  "ipa": "Cervezas",
  "sin gluten": "Cervezas",

  "ginebra": "Destilados",
  "ron": "Destilados",
  "whisky": "Destilados",

  "sidra natural": "Sidras",
  "sidra espumosa": "Sidras",
  "sidra seca": "Sidras",
  "sidra dulce": "Sidras",
  "sidra de manzana": "Sidras",

  "vino tinto": "Vinos",
  "vino blanco": "Vinos",
  "vino rosado": "Vinos",

  "espumoso blanco": "Espumosos",
  "espumoso rosado": "Espumosos",
  "brut": "Espumosos",
  "semiseco": "Espumosos",

  "vermut rojo": "Vermut",
  "vermut blanco": "Vermut",

  "gin tonic": "Cócteles",
  "spritz": "Cócteles",
  "negroni": "Cócteles",
};

boton.onclick = buscar;
input.onkeydown = function (e) {
  if (e.key === "Enter") buscar();
};

function buscar() {
  const texto = input.value.toLowerCase().trim();
  if (bebidas[texto]) {
    window.location.href = bebidas[texto];
  }
}