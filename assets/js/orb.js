
const CONFIG = {
  name: "Or",
  version: "2.0",
  typingMin: 300,
  typingMax: 1400,
  memoryLimit: 50,
  debug: true
};


/* =========================================================
   💾 MEMORIA AVANZADA (CONTEXTO REAL)

const Memory = {

  get(key) {
    try {
      return JSON.parse(sessionStorage.getItem("orb_" + key));
    } catch {
      return null;
    }
  },

  set(key, value) {
    sessionStorage.setItem("orb_" + key, JSON.stringify(value));
  },

  remove(key) {
    sessionStorage.removeItem("orb_" + key);
  },

  clear() {
    Object.keys(sessionStorage)
      .filter(k => k.startsWith("orb_"))
      .forEach(k => sessionStorage.removeItem(k));
  },

  /* ================= HISTORIAL ================= */

  pushMessage(role, text) {

    let history = this.get("history") || [];

    history.push({
      role,
      text,
      time: Date.now()
    });

    if (history.length > CONFIG.memoryLimit) {
      history.shift();
    }

    this.set("history", history);
  },

  getHistory() {
    return this.get("history") || [];
  },

getLastUserMessage() {
  const h = [...this.getHistory()].reverse();
  return h.find(m => m.role === "user");
},

  /* ================= PERFIL USUARIO ================= */

  setUserName(name) {
    this.set("username", name);
  },

  getUserName() {
    return this.get("username");
  },

  setUserPreference(key, value) {
    let prefs = this.get("prefs") || {};
    prefs[key] = value;
    this.set("prefs", prefs);
  },

  getUserPreference(key) {
    let prefs = this.get("prefs") || {};
    return prefs[key];
  },

  /* ================= CONTEXTO ================= */

  setLastIntent(intent) {
    this.set("lastIntent", intent);
  },

  getLastIntent() {
    return this.get("lastIntent");
  },

  setLastCategory(cat) {
    this.set("lastCategory", cat);
  },

  getLastCategory() {
    return this.get("lastCategory");
  },

  setLastPage(page) {
    this.set("lastPage", page);
  },

  getLastPage() {
    return this.get("lastPage");
  }

};

/* =========================================================
   🧰 UTILS PRO (INTELIGENCIA BASE)

const Utils = {

  /* ================= NORMALIZAR TEXTO ================= */

  normalize(text = "") {
    return text
      .toLowerCase()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "") // quitar acentos
      .replace(/[^\w\s]/gi, "")        // quitar símbolos
      .replace(/\s+/g, " ")           // limpiar espacios
      .trim();
  },

  /* ================= TOKENIZAR ================= */

  tokenize(text = "") {
    return this.normalize(text).split(" ");
  },

  /* ================= INCLUDES FLEXIBLE ================= */

  includesAny(text, words = []) {
    const t = this.normalize(text);
    return words.some(w => t.includes(w));
  },

  includesAll(text, words = []) {
    const t = this.normalize(text);
    return words.every(w => t.includes(w));
  },

  /* ================= SIMILITUD SIMPLE ================= */
  // tipo "oferta" ~ "ofertas", "promo", etc.

  similarity(a = "", b = "") {

    a = this.normalize(a);
    b = this.normalize(b);

    if (!a || !b) return 0;

    if (a === b) return 1;

    // comparación básica por palabras
    const aWords = a.split(" ");
    const bWords = b.split(" ");

    let matches = 0;

    aWords.forEach(word => {
      if (bWords.includes(word)) matches++;
    });

    return matches / Math.max(aWords.length, bWords.length);
  },

  /* ================= MATCH INTELIGENTE ================= */

  fuzzyMatch(text, keywords = [], threshold = 0.6) {

    const t = this.normalize(text);

    for (let key of keywords) {

      if (t.includes(key)) return true;

      const score = this.similarity(t, key);

      if (score >= threshold) return true;
    }

    return false;
  },

  /* ================= RANDOM ================= */

  pick(arr = []) {
    return arr[Math.floor(Math.random() * arr.length)];
  },

  /* ================= DELAY NATURAL ================= */

  delay(text = "") {
    return Math.min(
      CONFIG.typingMax,
      CONFIG.typingMin + text.length * 12
    );
  },

  /* ================= DEBUG ================= */

  log(...args) {
    if (CONFIG.debug) {
      console.log("🧠 OR DEBUG:", ...args);
    }
  }

};

/* =========================================================
   🧠 INTENT DETECTOR 2.0 (SMART)

const Intent = {

  patterns: {

    GREETING: ["hola", "buenas", "hey", "holi", "hello"],

    NAME: [
      "me llamo",
      "soy ",
      "mi nombre es",
      "como me llamo"
    ],

    ASK_NAME: [
      "como te llamas",
      "quien eres",
      "tu nombre",
      "eres un bot",
      "eres humano"
    ],

    WHERE: [
      "donde estoy",
      "que pagina es",
      "donde estoy ahora"
    ],

    HELP: [
      "ayuda",
      "que puedes hacer",
      "que haces",
      "help",
      "no entiendo"
    ],

    NAVIGATE: [
      "ir a",
      "llevarme",
      "abre",
      "abrir",
      "ver pagina"
    ],

    PRODUCT: [
      "vino",
      "cerveza",
      "ron",
      "whisky",
      "vodka",
      "tequila",
      "bebida",
      "productos"
    ],

    OFFERS: [
      "oferta",
      "ofertas",
      "descuento",
      "descuentos",
      "rebaja",
      "rebajas",
      "promo",
      "promos",
      "promocion",
      "chollo",
      "barato"
    ],

    NEWS: [
      "novedad",
      "nuevo",
      "nuevos",
      "lanzamiento",
      "reciente"
    ],

    EVENT: [
      "evento",
      "fiesta",
      "boda",
      "bodas",
      "cumpleaños",
      "celebracion"
    ],

    CONTACT: [
      "contacto",
      "telefono",
      "email",
      "correo",
      "hablar con alguien"
    ],

    FAQ: [
      "preguntas",
      "dudas",
      "faq",
      "info",
      "informacion"
    ],

    CART: [
      "carrito",
      "pedido",
      "mi compra"
    ],

    CHECKOUT: [
      "pagar",
      "finalizar",
      "comprar",
      "checkout"
    ],

    YES: [
      "si",
      "sí",
      "vale",
      "ok",
      "claro",
      "perfecto",
      "dale",
      "venga"
    ],

    NO: [
      "no",
      "nop",
      "no gracias",
      "paso",
      "mejor no"
    ],

    UNSURE: [
      "no se",
      "no se que",
      "me da igual",
      "ni idea"
    ],

    SMALL_TALK: [
      "que tal",
      "como estas",
      "como estas?",
      "todo bien"
    ],

    B2B: [
  "b2b",
  "empresa",
  "empresas",
  "profesional",
  "mayorista",
  "comprar al por mayor",
  "distribucion",
  "distribuidor"
]

  },

  /* ================= DETECTAR INTENT ================= */

  detect(text) {

    const t = Utils.normalize(text);

    Utils.log("Input:", t);

    let bestIntent = "UNKNOWN";
    let bestScore = 0;

    for (let intent in this.patterns) {

      const keywords = this.patterns[intent];

      for (let keyword of keywords) {

        const score = Utils.similarity(t, keyword);

        if (t.includes(keyword)) {
          Utils.log("Match directo:", intent, keyword);
          return intent;
        }

        if (score > bestScore && score > 0.6) {
          bestScore = score;
          bestIntent = intent;
        }

      }

    }

    Utils.log("Intent detectado:", bestIntent, "score:", bestScore);

    return bestIntent;
  }

};

