<?php
/* ================= FREE SOUL ORB — IA ESFERA PRO ================= */
?>

<!-- ================= ORB ================= -->

<div id="orb" class="orb" role="button" aria-label="Abrir chat">

  <div class="orb-core">
<div class="orb-bubble" id="orb-bubble"></div>
    <!-- LOGO IA -->
    <div class="orb-logo">

      <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">

        <!-- círculo interior -->
        <circle 
          class="orb-ring"
          cx="50" 
          cy="50" 
          r="28"
        />

        <!-- línea IA (dinámica tipo GPT/Claude) -->
        <path 
          class="orb-line"
          d="M30 50 C40 30, 60 70, 70 50"
        />

      </svg>

    </div>

  </div>

  <!-- GLOW -->
  <div class="orb-glow"></div>

  <!-- BURBUJA -->
  <div class="orb-bubble" id="orb-bubble">
    ¿Te ayudo?
  </div>

</div>


<!-- ================= CHAT ================= -->

<div id="orb-chat" class="orb-chat" role="dialog" aria-label="Chat asistente">

  <!-- HEADER -->
  <div class="orb-chat-header">

    <span>Free Soul Assistant</span>

    <button id="orb-close" type="button" aria-label="Cerrar chat">
      ×
    </button>

  </div>

  <!-- MENSAJES -->
  <div 
    id="orb-messages" 
    class="orb-messages"
    aria-live="polite"
  >
    <!-- JS inyecta mensajes -->
  </div>

  <!-- INPUT -->
  <div class="orb-input">

    <input 
      type="text" 
      id="orb-input" 
      placeholder="Escribe aquí..."
      autocomplete="off"
      aria-label="Escribir mensaje"
    >

    <!-- BOTONES -->
    <div class="orb-actions">

      <button id="orb-send" type="button">
        Enviar
      </button>

      <button id="orb-clear" type="button">
        Limpiar
      </button>

    </div>

  </div>

</div>