/* =========================================================
   🌍 CONTEXTO DE PÁGINA (SMART)

const Context = {

  get() {

    const path = window.location.pathname.toLowerCase();

    let ctx = {
      type: "home",
      name: "inicio",
      help: "Te ayudo a moverte por la web"
    };

    if (path.includes("checkout")) {
      ctx = { type: "checkout", name: "checkout", help: "Aquí puedes finalizar tu compra" };
    }

    else if (path.includes("cart") || path.includes("carrito")) {
      ctx = { type: "carrito", name: "carrito", help: "Aquí revisas tu pedido" };
    }

    else if (path.includes("catalogo")) {
      ctx = { type: "catalogo", name: "catálogo", help: "Aquí puedes explorar productos" };
    }

    else if (path.includes("eventos")) {
      ctx = { type: "eventos", name: "eventos", help: "Aquí puedes pedir presupuesto" };
    }

    else if (path.includes("noticias")) {
      ctx = { type: "noticias", name: "noticias", help: "Aquí ves novedades y ofertas" };
    }

    else if (path.includes("contacto")) {
      ctx = { type: "contacto", name: "contacto", help: "Aquí puedes escribirnos" };
    }

    else if (path.includes("preguntas")) {
      ctx = { type: "faq", name: "preguntas frecuentes", help: "Aquí tienes ayuda rápida" };
    }

    else if (path.includes("b2b")) {
      ctx = { type: "b2b", name: "zona profesional", help: "Área para empresas" };
    }

    else if (path.includes("my-account") || path.includes("account")) {
      ctx = { type: "account", name: "tu cuenta", help: "Aquí gestionas tu perfil" };
    }

    // guardamos última página
    Memory.setLastPage(ctx.type);

    return ctx;
  }

};



/* =========================================================
   🍷 DETECTOR DE CATEGORÍAS (MEJORADO)

const Categories = {

  map: {
    vino: ["vino", "vinos", "tinto", "blanco", "rosado"],
    cerveza: ["cerveza", "cervezas", "birra", "ipa"],
    destilados: ["ron", "whisky", "vodka", "ginebra", "gin", "tequila"],
    sidra: ["sidra", "sidras"]
  },

  detect(text) {

    const t = Utils.normalize(text);

    let bestCategory = null;
    let bestScore = 0;

    for (const cat in this.map) {

      for (const word of this.map[cat]) {

        const score = Utils.similarity(t, word);

        if (t.includes(word)) {
          Memory.setLastCategory(cat);
          return cat;
        }

        if (score > bestScore && score > 0.6) {
          bestScore = score;
          bestCategory = cat;
        }

      }

    }

    if (bestCategory) {
      Memory.setLastCategory(bestCategory);
    }

    return bestCategory;
  }

};



/* =========================================================
   🧠 CONTEXTO CONVERSACIONAL (CLAVE)

const Brain = {

  enrich(input) {

    const intent = Intent.detect(input);
    const category = Categories.detect(input);
    const ctx = Context.get();

    const lastIntent = Memory.getLastIntent();
    const lastCategory = Memory.getLastCategory();
    const lastPage = Memory.getLastPage();

    // Guardamos intent actual
    Memory.setLastIntent(intent);

    // Guardamos mensaje
    Memory.pushMessage("user", input);

    Utils.log("Brain:", {
      intent,
      category,
      lastIntent,
      lastCategory,
      lastPage
    });

    return {
      intent,
      category,
      ctx,
      lastIntent,
      lastCategory,
      lastPage
    };
  }

};

/* =========================================================
   💬 RESPUESTAS INTELIGENTES

const Responses = {

  greeting(name) {
    return Utils.pick([
      name ? `Ey ${name} 😏 ¿Qué te apetece hoy?` : "Ey 👋 ¿Qué buscas?",
      name ? `Buenas ${name}, dime qué te interesa` : "Buenas 👀 dime qué necesitas",
      "Aquí estoy 😏",
      "Dime, ¿qué necesitas?"
    ]);
  },

  smallTalk() {
    return Utils.pick([
      "Todo bien por aquí 😏 ¿y tú?",
      "Aquí ando, listo para ayudarte",
      "Mejor ahora que estás por aquí 👀"
    ]);
  },

  who() {
    return Utils.pick([
      "Soy Orb, el asistente de Free Soul Drink 😏",
      "Me llamo Orb, estoy aquí para ayudarte",
      "Soy Orb, tu guía por la web"
    ]);
  },

  where(ctx) {
    return `Estás en ${ctx.name}. ${ctx.help}`;
  },

  help() {
    return Utils.pick([
      "Puedo ayudarte a encontrar productos, ofertas o moverte por la web",
      "Dime qué buscas y te guío 👌",
      "Te ayudo con productos, pedidos o dudas"
    ]);
  },

  offers() {
    return Utils.pick([
      "Las ofertas están en noticias 👀 ¿te llevo?",
      "Puedes ver promociones en noticias",
      "Hay cositas interesantes en noticias 😏"
    ]);
  },

  news() {
    return Utils.pick([
      "Aquí tienes novedades 👀",
      "Tenemos cosas nuevas 😏 ¿quieres verlas?",
      "Te llevo a noticias si quieres"
    ]);
  },

  events() {
    return Utils.pick([
      "Puedes organizar eventos con nosotros 😏",
      "¿Preparando algo? Te ayudo",
      "Te llevo a eventos si quieres"
    ]);
  },

  contact() {
    return Utils.pick([
      "Puedes escribirnos desde contacto",
      "Si necesitas ayuda, estamos en contacto 👍",
      "Te llevo a contacto"
    ]);
  },

  faq() {
    return Utils.pick([
      "Ahí tienes respuestas rápidas",
      "Puedes resolver dudas ahí 👌",
      "Te llevo a preguntas frecuentes"
    ]);
  },

  cart() {
    return Utils.pick([
      "Tienes cosas en el carrito 🛒",
      "¿Seguimos comprando o pagamos?",
      "Puedes revisar tu pedido"
    ]);
  },

  checkout() {
    return Utils.pick([
      "Ahí completas tu pedido 🛒",
      "Estás a un paso de terminar",
      "¿Te ayudo a pagar?"
    ]);
  },

  confirm(category) {
    return Utils.pick([
      `${category} 😏 buena elección. ¿Quieres verlo?`,
      `Vale, ${category}. ¿Te lo enseño?`,
      `${category} 👌 ¿lo vemos?`
    ]);
  },

  show(category) {
    return Utils.pick([
      `Te enseño ${category} 👇`,
      `Mira esto 👇`,
      `Aquí lo tienes 👇`
    ]);
  },

  nameSaved(name) {
    return Utils.pick([
      `Perfecto ${name} 😏`,
      `Encantado ${name}`,
      `Vale ${name}, me acuerdo`
    ]);
  },

  askName() {
    return "¿Cómo te llamas?";
  },

  fallback() {
    return Utils.pick([
      "No te he entendido bien 👀",
      "Explícame mejor qué buscas",
      "Dime qué necesitas"
    ]);
  },

b2b() {
  return Utils.pick([
    "Esto es para profesionales 👀 te llevo",
    "Zona B2B activada 😏",
    "Aquí tienes la zona para empresas"
  ]);
}

};



/* =========================================================
   🧠 FLOW INTELIGENTE (CEREBRO)

const Flow = {

  handle(input) {

    const brain = Brain.enrich(input);

    const {
      intent,
      category,
      ctx,
      lastIntent,
      lastCategory
    } = brain;

    const name = Memory.getUserName();

    Utils.log("FLOW:", brain);

    /* ================= SALUDO ================= */

    if (intent === "GREETING") {
      return { text: Responses.greeting(name) };
    }

    /* ================= SMALL TALK ================= */

    if (intent === "SMALL_TALK") {
      return { text: Responses.smallTalk() };
    }

    /* ================= NOMBRE ================= */

    if (intent === "NAME") {

      const match = input.match(/(me llamo|soy)\s+(.+)/i);

      if (match && match[2]) {
        const name = match[2];
        Memory.setUserName(name);
        return { text: Responses.nameSaved(name) };
      }

      return { text: Responses.askName() };
    }

    /* ================= PREGUNTAN QUIÉN ERES ================= */

    if (intent === "ASK_NAME") {
      return { text: Responses.who() };
    }

    /* ================= DONDE ESTOY ================= */

    if (intent === "WHERE") {
      return { text: Responses.where(ctx) };
    }

    /* ================= AYUDA ================= */

    if (intent === "HELP") {
      return { text: Responses.help() };
    }

    /* ================= OFERTAS ================= */

    if (intent === "OFFERS") {
      return {
        text: Responses.offers(),
        action: "GO_PAGE",
        data: { page: "noticias" }
      };
    }

    /* ================= NOTICIAS ================= */

    if (intent === "NEWS") {
      return {
        text: Responses.news(),
        action: "GO_PAGE",
        data: { page: "noticias" }
      };
    }

    /* ================= EVENTOS ================= */

    if (intent === "EVENT") {
      return {
        text: Responses.events(),
        action: "GO_PAGE",
        data: { page: "eventos" }
      };
    }

    /* ================= CONTACTO ================= */

    if (intent === "CONTACT") {
      return {
        text: Responses.contact(),
        action: "GO_PAGE",
        data: { page: "contacto" }
      };
    }

    /* ================= FAQ ================= */

    if (intent === "FAQ") {
      return {
        text: Responses.faq(),
        action: "GO_PAGE",
        data: { page: "faq" }
      };
    }

    /* ================= CARRITO ================= */

    if (intent === "CART") {
      return {
        text: Responses.cart(),
        action: "GO_PAGE",
        data: { page: "cart" }
      };
    }

    /* ================= B2B ================= */

if (intent === "B2B") {
  return {
    text: Responses.b2b(),
    action: "GO_PAGE",
    data: { page: "b2b" }
  };
}

    /* ================= CHECKOUT ================= */

    if (intent === "CHECKOUT") {
      return {
        text: Responses.checkout(),
        action: "GO_PAGE",
        data: { page: "checkout" }
      };
    }

    /* ================= CATEGORÍA ================= */

    if (category) {
      Memory.setLastCategory(category);

      return {
        text: Responses.confirm(category),
        action: "ASK_CONFIRM"
      };
    }

    /* ================= CONFIRMACIÓN (SI) ================= */

    if (intent === "YES") {

      if (lastCategory) {
        return {
          text: Responses.show(lastCategory),
          action: "FILTER",
          data: { category: lastCategory }
        };
      }

      if (lastIntent === "OFFERS" || lastIntent === "NEWS") {
        return {
          text: "Te llevo 👇",
          action: "GO_PAGE",
          data: { page: "noticias" }
        };
      }

      return { text: "¿Qué quieres ver exactamente?" };
    }

    /* ================= NEGACIÓN ================= */

    if (intent === "NO") {
      return { text: "Vale 👌 dime qué prefieres" };
    }

    /* ================= CONTEXTO AUTOMÁTICO ================= */

    if (ctx.type === "catalogo") {
      return { text: "Estoy viendo el catálogo contigo 👀 dime qué buscas" };
    }

    if (ctx.type === "carrito") {
      return { text: "Estás en el carrito 🛒 ¿seguimos o pagamos?" };
    }

    if (ctx.type === "checkout") {
      return { text: "Estás en el pago 👀 ¿necesitas ayuda?" };
    }

    /* ================= FALLBACK ================= */

    return { text: Responses.fallback() };
  }

};

/* =========================================================
   ⚙️ ACTIONS 2.0 (SMART NAVIGATION)

const Actions = {

  /* ================= RUTAS CENTRALIZADAS ================= */

  routes: {

    noticias: "/freesoulwp/noticias/",
    eventos: "/freesoulwp/eventos/",
    contacto: "/freesoulwp/contacto/",
    faq: "/freesoulwp/preguntas-frecuentes/",
    cart: "/freesoulwp/cart/",
    checkout: "/freesoulwp/checkout/",
    catalogo: "/freesoulwp/catalogo/",
    b2b: "/freesoulwp/catalogo-b2b/"
  },

  /* ================= NAVEGAR ================= */

  goTo(page) {

    const url = this.routes[page];

    if (!url) {
      Utils.log("Ruta no encontrada:", page);
      return;
    }

    // evitar recargar si ya estás ahí
  if (window.location.pathname.includes(this.routes[page])) {
  Utils.log("Ya estás en:", page);
  return;
}

    Utils.log("Navegando a:", url);

  window.location.assign(url);
  },

  /* ================= FILTRAR CATÁLOGO ================= */

  filterCategory(category) {

    const ctx = Context.get();

    // si ya estás en catálogo → filtra sin recargar
    if (ctx.type === "catalogo") {

      if (typeof window.applyCatalogFilter === "function") {

        Utils.log("Filtrando en catálogo:", category);
        window.applyCatalogFilter(category);

      } else {

        Utils.log("Función de filtro no encontrada");
      }

    } else {

      // si no estás en catálogo → redirige con filtro
      const url = `${this.routes.catalogo}?filter=${category}`;

      Utils.log("Redirigiendo a catálogo con filtro:", url);

      window.location.assign(url);
    }

  },

  /* ================= EJECUTOR ================= */

  execute(action, data = {}) {

    Utils.log("ACTION:", action, data);

    switch(action) {

      case "GO_PAGE":
        this.goTo(data.page);
        break;

      case "FILTER":
        this.filterCategory(data.category);
        break;

      case "ASK_CONFIRM":
        // no hace nada, solo UI
        break;

      default:
        Utils.log("Acción desconocida:", action);
    }

  }

};

/* =========================================================
   💬 UI (CHAT INTELIGENTE)

function initUI() {

const orb = document.getElementById("orb");
const chat = document.getElementById("orb-chat");
const input = document.getElementById("orb-input");
const send = document.getElementById("orb-send");
const messages = document.getElementById("orb-messages");
const clearBtn = document.getElementById("orb-clear");
const close = document.getElementById("orb-close"); // ← IMPORTANTE


if (clearBtn) {
  clearBtn.addEventListener("click", function(e) {
    e.stopPropagation();
    clearChat();
  });
}

  if (!orb || !chat) return;

  let thinking = false;

  /* ================= ABRIR / CERRAR ================= */

  function open() {
    chat.classList.add("open");
    input?.focus();
  }

  function closeChat() {
    chat.classList.remove("open");
  }

orb.addEventListener("click", open);
close?.addEventListener("click", closeChat);


  /* ================= MENSAJES ================= */

  function addMessage(text, type = "bot") {

    if (!messages) return;

    const msg = document.createElement("div");
    msg.className = `orb-msg ${type}`;
    msg.innerText = text;

    messages.appendChild(msg);
    messages.scrollTop = messages.scrollHeight;

    // guardar en memoria
    Memory.pushMessage(type, text);
  }

  /* ================= THINKING ================= */

  function setThinking(state) {
    thinking = state;

    if (state) orb.classList.add("is-thinking");
    else orb.classList.remove("is-thinking");
  }

  /* ================= ESCRITURA HUMANA ================= */

  async function typeMessage(text) {

    const msg = document.createElement("div");
    msg.className = "orb-msg bot";
    messages.appendChild(msg);

    let current = "";

    for (let i = 0; i < text.length; i++) {

      current += text[i];
      msg.innerText = current;

      await new Promise(r => setTimeout(r, 10));
    }

    messages.scrollTop = messages.scrollHeight;

    // guardar mensaje final
    Memory.pushMessage("bot", text);
  }

  /* ================= PROCESAR ================= */

  async function process(text) {

    if (thinking) return;

    setThinking(true);

    const res = Flow.handle(text);

    const delay = Utils.delay(res.text);

    await new Promise(r => setTimeout(r, delay));

    await typeMessage(res.text);

    setThinking(false);

    // ejecutar acción después de responder
    if (res.action) {
      setTimeout(() => {
        Actions.execute(res.action, res.data);
      }, 400);
    }
  }

  /* ================= ENVIAR ================= */

  function sendMessage() {

    const text = input.value.trim();
    if (!text) return;

    addMessage(text, "user");

    input.value = "";

    process(text);
  }

  send?.addEventListener("click", sendMessage);

  input?.addEventListener("keypress", (e) => {
    if (e.key === "Enter") sendMessage();
  });

  /* ================= HISTORIAL ================= */

  function loadHistory() {

    const history = Memory.getHistory();

    if (!history.length) return;

    history.forEach(msg => {
      const div = document.createElement("div");
      div.className = `orb-msg ${msg.role}`;
      div.innerText = msg.text;
      messages.appendChild(div);
    });

    messages.scrollTop = messages.scrollHeight;
  }

/* ================= LIMPIAR CHAT ================= */

function clearChat() {

  const name = Memory.getUserName(); // opcional guardar nombre

  // limpiar UI
  messages.innerHTML = "";

  // limpiar memoria
  Memory.clear();

  // restaurar nombre (opcional)
  if (name) Memory.setUserName(name);

  // mensaje inicial otra vez
  welcome();
}

  /* ================= MENSAJE INICIAL ================= */

  function welcome() {

    const ctx = Context.get();
    const name = Memory.getUserName();

    const welcomeMap = {

      home: name ? `Ey ${name} 😏 ¿Qué buscas?` : "Ey 👋 ¿Qué buscas?",

      catalogo: "Estoy viendo el catálogo contigo 👀 dime qué buscas",

      carrito: "Tienes cosas en el carrito 🛒 ¿seguimos o pagamos?",

      checkout: "¿Te ayudo con el pago?",

      eventos: "¿Organizando algo? 😏 te ayudo",

      noticias: "Aquí tienes novedades y ofertas 👀",

      contacto: "¿Quieres escribirnos?",

      faq: "Aquí puedes resolver dudas rápidas"
    };

    addMessage(welcomeMap[ctx.type] || "¿Qué necesitas?");
  }

  /* ================= INIT ================= */

  setTimeout(() => {

    loadHistory();

    if (!Memory.getHistory().length) {
      welcome();
    }

  }, 500);

}

/* =========================================================
   🚀 INIT GLOBAL

document.addEventListener("DOMContentLoaded", () => {
  initUI();
});

const Orb = (() => {

/* =========================================================
   🧠 CONFIG AVANZADA

const CONFIG = {
  name: "Or",
  version: "2.0",
  typingMin: 300,
  typingMax: 1400,
  memoryLimit: 50,
  debug: true
};


/* =========================================================
   💾 MEMORIA AVANZADA (CONTEXTO REAL)

const Memory = {

  get(key) {
    try {
      return JSON.parse(sessionStorage.getItem("orb_" + key));
    } catch {
      return null;
    }
  },

  set(key, value) {
    sessionStorage.setItem("orb_" + key, JSON.stringify(value));
  },

  remove(key) {
    sessionStorage.removeItem("orb_" + key);
  },

  clear() {
    Object.keys(sessionStorage)
      .filter(k => k.startsWith("orb_"))
      .forEach(k => sessionStorage.removeItem(k));
  },

  /* ================= HISTORIAL ================= */

  pushMessage(role, text) {

    let history = this.get("history") || [];

    history.push({
      role,
      text,
      time: Date.now()
    });

    if (history.length > CONFIG.memoryLimit) {
      history.shift();
    }

    this.set("history", history);
  },

  getHistory() {
    return this.get("history") || [];
  },

getLastUserMessage() {
  const h = [...this.getHistory()].reverse();
  return h.find(m => m.role === "user");
},

  /* ================= PERFIL USUARIO ================= */

  setUserName(name) {
    this.set("username", name);
  },

  getUserName() {
    return this.get("username");
  },

  setUserPreference(key, value) {
    let prefs = this.get("prefs") || {};
    prefs[key] = value;
    this.set("prefs", prefs);
  },

  getUserPreference(key) {
    let prefs = this.get("prefs") || {};
    return prefs[key];
  },

  /* ================= CONTEXTO ================= */

  setLastIntent(intent) {
    this.set("lastIntent", intent);
  },

  getLastIntent() {
    return this.get("lastIntent");
  },

  setLastCategory(cat) {
    this.set("lastCategory", cat);
  },

  getLastCategory() {
    return this.get("lastCategory");
  },

  setLastPage(page) {
    this.set("lastPage", page);
  },

  getLastPage() {
    return this.get("lastPage");
  }

};

/* =========================================================
   🧰 UTILS PRO (INTELIGENCIA BASE)

const Utils = {

  /* ================= NORMALIZAR TEXTO ================= */

  normalize(text = "") {
    return text
      .toLowerCase()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "") // quitar acentos
      .replace(/[^\w\s]/gi, "")        // quitar símbolos
      .replace(/\s+/g, " ")           // limpiar espacios
      .trim();
  },

  /* ================= TOKENIZAR ================= */

  tokenize(text = "") {
    return this.normalize(text).split(" ");
  },

  /* ================= INCLUDES FLEXIBLE ================= */

  includesAny(text, words = []) {
    const t = this.normalize(text);
    return words.some(w => t.includes(w));
  },

  includesAll(text, words = []) {
    const t = this.normalize(text);
    return words.every(w => t.includes(w));
  },

  /* ================= SIMILITUD SIMPLE ================= */
  // tipo "oferta" ~ "ofertas", "promo", etc.

  similarity(a = "", b = "") {

    a = this.normalize(a);
    b = this.normalize(b);

    if (!a || !b) return 0;

    if (a === b) return 1;

    // comparación básica por palabras
    const aWords = a.split(" ");
    const bWords = b.split(" ");

    let matches = 0;

    aWords.forEach(word => {
      if (bWords.includes(word)) matches++;
    });

    return matches / Math.max(aWords.length, bWords.length);
  },

  /* ================= MATCH INTELIGENTE ================= */

  fuzzyMatch(text, keywords = [], threshold = 0.6) {

    const t = this.normalize(text);

    for (let key of keywords) {

      if (t.includes(key)) return true;

      const score = this.similarity(t, key);

      if (score >= threshold) return true;
    }

    return false;
  },

  /* ================= RANDOM ================= */

  pick(arr = []) {
    return arr[Math.floor(Math.random() * arr.length)];
  },

  /* ================= DELAY NATURAL ================= */

  delay(text = "") {
    return Math.min(
      CONFIG.typingMax,
      CONFIG.typingMin + text.length * 12
    );
  },

  /* ================= DEBUG ================= */

  log(...args) {
    if (CONFIG.debug) {
      console.log("🧠 OR DEBUG:", ...args);
    }
  }

};

/* =========================================================
   🧠 INTENT DETECTOR 2.0 (SMART)

const Intent = {

  patterns: {

    GREETING: ["hola", "buenas", "hey", "holi", "hello"],

    NAME: [
      "me llamo",
      "soy ",
      "mi nombre es",
      "como me llamo"
    ],

    ASK_NAME: [
      "como te llamas",
      "quien eres",
      "tu nombre",
      "eres un bot",
      "eres humano"
    ],

    WHERE: [
      "donde estoy",
      "que pagina es",
      "donde estoy ahora"
    ],

    HELP: [
      "ayuda",
      "que puedes hacer",
      "que haces",
      "help",
      "no entiendo"
    ],

    NAVIGATE: [
      "ir a",
      "llevarme",
      "abre",
      "abrir",
      "ver pagina"
    ],

    PRODUCT: [
      "vino",
      "cerveza",
      "ron",
      "whisky",
      "vodka",
      "tequila",
      "bebida",
      "productos"
    ],

    OFFERS: [
      "oferta",
      "ofertas",
      "descuento",
      "descuentos",
      "rebaja",
      "rebajas",
      "promo",
      "promos",
      "promocion",
      "chollo",
      "barato"
    ],

    NEWS: [
      "novedad",
      "nuevo",
      "nuevos",
      "lanzamiento",
      "reciente"
    ],

    EVENT: [
      "evento",
      "fiesta",
      "boda",
      "bodas",
      "cumpleaños",
      "celebracion"
    ],

    CONTACT: [
      "contacto",
      "telefono",
      "email",
      "correo",
      "hablar con alguien"
    ],

    FAQ: [
      "preguntas",
      "dudas",
      "faq",
      "info",
      "informacion"
    ],

    CART: [
      "carrito",
      "pedido",
      "mi compra"
    ],

    CHECKOUT: [
      "pagar",
      "finalizar",
      "comprar",
      "checkout"
    ],

    YES: [
      "si",
      "sí",
      "vale",
      "ok",
      "claro",
      "perfecto",
      "dale",
      "venga"
    ],

    NO: [
      "no",
      "nop",
      "no gracias",
      "paso",
      "mejor no"
    ],

    UNSURE: [
      "no se",
      "no se que",
      "me da igual",
      "ni idea"
    ],

    SMALL_TALK: [
      "que tal",
      "como estas",
      "como estas?",
      "todo bien"
    ],

    B2B: [
  "b2b",
  "empresa",
  "empresas",
  "profesional",
  "mayorista",
  "comprar al por mayor",
  "distribucion",
  "distribuidor"
]

  },

  /* ================= DETECTAR INTENT ================= */

  detect(text) {

    const t = Utils.normalize(text);

    Utils.log("Input:", t);

    let bestIntent = "UNKNOWN";
    let bestScore = 0;

    for (let intent in this.patterns) {

      const keywords = this.patterns[intent];

      for (let keyword of keywords) {

        const score = Utils.similarity(t, keyword);

        if (t.includes(keyword)) {
          Utils.log("Match directo:", intent, keyword);
          return intent;
        }

        if (score > bestScore && score > 0.6) {
          bestScore = score;
          bestIntent = intent;
        }

      }

    }

    Utils.log("Intent detectado:", bestIntent, "score:", bestScore);

    return bestIntent;
  }

};

/* =========================================================
   🌍 CONTEXTO DE PÁGINA (SMART)

const Context = {

  get() {

    const path = window.location.pathname.toLowerCase();

    let ctx = {
      type: "home",
      name: "inicio",
      help: "Te ayudo a moverte por la web"
    };

    if (path.includes("checkout")) {
      ctx = { type: "checkout", name: "checkout", help: "Aquí puedes finalizar tu compra" };
    }

    else if (path.includes("cart") || path.includes("carrito")) {
      ctx = { type: "carrito", name: "carrito", help: "Aquí revisas tu pedido" };
    }

    else if (path.includes("catalogo")) {
      ctx = { type: "catalogo", name: "catálogo", help: "Aquí puedes explorar productos" };
    }

    else if (path.includes("eventos")) {
      ctx = { type: "eventos", name: "eventos", help: "Aquí puedes pedir presupuesto" };
    }

    else if (path.includes("noticias")) {
      ctx = { type: "noticias", name: "noticias", help: "Aquí ves novedades y ofertas" };
    }

    else if (path.includes("contacto")) {
      ctx = { type: "contacto", name: "contacto", help: "Aquí puedes escribirnos" };
    }

    else if (path.includes("preguntas")) {
      ctx = { type: "faq", name: "preguntas frecuentes", help: "Aquí tienes ayuda rápida" };
    }

    else if (path.includes("b2b")) {
      ctx = { type: "b2b", name: "zona profesional", help: "Área para empresas" };
    }

    else if (path.includes("my-account") || path.includes("account")) {
      ctx = { type: "account", name: "tu cuenta", help: "Aquí gestionas tu perfil" };
    }

    // guardamos última página
    Memory.setLastPage(ctx.type);

    return ctx;
  }

};



/* =========================================================
   🍷 DETECTOR DE CATEGORÍAS (MEJORADO)

const Categories = {

  map: {
    vino: ["vino", "vinos", "tinto", "blanco", "rosado"],
    cerveza: ["cerveza", "cervezas", "birra", "ipa"],
    destilados: ["ron", "whisky", "vodka", "ginebra", "gin", "tequila"],
    sidra: ["sidra", "sidras"]
  },

  detect(text) {

    const t = Utils.normalize(text);

    let bestCategory = null;
    let bestScore = 0;

    for (const cat in this.map) {

      for (const word of this.map[cat]) {

        const score = Utils.similarity(t, word);

        if (t.includes(word)) {
          Memory.setLastCategory(cat);
          return cat;
        }

        if (score > bestScore && score > 0.6) {
          bestScore = score;
          bestCategory = cat;
        }

      }

    }

    if (bestCategory) {
      Memory.setLastCategory(bestCategory);
    }

    return bestCategory;
  }

};



/* =========================================================
   🧠 CONTEXTO CONVERSACIONAL (CLAVE)

const Brain = {

  enrich(input) {

    const intent = Intent.detect(input);
    const category = Categories.detect(input);
    const ctx = Context.get();

    const lastIntent = Memory.getLastIntent();
    const lastCategory = Memory.getLastCategory();
    const lastPage = Memory.getLastPage();

    // Guardamos intent actual
    Memory.setLastIntent(intent);

    // Guardamos mensaje
    Memory.pushMessage("user", input);

    Utils.log("Brain:", {
      intent,
      category,
      lastIntent,
      lastCategory,
      lastPage
    });

    return {
      intent,
      category,
      ctx,
      lastIntent,
      lastCategory,
      lastPage
    };
  }

};

/* =========================================================
   💬 RESPUESTAS INTELIGENTES

const Responses = {

  greeting(name) {
    return Utils.pick([
      name ? `Ey ${name} 😏 ¿Qué te apetece hoy?` : "Ey 👋 ¿Qué buscas?",
      name ? `Buenas ${name}, dime qué te interesa` : "Buenas 👀 dime qué necesitas",
      "Aquí estoy 😏",
      "Dime, ¿qué necesitas?"
    ]);
  },

  smallTalk() {
    return Utils.pick([
      "Todo bien por aquí 😏 ¿y tú?",
      "Aquí ando, listo para ayudarte",
      "Mejor ahora que estás por aquí 👀"
    ]);
  },

  who() {
    return Utils.pick([
      "Soy Orb, el asistente de Free Soul Drink 😏",
      "Me llamo Orb, estoy aquí para ayudarte",
      "Soy Orb, tu guía por la web"
    ]);
  },

  where(ctx) {
    return `Estás en ${ctx.name}. ${ctx.help}`;
  },

  help() {
    return Utils.pick([
      "Puedo ayudarte a encontrar productos, ofertas o moverte por la web",
      "Dime qué buscas y te guío 👌",
      "Te ayudo con productos, pedidos o dudas"
    ]);
  },

  offers() {
    return Utils.pick([
      "Las ofertas están en noticias 👀 ¿te llevo?",
      "Puedes ver promociones en noticias",
      "Hay cositas interesantes en noticias 😏"
    ]);
  },

  news() {
    return Utils.pick([
      "Aquí tienes novedades 👀",
      "Tenemos cosas nuevas 😏 ¿quieres verlas?",
      "Te llevo a noticias si quieres"
    ]);
  },

  events() {
    return Utils.pick([
      "Puedes organizar eventos con nosotros 😏",
      "¿Preparando algo? Te ayudo",
      "Te llevo a eventos si quieres"
    ]);
  },

  contact() {
    return Utils.pick([
      "Puedes escribirnos desde contacto",
      "Si necesitas ayuda, estamos en contacto 👍",
      "Te llevo a contacto"
    ]);
  },

  faq() {
    return Utils.pick([
      "Ahí tienes respuestas rápidas",
      "Puedes resolver dudas ahí 👌",
      "Te llevo a preguntas frecuentes"
    ]);
  },

  cart() {
    return Utils.pick([
      "Tienes cosas en el carrito 🛒",
      "¿Seguimos comprando o pagamos?",
      "Puedes revisar tu pedido"
    ]);
  },

  checkout() {
    return Utils.pick([
      "Ahí completas tu pedido 🛒",
      "Estás a un paso de terminar",
      "¿Te ayudo a pagar?"
    ]);
  },

  confirm(category) {
    return Utils.pick([
      `${category} 😏 buena elección. ¿Quieres verlo?`,
      `Vale, ${category}. ¿Te lo enseño?`,
      `${category} 👌 ¿lo vemos?`
    ]);
  },

  show(category) {
    return Utils.pick([
      `Te enseño ${category} 👇`,
      `Mira esto 👇`,
      `Aquí lo tienes 👇`
    ]);
  },

  nameSaved(name) {
    return Utils.pick([
      `Perfecto ${name} 😏`,
      `Encantado ${name}`,
      `Vale ${name}, me acuerdo`
    ]);
  },

  askName() {
    return "¿Cómo te llamas?";
  },

  fallback() {
    return Utils.pick([
      "No te he entendido bien 👀",
      "Explícame mejor qué buscas",
      "Dime qué necesitas"
    ]);
  },

b2b() {
  return Utils.pick([
    "Esto es para profesionales 👀 te llevo",
    "Zona B2B activada 😏",
    "Aquí tienes la zona para empresas"
  ]);
}

};



/* =========================================================
   🧠 FLOW INTELIGENTE (CEREBRO)

const Flow = {

  handle(input) {

    const brain = Brain.enrich(input);

    const {
      intent,
      category,
      ctx,
      lastIntent,
      lastCategory
    } = brain;

    const name = Memory.getUserName();

    Utils.log("FLOW:", brain);

    /* ================= SALUDO ================= */

    if (intent === "GREETING") {
      return { text: Responses.greeting(name) };
    }

    /* ================= SMALL TALK ================= */

    if (intent === "SMALL_TALK") {
      return { text: Responses.smallTalk() };
    }

    /* ================= NOMBRE ================= */

    if (intent === "NAME") {

      const match = input.match(/(me llamo|soy)\s+(.+)/i);

      if (match && match[2]) {
        const name = match[2];
        Memory.setUserName(name);
        return { text: Responses.nameSaved(name) };
      }

      return { text: Responses.askName() };
    }

    /* ================= PREGUNTAN QUIÉN ERES ================= */

    if (intent === "ASK_NAME") {
      return { text: Responses.who() };
    }

    /* ================= DONDE ESTOY ================= */

    if (intent === "WHERE") {
      return { text: Responses.where(ctx) };
    }

    /* ================= AYUDA ================= */

    if (intent === "HELP") {
      return { text: Responses.help() };
    }

    /* ================= OFERTAS ================= */

    if (intent === "OFFERS") {
      return {
        text: Responses.offers(),
        action: "GO_PAGE",
        data: { page: "noticias" }
      };
    }

    /* ================= NOTICIAS ================= */

    if (intent === "NEWS") {
      return {
        text: Responses.news(),
        action: "GO_PAGE",
        data: { page: "noticias" }
      };
    }

    /* ================= EVENTOS ================= */

    if (intent === "EVENT") {
      return {
        text: Responses.events(),
        action: "GO_PAGE",
        data: { page: "eventos" }
      };
    }

    /* ================= CONTACTO ================= */

    if (intent === "CONTACT") {
      return {
        text: Responses.contact(),
        action: "GO_PAGE",
        data: { page: "contacto" }
      };
    }

    /* ================= FAQ ================= */

    if (intent === "FAQ") {
      return {
        text: Responses.faq(),
        action: "GO_PAGE",
        data: { page: "faq" }
      };
    }

    /* ================= CARRITO ================= */

    if (intent === "CART") {
      return {
        text: Responses.cart(),
        action: "GO_PAGE",
        data: { page: "cart" }
      };
    }

    /* ================= B2B ================= */

if (intent === "B2B") {
  return {
    text: Responses.b2b(),
    action: "GO_PAGE",
    data: { page: "b2b" }
  };
}

    /* ================= CHECKOUT ================= */

    if (intent === "CHECKOUT") {
      return {
        text: Responses.checkout(),
        action: "GO_PAGE",
        data: { page: "checkout" }
      };
    }

    /* ================= CATEGORÍA ================= */

    if (category) {
      Memory.setLastCategory(category);

      return {
        text: Responses.confirm(category),
        action: "ASK_CONFIRM"
      };
    }

    /* ================= CONFIRMACIÓN (SI) ================= */

    if (intent === "YES") {

      if (lastCategory) {
        return {
          text: Responses.show(lastCategory),
          action: "FILTER",
          data: { category: lastCategory }
        };
      }

      if (lastIntent === "OFFERS" || lastIntent === "NEWS") {
        return {
          text: "Te llevo 👇",
          action: "GO_PAGE",
          data: { page: "noticias" }
        };
      }

      return { text: "¿Qué quieres ver exactamente?" };
    }

    /* ================= NEGACIÓN ================= */

    if (intent === "NO") {
      return { text: "Vale 👌 dime qué prefieres" };
    }

    /* ================= CONTEXTO AUTOMÁTICO ================= */

    if (ctx.type === "catalogo") {
      return { text: "Estoy viendo el catálogo contigo 👀 dime qué buscas" };
    }

    if (ctx.type === "carrito") {
      return { text: "Estás en el carrito 🛒 ¿seguimos o pagamos?" };
    }

    if (ctx.type === "checkout") {
      return { text: "Estás en el pago 👀 ¿necesitas ayuda?" };
    }

    /* ================= FALLBACK ================= */

    return { text: Responses.fallback() };
  }

};

/* =========================================================
   ⚙️ ACTIONS 2.0 (SMART NAVIGATION)

const Actions = {

  /* ================= RUTAS CENTRALIZADAS ================= */

  routes: {

    noticias: "/freesoulwp/noticias/",
    eventos: "/freesoulwp/eventos/",
    contacto: "/freesoulwp/contacto/",
    faq: "/freesoulwp/preguntas-frecuentes/",
    cart: "/freesoulwp/cart/",
    checkout: "/freesoulwp/checkout/",
    catalogo: "/freesoulwp/catalogo/",
    b2b: "/freesoulwp/catalogo-b2b/"
  },

  /* ================= NAVEGAR ================= */

  goTo(page) {

    const url = this.routes[page];

    if (!url) {
      Utils.log("Ruta no encontrada:", page);
      return;
    }

    // evitar recargar si ya estás ahí
  if (window.location.pathname.includes(this.routes[page])) {
  Utils.log("Ya estás en:", page);
  return;
}

    Utils.log("Navegando a:", url);

  window.location.assign(url);
  },

  /* ================= FILTRAR CATÁLOGO ================= */

  filterCategory(category) {

    const ctx = Context.get();

    // si ya estás en catálogo → filtra sin recargar
    if (ctx.type === "catalogo") {

      if (typeof window.applyCatalogFilter === "function") {

        Utils.log("Filtrando en catálogo:", category);
        window.applyCatalogFilter(category);

      } else {

        Utils.log("Función de filtro no encontrada");
      }

    } else {

      // si no estás en catálogo → redirige con filtro
      const url = `${this.routes.catalogo}?filter=${category}`;

      Utils.log("Redirigiendo a catálogo con filtro:", url);

      window.location.assign(url);
    }

  },

  /* ================= EJECUTOR ================= */

  execute(action, data = {}) {

    Utils.log("ACTION:", action, data);

    switch(action) {

      case "GO_PAGE":
        this.goTo(data.page);
        break;

      case "FILTER":
        this.filterCategory(data.category);
        break;

      case "ASK_CONFIRM":
        // no hace nada, solo UI
        break;

      default:
        Utils.log("Acción desconocida:", action);
    }

  }

};

/* =========================================================
   💬 UI (CHAT INTELIGENTE)

function initUI() {

const orb = document.getElementById("orb");
const chat = document.getElementById("orb-chat");
const input = document.getElementById("orb-input");
const send = document.getElementById("orb-send");
const messages = document.getElementById("orb-messages");
const clearBtn = document.getElementById("orb-clear");
const close = document.getElementById("orb-close"); // ← IMPORTANTE


if (clearBtn) {
  clearBtn.addEventListener("click", function(e) {
    e.stopPropagation();
    clearChat();
  });
}

  if (!orb || !chat) return;

  let thinking = false;

  /* ================= ABRIR / CERRAR ================= */

  function open() {
    chat.classList.add("open");
    input?.focus();
  }

  function closeChat() {
    chat.classList.remove("open");
  }

orb.addEventListener("click", open);
close?.addEventListener("click", closeChat);


  /* ================= MENSAJES ================= */

  function addMessage(text, type = "bot") {

    if (!messages) return;

    const msg = document.createElement("div");
    msg.className = `orb-msg ${type}`;
    msg.innerText = text;

    messages.appendChild(msg);
    messages.scrollTop = messages.scrollHeight;

    // guardar en memoria
    Memory.pushMessage(type, text);
  }

  /* ================= THINKING ================= */

  function setThinking(state) {
    thinking = state;

    if (state) orb.classList.add("is-thinking");
    else orb.classList.remove("is-thinking");
  }

  /* ================= ESCRITURA HUMANA ================= */

  async function typeMessage(text) {

    const msg = document.createElement("div");
    msg.className = "orb-msg bot";
    messages.appendChild(msg);

    let current = "";

    for (let i = 0; i < text.length; i++) {

      current += text[i];
      msg.innerText = current;

      await new Promise(r => setTimeout(r, 10));
    }

    messages.scrollTop = messages.scrollHeight;

    // guardar mensaje final
    Memory.pushMessage("bot", text);
  }

  /* ================= PROCESAR ================= */

  async function process(text) {

    if (thinking) return;

    setThinking(true);

    const res = Flow.handle(text);

    const delay = Utils.delay(res.text);

    await new Promise(r => setTimeout(r, delay));

    await typeMessage(res.text);

    setThinking(false);

    // ejecutar acción después de responder
    if (res.action) {
      setTimeout(() => {
        Actions.execute(res.action, res.data);
      }, 400);
    }
  }

  /* ================= ENVIAR ================= */

  function sendMessage() {

    const text = input.value.trim();
    if (!text) return;

    addMessage(text, "user");

    input.value = "";

    process(text);
  }

  send?.addEventListener("click", sendMessage);

  input?.addEventListener("keypress", (e) => {
    if (e.key === "Enter") sendMessage();
  });

  /* ================= HISTORIAL ================= */

  function loadHistory() {

    const history = Memory.getHistory();

    if (!history.length) return;

    history.forEach(msg => {
      const div = document.createElement("div");
      div.className = `orb-msg ${msg.role}`;
      div.innerText = msg.text;
      messages.appendChild(div);
    });

    messages.scrollTop = messages.scrollHeight;
  }

/* ================= LIMPIAR CHAT ================= */

function clearChat() {

  const name = Memory.getUserName(); // opcional guardar nombre

  // limpiar UI
  messages.innerHTML = "";

  // limpiar memoria
  Memory.clear();

  // restaurar nombre (opcional)
  if (name) Memory.setUserName(name);

  // mensaje inicial otra vez
  welcome();
}

  /* ================= MENSAJE INICIAL ================= */

  function welcome() {

    const ctx = Context.get();
    const name = Memory.getUserName();

    const welcomeMap = {

      home: name ? `Ey ${name} 😏 ¿Qué buscas?` : "Ey 👋 ¿Qué buscas?",

      catalogo: "Estoy viendo el catálogo contigo 👀 dime qué buscas",

      carrito: "Tienes cosas en el carrito 🛒 ¿seguimos o pagamos?",

      checkout: "¿Te ayudo con el pago?",

      eventos: "¿Organizando algo? 😏 te ayudo",

      noticias: "Aquí tienes novedades y ofertas 👀",

      contacto: "¿Quieres escribirnos?",

      faq: "Aquí puedes resolver dudas rápidas"
    };

    addMessage(welcomeMap[ctx.type] || "¿Qué necesitas?");
  }

  /* ================= INIT ================= */

  setTimeout(() => {

    loadHistory();

    if (!Memory.getHistory().length) {
      welcome();
    }

  }, 500);

}

/* =========================================================
   🚀 INIT GLOBAL

document.addEventListener("DOMContentLoaded", () => {
  initUI();
});

})(); // <-- cierre del módulo Orb